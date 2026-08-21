<?php
/**
 * Template Name: Service — Website design
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="hero service-detail-hero">
	<div class="container hero-grid">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'Website design and development', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'A website that explains your value and makes action easy.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'We combine strategy, content structure, visual design, accessible development and practical publishing tools into one coherent website project.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan your website', 'inovantage' ); ?></a><a class="button button-secondary" href="#included"><?php esc_html_e( 'See what is included', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Responsive', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Accessible', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'SEO-ready', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Easy to edit', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'web' ); ?></span>
		</div>
	</div>
</section>

<section class="section" id="included">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'A complete website foundation', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Design is more than how the homepage looks.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'The strongest websites align business goals, customer questions, content, usability, performance and ongoing ownership.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Discovery and positioning', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Clarify the audience, offer, proof, priorities, competitors and actions the site should support.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Information architecture', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Organise pages and navigation around what visitors need to understand and do.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content direction', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Shape headings, page messages, calls to action and evidence so the site communicates clearly.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Responsive visual design', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Apply the Inovantage brand or your established identity consistently across desktop, tablet and mobile.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Accessible development', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Use semantic HTML, keyboard-friendly interactions, readable contrast and sensible alternative text.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'SEO and performance basics', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Set page titles, descriptions, structured data, sitemap, image optimisation and fast-loading layouts.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content management', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Give authorised editors a clear interface to draft, review and publish insights without editing code.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Typical pages', 'inovantage' ); ?></p><h2><?php esc_html_e( 'A flexible structure for a service-led business.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'The final architecture should reflect your offer, but this is a strong starting point.', 'inovantage' ); ?></p></div>
		<div class="card-grid-3">
			<article class="info-card"><h3><?php esc_html_e( 'Home', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A clear promise, priority services, differentiators, process, insights and a focused next step.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Services', 'inovantage' ); ?></h3><p><?php esc_html_e( 'One overview plus dedicated pages for each important offer and its relevant questions.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Work', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Verified case studies, solution examples or project stories that show how you approach problems.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'About', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Your perspective, operating principles, team, credentials and the reason clients should trust you.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Insights', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Useful articles that demonstrate expertise and answer questions before a sales conversation.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Contact', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A concise form that captures enough context to prepare a relevant response.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Built for ownership', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Your website should not become a locked box.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'The included project uses straightforward files, version history and a Git-based content workflow.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Portable code', 'inovantage' ); ?></h3><p><?php esc_html_e( 'The source sits in your repository and can be deployed to standard static hosting.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Visible history', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Changes are recorded so you can see what was altered and restore earlier versions.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Preview before launch', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Review a private deploy preview before merging important website changes.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Controlled publishing', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Editors can move articles from draft to review and publish only when approved.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Website project basics.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Can you use our existing logo and brand?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. We can work with an established design system or build a practical web style around the assets you already have. High-quality source files and any brand rules are helpful.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Who writes the website content?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'We can structure and draft content based on interviews and source material, collaborate with your writer, or work from copy you provide. Content responsibilities should be agreed at the start.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Can our team update the site?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. The included content manager allows authorised users to update business details and create insight posts. Larger layout changes can be made through the code repository.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Will the website work on mobile?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. Layouts and interactions are designed and tested across common screen sizes, with touch targets, navigation and form controls adapted for smaller devices.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Ready for a website that is easier to understand and easier to manage?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Share your current site, priorities and launch target.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a website project', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
