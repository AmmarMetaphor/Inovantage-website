<?php
/**
 * SEO output: titles, meta description, canonical, Open Graph, Twitter
 * card, robots directives and Organization/Article structured data.
 *
 * Mirrors the approach used by the approved static site generator
 * (build.mjs renderLayout()) using WordPress-native hooks and data.
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Keep the browser tab title format close to the approved static build:
 * "Page Title | Inovantage" (front page: "Inovantage | Tagline").
 */
add_filter(
	'document_title_separator',
	function () {
		return '|';
	}
);

add_filter(
	'document_title_parts',
	function ( $parts ) {
		if ( is_front_page() ) {
			return array(
				'title' => inovantage_company( 'name' ),
				'tagline' => get_the_excerpt( get_option( 'page_on_front' ) ) ?: inovantage_company( 'tagline' ),
			);
		}
		return $parts;
	}
);

/**
 * Builds a plain-text meta description for the current request.
 *
 * @return string
 */
function inovantage_meta_description() {
	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
		if ( $excerpt ) {
			return wp_strip_all_tags( $excerpt );
		}
	}

	if ( is_category() ) {
		$description = category_description();
		if ( $description ) {
			return wp_strip_all_tags( $description );
		}
	}

	if ( is_home() && ! is_front_page() ) {
		return __( 'Practical guidance on AI automation, website performance, social media operations, and app development.', 'inovantage' );
	}

	return inovantage_company( 'tagline' );
}

/**
 * Whether the current request should be excluded from search indexes.
 *
 * @return bool
 */
function inovantage_is_noindex() {
	if ( is_404() ) {
		return true;
	}
	if ( is_page( 'thank-you' ) ) {
		return true;
	}
	if ( ! get_option( 'blog_public' ) ) {
		return true;
	}
	return false;
}

/**
 * Resolves the canonical URL for the current request.
 *
 * @return string
 */
function inovantage_canonical_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_singular() ) {
		return get_permalink();
	}
	if ( is_home() ) {
		$page_for_posts = (int) get_option( 'page_for_posts' );
		if ( $page_for_posts ) {
			return get_permalink( $page_for_posts );
		}
	}
	if ( is_category() ) {
		return get_category_link( get_queried_object_id() );
	}
	global $wp;
	return home_url( add_query_arg( array(), $wp->request ) . '/' );
}

/**
 * Resolves the social share image for the current request.
 *
 * @return string
 */
function inovantage_social_image() {
	if ( is_singular() && has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		if ( $image ) {
			return $image[0];
		}
	}
	return INOVANTAGE_URI . '/assets/images/social-card.png';
}

/**
 * Organization structured data shared across every page.
 *
 * @return array
 */
function inovantage_organization_schema() {
	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Organization',
		'name'        => inovantage_company( 'name' ),
		'legalName'   => inovantage_company( 'legal_name' ),
		'url'         => home_url( '/' ),
		'logo'        => INOVANTAGE_URI . '/assets/images/inovantage-logo-blue.png',
		'email'       => inovantage_company( 'email' ),
		'description' => inovantage_company( 'tagline' ),
		'areaServed'  => array( 'GB', 'US' ),
	);

	if ( inovantage_company( 'phone' ) ) {
		$schema['telephone'] = inovantage_company( 'phone' );
	}
	if ( inovantage_company( 'company_number' ) ) {
		$schema['identifier'] = inovantage_company( 'company_number' );
	}

	$address = inovantage_registered_address();
	if ( $address ) {
		$schema['address'] = array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => inovantage_company( 'address_street' ),
			'addressLocality' => inovantage_company( 'address_locality' ),
			'addressRegion'   => inovantage_company( 'address_region' ),
			'postalCode'      => inovantage_company( 'address_postcode' ),
			'addressCountry'  => inovantage_company( 'address_country' ),
		);
	}

	$same_as = array_filter(
		array(
			inovantage_company( 'linkedin' ),
			inovantage_company( 'instagram' ),
			inovantage_company( 'facebook' ),
			inovantage_company( 'x' ),
		)
	);
	if ( $same_as ) {
		$schema['sameAs'] = array_values( $same_as );
	}

	return $schema;
}

/**
 * BlogPosting structured data for a single insight article.
 *
 * @param int $post_id
 * @return array
 */
function inovantage_article_schema( $post_id ) {
	$schema = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BlogPosting',
		'headline'        => get_the_title( $post_id ),
		'description'     => wp_strip_all_tags( get_the_excerpt( $post_id ) ),
		'datePublished'   => get_the_date( 'c', $post_id ),
		'dateModified'    => get_the_modified_date( 'c', $post_id ),
		'author'          => array(
			'@type' => 'Organization',
			'name'  => get_the_author_meta( 'display_name', get_post_field( 'post_author', $post_id ) ) ?: inovantage_company( 'name' ),
		),
		'publisher'       => array(
			'@type' => 'Organization',
			'name'  => inovantage_company( 'name' ),
			'logo'  => array(
				'@type' => 'ImageObject',
				'url'   => INOVANTAGE_URI . '/assets/images/inovantage-logo-blue.png',
			),
		),
		'mainEntityOfPage' => get_permalink( $post_id ),
	);

	if ( has_post_thumbnail( $post_id ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
		if ( $image ) {
			$schema['image'] = $image[0];
		}
	}

	return $schema;
}

/**
 * Prints every <head> SEO tag: meta description, robots, canonical,
 * Open Graph, Twitter card and JSON-LD structured data.
 */
function inovantage_head_seo() {
	$description = inovantage_meta_description();
	$canonical   = inovantage_canonical_url();
	$image       = inovantage_social_image();
	$site_name   = inovantage_company( 'name' );
	$title       = wp_get_document_title();
	$robots      = inovantage_is_noindex() ? 'noindex,nofollow' : 'index,follow,max-image-preview:large';
	$type        = is_singular( 'post' ) ? 'article' : 'website';

	echo "\n" . '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta name="theme-color" content="#07121f">' . "\n";
	echo '<meta name="robots" content="' . esc_attr( $robots ) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";

	echo '<meta property="og:type" content="' . esc_attr( $type ) . '">' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";

	$schema_list   = array( inovantage_organization_schema() );
	if ( is_singular( 'post' ) ) {
		$schema_list[] = inovantage_article_schema( get_the_ID() );
	}
	$schema_output = count( $schema_list ) === 1 ? $schema_list[0] : $schema_list;

	echo '<script type="application/ld+json">' . wp_json_encode( $schema_output ) . '</script>' . "\n";
}
add_action( 'wp_head', 'inovantage_head_seo', 1 );

// Avoid duplicate canonical tags: we print our own above.
remove_action( 'wp_head', 'rel_canonical' );

/**
 * Belt-and-braces noindex for the thank-you page and 404s, in case a
 * caching layer or SEO plugin reads the classic robots meta tag filter.
 */
add_filter(
	'wp_robots',
	function ( $robots ) {
		if ( inovantage_is_noindex() ) {
			$robots['noindex']  = true;
			$robots['nofollow'] = true;
		}
		return $robots;
	}
);
