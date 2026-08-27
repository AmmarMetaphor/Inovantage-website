<?php
/**
 * Template Name: Case studies
 *
 * Mirrors the approved static /case-studies/ page, presented as "Solutions in
 * Practice": a full-viewport interactive hero whose four cards orbit a glowing
 * core, the service filter bar, then the published case studies (or four
 * clearly labelled example systems while none exist).
 */

get_header();

/* The four hero cards are the four real service categories. A card only offers
   "View case study" once a published study exists for it. */
$inovantage_case_categories = array(
	array(
		'slug'       => 'ai-automation',
		'label'      => __( 'AI Automation', 'inovantage' ),
		'icon'       => 'automation',
		'service'    => home_url( '/services/ai-automation/' ),
		'capability' => __( 'Connected workflows', 'inovantage' ),
	),
	array(
		'slug'       => 'website-development',
		'label'      => __( 'Website Development', 'inovantage' ),
		'icon'       => 'web',
		'service'    => home_url( '/services/website-design/' ),
		'capability' => __( 'Conversion-focused websites', 'inovantage' ),
	),
	array(
		'slug'       => 'social-media-management',
		'label'      => __( 'Social Media Management', 'inovantage' ),
		'icon'       => 'social',
		'service'    => home_url( '/services/social-media-management/' ),
		'capability' => __( 'Approval-led content', 'inovantage' ),
	),
	array(
		'slug'       => 'app-development',
		'label'      => __( 'App Development', 'inovantage' ),
		'icon'       => 'app',
		'service'    => home_url( '/services/app-development/' ),
		'capability' => __( 'Practical apps and portals', 'inovantage' ),
	),
);

$inovantage_cases = get_posts(
	array(
		'post_type'   => 'case_study',
		'post_status' => 'publish',
		'numberposts' => 24,
	)
);
?>

<section class="page-hero case-hero" data-case-hero>
	<div class="container case-hero-grid">
		<div class="case-hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'Solutions in practice', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'See how', 'inovantage' ); ?> <span><?php esc_html_e( 'connected digital systems', 'inovantage' ); ?></span> <?php esc_html_e( 'solve business challenges.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Inovantage designs solutions around measurable operational and commercial needs, from improving lead response and customer journeys to reducing administration and creating scalable digital services.', 'inovantage' ); ?></p>

			<div class="filter-bar case-filter-bar" role="group" aria-label="<?php esc_attr_e( 'Filter examples by service', 'inovantage' ); ?>" data-case-filter-group>
				<button class="filter-button is-active" type="button" data-case-filter="all" aria-pressed="true"><?php esc_html_e( 'All', 'inovantage' ); ?></button>
				<?php foreach ( $inovantage_case_categories as $inovantage_category ) : ?>
					<button class="filter-button" type="button" data-case-filter="<?php echo esc_attr( $inovantage_category['slug'] ); ?>" aria-pressed="false"><?php echo esc_html( $inovantage_category['label'] ); ?></button>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="case-orbit" data-case-orbit>
			<div class="case-hero-field" aria-hidden="true">
				<svg class="case-orbit-path" viewBox="0 0 200 200" preserveAspectRatio="none" focusable="false">
					<ellipse class="case-orbit-path-outer" cx="100" cy="100" rx="126" ry="118" vector-effect="non-scaling-stroke"></ellipse>
					<ellipse cx="100" cy="100" rx="100" ry="100" vector-effect="non-scaling-stroke"></ellipse>
					<ellipse class="case-orbit-path-inner" cx="100" cy="100" rx="62" ry="72" vector-effect="non-scaling-stroke"></ellipse>
				</svg>
				<div class="case-core">
					<span class="case-core-ring case-core-ring-1"></span>
					<span class="case-core-ring case-core-ring-2"></span>
					<span class="case-core-ring case-core-ring-3"></span>
					<span class="case-core-ring case-core-ring-4"></span>
					<span class="case-core-glow"></span>
				</div>
				<?php for ( $inovantage_node = 1; $inovantage_node <= 8; $inovantage_node++ ) : ?>
					<span class="case-node case-node-<?php echo esc_attr( $inovantage_node ); ?>"></span>
				<?php endfor; ?>
			</div>

			<?php foreach ( $inovantage_case_categories as $inovantage_index => $inovantage_category ) : ?>
				<?php
				$inovantage_match = get_posts(
					array(
						'post_type'   => 'case_study',
						'post_status' => 'publish',
						'numberposts' => 1,
						'tax_query'   => array(
							array(
								'taxonomy' => 'case_service',
								'field'    => 'slug',
								'terms'    => $inovantage_category['slug'],
							),
						),
					)
				);
				$inovantage_study = ! empty( $inovantage_match ) ? $inovantage_match[0] : null;
				$inovantage_href  = $inovantage_study ? get_permalink( $inovantage_study ) : $inovantage_category['service'];
				$inovantage_title = $inovantage_study ? get_the_title( $inovantage_study ) : $inovantage_category['capability'];
				$inovantage_act   = $inovantage_study ? __( 'View case study', 'inovantage' ) : __( 'See the service', 'inovantage' );
				?>
				<div class="orbit-slot orbit-slot-<?php echo esc_attr( $inovantage_index + 1 ); ?>">
					<a class="case-card" href="<?php echo esc_url( $inovantage_href ); ?>">
						<span class="case-card-head">
							<span class="case-card-icon"><?php inovantage_icon_e( $inovantage_category['icon'] ); ?></span>
							<span class="case-card-tag"><?php echo esc_html( $inovantage_category['label'] ); ?></span>
						</span>
						<span class="case-card-title"><?php echo esc_html( $inovantage_title ); ?></span>
						<span class="case-card-action"><?php echo esc_html( $inovantage_act ); ?> <?php inovantage_icon_e( 'arrow' ); ?></span>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<a class="case-scroll" href="#featured-case-studies">
		<span class="case-scroll-mouse" aria-hidden="true"></span>
		<?php esc_html_e( 'Scroll to explore the systems', 'inovantage' ); ?>
	</a>
