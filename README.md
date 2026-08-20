# Inovantage website

A complete, responsive marketing website for **Inovantage** with four service areas:

- AI automation
- website design and development
- social media management
- web and mobile app development

It includes a review-first publishing workflow for insight posts, a Netlify-powered enquiry form, the supplied Inovantage logo, SEO essentials, legal-page drafts, starter articles, and detailed deployment instructions.

Production domain: `https://inovantage.co.uk`

> Important: the legal pages are practical starter drafts, not legal advice. Review them against the real business entity, providers, data practices and jurisdiction before launch.

---

## 1. How the setup works

The recommended workflow is:

```text
Claude or Claude Code
        ↓ edits source files
GitHub repository
        ↓ push / pull request
Netlify build
        ↓ npm run build
Deploy Preview for review
        ↓ approved merge to main
Production website
```

For content posts:

```text
Decap CMS at /admin/
        ↓ save draft
GitHub branch + pull request
        ↓
Netlify Deploy Preview
        ↓ human review
Approved merge
        ↓
Production publication
```

### What each platform does

**Claude** helps inspect, write and change the code. Claude is not the permanent host.

**GitHub** is the source of truth and keeps every code/content version.

**Netlify** runs the build, creates preview deployments, serves the production site, processes the enquiry form and connects the custom domain.

**Decap CMS** gives authorised editors a browser-based interface at `/admin/` for creating and reviewing insight posts.

The project uses Decap's direct **GitHub backend**, not Netlify Git Gateway. Git Gateway is deprecated for new configurations, while the direct GitHub backend remains supported. Each CMS editor therefore needs a GitHub account with push access to this repository.

---

## 2. What is included

### Public pages

- `/` — home
- `/services/` — services overview
- `/services/ai-automation/`
- `/services/website-design/`
- `/services/social-media-management/`
- `/services/app-development/`
- `/work/` — transparent solution blueprints rather than invented case studies
- `/insights/` — articles and category filtering
- `/about/`
- `/contact/`
- `/privacy/`
- `/cookies/`
- `/terms/`
- custom 404 and thank-you pages

### Publishing and operational features

- Decap CMS at `/admin/`
- editorial workflow: Draft → In review → Ready → Published
- GitHub pull requests for unpublished articles
- Netlify Deploy Previews
- Netlify Forms contact form with honeypot
- Markdown insight posts
- RSS feed
- XML sitemap
- `robots.txt`
- `llms.txt`
- canonical URLs and social-sharing metadata
- Organization and BlogPosting structured data
- responsive navigation and accessible interaction
- security and cache headers in `netlify.toml`

### Starter content

Four starter articles are in `src/content/posts/`:

1. Seven business processes worth automating first
2. The website brief checklist that prevents expensive rework
3. A simple social media approval workflow for busy teams
4. How to choose the right MVP for a business app

Review, edit or remove them before launch.

---

## 3. Project structure

```text
inovantage-website/
├── CLAUDE.md                     # Instructions automatically useful to Claude Code
├── CLAUDE_MASTER_PROMPT.md       # Prompt to paste into Claude
├── CONTENT_APPROVAL_SOP.md       # Review-before-publication procedure
├── LAUNCH_CHECKLIST.md           # Final launch checks
├── README.md
├── build.mjs                     # Static site generator
├── check.mjs                     # Broken-link and output checks
├── preview.mjs                   # Local preview server
├── netlify.toml                  # Netlify build, redirect and header settings
├── package.json
├── src/
│   ├── content/posts/            # Markdown insight articles
│   ├── data/site.json            # Business name, email, phone, social URLs
│   ├── pages/                    # Source page sections
│   └── static/
│       ├── admin/                # Decap CMS
│       └── assets/               # CSS, JS, logo and uploaded images
└── dist/                         # Generated deploy output; never edit manually
```

---

## 4. Before deployment: confirm the business details

Open `src/data/site.json` and replace every unconfirmed value.

