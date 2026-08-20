import { mkdir, readFile, readdir, rm, stat, writeFile, copyFile } from 'node:fs/promises';
import { createHash } from 'node:crypto';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT = path.dirname(fileURLToPath(import.meta.url));
const SRC = path.join(ROOT, 'src');
const DIST = path.join(ROOT, 'dist');
const STATIC = path.join(SRC, 'static');
const PAGES = path.join(SRC, 'pages');
const POSTS_DIR = path.join(SRC, 'content', 'posts');
const DATA_DIR = path.join(SRC, 'data');

let cssVersion = '';

const pageDefinitions = [
  {
    source: 'home.html',
    output: 'index.html',
    route: '/',
    nav: 'home',
    title: 'AI Automation, Website Design, Social Media & App Development',
    description: 'Inovantage helps ambitious businesses automate repetitive work, build high-performing websites, manage social media with approval controls, and launch practical web and mobile apps.'
  },
  {
    source: 'services.html',
    output: 'services/index.html',
    route: '/services/',
    nav: 'services',
    title: 'Digital Services',
    description: 'Explore Inovantage services across AI automation, website design, social media management, and app development.'
  },
  {
    source: 'ai-automation.html',
    output: 'services/ai-automation/index.html',
    route: '/services/ai-automation/',
    nav: 'services',
    title: 'AI Automation Services',
    description: 'Practical AI automation for lead handling, customer support, reporting, data entry, content operations, and connected business workflows.'
  },
  {
    source: 'website-design.html',
    output: 'services/website-design/index.html',
    route: '/services/website-design/',
    nav: 'services',
    title: 'Website Design & Development',
    description: 'Fast, accessible, conversion-focused websites designed around your brand, customers, content, and growth goals.'
  },
  {
    source: 'social-media-management.html',
    output: 'services/social-media-management/index.html',
    route: '/services/social-media-management/',
    nav: 'services',
    title: 'Social Media Management',
    description: 'Strategy, content planning, design, captions, approval workflows, scheduling, community support, and clear performance reporting.'
  },
  {
    source: 'app-development.html',
    output: 'services/app-development/index.html',
    route: '/services/app-development/',
    nav: 'services',
    title: 'Web & Mobile App Development',
    description: 'From discovery and prototype to production, Inovantage builds practical apps, portals, dashboards, and internal tools.'
  },
  {
    source: 'about.html',
    output: 'about/index.html',
    route: '/about/',
    nav: 'about',
    title: 'About Inovantage',
    description: 'A practical digital partner focused on useful automation, clear communication, thoughtful design, and dependable delivery.'
  },
  {
    source: 'work.html',
    output: 'work/index.html',
    route: '/work/',
    nav: 'work',
    title: 'Solution Blueprints',
    description: 'Explore examples of the digital systems Inovantage can design: automated lead operations, approval-led content engines, and customer portals.'
  },
  {
    source: 'insights.html',
    output: 'insights/index.html',
    route: '/insights/',
    nav: 'insights',
    title: 'Insights',
    description: 'Practical guidance on AI automation, website performance, social media operations, and app development.'
  },
  {
    source: 'contact.html',
    output: 'contact/index.html',
    route: '/contact/',
    nav: 'contact',
    title: 'Contact Inovantage',
    description: 'Tell Inovantage what you want to improve, build, or automate. Start with a clear, no-pressure discovery conversation.'
  },
  {
    source: 'thank-you.html',
    output: 'thank-you/index.html',
    route: '/thank-you/',
    nav: '',
    title: 'Thank You',
    description: 'Thank you for contacting Inovantage.'
  },
  {
    source: 'privacy.html',
    output: 'privacy/index.html',
    route: '/privacy/',
    nav: '',
    title: 'Privacy Notice',
    description: 'How Inovantage handles personal information submitted through this website.'
  },
  {
    source: 'cookies.html',
    output: 'cookies/index.html',
    route: '/cookies/',
    nav: '',
    title: 'Cookie Notice',
    description: 'Information about cookies and local storage used by the Inovantage website.'
  },
  {
    source: 'terms.html',
    output: 'terms/index.html',
    route: '/terms/',
    nav: '',
    title: 'Website Terms',
    description: 'Terms governing use of the Inovantage website.'
  },
  {
    source: '404.html',
    output: '404.html',
    route: '/404.html',
    nav: '',
    title: 'Page Not Found',
    description: 'The page you requested could not be found.'
  }
];

function escapeHtml(value = '') {
  return String(value)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#039;');
}

