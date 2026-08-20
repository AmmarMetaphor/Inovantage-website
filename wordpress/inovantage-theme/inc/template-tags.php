<?php
/**
 * Reusable presentation helpers shared across templates.
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Inline SVG icon set carried over from the approved static build.
 *
 * @param string $name automation|web|social|app|arrow|check|menu|close|facebook|whatsapp
 * @return string Raw (trusted, hand-authored) inline SVG markup.
 */
function inovantage_icon( $name ) {
	$icons = array(
		'automation' => '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M12 3v3m0 12v3M3 12h3m12 0h3M5.64 5.64l2.12 2.12m8.48 8.48 2.12 2.12m0-12.72-2.12 2.12M7.76 16.24l-2.12 2.12"/><circle cx="12" cy="12" r="4"/></svg>',
		'web'        => '<svg aria-hidden="true" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 6.5h.01M11 6.5h.01"/></svg>',
		'social'     => '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8 8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/><path d="m11 9 2 6M4 19l4-4m8-7 4-3"/></svg>',
		'app'        => '<svg aria-hidden="true" viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M10 5h4M11 18h2"/></svg>',
		'arrow'      => '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>',
		'check'      => '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg>',
		'menu'       => '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg>',
		'close'      => '<svg aria-hidden="true" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></svg>',
		'facebook'   => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
		'whatsapp'   => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2.05 22l5.25-1.38a9.87 9.87 0 0 0 4.74 1.2h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.13-2.9-7.01A9.83 9.83 0 0 0 12.04 2Zm0 1.67c2.19 0 4.25.85 5.79 2.4a8.16 8.16 0 0 1 2.4 5.84c0 4.55-3.71 8.25-8.27 8.25a8.3 8.3 0 0 1-4.21-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.27-4.4c0-4.55 3.71-8.23 8.35-8.23Zm-4.55 4.4c-.16 0-.42.06-.64.31s-.85.83-.85 2.02.87 2.35.99 2.51c.12.16 1.7 2.7 4.17 3.68 2.06.82 2.48.66 2.93.62.45-.04 1.45-.59 1.65-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28-.24-.12-1.45-.72-1.68-.8-.22-.08-.39-.12-.55.13-.16.24-.63.8-.77.96-.14.16-.28.18-.52.06-.24-.12-1.01-.37-1.93-1.19-.71-.63-1.19-1.42-1.33-1.66-.14-.24-.02-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.55-1.34-.76-1.83-.2-.48-.4-.42-.55-.42Z"/></svg>',
	);
	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}

/**
 * Prints an icon. Trusted, hand-authored inline markup — no user input.
 *
 * @param string $name
 */