Current starter values:

```json
{
  "name": "Inovantage",
  "legalName": "Inovantage",
  "url": "https://inovantage.co.uk",
  "domain": "inovantage.co.uk",
  "tagline": "Digital systems that move your business forward.",
  "email": "hello@inovantage.co.uk",
  "phone": "",
  "location": "Serving businesses across the United Kingdom",
  "linkedin": "",
  "instagram": "",
  "facebook": "",
  "x": ""
}
```

Confirm these points before launch:

1. Does `hello@inovantage.co.uk` exist and receive messages?
2. What legal or trading name should appear in the footer and legal pages?
3. Is there a company number or registered address that must be shown?
4. Should a telephone number be public?
5. Which social profiles are genuine and active?
6. Is the business established in England and Wales, Scotland, Northern Ireland or elsewhere?
7. How long should unconverted enquiries be retained?
8. Which real software providers will receive form, email, analytics or customer data?

Search the legal source pages for phrases such as **review before launch**, **confirm**, and **replace**. Do not publish unresolved legal placeholders as final terms.

---

## 5. Configure the GitHub repository name in the CMS

Open:

```text
src/static/admin/config.yml
```

Find:

```yaml
repo: REPLACE_WITH_GITHUB_USERNAME/inovantage-website
```

Replace it with the exact GitHub owner and repository, for example:

```yaml
repo: ammar-example/inovantage-website
```

Keep:

```yaml
backend:
  name: github
  branch: main

publish_mode: editorial_workflow
```

Do not place a GitHub token, OAuth client secret or password in this file.

---

## 6. Preview and verify locally

The project has no third-party build dependencies. You only need Node.js 20 or newer.

### Windows

1. Install Node.js 20 or newer.
2. Extract the project ZIP.
3. Open the extracted folder in File Explorer.
4. Right-click inside the folder and choose **Open in Terminal**, or open PowerShell and change to the folder.
5. Run:

```powershell
npm run verify
npm run preview
```

6. Open this address in a browser:

```text
http://localhost:8080
```

7. Stop the preview with `Ctrl+C`.

### macOS or Linux

```bash
cd /path/to/inovantage-website
npm run verify
npm run preview
```

Then open:

```text
http://localhost:8080
```

### Available commands

```bash
npm run build    # generate dist/
npm run check    # inspect generated pages and internal links
npm run verify   # build, then check
npm run preview  # serve dist/ locally on port 8080
```

A successful verification ends with a message similar to:

```text
Verification passed.
```

Do not deploy a change that fails `npm run verify`.

---

## 7. Create the GitHub repository

You can upload through the GitHub website or use Git commands.

### Method A — GitHub website

1. Sign in to GitHub.
2. Select **New repository**.
3. Repository name: `inovantage-website`.
4. Choose **Private** unless there is a reason to make the source public.
5. Do not initialise it with a README, licence or another `.gitignore`; those files are already present.
6. Create the repository.
7. In the empty repository, select **uploading an existing file** or **Add file → Upload files**.
8. Upload the **contents** of the extracted `inovantage-website` folder, not an extra outer folder.
9. Commit the files to `main`.
10. Confirm the repository contains `package.json`, `netlify.toml`, `build.mjs` and `src/` at its top level.

For a large number of files, the command-line method is usually more reliable.

### Method B — Git command line

Create an empty GitHub repository first. Then run these commands inside the project folder:

```bash
git init
git add .
git commit -m "Initial Inovantage website"
git branch -M main
git remote add origin https://github.com/YOUR_GITHUB_USERNAME/inovantage-website.git
git push -u origin main
```

Replace `YOUR_GITHUB_USERNAME` with the actual GitHub owner.

### Recommended repository protection

For normal design and code changes, require pull requests before changes reach `main`.

For strict two-person content approval, add at least two trusted collaborators and configure the `main` branch to require one approving review before merge. Test this carefully with Decap CMS: the CMS may be unable to complete its final publish action until the GitHub approval exists, so your team may complete the final merge in GitHub.

