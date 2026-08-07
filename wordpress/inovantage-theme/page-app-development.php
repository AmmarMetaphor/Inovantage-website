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
			<p class="eyebrow"><?php esc_html_e( 'App development', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Build the smallest useful product, then improve it with evidence.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'We help you define, prototype and develop web apps, customer portals, dashboards, internal tools and mobile-ready experiences around a clear user need.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss your app idea', 'inovantage' ); ?></a><a class="button button-secondary" href="#products"><?php esc_html_e( 'See what we build', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Portal', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Dashboard', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'MVP', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Internal tool', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'app' ); ?></span>
		</div>
	</div>
</section>

<section class="section" id="products">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Product types', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Focused software for a defined job.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'A useful application does not need dozens of features. It needs the right workflow, clear permissions and a reliable path through the core task.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Customer portals', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Let customers submit information, track progress, access documents or manage requests in one place.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Internal tools', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Replace spreadsheets, repeated emails and disconnected admin with a purpose-built operational interface.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Dashboards', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Bring important metrics, alerts and actions together for the people who need to make decisions.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Market-test MVPs', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Validate a product concept with the minimum feature set required for real users to complete the core journey.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Workflow applications', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Guide a request, case or project through stages, approvals, notifications and accountable ownership.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Connected experiences', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Integrate the app with payment, CRM, email, storage or other services where the business case is clear.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'From idea to release', 'inovantage' ); ?></p><h2><?php esc_html_e( 'A staged product development process.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Each stage reduces uncertainty before more time and budget are committed.', 'inovantage' ); ?></p></div>
		<div class="process-grid">
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Define', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Identify the user, problem, core journey, constraints, risks and measurable outcome.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Prototype', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Test the flow and interface before building the full production system.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Develop', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Build the approved scope in testable increments with security and maintainability in mind.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Release', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Launch to an appropriate audience, observe usage and prioritise evidence-based improvements.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'MVP discipline', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Protect the core value from feature creep.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'We use a clear release boundary so the first version can reach users, generate learning and avoid unnecessary complexity.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Must work', 'inovantage' ); ?></h3><p><?php esc_html_e( "The minimum complete journey a user needs to achieve the product's main purpose.", 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Should help', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Important supporting features considered after the core journey is stable.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Could improve', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Enhancements that are useful but do not block the first meaningful release.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Not yet', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Ideas deliberately postponed until user behaviour or business evidence supports them.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Before building an app.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Do we need a mobile app from the start?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Not always. A responsive web app can often validate the need faster and work across devices without separate app-store releases. Native mobile features may justify a dedicated app later.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Can you build from our existing prototype?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. We will review the prototype, requirements, user feedback and technical assumptions, then identify what can be retained and what needs refinement before production.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'How do you control scope?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'We define the core user journey, write acceptance criteria, prioritise features and maintain a visible list of later ideas. New requests are assessed against time, cost and launch value.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'What happens after launch?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'We can provide a support and improvement plan covering monitoring, fixes, security updates, user feedback and prioritised feature development.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Turn a useful app idea into a testable product plan.', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Share the users, problem and essential task. We will help you define a sensible first release.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start app discovery', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
