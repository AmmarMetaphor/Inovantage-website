<?php
/**
 * Case study content type and the redirects left behind by the
 * Services -> Solutions rename.
 *
 * Case studies are a small custom post type built entirely from WordPress
 * core: title, editor, excerpt and featured image, plus a "Service" taxonomy
 * that matches the four categories the Case Studies page filters by. There is
 * no plugin dependency and no custom field layer — the narrative (the
 * challenge, what we built, how it worked, the outcome and the client's own
 * words) is written as ordinary headed content, so an editor needs nothing
 * beyond the standard editor to publish one.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the case_study post type and its case_service taxonomy.
 */
function inovantage_register_case_studies() {
	register_post_type(
		'case_study',
		array(
			'labels'        => array(
				'name'               => __( 'Case Studies', 'inovantage' ),
				'singular_name'      => __( 'Case Study', 'inovantage' ),
				'add_new_item'       => __( 'Add New Case Study', 'inovantage' ),
				'edit_item'          => __( 'Edit Case Study', 'inovantage' ),
				'new_item'           => __( 'New Case Study', 'inovantage' ),
				'view_item'          => __( 'View Case Study', 'inovantage' ),
				'search_items'       => __( 'Search Case Studies', 'inovantage' ),
				'not_found'          => __( 'No case studies yet', 'inovantage' ),
				'not_found_in_trash' => __( 'No case studies in the bin', 'inovantage' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-portfolio',
			'menu_position' => 21,
			'has_archive'   => false,
			'rewrite'       => array( 'slug' => 'case-studies', 'with_front' => false ),
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		)
	);

	register_taxonomy(
		'case_service',
		'case_study',
		array(
			'labels'            => array(
				'name'          => __( 'Services', 'inovantage' ),
				'singular_name' => __( 'Service', 'inovantage' ),
			),
			'public'            => true,
			'show_in_rest'      => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'case-studies/service', 'with_front' => false ),
		)
	);
}
add_action( 'init', 'inovantage_register_case_studies' );

/**
 * The four service categories the Case Studies page filters by, in the order
 * they appear in the filter bar.
 *
 * @return array slug => label
 */
function inovantage_case_service_terms() {
	return array(
		'ai-automation'            => __( 'AI Automation', 'inovantage' ),
		'website-development'      => __( 'Website Development', 'inovantage' ),
		'social-media-management'  => __( 'Social Media Management', 'inovantage' ),
		'app-development'          => __( 'App Development', 'inovantage' ),
	);
}

/**
 * Creates the four service terms if they are missing. Additive only.
 */
function inovantage_bootstrap_case_services() {
	foreach ( inovantage_case_service_terms() as $slug => $label ) {
		if ( ! term_exists( $slug, 'case_service' ) ) {
			wp_insert_term( $label, 'case_service', array( 'slug' => $slug ) );
		}
	}
}

/**
 * Permanent redirects for the routes this theme has retired.
 *
 * /services/  -> /solutions/            the overview page moved and was renamed
 * /work/      -> /case-studies/         its placeholder project examples are now
 *                                       published as real case studies
 * /insights/  -> /articles-and-guides/  the archive was renamed to match its
 *                                       navigation label
 *
 * The service detail pages are children of /services/, so only the exact
 * /services/ page redirects; /services/ai-automation/ and its siblings are
 * untouched.
 */
function inovantage_legacy_redirects() {
	if ( is_admin() || ! is_page() ) {
		return;
	}

	$post = get_queried_object();
	if ( ! $post instanceof WP_Post || $post->post_parent ) {
		return;
	}

	$targets = array(
		'services' => '/solutions/',
		'work'     => '/case-studies/',
		'insights' => '/articles-and-guides/',
	);

	if ( isset( $targets[ $post->post_name ] ) ) {
		wp_safe_redirect( home_url( $targets[ $post->post_name ] ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'inovantage_legacy_redirects' );

/**
 * Renders one case study card, matching the approved static markup.
 *
 * @param int $post_id
 */
function inovantage_case_study_card( $post_id ) {
	$permalink = get_permalink( $post_id );
	$terms     = get_the_terms( $post_id, 'case_service' );
	$term      = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0] : null;
	$excerpt   = get_the_excerpt( $post_id );
	?>
	<article class="case-study-card" data-case-card data-category="<?php echo esc_attr( $term ? $term->slug : '' ); ?>">
		<a class="case-study-media" href="<?php echo esc_url( $permalink ); ?>" tabindex="-1" aria-hidden="true">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<div class="insight-card-pattern"><span><?php echo esc_html( $term ? $term->name : __( 'Case study', 'inovantage' ) ); ?></span></div>
			<?php endif; ?>
		</a>
		<div class="case-study-body">
			<?php if ( $term ) : ?>
				<p class="case-study-tag"><?php echo esc_html( $term->name ); ?></p>
			<?php endif; ?>
			<h3><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
			<?php if ( $excerpt ) : ?>
				<p><?php echo esc_html( $excerpt ); ?></p>
			<?php endif; ?>
			<span class="text-link" aria-hidden="true"><?php esc_html_e( 'View case study', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></span>
		</div>
	</article>
	<?php
}

/**
 * Shown while no approved case study exists: four clearly labelled example
 * systems, one per service category. Each describes the kind of system
 * Inovantage designs. None is presented as a completed client project, and
 * no client, figure or result is invented. It matches the static build word
 * for word.
 */
function inovantage_practice_examples_grid() {
	$examples = array(
		array(
			'category' => 'ai-automation',
			'label'    => __( 'AI Automation', 'inovantage' ),
			'title'    => __( 'Connected lead operations', 'inovantage' ),
			'copy'     => __( 'Connect enquiry capture, qualification, routing and follow-up so opportunities reach the right person faster.', 'inovantage' ),
			'cta'      => __( 'Explore AI Automation', 'inovantage' ),
			'service'  => home_url( '/services/ai-automation/' ),
		),
		array(
			'category' => 'website-development',
			'label'    => __( 'Website Development', 'inovantage' ),
			'title'    => __( 'Conversion-focused digital presence', 'inovantage' ),
			'copy'     => __( 'Restructure a service-led website around buyer questions, credibility and clear conversion pathways.', 'inovantage' ),
			'cta'      => __( 'Explore Website Design', 'inovantage' ),
			'service'  => home_url( '/services/website-design/' ),
		),
		array(
			'category' => 'social-media-management',
			'label'    => __( 'Social Media Management', 'inovantage' ),
			'title'    => __( 'Controlled content operations', 'inovantage' ),
			'copy'     => __( 'Create a social media workflow connecting strategy, production, stakeholder approval, publishing and performance review.', 'inovantage' ),
			'cta'      => __( 'Explore Social Media Management', 'inovantage' ),
			'service'  => home_url( '/services/social-media-management/' ),
		),
		array(
			'category' => 'app-development',
			'label'    => __( 'App Development', 'inovantage' ),
			'title'    => __( 'Scalable customer delivery', 'inovantage' ),
			'copy'     => __( 'Replace fragmented email and spreadsheet-based administration with a focused portal or workflow application.', 'inovantage' ),
			'cta'      => __( 'Explore App Development', 'inovantage' ),
			'service'  => home_url( '/services/app-development/' ),
		),
	);
	?>
	<div class="case-study-grid" data-case-grid>
		<?php foreach ( $examples as $example ) : ?>
			<article class="case-study-card" data-case-card data-category="<?php echo esc_attr( $example['category'] ); ?>">
				<div class="case-study-media" aria-hidden="true"><div class="insight-card-pattern"><span><?php echo esc_html( $example['label'] ); ?></span></div></div>
				<div class="case-study-body">
					<p class="case-study-tag"><?php echo esc_html( __( 'Example system', 'inovantage' ) . ' · ' . $example['label'] ); ?></p>
					<h3><?php echo esc_html( $example['title'] ); ?></h3>
					<p><?php echo esc_html( $example['copy'] ); ?></p>
					<a class="text-link" href="<?php echo esc_url( $example['service'] ); ?>"><?php echo esc_html( $example['cta'] ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
}
