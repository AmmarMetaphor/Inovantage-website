# Start here — Inovantage website

The site is already designed, coded, built and verified. Follow these steps in order.

## 1. Confirm two required values

1. Open `src/data/site.json` and confirm the business email, legal/trading name, location and any social profiles.
2. Open `src/static/admin/config.yml` and replace:

```yaml
repo: REPLACE_WITH_GITHUB_USERNAME/inovantage-website
```

with the real GitHub owner and repository.

The current starter email is `hello@inovantage.co.uk`. Create or change that mailbox before launch.

## 2. Test the project

Install Node.js 20 or newer, open a terminal in this folder and run:

```bash
npm run verify
npm run preview
```

Open `http://localhost:8080`. Stop the server with `Ctrl+C`.

## 3. Put the source on GitHub

Create an empty private repository named `inovantage-website`, upload this folder's contents, and keep `main` as the production branch.

## 4. Import the GitHub repository into Netlify

Use these settings:

```text
Build command: npm run build
Publish directory: dist
Node version: 20
```

The same settings are already stored in `netlify.toml`.

## 5. Connect the domain and services

In Netlify:

1. Add `inovantage.co.uk` and `www.inovantage.co.uk` under Domain management.
2. Preserve all existing MX, SPF, DKIM and DMARC records so email keeps working.
3. Enable Forms detection and add a submission email notification.
4. Configure GitHub OAuth for `/admin/` using the instructions in `README.md`.
5. Test a draft post, GitHub pull request, Netlify Deploy Preview, approval and publication.

## Read next

- `README.md` — full detailed setup and troubleshooting guide
- `CLAUDE_MASTER_PROMPT.md` — exact prompt for Claude
- `CLAUDE.md` — project rules for Claude Code
- `CONTENT_APPROVAL_SOP.md` — review-before-publication workflow
- `LAUNCH_CHECKLIST.md` — final pre-launch checks

Do not edit `dist/` manually. Edit files in `src/`, run `npm run verify`, commit to GitHub, review the Netlify Deploy Preview, then merge.