A one-person business can still use the Draft/In review/Ready stages and Deploy Preview as a deliberate self-review, but that is not independent approval.

---

## 8. Import the repository into Netlify

1. Sign in to Netlify.
2. Choose **Add new project** or **Import an existing project**.
3. Select GitHub as the Git provider.
4. Authorise the Netlify GitHub App for the `inovantage-website` repository.
5. Select the repository.
6. Production branch: `main`.
7. Netlify should read `netlify.toml` automatically.
8. Confirm these settings:

```text
Build command:     npm run build
Publish directory: dist
Node version:      20
```

9. Leave the base directory empty.
10. Start the deployment.
11. Open the deploy log and confirm the build finishes successfully.
12. Open the temporary `netlify.app` address and check the home, services, insights and contact pages.

Every push to `main` should now trigger a production build. Pull requests should create a separate Deploy Preview.

### When a build fails

Read the first real error in the deploy log rather than only the final failure line. Common checks:

```text
Is package.json at the repository root?
Is the branch named main?
Is the build command npm run build?
Is the publish directory dist?
Does npm run verify pass locally or in Claude Code?
```

Paste the complete relevant deploy-log section into Claude with the **Fix a Netlify build** prompt in `CLAUDE_MASTER_PROMPT.md`.

---

## 9. Connect `inovantage.co.uk`

Netlify can use either its own DNS service or your current DNS provider.

### First: protect business email

Before changing nameservers or DNS records, export or copy every existing record. Pay special attention to:

- MX records
- SPF TXT record
- DKIM records
- DMARC record
- email-verification records
- any subdomains used by other services

Changing nameservers without copying these records can stop email delivery.

### Add the domain in Netlify

1. Open the Netlify project.
2. Select **Domain management**.
3. Select **Add a domain → Add a domain you already own**.
4. Enter `inovantage.co.uk`.
5. Verify and add it.
6. Add or confirm `www.inovantage.co.uk` as an alias.
7. Choose the primary domain. A common setup is:

```text
Primary: https://inovantage.co.uk
Alias:   https://www.inovantage.co.uk → redirects to primary
```

### Option A — keep the current DNS provider

This is often the lowest-risk choice when business email is already working.

1. In Netlify, open the domain's **Pending DNS verification** instructions.
2. Netlify will show the exact records required for this domain.
3. Add only those web records at the current registrar/DNS provider.
4. Do not delete email-related records.
5. Wait for verification and certificate provisioning.

Use Netlify's current in-app values rather than copying old IP addresses from a blog post or video.

### Option B — move DNS management to Netlify

1. In Domain management, choose **Set up Netlify DNS**.
2. Copy every existing DNS record into the Netlify DNS zone first.
3. Netlify will provide a domain-specific set of nameservers.
4. At the registrar, replace the current nameservers with exactly those values.
5. Wait for DNS propagation.
6. Test both the website and business email.

Nameserver values vary by domain, so never use somebody else's values.

### Confirm HTTPS

After DNS verifies, confirm:

- `https://inovantage.co.uk` loads without a certificate warning;
- `https://www.inovantage.co.uk` redirects correctly;
- HTTP redirects to HTTPS;
- no page loads insecure assets; and
- the final production URL in Netlify matches `src/data/site.json`.

Netlify normally provisions and renews the certificate automatically after the domain is correctly configured.

---

## 10. Enable the contact form

The HTML is already configured with:

```html
<form
  name="project-enquiry"
  method="POST"
  data-netlify="true"
  netlify-honeypot="bot-field"
  action="/thank-you/"
>
```

### Netlify setup