function escapeXml(value = '') {
  return escapeHtml(value);
}

function slugify(value = '') {
  return String(value)
    .toLowerCase()
    .normalize('NFKD')
    .replace(/[\u0300-\u036f]/g, '')
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/^-+|-+$/g, '') || 'post';
}

function parseYamlValue(raw) {
  const value = raw.trim();
  if (value === '') return '';
  if (value === 'true') return true;
  if (value === 'false') return false;
  if (value === 'null' || value === '~') return null;
  if ((value.startsWith('"') && value.endsWith('"')) || (value.startsWith("'") && value.endsWith("'"))) {
    return value.slice(1, -1).replace(/\\"/g, '"').replace(/\\'/g, "'");
  }
  if (value.startsWith('[') && value.endsWith(']')) {
    try {
      return JSON.parse(value.replace(/'/g, '"'));
    } catch {
      return value.slice(1, -1).split(',').map((item) => item.trim()).filter(Boolean);
    }
  }
  if (/^-?\d+(?:\.\d+)?$/.test(value)) return Number(value);
  return value;
}

function parseFrontMatter(raw) {
  const normalised = raw.replace(/^\uFEFF/, '').replace(/\r\n/g, '\n');
  if (!normalised.startsWith('---\n')) {
    return { data: {}, body: normalised };
  }

  const end = normalised.indexOf('\n---\n', 4);
  if (end === -1) return { data: {}, body: normalised };

  const front = normalised.slice(4, end);
  const body = normalised.slice(end + 5);
  const data = {};
  const lines = front.split('\n');

  for (let i = 0; i < lines.length; i += 1) {
    const line = lines[i];
    if (!line.trim() || line.trimStart().startsWith('#')) continue;
    const match = line.match(/^([A-Za-z0-9_-]+):\s*(.*)$/);
    if (!match) continue;
    const [, key, rawValue] = match;

    if (/^[>|][-+]?$/.test(rawValue.trim())) {
      const folded = rawValue.trim().startsWith('>');
      const parts = [];
      while (i + 1 < lines.length && (/^\s+/.test(lines[i + 1]) || !lines[i + 1].trim())) {
        i += 1;
        parts.push(lines[i].replace(/^\s{1,4}/, ''));
      }
      data[key] = folded ? parts.join(' ').replace(/\s+/g, ' ').trim() : parts.join('\n').trim();
      continue;
    }

    if (rawValue.trim() === '' && i + 1 < lines.length && /^\s*-\s+/.test(lines[i + 1])) {
      const values = [];
      while (i + 1 < lines.length && /^\s*-\s+/.test(lines[i + 1])) {
        i += 1;
        values.push(parseYamlValue(lines[i].replace(/^\s*-\s+/, '')));
      }
      data[key] = values;
      continue;
    }

    data[key] = parseYamlValue(rawValue);
  }

  return { data, body };
}

function inlineMarkdown(input) {
  let value = escapeHtml(input);
  const codeSpans = [];
  value = value.replace(/`([^`]+)`/g, (_, code) => {
    const token = `@@INLINECODE${codeSpans.length}@@`;
    codeSpans.push(`<code>${code}</code>`);
    return token;
  });

  value = value.replace(/!\[([^\]]*)\]\(([^)\s]+)(?:\s+["']([^"']*)["'])?\)/g, (_, alt, src, title) => {
    const safeTitle = title ? ` title="${escapeHtml(title)}"` : '';
    return `<img src="${escapeHtml(src)}" alt="${escapeHtml(alt)}" loading="lazy" decoding="async"${safeTitle}>`;
  });
  value = value.replace(/\[([^\]]+)\]\((https?:\/\/[^)\s]+|\/[^)\s]+|#[^)\s]+)(?:\s+["']([^"']*)["'])?\)/g, (_, label, href, title) => {
    const external = /^https?:\/\//.test(href);
    const rel = external ? ' rel="noopener noreferrer" target="_blank"' : '';
    const safeTitle = title ? ` title="${escapeHtml(title)}"` : '';
    return `<a href="${escapeHtml(href)}"${rel}${safeTitle}>${label}</a>`;
  });
  value = value.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>');
  value = value.replace(/__([^_]+)__/g, '<strong>$1</strong>');
  value = value.replace(/(^|[^*])\*([^*]+)\*/g, '$1<em>$2</em>');
  value = value.replace(/(^|[^_])_([^_]+)_/g, '$1<em>$2</em>');
  codeSpans.forEach((html, index) => {
    value = value.replace(`@@INLINECODE${index}@@`, html);
  });
  return value;
}

function markdownToHtml(markdown) {
  const lines = markdown.replace(/\r\n/g, '\n').split('\n');
  const output = [];
  let paragraph = [];
  let listType = null;
  let blockquote = [];
  let inCode = false;
  let codeLanguage = '';
  let codeLines = [];

  const flushParagraph = () => {
    if (!paragraph.length) return;
    output.push(`<p>${inlineMarkdown(paragraph.join(' ').trim())}</p>`);
    paragraph = [];
  };

  const closeList = () => {
    if (!listType) return;
    output.push(`</${listType}>`);
    listType = null;
  };

  const flushQuote = () => {
    if (!blockquote.length) return;
    output.push(`<blockquote>${markdownToHtml(blockquote.join('\n'))}</blockquote>`);
    blockquote = [];
  };

  for (const line of lines) {
    const codeFence = line.match(/^```\s*([A-Za-z0-9_-]*)\s*$/);
    if (codeFence) {
      if (inCode) {
        const className = codeLanguage ? ` class="language-${escapeHtml(codeLanguage)}"` : '';
        output.push(`<pre><code${className}>${escapeHtml(codeLines.join('\n'))}</code></pre>`);
        inCode = false;
        codeLanguage = '';
        codeLines = [];
      } else {
        flushParagraph();
        closeList();
        flushQuote();
        inCode = true;
        codeLanguage = codeFence[1] || '';
      }
      continue;
    }

    if (inCode) {
      codeLines.push(line);
      continue;
    }

    if (/^>\s?/.test(line)) {
      flushParagraph();
      closeList();
      blockquote.push(line.replace(/^>\s?/, ''));
      continue;
    }
    if (blockquote.length && !/^>\s?/.test(line)) flushQuote();

    if (!line.trim()) {
      flushParagraph();
      closeList();
      flushQuote();
      continue;
    }

    const heading = line.match(/^(#{1,6})\s+(.+)$/);
    if (heading) {
      flushParagraph();
      closeList();
      const level = heading[1].length;
      const text = heading[2].replace(/\s+#+\s*$/, '');
      output.push(`<h${level} id="${slugify(text.replace(/[*_`]/g, ''))}">${inlineMarkdown(text)}</h${level}>`);
      continue;
    }

    if (/^(?:-{3,}|\*{3,}|_{3,})\s*$/.test(line)) {
      flushParagraph();
      closeList();
      output.push('<hr>');
      continue;
    }

    const unordered = line.match(/^\s*[-+*]\s+(.+)$/);
    if (unordered) {
      flushParagraph();
      if (listType && listType !== 'ul') closeList();
      if (!listType) {
        listType = 'ul';
        output.push('<ul>');
      }
      output.push(`<li>${inlineMarkdown(unordered[1])}</li>`);
      continue;
    }

    const ordered = line.match(/^\s*\d+[.)]\s+(.+)$/);
    if (ordered) {
      flushParagraph();
      if (listType && listType !== 'ol') closeList();
      if (!listType) {
        listType = 'ol';
        output.push('<ol>');
      }
      output.push(`<li>${inlineMarkdown(ordered[1])}</li>`);
      continue;
    }

    closeList();
    paragraph.push(line.trim());
  }

  if (inCode) {
    const className = codeLanguage ? ` class="language-${escapeHtml(codeLanguage)}"` : '';
    output.push(`<pre><code${className}>${escapeHtml(codeLines.join('\n'))}</code></pre>`);
  }
  flushParagraph();
  closeList();
  flushQuote();
  return output.join('\n');
}

