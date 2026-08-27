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
			<p class="eyebrow"><?php esc_html_e( 'B2B website design and development', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Turn your website into a stronger source of business opportunities.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'Inovantage creates fast, credible and conversion-focused websites that communicate your value clearly, strengthen buyer confidence and make the next step easy on every screen.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan Your Website', 'inovantage' ); ?></a><a class="button button-secondary" href="#included"><?php esc_html_e( 'Explore What Is Included', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Responsive', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Accessible', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'SEO-ready', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Easy to edit', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'web' ); ?></span>
		</div>
	</div>
</section>

<section class="section" id="included">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'A website built around commercial performance', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Design should support the way customers decide.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'The strongest B2B websites align positioning, buyer questions, evidence, usability and performance around one goal: helping the right prospect take the next step.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Clear positioning', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Communicate what you offer, who it helps and why the business should be trusted.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Buyer-focused structure', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Organise pages around the questions, evidence and actions prospects need during their decision.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Conversion pathways', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Guide visitors towards enquiries, consultations, demonstrations or other meaningful commercial actions.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Credibility and proof', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Use verified work, expertise, credentials and customer evidence to reduce uncertainty.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Search visibility', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Build strong technical and content foundations that help relevant buyers discover the business.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Performance and accessibility', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Deliver a fast, mobile-responsive and accessible experience across modern devices.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Every page should have a commercial purpose', 'inovantage' ); ?></p><h2><?php esc_html_e( 'A structure that supports the buying decision.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'The final architecture should reflect your offer, but each page earns its place by moving a prospect forward.', 'inovantage' ); ?></p></div>
		<div class="card-grid-3">
			<article class="info-card"><h3><?php esc_html_e( 'Home', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Establish the value proposition, priority solutions, credibility and next action.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Solutions', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Connect business challenges to clear services and outcomes.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Case Studies', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Show verified problems, solutions and outcomes that strengthen buyer confidence.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'About', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Explain the expertise, perspective and operating principles behind the company.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Articles & Guides', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Answer buyer questions, demonstrate expertise and support search visibility.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Contact', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Capture the information required to begin a relevant business conversation.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Built for long-term growth', 'inovantage' ); ?></p><h2><?php esc_html_e( 'A website should evolve with the business.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Your website is built with a maintainable content structure, controlled publishing workflow and clear ownership of approved assets and content. New insights, services and evidence can be added without rebuilding the entire digital presence.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Portable code', 'inovantage' ); ?></h3><p><?php esc_html_e( 'The source sits in your repository and can be deployed to standard static hosting.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Visible history', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Changes are recorded so you can see what was altered and restore earlier versions.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Preview before launch', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Review a private deploy preview before important website changes go live.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Controlled publishing', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Editors can move articles from draft to review and publish only when approved.', 'inovantage' ); ?></p></article>
		</div>
		<p class="section-footnote"><?php esc_html_e( 'The result is not only a better launch. It is a platform that can continue supporting marketing, sales and business development.', 'inovantage' ); ?></p>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Website project basics.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Can you use our existing logo and brand?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. We can work with an established design system or build a practical web style around the assets you already have. High-quality source files and any brand rules are helpful.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Who writes the website content?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'We can structure and draft content based on interviews and source material, collaborate with your writer, or work from copy you provide. Content responsibilities are agreed at the start so the project keeps moving.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Can our team update the site?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. The included content manager allows authorised users to update business details and publish insight articles without touching code. Larger layout changes can be made through the code repository.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Will the website work on mobile?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. Layouts and interactions are designed and tested across common screen sizes, with touch targets, navigation and form controls adapted for smaller devices.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Is your current website helping buyers choose your business?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Tell us where it is underperforming, what your customers need to understand and which actions matter commercially.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan Your Website', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