1. In the Netlify project, open **Forms**.
2. Select **Enable form detection**.
3. Trigger a new deployment. You can choose **Deploys → Trigger deploy**, or push a small reviewed commit.
4. Return to **Forms**.
5. Confirm an active form named `project-enquiry` appears.
6. Open **Project configuration → Notifications → Form submission notifications**.
7. Add an email notification to a monitored business inbox.
8. Submit a test enquiry from the live production domain.
9. Confirm:
   - the browser reaches `/thank-you/`;
   - the submission appears in Netlify Forms; and
   - the email notification arrives.

Do not send passwords, payment card data, health information or other highly sensitive data through the form.

### Form changes

When changing a field name, label or form name:

1. edit the source generator in `build.mjs`;
2. run `npm run verify`;
3. deploy;
4. confirm Netlify detects the new form definition; and
5. test the complete submission again.

---

## 11. Set up `/admin/` with GitHub authentication

The site uses Decap CMS's direct GitHub backend. This requires a GitHub OAuth application and a Netlify OAuth provider configuration.

### Prerequisites

- The website is deployed from GitHub to Netlify.
- `src/static/admin/config.yml` contains the real `owner/repository` value.
- Each editor has a named GitHub account.
- Each editor has push access to the repository.
- The production domain or Netlify preview URL works over HTTPS.

### A. Create a GitHub OAuth application

1. Sign in to the GitHub account or organisation that will own the OAuth application.
2. Open **Settings → Developer settings → OAuth Apps**.
3. Select **New OAuth App**.
4. Application name: `Inovantage Content Manager`.
5. Homepage URL:

```text
https://inovantage.co.uk
```

You may temporarily use the production `netlify.app` address before the custom domain is live, then update the app later.

6. Authorization callback URL — enter this exactly:

```text
https://api.netlify.com/auth/done
```

7. Register the application.
8. Copy the **Client ID**.
9. Generate a new **Client Secret** and copy it immediately.
10. Treat the Client Secret like a password. Never commit it to GitHub, paste it into `config.yml`, or send it in an ordinary chat.

### B. Install the OAuth provider in Netlify

1. Open the Inovantage project in Netlify.
2. Go to **Project configuration → Access & security → OAuth**.
3. Under **Authentication providers**, select **Install provider**.
4. Choose **GitHub**.
5. Paste the Client ID and Client Secret.
6. Save or install the provider.

### C. Add editors in GitHub

1. Open the GitHub repository.
2. Go to repository settings and collaborator/access management.
3. Invite each editor's named GitHub account.
4. Give only the level of access required for content commits.
5. Ask users to enable two-factor authentication.
6. Remove access promptly when somebody no longer needs it.

### D. Test the CMS

1. Visit:

```text
https://inovantage.co.uk/admin/
```

2. Select **Login with GitHub**.
3. Authorise the application.
4. Open **Insights**.
5. Create a disposable test post.
6. Save it as a draft.
7. Confirm GitHub receives a new content branch and pull request.
8. Confirm Netlify creates a Deploy Preview for that pull request.
9. Review the preview.
10. Publish or merge according to the team's approval rule.
11. Confirm the production site rebuilds.
12. Remove the disposable post if it should not stay public.

### Why Identity and Git Gateway are not required

Older Decap CMS tutorials often use Netlify Identity plus Git Gateway. Git Gateway is now deprecated for new configurations. This project instead uses direct GitHub OAuth. It requires editors to have GitHub access, but removes the deprecated gateway from the publishing path.

---

## 12. Review posts before publication

The CMS contains:

```yaml
publish_mode: editorial_workflow
```

This means an unpublished entry is stored on a branch and represented by a pull request instead of being written directly to the production branch.

### Editorial procedure

1. Visit `/admin/`.
2. Open **Insights → New Insight post**.
3. Complete title, slug, date, description, category, author, optional image and article body.
4. Save the entry as **Draft**.
5. Check the article inside the CMS preview.
6. Move it to **In review**.
7. Wait for the Netlify Deploy Preview.
8. Open the actual preview page and check:
   - facts and sources;
   - names, dates, prices and links;
   - spelling and brand tone;
   - mobile and desktop layout;
   - image rights and alternative text;
   - confidentiality and personal data;
   - unsupported AI claims;
   - legal or regulated statements; and
   - the call to action.
