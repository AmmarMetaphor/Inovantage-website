<?php
/**
 * Template Name: Solutions overview
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<?php
$inovantage_services_art        = INOVANTAGE_URI . '/assets/images/heroes/services-hero-network.webp';
$inovantage_services_art_srcset = sprintf(
	'%1$s/assets/images/heroes/services-hero-network-760.webp 760w, %1$s/assets/images/heroes/services-hero-network-1180.webp 1180w, %1$s/assets/images/heroes/services-hero-network.webp 1672w',
	INOVANTAGE_URI
);

$inovantage_orbit_services = array(
	array(
		'slot' => 1,
		'icon' => 'automation',
		'index' => '01',
		'title' => __( 'AI Automation', 'inovantage' ),
		'text' => __( 'Increase capacity and respond faster with practical automation.', 'inovantage' ),
		'url' => home_url( '/services/ai-automation/' ),
	),
	array(
		'slot' => 2,
		'icon' => 'web',
		'index' => '02',
		'title' => __( 'Website Development', 'inovantage' ),
		'text' => __( 'Fast, credible websites that turn visitors into qualified enquiries.', 'inovantage' ),
		'url' => home_url( '/services/website-design/' ),
	),
	array(
		'slot' => 3,
		'icon' => 'social',
		'index' => '03',
		'title' => __( 'Social Media Management', 'inovantage' ),
		'text' => __( 'Consistent content that builds visibility, credibility and demand.', 'inovantage' ),
		'url' => home_url( '/services/social-media-management/' ),
	),
	array(
		'slot' => 4,
		'icon' => 'app',
		'index' => '04',
		'title' => __( 'App Development', 'inovantage' ),
		'text' => __( 'Portals, dashboards and tools that scale service delivery.', 'inovantage' ),
		'url' => home_url( '/services/app-development/' ),
	),
);

$inovantage_challenges = array(
	array(
		'challenge' => __( '“We need to generate more qualified enquiries.”', 'inovantage' ),
		'response'  => __( 'A conversion-focused website and stronger digital positioning can improve how prospects understand, trust and contact your business.', 'inovantage' ),
	),
	array(
		'challenge' => __( '“We need to respond to opportunities faster.”', 'inovantage' ),
		'response'  => __( 'AI automation can capture, qualify, route and follow up with enquiries before momentum is lost.', 'inovantage' ),
	),
	array(
		'challenge' => __( '“Our team spends too much time on repeated administration.”', 'inovantage' ),
		'response'  => __( 'Connected workflows can reduce manual data entry, reporting, document handling and routine communication.', 'inovantage' ),
	),
	array(
		'challenge' => __( '“Our marketing is inconsistent.”', 'inovantage' ),
		'response'  => __( 'A managed content operation can turn business expertise into a dependable flow of relevant, approved content.', 'inovantage' ),
	),
	array(
		'challenge' => __( '“Our systems cannot support the next stage of growth.”', 'inovantage' ),
		'response'  => __( 'A focused portal, dashboard or internal application can improve visibility, standardise delivery and support greater volume.', 'inovantage' ),
	),
);
?>

<section class="page-hero services-hero">
	<div class="services-hero-media" aria-hidden="true">
		<img class="services-hero-art" src="<?php echo esc_url( $inovantage_services_art ); ?>" srcset="<?php echo esc_attr( $inovantage_services_art_srcset ); ?>" sizes="100vw" width="1672" height="941" alt="" fetchpriority="high" decoding="async">
	</div>
	<div class="services-hero-veil" aria-hidden="true"></div>
	<div class="container services-hero-grid">
		<div class="services-hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'Inovantage solutions', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Connected digital solutions built around ', 'inovantage' ); ?><span><?php esc_html_e( 'business growth.', 'inovantage' ); ?></span></h1>
			<p class="lede"><?php esc_html_e( 'Inovantage brings automation, websites, content operations and application development together to help B2B companies generate opportunities, improve delivery and scale with greater control.', 'inovantage' ); ?></p>
			<div class="button-row">
				<a class="button" href="#service-list"><?php esc_html_e( 'Explore Our Solutions', 'inovantage' ); ?></a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Your Business Goals', 'inovantage' ); ?></a>
			</div>
		</div>
		<div class="services-orbit" data-services-orbit>
			<svg class="orbit-path" viewBox="0 0 200 200" preserveAspectRatio="none" aria-hidden="true" focusable="false"><ellipse cx="100" cy="100" rx="99" ry="99" vector-effect="non-scaling-stroke"></ellipse></svg>
			<?php foreach ( $inovantage_orbit_services as $inovantage_service ) : ?>
				<div class="orbit-slot orbit-slot-<?php echo esc_attr( $inovantage_service['slot'] ); ?>">
					<a class="orbit-card" href="<?php echo esc_url( $inovantage_service['url'] ); ?>">
						<span class="orbit-card-index"><?php echo esc_html( $inovantage_service['index'] ); ?></span>
						<span class="orbit-card-head"><span class="orbit-card-icon"><?php inovantage_icon_e( $inovantage_service['icon'] ); ?></span><span class="orbit-card-title"><?php echo esc_html( $inovantage_service['title'] ); ?></span></span>
						<span class="orbit-card-text"><?php echo esc_html( $inovantage_service['text'] ); ?></span>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Start with the business challenge', 'inovantage' ); ?></p><h2><?php esc_html_e( 'What needs to improve?', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'You do not need to arrive with a technology decision. Most useful projects begin with a commercial or operational constraint like one of these.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<?php foreach ( $inovantage_challenges as $inovantage_challenge ) : ?>
				<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php echo esc_html( $inovantage_challenge['challenge'] ); ?></strong><span><?php echo esc_html( $inovantage_challenge['response'] ); ?></span></div></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section section-soft" id="service-list">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Four connected capabilities', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Match the challenge to the right capability.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Each service is designed to deliver a clear business result and to strengthen the others when they work together.', 'inovantage' ); ?></p></div>
		<div class="services-grid">
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'automation' ); ?></span><h2><?php esc_html_e( 'AI Automation', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Expand capacity, respond to opportunities faster and reduce operational friction with connected workflows for enquiries, support, documents, reporting and administration.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/ai-automation/' ) ); ?>"><?php esc_html_e( 'Explore AI Automation', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'web' ); ?></span><h2><?php esc_html_e( 'Website Design and Development', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Win more qualified enquiries with a fast, credible website structured around buyer questions, strong positioning and clear conversion pathways.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/website-design/' ) ); ?>"><?php esc_html_e( 'Explore Website Design', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'social' ); ?></span><h2><?php esc_html_e( 'Social Media Management', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Build authority, visibility and demand with a managed content programme covering strategy, production, approval, scheduling and performance review.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'Explore Social Media Management', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'app' ); ?></span><h2><?php esc_html_e( 'App Development', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Scale service delivery and improve customer experience with portals, dashboards, internal tools and focused business applications.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/app-development/' ) ); ?>"><?php esc_html_e( 'Explore App Development', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
		</div>
	</div>
</section>

<section class="section" id="ways-to-work">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'A solution shaped around the opportunity', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Start at the level your business needs.', 'inovantage' ); ?></h2></div></div>
		<div class="card-grid-4">
			<article class="info-card"><h3><?php esc_html_e( 'Focused improvement', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Resolve a defined commercial or operational problem through a clearly scoped automation, website, application or content project.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Connected transformation', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Bring multiple customer and internal workflows together when one improvement depends on another.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Continuous optimisation', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Build on a launched solution through performance analysis, refinement, maintenance and carefully prioritised improvements.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( 'Discovery and roadmap', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Clarify the opportunity, risks, priorities and most valuable first step before committing to a larger implementation.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'What every engagement includes', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Clarity before commitment.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'You should understand what is being built, why it matters commercially, who needs to review it and what happens after launch.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Outcome-led scope', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Goals, users, constraints and success measures are written down before delivery begins.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Visible milestones', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Review working progress at agreed stages rather than waiting until the end.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content and data ownership', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Your business retains ownership of approved content, data and project deliverables subject to the agreement.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Launch and handover', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Receive practical guidance for using, maintaining and improving what has been delivered.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Not sure which solution is right?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'You do not need to diagnose the technology. Explain the business constraint, its impact and what you want to achieve. We will help determine the most valuable place to begin.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Growth Consultation', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