async function ensureDir(filePath) {
  await mkdir(path.dirname(filePath), { recursive: true });
}

async function writeOutput(relativePath, contents) {
  const destination = path.join(DIST, relativePath);
  await ensureDir(destination);
  await writeFile(destination, contents, 'utf8');
}

async function copyDirectory(source, destination) {
  await mkdir(destination, { recursive: true });
  const entries = await readdir(source, { withFileTypes: true });
  for (const entry of entries) {
    const from = path.join(source, entry.name);
    const to = path.join(destination, entry.name);
    if (entry.isDirectory()) {
      await copyDirectory(from, to);
    } else {
      await ensureDir(to);
      await copyFile(from, to);
    }
  }
}

function formatDate(dateString) {
  const date = new Date(`${dateString}T12:00:00Z`);
  if (Number.isNaN(date.getTime())) return dateString;
  return new Intl.DateTimeFormat('en-GB', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
    timeZone: 'UTC'
  }).format(date);
}

function readingTime(markdown) {
  const words = markdown.replace(/[`#>*_\[\]()!-]/g, ' ').trim().split(/\s+/).filter(Boolean).length;
  return Math.max(1, Math.ceil(words / 220));
}

async function loadPosts() {
  const entries = await readdir(POSTS_DIR, { withFileTypes: true });
  const posts = [];
  for (const entry of entries) {
    if (!entry.isFile() || !entry.name.endsWith('.md')) continue;
    const raw = await readFile(path.join(POSTS_DIR, entry.name), 'utf8');
    const { data, body } = parseFrontMatter(raw);
    const filenameSlug = entry.name.replace(/\.md$/i, '');
    const slug = slugify(data.slug || filenameSlug);
    if (!data.title || !data.date) {
      console.warn(`Skipping ${entry.name}: title and date are required.`);
      continue;
    }
    posts.push({
      ...data,
      slug,
      url: `/insights/${slug}/`,
      description: data.description || body.replace(/[#*_`>\[\]()!-]/g, ' ').replace(/\s+/g, ' ').trim().slice(0, 155),
      author: data.author || 'Inovantage',
      category: data.category || 'Digital Growth',
      image: data.image || '',
      imageAlt: data.imageAlt || data.title,
      featured: Boolean(data.featured),
      body,
      html: markdownToHtml(body),
      readingMinutes: readingTime(body)
    });
  }
  return posts.sort((a, b) => new Date(b.date) - new Date(a.date));
}

