<?php
/**
 * Template Name: Service — App development
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="hero service-detail-hero">
	<div class="container hero-grid">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'Business app development', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Build digital products that improve delivery and unlock growth.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'Inovantage designs focused customer portals, dashboards, internal tools and business applications around the tasks that matter most to your customers and team.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Your App Idea', 'inovantage' ); ?></a><a class="button button-secondary" href="#products"><?php esc_html_e( 'Explore Application Types', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Portal', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Dashboard', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'MVP', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Internal tool', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'app' ); ?></span>
		</div>
	</div>
</section>

<section class="section" id="products">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Applications built around business value', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Focused software with a defined commercial job.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'A useful application does not need dozens of features. It needs the right workflow, clear permissions and a reliable path through the task that creates value.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Customer portals', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Give customers a convenient place to submit information, access documents, track requests and manage their relationship with your business.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Internal tools', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Replace spreadsheet-heavy processes and disconnected administration with a structured operational interface.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Dashboards', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Bring important performance information, alerts and actions together for faster decision-making.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Workflow applications', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Guide enquiries, cases, projects or approvals through clear stages and accountable ownership.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Minimum viable products', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Test a new digital proposition with the essential functionality required to gather genuine market evidence.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Connected applications', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Integrate customer experiences with CRM, payments, email, storage and other relevant business systems.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Create a platform for scalable delivery', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Build greater capacity into the way your business operates.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'The right application changes what the business can handle, not just how it looks.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid outcome-grid-6">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Serve more customers consistently', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Standardised journeys keep quality steady as volume grows.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Reduce repeated administration', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Structured data entry and automation replace copying between tools.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Improve customer visibility and convenience', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Customers can act, track and self-serve without waiting on email.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Standardise important workflows', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Clear stages and ownership make delivery dependable across the team.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>05</span><h3><?php esc_html_e( 'Generate new digital service opportunities', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A working product can become a new way to package and deliver value.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>06</span><h3><?php esc_html_e( 'Give teams useful operational information', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Decisions improve when activity and performance are visible in one place.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'From opportunity to working product', 'inovantage' ); ?></p><h2><?php esc_html_e( 'A staged development process that reduces risk.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Each stage reduces uncertainty before more time and budget are committed.', 'inovantage' ); ?></p></div>
		<div class="process-grid process-grid-5">
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Define', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Identify the user, commercial opportunity, essential task and measure of success.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Prototype', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Validate the journey and interface before committing to full development.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Develop', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Build the approved functionality in secure, testable stages.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Launch', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Introduce the product to an appropriate user group with clear support and ownership.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Improve', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Use real behaviour and business evidence to prioritise what should be developed next.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Speed to value', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Reach a working release sooner by building the essential first.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( "A clear release boundary protects the launch date, the budget and the product's core purpose.", 'inovantage' ); ?></p></div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Must work', 'inovantage' ); ?></h3><p><?php esc_html_e( "The complete journey a user needs to achieve the product's main purpose.", 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Should help', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Important supporting features considered once the core journey is stable.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Could improve', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Enhancements that add value without blocking the first meaningful release.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Not yet', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Ideas deliberately scheduled for later, once user behaviour or business evidence supports them.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Before building an app.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Do we need a mobile app from the start?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Not always. A responsive web app can often validate the need faster and work across devices without separate app-store releases. Native mobile features may justify a dedicated app later, once real usage supports the investment.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Can you build from our existing prototype?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. We review the prototype, requirements, user feedback and technical assumptions, then identify what can be retained and what needs refinement before production development begins.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'How do you control scope?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'We define the core user journey, write acceptance criteria, prioritise features and maintain a visible list of later ideas. New requests are assessed against time, cost and the value of reaching users sooner.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'What happens after launch?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'We can provide a support and improvement plan covering monitoring, fixes, security updates, user feedback and prioritised feature development, so the product keeps earning its place in the business.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Turn a useful idea into a scalable digital product.', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Tell us who will use it, which task it should improve and what business result the application should support.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start App Discovery', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
