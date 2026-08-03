# Inovantage website launch checklist

Complete every applicable item before directing public traffic to `inovantage.co.uk`.

## Business and content

- [ ] Confirm the legal/trading name in `src/data/site.json`.
- [ ] Confirm that `hello@inovantage.co.uk` exists and receives mail, or replace it.
- [ ] Add the real telephone number if one should be public.
- [ ] Add verified social profile URLs.
- [ ] Review every service description and remove anything not actually offered.
- [ ] Replace solution blueprints with genuine case studies only when client-approved evidence exists.
- [ ] Check all starter insight posts and edit or unpublish anything not approved.
- [ ] Confirm calls to action, budget ranges and expected response process.

## Legal and privacy

- [ ] Confirm the legal entity, company number and business address where required.
- [ ] Have the privacy notice reviewed against the actual tools and suppliers used.
- [ ] Define an enquiry-retention period.
- [ ] Confirm international data-transfer arrangements for service providers.
- [ ] Review the cookie notice after adding any analytics, chat, video, maps or advertising tools.
- [ ] Review website terms and governing-law wording.
- [ ] Do not treat the supplied legal drafts as legal advice.

## GitHub and code

- [ ] Replace `REPLACE_WITH_GITHUB_USERNAME/inovantage-website` in `src/static/admin/config.yml`.
- [ ] Keep the production branch named `main`, or update every reference consistently.
- [ ] Run `npm run verify` successfully.
- [ ] Confirm no passwords, API keys or OAuth secrets are committed.
- [ ] Protect `main` with pull requests where the team can support the workflow.
- [ ] Confirm Netlify has access to the correct repository.

## Netlify build and deploy

- [ ] Build command is `npm run build`.
- [ ] Publish directory is `dist`.
- [ ] Node version is 20.
- [ ] Production deploy completes without errors.
- [ ] Deploy Previews appear for pull requests.
- [ ] Security headers are present.
- [ ] The 404 page works.
- [ ] `robots.txt`, `sitemap.xml`, `feed.xml` and `llms.txt` are reachable.

## Domain and email safety

- [ ] Add both `inovantage.co.uk` and `www.inovantage.co.uk` in Netlify.
- [ ] Choose and document the primary domain.
- [ ] Before changing nameservers, copy every existing DNS record.
- [ ] Preserve MX, SPF, DKIM and DMARC records used by email.
- [ ] Follow Netlify's in-app DNS instructions for this exact domain.
- [ ] Confirm apex and `www` redirect correctly.
- [ ] Confirm HTTPS is active with no certificate warning.
- [ ] Test business email after every DNS change.

## Contact form

- [ ] Enable Netlify form detection and redeploy.
- [ ] Confirm `project-enquiry` appears under Forms.
- [ ] Add a form-submission email notification.
- [ ] Submit a real test from the production domain.
- [ ] Confirm the submission appears in Netlify and the notification arrives.
- [ ] Confirm the thank-you page loads.
- [ ] Check spam handling and delete test data when no longer needed.

## CMS and review workflow

- [ ] Create the GitHub OAuth application.
- [ ] Set its callback URL exactly as required by Netlify.
- [ ] Install the GitHub OAuth provider in the Netlify project.
- [ ] Give each editor a named GitHub account with the minimum required repository access.
- [ ] Require two-factor authentication for repository collaborators where possible.
- [ ] Sign in at `/admin/`.
- [ ] Create a test draft.
- [ ] Confirm a branch and pull request are created.
- [ ] Confirm the Deploy Preview link works.
- [ ] Review, publish and confirm the production update.
- [ ] Delete the test post if it should not remain public.

## Browser, mobile and accessibility

- [ ] Test current Chrome, Edge, Firefox and Safari where available.
- [ ] Test at approximately 360 px, 768 px and desktop widths.
- [ ] Check navigation with a keyboard only.
- [ ] Check visible focus states.
- [ ] Check page headings and landmarks.
- [ ] Check logo and image alternative text.
- [ ] Check colour contrast.
- [ ] Check form labels, required fields and error behaviour.
- [ ] Check that zooming to 200% remains usable.

## Search and sharing

- [ ] Confirm every page title and description.
- [ ] Confirm canonical URLs use `https://inovantage.co.uk`.
- [ ] Check the social sharing card.
- [ ] Submit the sitemap to the relevant search-engine webmaster tools after launch.
- [ ] Add analytics only after deciding the lawful basis and consent approach.

## Final release

- [ ] Freeze content changes during final DNS cutover.
- [ ] Take a copy of the previous site's DNS and content if one exists.
- [ ] Deploy the approved `main` branch.
- [ ] Run a production contact-form test.
- [ ] Check the main user journeys.
- [ ] Monitor deploy logs, form submissions and business email for the first 48 hours.