function icon(name) {
  const icons = {
    automation: '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M12 3v3m0 12v3M3 12h3m12 0h3M5.64 5.64l2.12 2.12m8.48 8.48 2.12 2.12m0-12.72-2.12 2.12M7.76 16.24l-2.12 2.12"/><circle cx="12" cy="12" r="4"/></svg>',
    web: '<svg aria-hidden="true" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 6.5h.01M11 6.5h.01"/></svg>',
    social: '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8 8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/><path d="m11 9 2 6M4 19l4-4m8-7 4-3"/></svg>',
    app: '<svg aria-hidden="true" viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M10 5h4M11 18h2"/></svg>',
    arrow: '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>',
    check: '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg>',
    menu: '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg>',
    close: '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></svg>',
    facebook: '<svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
    whatsapp: '<svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.87 9.87 0 0 0 4.74 1.2h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.13-2.9-7.01A9.83 9.83 0 0 0 12.04 2Zm0 1.67c2.19 0 4.25.85 5.79 2.4a8.16 8.16 0 0 1 2.4 5.84c0 4.55-3.71 8.25-8.27 8.25a8.3 8.3 0 0 1-4.21-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.27-4.4c0-4.55 3.71-8.23 8.35-8.23Zm-4.55 4.4c-.16 0-.42.06-.64.31s-.85.83-.85 2.02.87 2.35.99 2.51c.12.16 1.7 2.7 4.17 3.68 2.06.82 2.48.66 2.93.62.45-.04 1.45-.59 1.65-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28-.24-.12-1.45-.72-1.68-.8-.22-.08-.39-.12-.55.13-.16.24-.63.8-.77.96-.14.16-.28.18-.52.06-.24-.12-1.01-.37-1.93-1.19-.71-.63-1.19-1.42-1.33-1.66-.14-.24-.02-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.55-1.34-.76-1.83-.2-.48-.4-.42-.55-.42Z"/></svg>'
  };
  return icons[name] || '';
}

function whatsappUrl(site) {
  const digits = (site.whatsapp || '').replace(/\D+/g, '');
  if (!digits) return '';
  return `https://wa.me/${digits}?text=${encodeURIComponent('Hello Inovantage, I would like to discuss a project.')}`;
}

function renderHeader(activeNav, site) {
  const links = [
    ['services', '/services/', 'Services'],
    ['work', '/work/', 'Solutions'],
    ['insights', '/insights/', 'Articles & Guides'],
    ['about', '/about/', 'About']
  ];
  const navItems = links.map(([key, href, label]) => {
    const current = activeNav === key ? ' aria-current="page" class="is-current"' : '';
    return `<li><a href="${href}"${current}>${label}</a></li>`;
  }).join('');

  return `
<header class="site-header" data-header>
  <div class="container header-inner">
    <a class="brand" href="/" aria-label="${escapeHtml(site.name)} home">
      <img src="/assets/images/inovantage-logo-blue.png" width="2048" height="646" alt="${escapeHtml(site.name)}">
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" data-menu-toggle>
      <span class="menu-open-icon">${icon('menu')}</span>
      <span class="menu-close-icon">${icon('close')}</span>
      <span class="sr-only">Toggle navigation</span>
    </button>
    <nav id="primary-navigation" class="primary-navigation" aria-label="Primary navigation" data-menu>
      <ul>${navItems}</ul>
      <a class="button button-small" href="/contact/">Start a project</a>
    </nav>
  </div>
</header>`;
}