</section>

<section class="section" id="featured-case-studies">
	<div class="container case-featured-grid">
		<div class="sticky-copy">
			<?php if ( ! empty( $inovantage_cases ) ) : ?>
				<p class="eyebrow"><?php esc_html_e( 'Featured case studies', 'inovantage' ); ?></p>
				<h2><?php esc_html_e( 'Verified client stories.', 'inovantage' ); ?></h2>
				<p class="lede"><?php esc_html_e( 'Each study is published with confirmed wording, verified evidence and the client\'s permission.', 'inovantage' ); ?></p>
			<?php else : ?>
				<p class="eyebrow"><?php esc_html_e( 'Example systems', 'inovantage' ); ?></p>
				<h2><?php esc_html_e( 'Four systems that remove common growth constraints.', 'inovantage' ); ?></h2>
				<p class="lede"><?php esc_html_e( 'Each example shows how Inovantage approaches a frequent business challenge. They describe the kind of system we design, not completed client projects.', 'inovantage' ); ?></p>
				<p class="proof-note"><?php esc_html_e( 'Future client case studies will be published only with confirmed wording, verified evidence and appropriate client permission.', 'inovantage' ); ?></p>
			<?php endif; ?>
			<a class="text-link" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Explore all solutions', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
		</div>
		<div class="case-featured-body">
			<?php if ( ! empty( $inovantage_cases ) ) : ?>
				<div class="case-study-grid" data-case-grid>
					<?php foreach ( $inovantage_cases as $inovantage_case ) : ?>
						<?php inovantage_case_study_card( $inovantage_case->ID ); ?>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<?php inovantage_practice_examples_grid(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section section-tight">
	<div class="container">
		<div class="cta-panel">
			<div>
				<h2><?php esc_html_e( 'What business challenge should your next digital system solve?', 'inovantage' ); ?></h2>
				<p><?php esc_html_e( 'Tell us what is slowing the business down, where opportunities are being lost or what needs to scale.', 'inovantage' ); ?></p>
			</div>
			<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Your Business Challenge', 'inovantage' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