9. Correct the same draft; avoid separate uncontrolled versions.
10. Record approval and move it to **Ready**.
11. Publish or merge the approved pull request.
12. Confirm the production page after Netlify completes the `main` deployment.

Use `CONTENT_APPROVAL_SOP.md` as the internal procedure.

### Stronger two-person control

When at least two people are available:

1. protect `main` in GitHub;
2. require one pull-request approval;
3. prevent authors from approving their own work where practical;
4. review the Netlify Deploy Preview; and
5. merge only after the approval appears in GitHub.

Test the end-to-end process before relying on it for a deadline. Branch protection can intentionally stop the CMS from merging until the GitHub rule is satisfied.

---

## 13. Use Claude to edit the website

There are two good approaches.

### Method A — Claude Code with the GitHub repository

This is the preferred method for ongoing work.

1. Push the project to GitHub.
2. Connect the repository to Claude Code on the web or open it in Claude Code locally.
3. Claude should automatically benefit from `CLAUDE.md` at the repository root.
4. Start with a small, specific task.
5. Require Claude to run:

```bash
npm run verify
```

6. Ask Claude to create a branch and pull request rather than editing `main` directly.
7. Wait for Netlify's Deploy Preview.
8. Review the preview before merging.

A good task prompt is:

```text
Read CLAUDE.md first. Improve the AI automation service page for UK small-business decision-makers. Do not invent proof, clients or statistics. Preserve the brand and human-approval safeguards. Run npm run verify, put the changes on a new branch, and create a pull request. Do not merge it.
```

### Method B — Claude chat with the ZIP

1. In Claude settings, enable **Code execution and file creation**.
2. Upload the project ZIP and the logo if Claude does not already have the files.
3. Upload or paste `CLAUDE_MASTER_PROMPT.md`.
4. Replace its **Initial task** line with the requested change.
5. Ask Claude to return the complete changed project or a ZIP containing the changed files.
6. Run `npm run verify` on the result.
7. Commit the reviewed files to a GitHub branch.
8. Review the Netlify Deploy Preview.
9. Merge only when approved.

### Optional — Netlify Agent Runners

Netlify also supports agent runs that can make repository changes and create a Deploy Preview. When using this route:

1. connect the GitHub repository first;
2. choose Claude Code as the agent where available;
3. give a narrow task and require `npm run verify`;
4. inspect the generated branch/diff;
5. review the automatic Deploy Preview; and
6. merge only after human approval.

Regardless of interface, GitHub remains the source of truth. Avoid maintaining one version in Claude, another on a computer and a third in Netlify.

---

## 14. Common Claude tasks

### Change contact details

Edit only `src/data/site.json` where possible, then rebuild. The generator injects those values into the footer, contact area and legal pages.

### Change page copy

Edit the corresponding file in `src/pages/`, then run `npm run verify`.

### Add an insight manually

Create a Markdown file in `src/content/posts/`:

```markdown
---
title: "Clear article title"
slug: "clear-article-title"
date: "2026-08-03"
description: "A useful 120–160 character description for search and sharing."
category: "AI Automation"
author: "Inovantage"
featured: false
---

Opening paragraph.

## First section

Article content.
```

Supported categories are:

```text
AI Automation
Website Design
Social Media
App Development
Digital Growth
```

### Add an uploaded article image

Save the compressed image in:

```text
src/static/assets/images/uploads/
```

Then use its public path in front matter:

```yaml
image: "/assets/images/uploads/example.webp"
imageAlt: "Describe the useful visual content"
```

Recommended article image shape: approximately 16:9, such as 1600 × 900 pixels. Compress it before committing.

### Change styling

Edit:

```text
src/static/assets/css/styles.css
```