function formatAddress(site) {
  return [site.addressStreet, site.addressLocality, site.addressRegion, site.addressPostcode]
    .filter(Boolean)
    .join(', ');
}

function renderFooter(site, year) {
  const socials = [
    ['LinkedIn', site.linkedin],
    ['Instagram', site.instagram],
    ['Facebook', site.facebook],
    ['WhatsApp', whatsappUrl(site)],
    ['X', site.x]
  ].filter(([, url]) => Boolean(url));
  const socialIcons = { Facebook: icon('facebook'), WhatsApp: icon('whatsapp') };
  const socialAriaLabels = { WhatsApp: 'Chat with Inovantage on WhatsApp' };
  const socialHtml = socials.length
    ? `<div class="footer-social">${socials.map(([label, url]) => {
        const glyph = socialIcons[label];
        const content = glyph ? `<span class="social-icon">${glyph}</span>` : label;
        const ariaLabel = socialAriaLabels[label] || label;
        return `<a href="${escapeHtml(url)}" target="_blank" rel="noopener noreferrer" aria-label="${escapeHtml(ariaLabel)}">${content}</a>`;
      }).join('')}</div>`
    : '';
  const phone = site.phone ? `<a href="tel:${escapeHtml(site.phone.replace(/\s/g, ''))}">${escapeHtml(site.phone)}</a>` : '';
  const registeredAddress = formatAddress(site);

  return `
<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <a href="/" aria-label="${escapeHtml(site.name)} home"><img src="/assets/images/inovantage-logo-blue.png" width="2048" height="646" alt="${escapeHtml(site.name)}"></a>
      <p>${escapeHtml(site.tagline)}</p>
      ${socialHtml}
    </div>
    <div>
      <h2>Services</h2>
      <ul>
        <li><a href="/services/ai-automation/">AI automation</a></li>
        <li><a href="/services/website-design/">Website design</a></li>
        <li><a href="/services/social-media-management/">Social media</a></li>
        <li><a href="/services/app-development/">App development</a></li>
      </ul>
    </div>
    <div>
      <h2>Company</h2>
      <ul>
        <li><a href="/about/">About</a></li>
        <li><a href="/work/">Work</a></li>
        <li><a href="/insights/">Insights</a></li>
        <li><a href="/contact/">Contact</a></li>
      </ul>
    </div>
    <div>
      <h2>Contact</h2>
      <address>
        <a href="mailto:${escapeHtml(site.email)}">${escapeHtml(site.email)}</a>
        ${phone}
        <span>${escapeHtml(site.location || 'United Kingdom')}</span>
        ${registeredAddress ? `<span>Registered office: ${escapeHtml(registeredAddress)}</span>` : ''}
        ${site.companyNumber ? `<span>Company number ${escapeHtml(site.companyNumber)}</span>` : ''}
      </address>
    </div>
  </div>
  <div class="container footer-bottom">
    <p>© ${year} ${escapeHtml(site.legalName || site.name)}. All rights reserved.</p>
    <div>
      <a href="/privacy/">Privacy</a>
      <a href="/cookies/">Cookies</a>
      <a href="/terms/">Terms</a>
    </div>
  </div>
</footer>`;
}

function organisationSchema(site) {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'Organization',
    name: site.name,
    legalName: site.legalName || site.name,
    url: site.url,
    logo: `${site.url}/assets/images/inovantage-logo-blue.png`,
    email: site.email,
    description: site.tagline,
    areaServed: ['GB', 'US']
  };
  if (site.phone) schema.telephone = site.phone;
  if (site.companyNumber) schema.identifier = site.companyNumber;
  const registeredAddress = formatAddress(site);
  if (registeredAddress) {
    schema.address = {
      '@type': 'PostalAddress',
      streetAddress: site.addressStreet,
      addressLocality: site.addressLocality,
      addressRegion: site.addressRegion,
      postalCode: site.addressPostcode,
      addressCountry: site.addressCountry
    };
  }
  const sameAs = [site.linkedin, site.instagram, site.facebook, site.x].filter(Boolean);
  if (sameAs.length) schema.sameAs = sameAs;
  return schema;
}

