# Inovantage website — instructions for Claude Code

Read this file before changing the repository.

## Purpose

This repository contains the production marketing website for **Inovantage**, a UK-focused digital services business covering:

- AI automation
- website design and development
- social media management with human approval before publication
- web and mobile app development

The public domain is `https://inovantage.co.uk`.

## Architecture

- This is a dependency-free static site generator written in Node.js.
- Source files live in `src/`.
- `build.mjs` generates the deployable site in `dist/`.
- Netlify runs `npm run build` and publishes `dist/`.
- Never edit `dist/` by hand. It is regenerated on every build.
- Insight articles are Markdown files in `src/content/posts/`.
- Decap CMS is exposed at `/admin/` and uses the direct GitHub backend.
- Netlify Forms processes the form named `project-enquiry`.

## Commands

```bash
npm run build
npm run check
npm run verify
npm run preview
```

Run `npm run verify` after every meaningful change. Do not claim success if it fails.

## Brand rules

- Brand purple: `#913290`
- Brand grey: `#7D7D7D`
- Primary logo: `src/static/assets/images/inovantage-logo.png`
- Mark: `src/static/assets/images/inovantage-mark.png`
- Keep the design clean, confident, modern, accessible and business-focused.
- Do not distort, recolour or recreate the supplied logo unless explicitly asked.
- Preserve generous spacing, clear hierarchy and responsive behaviour.

## Content rules

- Use British English.
- Be specific and practical; avoid inflated AI claims and empty buzzwords.
- Never invent clients, testimonials, certifications, awards, project results or business statistics.
- The `/work/` page intentionally presents solution blueprints rather than fake case studies.
- Keep named human approval before external publication or sensitive automated actions.
- Do not imply that AI replaces accountability.
- Do not publish a legal claim as final legal advice. Legal pages are drafts for professional review.

## Accessibility and quality

- Keep semantic headings in order.
- Every meaningful image needs useful alternative text.
- Preserve keyboard navigation, visible focus states and the skip link.
- Keep forms labelled and error-resistant.
- Test narrow mobile layouts as well as desktop.
- Avoid adding large frameworks or dependencies without a clear reason and explicit approval.
- Avoid tracking, advertising pixels, embedded feeds or third-party widgets unless explicitly requested; they may change privacy and cookie requirements.

## Security and privacy

- Never commit secrets, API keys, passwords or OAuth client secrets.
- Store future secrets in Netlify environment variables.
- Do not collect sensitive information through the public enquiry form.
- Keep security headers in `netlify.toml` unless a reviewed change requires otherwise.
- Do not weaken the review-first editorial workflow.

## CMS requirements

`src/static/admin/config.yml` contains this placeholder:

```yaml
repo: REPLACE_WITH_GITHUB_USERNAME/inovantage-website
```

The owner must replace it with the real GitHub owner/repository before using `/admin/`.

Keep:

```yaml
publish_mode: editorial_workflow
```

This ensures unpublished content is handled through branches and pull requests. All CMS editors must have GitHub push access to the repository.

## Netlify requirements

Preserve these production settings unless the owner explicitly changes the architecture:

- Build command: `npm run build`
- Publish directory: `dist`
- Node version: 20
- Contact form name: `project-enquiry`
- Thank-you URL: `/thank-you/`

## Working method

1. Inspect the relevant source files before proposing a change.
2. Explain the smallest sensible implementation plan.
3. Edit source files only.
4. Run `npm run verify`.
5. Review generated output or use the preview server when layout is affected.
6. Summarise files changed, checks run and any remaining manual steps.
7. Use a branch and pull request for production changes. Do not push directly to `main` unless the owner expressly instructs it.
