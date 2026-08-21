<?php
/**
 * The homepage template — preserves the approved hero copy, services grid,
 * outcomes, process, review-first panel and latest insights sections. The
 * hero renders the orbital artwork as a decorative background layer; the
 * headline, body copy and calls to action stay as semantic markup.
 */

get_header();

$inovantage_hero_art        = INOVANTAGE_URI . '/assets/images/heroes/home-hero-orbital.webp';
$inovantage_hero_art_srcset = sprintf(
	'%1$s/assets/images/heroes/home-hero-orbital-760.webp 760w, %1$s/assets/images/heroes/home-hero-orbital-1180.webp 1180w, %1$s/assets/images/heroes/home-hero-orbital.webp 1672w',
	INOVANTAGE_URI
);
?>

<section class="hero hero-orbital" data-hero-parallax>
	<div class="hero-orbital-media" aria-hidden="true">
		<img class="hero-orbital-art" src="<?php echo esc_url( $inovantage_hero_art ); ?>" srcset="<?php echo esc_attr( $inovantage_hero_art_srcset ); ?>" sizes="(max-width: 760px) 156vw, (max-width: 900px) 142vw, (max-width: 1040px) 100vw, 78vw" width="1672" height="941" alt="" fetchpriority="high" decoding="async">
	</div>
	<div class="hero-orbital-veil" aria-hidden="true"></div>
	<div class="container hero-orbital-inner">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'Automation, design and development', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Digital systems that help your business ', 'inovantage' ); ?><span><?php esc_html_e( 'work better.', 'inovantage' ); ?></span></h1>
			<p><?php esc_html_e( 'Inovantage designs connected workflows, websites, content operations and business apps that reduce friction while keeping people in control.', 'inovantage' ); ?></p>
			<div class="button-row">
				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a project', 'inovantage' ); ?></a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Explore solutions', 'inovantage' ); ?></a>
			</div>
			<p class="hero-proof"><span><?php esc_html_e( 'Built for UK businesses', 'inovantage' ); ?></span><span><?php esc_html_e( 'Clear scope and milestones', 'inovantage' ); ?></span><span><?php esc_html_e( 'Human review before publication', 'inovantage' ); ?></span></p>
		</div>
	</div>
</section>

<section class="section" id="services">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'Four connected capabilities', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Everything you need to build a more capable digital business.', 'inovantage' ); ?></h2></div>
			<a class="text-link" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'View all solutions', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
		</div>
		<div class="services-grid">
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'automation' ); ?></span>
				<h3><?php esc_html_e( 'AI automation', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Remove repetitive admin, improve response times and connect the tools your team already uses.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/ai-automation/' ) ); ?>"><?php esc_html_e( 'Explore AI automation', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'web' ); ?></span>
				<h3><?php esc_html_e( 'Website design', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Turn your offer into a fast, accessible website that makes the next step clear on every screen.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/website-design/' ) ); ?>"><?php esc_html_e( 'Explore website design', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'social' ); ?></span>
				<h3><?php esc_html_e( 'Social media management', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Plan, create, review and schedule useful content through a transparent approval workflow.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'Explore social media', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'app' ); ?></span>
				<h3><?php esc_html_e( 'App development', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Build portals, dashboards, internal tools and customer apps around a focused business need.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/app-development/' ) ); ?>"><?php esc_html_e( 'Explore app development', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'Useful outcomes', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Technology should make the business easier to run.', 'inovantage' ); ?></h2></div>
			<p><?php esc_html_e( 'We focus on clear improvements rather than adding tools for the sake of it.', 'inovantage' ); ?></p>
		</div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Faster follow-up', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Capture, qualify and route enquiries without waiting for manual handoffs.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Less repeated work', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Automate routine updates, reminders, reports and data movement.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'More consistent content', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Use a structured calendar and approval step before anything is published.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Better digital journeys', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Give customers and staff simple interfaces that help them complete a task.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'A dependable process', 'inovantage' ); ?></p><h2><?php esc_html_e( 'From unclear problem to working solution.', 'inovantage' ); ?></h2></div>
			<p><?php esc_html_e( 'You always know what is being decided, built, reviewed and released.', 'inovantage' ); ?></p>
		</div>
		<div class="process-grid">
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Discover', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We map the goal, users, current workflow, constraints and measures of success.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Design', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We shape the solution, content, user journey, technical approach and delivery plan.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Build', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We work in visible stages, test the important paths and ask for feedback early.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Improve', 'inovantage' ); ?></h3><p><?php esc_html_e( 'After launch, we monitor what matters and prioritise practical refinements.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container review-grid">
		<div class="review-copy">
			<p class="eyebrow"><?php esc_html_e( 'Review-first publishing', 'inovantage' ); ?></p>
			<h2><?php esc_html_e( 'Nothing should publish by accident.', 'inovantage' ); ?></h2>
			<p class="lede"><?php esc_html_e( 'The included content system separates drafts from reviewed work. Editors can prepare an article, move it into review, check a private preview and publish only after approval.', 'inovantage' ); ?></p>
			<p><?php esc_html_e( 'The same principle can be used for social media: create the calendar, prepare copy and visuals, request comments, record approval, then schedule.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'See the content workflow', 'inovantage' ); ?></a><a class="button button-secondary" href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'Read our insights', 'inovantage' ); ?></a></div>
		</div>
		<div class="approval-board" aria-label="<?php esc_attr_e( 'Example content approval board', 'inovantage' ); ?>">
			<div class="approval-columns">
				<div class="approval-column"><h3><?php esc_html_e( 'Draft', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Five tasks worth automating', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Copy in progress', 'inovantage' ); ?></span></div><div class="approval-item"><strong><?php esc_html_e( 'Website launch checklist', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Image needed', 'inovantage' ); ?></span></div></div>
				<div class="approval-column is-review"><h3><?php esc_html_e( 'In review', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Content approval workflow', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Preview available', 'inovantage' ); ?></span></div></div>
				<div class="approval-column is-ready"><h3><?php esc_html_e( 'Ready', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Choosing an app MVP', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Approved to publish', 'inovantage' ); ?></span></div></div>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'Practical insights', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Useful thinking for your next digital decision.', 'inovantage' ); ?></h2></div>
			<a class="text-link" href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'View all insights', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
		</div>
		<div class="insights-grid">
			<?php
			$inovantage_latest = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'no_found_rows'  => true,
					'ignore_sticky_posts' => true,
				)
			);
			if ( $inovantage_latest->have_posts() ) :
				while ( $inovantage_latest->have_posts() ) :
					$inovantage_latest->the_post();
					inovantage_insight_card( get_the_ID(), true );
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<p><?php esc_html_e( 'No insights have been published yet.', 'inovantage' ); ?></p>
				<?php
			endif;
			?>
		</div>
	</div>
</section>

<section class="section section-tight">
	<div class="container">
		<div class="cta-panel">
			<div><h2><?php esc_html_e( 'What is taking too long, underperforming or ready to be built?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Share the current situation and the outcome you want. We will help you define a sensible next step.', 'inovantage' ); ?></p></div>
			<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a project', 'inovantage' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