function renderLayout({ site, title, description, route, activeNav, content, image = '', type = 'website', schema = null }) {
  const fullTitle = route === '/' ? `${site.name} | ${title}` : `${title} | ${site.name}`;
  const canonical = `${site.url}${route === '/' ? '/' : route}`;
  const socialImage = image ? `${site.url}${image}` : `${site.url}/assets/images/social-card.png`;
  const year = new Date().getUTCFullYear();
  const schemaList = [organisationSchema(site)];
  if (schema) schemaList.push(schema);
  const jsonLd = JSON.stringify(schemaList.length === 1 ? schemaList[0] : schemaList).replace(/</g, '\\u003c');

  return `<!doctype html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>${escapeHtml(fullTitle)}</title>
  <meta name="description" content="${escapeHtml(description)}">
  <meta name="theme-color" content="#07121f">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <link rel="canonical" href="${escapeHtml(canonical)}">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/favicon-192.png">
  <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta property="og:type" content="${escapeHtml(type)}">
  <meta property="og:site_name" content="${escapeHtml(site.name)}">
  <meta property="og:title" content="${escapeHtml(fullTitle)}">
  <meta property="og:description" content="${escapeHtml(description)}">
  <meta property="og:url" content="${escapeHtml(canonical)}">
  <meta property="og:image" content="${escapeHtml(socialImage)}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="${escapeHtml(fullTitle)}">
  <meta name="twitter:description" content="${escapeHtml(description)}">
  <meta name="twitter:image" content="${escapeHtml(socialImage)}">
  <link rel="stylesheet" href="/assets/css/styles.css?v=${cssVersion}">
  <script type="application/ld+json">${jsonLd}</script>
  <script src="/assets/js/main.js" defer></script>
</head>
<body>
  <a class="skip-link" href="#main-content">Skip to main content</a>
  ${renderHeader(activeNav, site)}
  <main id="main-content">${content}</main>
  ${renderFooter(site, year)}
</body>
</html>`;
}

function postCard(post, compact = false) {
  const media = post.image
    ? `<img src="${escapeHtml(post.image)}" alt="${escapeHtml(post.imageAlt)}" loading="lazy" decoding="async">`
    : `<div class="insight-card-pattern"><span>${escapeHtml(post.category)}</span></div>`;
  return `<article class="insight-card${compact ? ' insight-card-compact' : ''}" data-insight-card data-category="${escapeHtml(slugify(post.category))}">
  <a class="insight-card-media" href="${post.url}" tabindex="-1" aria-hidden="true">${media}</a>
  <div class="insight-card-body">
    <div class="insight-meta"><span>${escapeHtml(post.category)}</span><span>${formatDate(post.date)}</span></div>
    <h3><a href="${post.url}">${escapeHtml(post.title)}</a></h3>
    <p>${escapeHtml(post.description)}</p>
    <div class="insight-card-footer"><span>${post.readingMinutes} min read</span><span class="text-link">Read article ${icon('arrow')}</span></div>
  </div>
</article>`;
}