function inovantage_icon_e( $name ) {
	echo inovantage_icon( $name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Determines which primary navigation item, if any, represents the
 * current request so the correct link can carry aria-current/is-current.
 *
 * @return string solutions|case-studies|insights|about|''
 */
function inovantage_nav_section() {
	if ( is_singular( 'post' ) || is_home() || is_category() ) {
		return 'insights';
	}

	if ( is_singular( 'case_study' ) || is_post_type_archive( 'case_study' ) || is_tax( 'case_service' ) || is_page( 'case-studies' ) ) {
		return 'case-studies';
	}

	if ( is_page( 'about' ) ) {
		return 'about';
	}

	// The service detail pages still live under /services/, and they keep
	// highlighting the Solutions item they sit beneath.
	$solutions_slugs = array( 'solutions', 'ai-automation', 'website-design', 'social-media-management', 'app-development' );
	if ( is_page( $solutions_slugs ) ) {
		return 'solutions';
	}

	return '';
}

/**
 * Renders the primary navigation list items (without the surrounding ul).
 * Used as the wp_nav_menu() fallback and by the auto-created menu.
 */
function inovantage_default_nav_items() {
	$current = inovantage_nav_section();
	$links   = array(
		'solutions'    => array( home_url( '/solutions/' ), __( 'Solutions', 'inovantage' ) ),
		'case-studies' => array( home_url( '/case-studies/' ), __( 'Case Studies', 'inovantage' ) ),
		'insights'     => array( home_url( '/insights/' ), __( 'Articles & Guides', 'inovantage' ) ),
		'about'        => array( home_url( '/about/' ), __( 'About', 'inovantage' ) ),
	);

	$html = '';
	foreach ( $links as $key => $link ) {
		list( $href, $label ) = $link;
		$is_current = ( $current === $key );
		$attrs      = $is_current ? ' aria-current="page" class="is-current"' : '';
		$html      .= sprintf(
			'<li><a href="%1$s"%2$s>%3$s</a></li>',
			esc_url( $href ),
			$attrs,
			esc_html( $label )
		);
	}
	return $html;
}

/**
 * Fallback callback for wp_nav_menu() when no "Primary Navigation" menu
 * has been assigned yet, so the site works correctly out of the box.
 */
function inovantage_nav_fallback( $args ) {
	echo '<ul id="primary-menu" class="menu">' . inovantage_default_nav_items() . '</ul>'; // phpcs:ignore
}

/**
 * Adds the is-current styling hook to the matching wp_nav_menu() item.
 */
function inovantage_nav_menu_css_class( $classes, $item ) {
	$current = inovantage_nav_section();
	$map     = array(
		'/solutions/'    => 'solutions',
		'/case-studies/' => 'case-studies',
		'/insights/'     => 'insights',
		'/about/'        => 'about',
	);
	$path = wp_parse_url( $item->url, PHP_URL_PATH );
	if ( $path && isset( $map[ $path ] ) && $map[ $path ] === $current ) {
		$classes[] = 'is-current';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'inovantage_nav_menu_css_class', 10, 2 );

function inovantage_nav_menu_link_attributes( $atts, $item ) {
	$current = inovantage_nav_section();
	$map     = array(
		'/solutions/'    => 'solutions',
		'/case-studies/' => 'case-studies',
		'/insights/'     => 'insights',
		'/about/'        => 'about',
	);
	$path = wp_parse_url( $item->url, PHP_URL_PATH );
	if ( $path && isset( $map[ $path ] ) && $map[ $path ] === $current ) {
		$atts['aria-current'] = 'page';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'inovantage_nav_menu_link_attributes', 10, 2 );

/**
 * Estimated reading time, matching the approved static build's formula
 * (roughly 220 words per minute, minimum one minute).
 *
 * @param string $content Plain text or HTML.
 * @return int
 */
function inovantage_reading_time( $content ) {
	$text  = wp_strip_all_tags( $content );
	$words = preg_split( '/\s+/', trim( $text ) );
	$words = array_filter( $words );
	return max( 1, (int) ceil( count( $words ) / 220 ) );
}

/**
 * Renders a single insight card matching the approved design.
 *
 * @param int  $post_id
 * @param bool $compact
 */
function inovantage_insight_card( $post_id, $compact = false ) {
	$permalink   = get_permalink( $post_id );
	$title       = get_the_title( $post_id );
	$categories  = get_the_category( $post_id );
	$category    = ! empty( $categories ) ? $categories[0]->name : __( 'Digital Growth', 'inovantage' );
	$category_slug = sanitize_title( $category );
	$excerpt     = get_the_excerpt( $post_id );
	$date        = get_the_date( 'j F Y', $post_id );
	$reading     = inovantage_reading_time( get_post_field( 'post_content', $post_id ) );
	$has_thumb   = has_post_thumbnail( $post_id );
	$compact_cls = $compact ? ' insight-card-compact' : '';
	?>
	<article class="insight-card<?php echo esc_attr( $compact_cls ); ?>" data-insight-card data-category="<?php echo esc_attr( $category_slug ); ?>">
		<a class="insight-card-media" href="<?php echo esc_url( $permalink ); ?>" tabindex="-1" aria-hidden="true">
			<?php if ( $has_thumb ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<div class="insight-card-pattern"><span><?php echo esc_html( $category ); ?></span></div>
			<?php endif; ?>
		</a>
		<div class="insight-card-body">
			<div class="insight-meta"><span><?php echo esc_html( $category ); ?></span><span><?php echo esc_html( $date ); ?></span></div>
			<h3><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h3>
			<p><?php echo esc_html( $excerpt ); ?></p>
			<div class="insight-card-footer"><span><?php echo esc_html( $reading ); ?> min read</span><span class="text-link">Read article <?php inovantage_icon_e( 'arrow' ); ?></span></div>
		</div>
	</article>
	<?php
}

/**
 * Renders the category filter bar shown on the Insights archive when more
 * than one category is present among published posts.
 */
function inovantage_insight_filters() {
	$categories = get_categories( array( 'hide_empty' => true ) );
	if ( count( $categories ) < 2 ) {
		return;
	}
	?>
	<div class="filter-bar" aria-label="Filter insights by category" data-filter-group>
		<button class="filter-button is-active" type="button" data-filter="all">All</button>
		<?php foreach ( $categories as $category ) : ?>
			<button class="filter-button" type="button" data-filter="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></button>
		<?php endforeach; ?>
	</div>
	<?php
}
