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
 * Permanent redirects for the two routes this release retired.
 *
 * /services/  -> /solutions/     the overview page moved and was renamed
 * /work/      -> /case-studies/  its placeholder project examples are now
 *                                published as real case studies
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
 * The honest empty state, shown until an approved case study is published.
 * It matches the static build word for word.
 */
function inovantage_case_study_empty_state() {
	$steps = array(
		'01' => __( 'The challenge the business brought to us', 'inovantage' ),
		'02' => __( 'What we built', 'inovantage' ),
		'03' => __( 'How it worked in practice', 'inovantage' ),
		'04' => __( 'The outcome', 'inovantage' ),
		'05' => __( "The client's own words", 'inovantage' ),
	);
	?>
	<div class="case-empty">
		<h3><?php esc_html_e( 'No case studies are published yet.', 'inovantage' ); ?></h3>
		<p><?php esc_html_e( 'Inovantage only publishes a client story once that client has confirmed the wording, the figures and the permission to name them. Nothing on this page is illustrative.', 'inovantage' ); ?></p>
		<p><?php esc_html_e( 'Each published study will follow the same structure:', 'inovantage' ); ?></p>
		<ol class="case-empty-flow">
			<?php foreach ( $steps as $number => $label ) : ?>
				<li><span><?php echo esc_html( $number ); ?></span><?php echo esc_html( $label ); ?></li>
			<?php endforeach; ?>
		</ol>
		<div class="button-row">
			<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a project', 'inovantage' ); ?></a>
			<a class="button button-secondary" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Explore solutions', 'inovantage' ); ?></a>
		</div>
	</div>
	<?php
}