function renderPost(post, site, allPosts) {
  const related = allPosts.filter((item) => item.slug !== post.slug && item.category === post.category).slice(0, 2);
  const relatedFallback = related.length ? related : allPosts.filter((item) => item.slug !== post.slug).slice(0, 2);
  const relatedHtml = relatedFallback.length
    ? `<section class="section section-soft"><div class="container"><div class="section-heading"><div><p class="eyebrow">Keep learning</p><h2>Related insights</h2></div><a class="text-link" href="/insights/">View all insights ${icon('arrow')}</a></div><div class="insights-grid">${relatedFallback.map((item) => postCard(item, true)).join('')}</div></div></section>`
    : '';
  const heroImage = post.image ? `<figure class="article-hero-image"><img src="${escapeHtml(post.image)}" alt="${escapeHtml(post.imageAlt)}"></figure>` : '';
  const content = `
<section class="article-hero">
  <div class="container container-narrow">
    <a class="back-link" href="/insights/">← Back to insights</a>
    <div class="insight-meta"><span>${escapeHtml(post.category)}</span><span>${formatDate(post.date)}</span><span>${post.readingMinutes} min read</span></div>
    <h1>${escapeHtml(post.title)}</h1>
    <p class="article-deck">${escapeHtml(post.description)}</p>
    <p class="article-author">By ${escapeHtml(post.author)}</p>
    ${heroImage}
  </div>
</section>
<section class="section section-light article-section">
  <div class="container container-article">
    <article class="prose">${post.html}</article>
    <aside class="article-cta">
      <div>
        <p class="eyebrow">Make it practical</p>
        <h2>Turn the idea into a working system.</h2>
        <p>Tell us what is taking too long, underperforming, or ready to be built.</p>
      </div>
      <a class="button" href="/contact/">Start a conversation</a>
    </aside>
  </div>
</section>
${relatedHtml}`;

  const schema = {
    '@context': 'https://schema.org',
    '@type': 'BlogPosting',
    headline: post.title,
    description: post.description,
    datePublished: post.date,
    dateModified: post.updated || post.date,
    author: { '@type': 'Organization', name: post.author },
    publisher: {
      '@type': 'Organization',
      name: site.name,
      logo: { '@type': 'ImageObject', url: `${site.url}/assets/images/inovantage-logo-blue.png` }
    },
    mainEntityOfPage: `${site.url}${post.url}`
  };
  if (post.image) schema.image = `${site.url}${post.image}`;

  return renderLayout({
    site,
    title: post.title,
    description: post.description,
    route: post.url,
    activeNav: 'insights',
    content,
    image: post.image,
    type: 'article',
    schema
  });
}

function replaceTokens(html, replacements) {
  return html.replace(/{{\s*([A-Za-z0-9_.-]+)\s*}}/g, (match, key) => {
    if (Object.hasOwn(replacements, key)) return replacements[key];
    return match;
  });
}

function renderAllPosts(posts) {
  if (!posts.length) return '<p>No insights have been published yet.</p>';
  return posts.map((post) => postCard(post)).join('');
}

function renderLatestPosts(posts) {
  return posts.slice(0, 3).map((post) => postCard(post, true)).join('');
}

function categoriesFilter(posts) {
  const categories = [...new Set(posts.map((post) => post.category))];
  if (categories.length < 2) return '';
  return `<div class="filter-bar" aria-label="Filter insights by category" data-filter-group>
    <button class="filter-button is-active" type="button" data-filter="all">All</button>
    ${categories.map((category) => `<button class="filter-button" type="button" data-filter="${slugify(category)}">${escapeHtml(category)}</button>`).join('')}
  </div>`;
}

function contactForm(site) {
  return `<form class="contact-form" name="project-enquiry" method="POST" data-netlify="true" netlify-honeypot="bot-field" action="/thank-you/">
    <input type="hidden" name="form-name" value="project-enquiry">
    <p class="honeypot"><label>Do not fill this out if you are human: <input name="bot-field"></label></p>
    <div class="form-grid">
      <div class="field"><label for="name">Name <span aria-hidden="true">*</span></label><input id="name" name="name" type="text" autocomplete="name" required></div>
      <div class="field"><label for="email">Work email <span aria-hidden="true">*</span></label><input id="email" name="email" type="email" autocomplete="email" required></div>
      <div class="field"><label for="company">Company</label><input id="company" name="company" type="text" autocomplete="organization"></div>
      <div class="field"><label for="service">What can we help with? <span aria-hidden="true">*</span></label><select id="service" name="service" required><option value="">Select a service</option><option>AI automation</option><option>Website design</option><option>Social media management</option><option>App development</option><option>Multiple services</option><option>Not sure yet</option></select></div>
      <div class="field"><label for="budget">Approximate budget</label><select id="budget" name="budget"><option value="">Prefer not to say</option><option>Under £2,500</option><option>£2,500–£5,000</option><option>£5,000–£10,000</option><option>£10,000–£25,000</option><option>£25,000+</option></select></div>
      <div class="field"><label for="timeline">Ideal start</label><select id="timeline" name="timeline"><option value="">No fixed date</option><option>As soon as possible</option><option>Within 1 month</option><option>Within 3 months</option><option>Later this year</option></select></div>
      <div class="field field-full"><label for="message">Tell us what you want to improve or build <span aria-hidden="true">*</span></label><textarea id="message" name="message" rows="7" required placeholder="What is happening now, what would better look like, and who needs to use the solution?"></textarea></div>
      <div class="field field-full checkbox-field"><input id="consent" name="consent" type="checkbox" required value="yes"><label for="consent">I agree that ${escapeHtml(site.name)} may use these details to respond to my enquiry. See the <a href="/privacy/">privacy notice</a>.</label></div>
    </div>
    <button class="button" type="submit">Send project enquiry</button>
    <p class="form-note">This form is protected by a hidden spam trap. Please do not send passwords, payment details, or other highly sensitive information.</p>
  </form>`;
}

