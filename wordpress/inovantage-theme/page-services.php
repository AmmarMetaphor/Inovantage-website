<?php
/**
 * Template Name: Services overview
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="page-hero">
	<div class="container page-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Services', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'One partner for the systems customers see and the workflows your team relies on.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Choose a focused project or combine capabilities into a connected digital improvement programme.', 'inovantage' ); ?></p>
		</div>
		<div class="page-hero-visual">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/heroes/services-hero.png" width="1536" height="1024" alt="<?php esc_attr_e( 'Connected digital services covering automation, websites, content operations and app development.', 'inovantage' ); ?>" loading="eager" decoding="async">
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="services-grid">
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'automation' ); ?></span><h2><?php esc_html_e( 'AI automation', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Design connected workflows for enquiries, support, documents, reporting, content operations and internal administration.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/ai-automation/' ) ); ?>"><?php esc_html_e( 'See AI automation services', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'web' ); ?></span><h2><?php esc_html_e( 'Website design', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Plan, write, design and develop a responsive website that explains your value and guides visitors towards action.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/website-design/' ) ); ?>"><?php esc_html_e( 'See website services', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'social' ); ?></span><h2><?php esc_html_e( 'Social media management', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Build a repeatable content engine with strategy, production, client approval, scheduling and reporting.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'See social media services', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
			<article class="service-card"><span class="service-icon"><?php inovantage_icon_e( 'app' ); ?></span><h2><?php esc_html_e( 'App development', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Turn a proven need into an MVP, portal, dashboard, internal tool or customer-facing application.', 'inovantage' ); ?></p><a class="text-link" href="<?php echo esc_url( home_url( '/services/app-development/' ) ); ?>"><?php esc_html_e( 'See app development services', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a></article>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Ways to work together', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Choose the level of support that fits the problem.', 'inovantage' ); ?></h2></div></div>
		<div class="card-grid-3">
			<article class="info-card"><h3><?php esc_html_e( 'Focused project', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A defined outcome with a clear scope, milestones, review points and launch plan.', 'inovantage' ); ?></p><ul><li><?php esc_html_e( 'Website redesign', 'inovantage' ); ?></li><li><?php esc_html_e( 'Automation workflow', 'inovantage' ); ?></li><li><?php esc_html_e( 'MVP or internal tool', 'inovantage' ); ?></li></ul></article>
			<article class="info-card"><h3><?php esc_html_e( 'Ongoing delivery', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A monthly rhythm for social content, optimisation, maintenance and incremental improvements.', 'inovantage' ); ?></p><ul><li><?php esc_html_e( 'Content operations', 'inovantage' ); ?></li><li><?php esc_html_e( 'Website optimisation', 'inovantage' ); ?></li><li><?php esc_html_e( 'Automation support', 'inovantage' ); ?></li></ul></article>
			<article class="info-card"><h3><?php esc_html_e( 'Discovery and roadmap', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A structured assessment when the opportunity is clear but the right solution is not.', 'inovantage' ); ?></p><ul><li><?php esc_html_e( 'Process mapping', 'inovantage' ); ?></li><li><?php esc_html_e( 'Requirements and priorities', 'inovantage' ); ?></li><li><?php esc_html_e( 'Delivery options and estimates', 'inovantage' ); ?></li></ul></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'What every engagement includes', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Clarity before commitment.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'You should understand what is being built, why it matters, who needs to review it and what happens after launch.', 'inovantage' ); ?></p></div>
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

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Not sure which service you need?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Describe the bottleneck or opportunity. We will help you frame the right first project.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss your goals', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
