import { readdir, readFile, stat } from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const root = path.dirname(fileURLToPath(import.meta.url));
const dist = path.join(root, 'dist');
const failures = [];
const warnings = [];

async function walk(directory) {
  const entries = await readdir(directory, { withFileTypes: true });
  const files = [];
  for (const entry of entries) {
    const full = path.join(directory, entry.name);
    if (entry.isDirectory()) files.push(...await walk(full));
    else files.push(full);
  }
  return files;
}

async function exists(file) {
  try {
    await stat(file);
    return true;
  } catch {
    return false;
  }
}

function targetForUrl(url, currentFile) {
  const clean = url.split('#')[0].split('?')[0];
  if (!clean) return null;
  if (/^(?:https?:|mailto:|tel:|data:|javascript:)/i.test(clean)) return null;

  let resolved;
  if (clean.startsWith('/')) resolved = path.join(dist, clean.slice(1));
  else resolved = path.resolve(path.dirname(currentFile), clean);

  if (path.extname(resolved)) return resolved;
  return path.join(resolved, 'index.html');
}

try {
  if (!await exists(dist)) {
    failures.push('dist/ does not exist. Run npm run build first.');
  } else {
    const files = await walk(dist);
    const htmlFiles = files.filter((file) => file.endsWith('.html'));
    const titleMap = new Map();

    const cmsConfig = path.join(dist, 'admin', 'config.yml');
    if (await exists(cmsConfig)) {
      const config = await readFile(cmsConfig, 'utf8');
      if (config.includes('REPLACE_WITH_GITHUB_USERNAME')) {
        warnings.push('CMS repository placeholder has not been replaced in admin/config.yml.');
      }
    }

    for (const file of htmlFiles) {
      const relative = path.relative(dist, file).replaceAll(path.sep, '/');
      const html = await readFile(file, 'utf8');

      if (/{{\s*[A-Za-z0-9_.-]+\s*}}/.test(html)) {
        failures.push(`${relative}: unresolved template token found.`);
      }
      if (!/<html\s+lang="en-GB"/i.test(html)) warnings.push(`${relative}: missing lang="en-GB".`);
      if (!/<meta\s+name="viewport"/i.test(html)) warnings.push(`${relative}: missing viewport meta tag.`);
      if (!/<meta\s+name="description"\s+content="[^"]+"/i.test(html)) warnings.push(`${relative}: missing meta description.`);

      const title = html.match(/<title>([^<]+)<\/title>/i)?.[1]?.trim();
      if (!title) failures.push(`${relative}: missing title.`);
      else {
        const existing = titleMap.get(title) || [];
        existing.push(relative);
        titleMap.set(title, existing);
      }

      const attributes = [...html.matchAll(/\b(?:href|src)="([^"]+)"/gi)].map((match) => match[1]);
      for (const url of attributes) {
        const target = targetForUrl(url, file);
        if (!target) continue;
        if (!target.startsWith(dist)) {
          failures.push(`${relative}: link escapes dist directory: ${url}`);
          continue;
        }
        if (!await exists(target)) failures.push(`${relative}: broken internal reference ${url}`);
      }
    }

    for (const [title, pages] of titleMap) {
      if (pages.length > 1) warnings.push(`Duplicate title "${title}" on ${pages.join(', ')}`);
    }

    const contact = path.join(dist, 'contact', 'index.html');
    if (await exists(contact)) {
      const html = await readFile(contact, 'utf8');
      if (!/data-netlify="true"/.test(html)) failures.push('Contact form is missing data-netlify="true".');
      if (!/name="form-name"\s+value="project-enquiry"/.test(html)) failures.push('Contact form is missing the hidden form-name field.');
      if (!/netlify-honeypot="bot-field"/.test(html)) warnings.push('Contact form honeypot is missing.');
    }

    for (const required of ['sitemap.xml', 'robots.txt', 'feed.xml', 'admin/index.html', 'admin/config.yml']) {
      if (!await exists(path.join(dist, required))) failures.push(`Missing required output: ${required}`);
    }

    console.log(`Checked ${htmlFiles.length} HTML pages and ${files.length} total output files.`);
  }
} catch (error) {
  failures.push(error.stack || error.message);
}

for (const warning of warnings) console.warn(`WARNING: ${warning}`);
if (failures.length) {
  for (const failure of failures) console.error(`ERROR: ${failure}`);
  process.exitCode = 1;
} else {
  console.log(`Verification passed${warnings.length ? ` with ${warnings.length} warning(s)` : ''}.`);
}