async function generateSitemap(site, posts) {
  const staticUrls = pageDefinitions
    .filter((page) => !['/thank-you/', '/404.html'].includes(page.route))
    .map((page) => ({ loc: `${site.url}${page.route}`, date: null }));
  const postUrls = posts.map((post) => ({ loc: `${site.url}${post.url}`, date: post.updated || post.date }));
  const urls = [...staticUrls, ...postUrls];
  const xml = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${urls.map(({ loc, date }) => `  <url>\n    <loc>${escapeXml(loc)}</loc>${date ? `\n    <lastmod>${escapeXml(date)}</lastmod>` : ''}\n  </url>`).join('\n')}
</urlset>\n`;
  await writeOutput('sitemap.xml', xml);
}

async function generateRss(site, posts) {
  const items = posts.slice(0, 20).map((post) => `  <item>
    <title>${escapeXml(post.title)}</title>
    <link>${escapeXml(`${site.url}${post.url}`)}</link>
    <guid isPermaLink="true">${escapeXml(`${site.url}${post.url}`)}</guid>
    <pubDate>${new Date(`${post.date}T12:00:00Z`).toUTCString()}</pubDate>
    <description>${escapeXml(post.description)}</description>
  </item>`).join('\n');
  const xml = `<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
  <title>${escapeXml(site.name)} Insights</title>
  <link>${escapeXml(`${site.url}/insights/`)}</link>
  <description>${escapeXml('Practical guidance on AI automation, website performance, social media operations, and app development.')}</description>
  <language>en-gb</language>
${items}
</channel>
</rss>\n`;
  await writeOutput('feed.xml', xml);
}

async function build() {
  await rm(DIST, { recursive: true, force: true });
  await mkdir(DIST, { recursive: true });
  await copyDirectory(STATIC, DIST);

  const cssSource = await readFile(path.join(STATIC, 'assets', 'css', 'styles.css'));
  cssVersion = createHash('sha256').update(cssSource).digest('hex').slice(0, 10);

  const site = JSON.parse(await readFile(path.join(DATA_DIR, 'site.json'), 'utf8'));
  const posts = await loadPosts();
  const replacements = {
    siteName: escapeHtml(site.name),
    siteTagline: escapeHtml(site.tagline),
    email: escapeHtml(site.email),
    phone: escapeHtml(site.phone || ''),
    location: escapeHtml(site.location || ''),
    legalName: escapeHtml(site.legalName || site.name),
    companyNumber: escapeHtml(site.companyNumber || ''),
    registeredOffice: escapeHtml(formatAddress(site)),
    latestPosts: renderLatestPosts(posts),
    allPosts: renderAllPosts(posts),
    insightFilters: categoriesFilter(posts),
    contactForm: contactForm(site),
    currentYear: String(new Date().getUTCFullYear()),
    iconAutomation: icon('automation'),
    iconWeb: icon('web'),
    iconSocial: icon('social'),
    iconApp: icon('app'),
    iconArrow: icon('arrow'),
    iconCheck: icon('check')
  };

  for (const page of pageDefinitions) {
    const raw = await readFile(path.join(PAGES, page.source), 'utf8');
    const content = replaceTokens(raw, replacements);
    const html = renderLayout({
      site,
      title: page.title,
      description: page.description,
      route: page.route,
      activeNav: page.nav,
      content
    });
    await writeOutput(page.output, html);
  }

  for (const post of posts) {
    await writeOutput(`insights/${post.slug}/index.html`, renderPost(post, site, posts));
  }

  await generateSitemap(site, posts);
  await generateRss(site, posts);
  await writeOutput('robots.txt', `User-agent: *\nAllow: /\nDisallow: /admin/\nSitemap: ${site.url}/sitemap.xml\n`);
  await writeOutput('llms.txt', `# ${site.name}\n\n${site.tagline}\n\n## Core services\n- AI automation\n- Website design and development\n- Social media management with approval workflows\n- Web and mobile app development\n\n## Important pages\n- ${site.url}/services/\n- ${site.url}/work/\n- ${site.url}/insights/\n- ${site.url}/contact/\n`);

  console.log(`Built ${pageDefinitions.length} pages and ${posts.length} insight posts into ${path.relative(ROOT, DIST)}/`);
}

build().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