All colours are defined once, as design tokens, at the top of that file. Use
the semantic tokens rather than adding new hex values:

```css
/* palette */
--color-void-navy: #07121f;    /* primary dark surface   */
--color-deep-ocean: #0b1a2b;   /* secondary dark surface */
--color-steel-blue: #1c2f4a;   /* elevated cards         */
--color-cobalt-core: #0b3d9c;  /* deep accent, links on light */
--color-electric-blue: #126bff;/* secondary — depth      */
--color-luminous-cyan: #00e5ff;/* PRIMARY brand accent   */
--color-glacier-ice: #e6f2ff;  /* light sections         */
--color-silver-mist: #c9d6e6;  /* body text on dark      */

/* brand roles */
--brand-primary   /* cyan   — the identity colour */
--brand-secondary /* blue   — depth behind it     */
--accent          /* -> --brand-primary           */
--accent-secondary/* -> --brand-secondary         */
--on-accent       /* navy label for solid cyan    */

/* semantic — reference these from components */
--background-primary, --background-secondary, --surface-elevated,
--background-light, --text-primary, --text-secondary, --text-muted,
--accent-wash, --secondary-wash, --link, --link-on-light, --border, --focus
```

Cyan is the first thing the eye should find on a dark surface: primary buttons,
active navigation, eyebrows, icons, bullets, arrows and focus rings. Electric
Blue sits behind it as depth — gradients, glows, orbital illumination and quiet
card tints. Never put white text on solid cyan; use `--on-accent`. On light
surfaces cyan is decorative only: text and links there use `--link-on-light`.

Sections alternate between `--background-primary`, `.section-soft` and
`.section-light` so boundaries stay visible. Run a visual check at mobile and
desktop widths after every layout change.

### Change the logo

Two official assets are in use. Replace them only with approved Inovantage
artwork, keeping the same filenames:

```text
src/static/assets/images/inovantage-logo-full.webp   /* long horizontal wordmark */
src/static/assets/images/inovantage-logo-mark.png    /* compact V mark           */
```

The wordmark is used in the site header and the footer brand block. It sits on a
2000x686 canvas whose artwork occupies the middle band, so it is sized by height
(`.brand img`, `.footer-brand img`) and left to derive its own width — never set
both dimensions. The compact mark is the source for `favicon-32.png`,
`favicon-192.png` and `apple-touch-icon.png`; regenerate those from it if the
mark changes. Both files carry their own transparency; do not recolour them, add
CSS filters, or place the wordmark on a light surface, where its silver letters
fall below 1.1:1. `social-card.png` is still the previous identity's artwork and
needs regenerating separately.

---

## 15. Security and privacy rules

1. Never commit OAuth client secrets, API keys or passwords.
2. Put future server-side secrets in Netlify environment variables.
3. Do not expose secret values in browser JavaScript.
4. Review every new third-party script before adding it.
5. Do not collect unnecessary sensitive information.
6. Keep public form data out of source control.
7. Limit GitHub and Netlify access to named people who need it.
8. Enable two-factor authentication.
9. Remove former collaborators promptly.
10. Keep dependencies minimal and reviewed.
11. Preserve `netlify.toml` security headers unless there is a documented reason to change them.
12. Treat AI-generated code and copy as a draft requiring verification.

### Analytics and cookies

No visitor analytics or advertising scripts are included by default. Before adding analytics, chat, embedded video, social feeds, maps or pixels:

1. identify what data the service collects;
2. decide the lawful basis;
3. determine whether consent is required;
4. update the privacy and cookie notices;
5. implement a consent mechanism where needed; and
6. test that non-essential technology does not run before consent when consent is required.

---

## 16. Backups, rollback and maintenance

GitHub is the primary version history. Netlify also retains deploys that can be inspected or rolled back according to the plan and retention settings.

Recommended operating rhythm:

- review form submissions and spam regularly;
- test the contact form monthly;
- review repository and Netlify access quarterly;
- run `npm run verify` before every merge;
- review legal and privacy content whenever tools change;
- update service pages when the real offer changes;
- review old articles for accuracy;
- check broken links and performance after major updates; and
- export important leads to the approved business system rather than treating the form dashboard as a permanent CRM.

### Emergency rollback

When a production change is faulty:

1. stop merging new changes;
2. identify the last known-good Git commit or Netlify deploy;
3. use Netlify's rollback/publish controls for immediate recovery where appropriate;
4. create a corrective Git commit so the repository matches production again;
5. run `npm run verify`;
6. review the Deploy Preview; and
7. document the cause and prevention step.

Do not leave production permanently on a rollback that is not represented in `main`.

---

## 17. Troubleshooting

### `/admin/` shows a repository error

Check:

- `repo:` in `src/static/admin/config.yml` exactly matches `owner/repository`;
- the repository exists and the branch is `main`;
- the signed-in GitHub user has push access;
- the GitHub OAuth provider is installed in this Netlify project; and
- the OAuth app callback URL is exactly `https://api.netlify.com/auth/done`.

After changing `config.yml`, commit, push and wait for the new Netlify deploy.

### `/admin/` login loops or fails

Check:

- the site is loaded over HTTPS;
- the OAuth app Homepage URL is current;
- the Client ID and Client Secret were entered in Netlify correctly;
- the OAuth application has not been deleted or had its secret revoked;
- browser privacy extensions are not blocking the authentication popup; and
- the GitHub account is authorised for the organisation/repository.

Never solve this by putting the Client Secret in site code.

### No Deploy Preview appears

Check:

- the Netlify site is linked to the GitHub repository;
- the change is on a pull request rather than only a local branch;
- Deploy Previews are enabled under continuous-deployment branch settings;
- the pull request targets `main`; and
- Netlify has permission to read the repository.

### Netlify does not detect the form

Check:

- form detection is enabled;
- a new deployment occurred after it was enabled;
- generated `dist/contact/index.html` contains `data-netlify="true"`;
- the form has `name="project-enquiry"`;
- the hidden `form-name` value matches; and
- the build is publishing `dist`, not `src`.

Run:

```bash
npm run verify
```

### The custom domain works but email stops

Restore the correct MX and email-related TXT/CNAME records immediately. Compare the active DNS zone with the copy taken before the change. Website DNS and email DNS are separate requirements even though they share the same domain.

### A page is missing after a source edit

Check whether the source page is listed in `pageDefinitions` inside `build.mjs`. New pages need:

1. a source file in `src/pages/`;
2. a page definition with output path, route, title and description;
3. any navigation link; and
4. a successful `npm run verify`.

---

## 18. Final launch sequence

Use this order to minimise risk:

1. Confirm business details and legal-page placeholders.
2. Replace the CMS repository placeholder.
3. Run `npm run verify`.
4. Push the project to a private GitHub repository.
5. Import the repository into Netlify.
6. Review the temporary Netlify deployment.
7. Add `inovantage.co.uk` and `www.inovantage.co.uk`.
8. Protect existing email DNS records.
9. Complete domain verification and HTTPS.
10. Enable Netlify form detection and configure notifications.
11. Create the GitHub OAuth app.
12. Install the OAuth provider in Netlify.
13. Test `/admin/`, a draft, a pull request and a Deploy Preview.
14. Review or remove starter articles.
15. Complete every applicable item in `LAUNCH_CHECKLIST.md`.
16. Submit a production contact-form test.
17. Announce the site only after the main customer journeys and email are verified.

---

## 19. Files to read next

- `CLAUDE.md` — rules Claude Code should follow
- `CLAUDE_MASTER_PROMPT.md` — ready-to-paste prompt
- `CONTENT_APPROVAL_SOP.md` — publication review process
- `LAUNCH_CHECKLIST.md` — full pre-launch checklist

