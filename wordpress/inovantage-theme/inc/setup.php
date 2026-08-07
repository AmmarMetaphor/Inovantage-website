<?php
/**
 * Core theme setup: supports, menus, scripts and styles.
 */

if (!defined('ABSPATH')) {
	exit;
}

function inovantage_setup() {
	load_theme_textdomain('inovantage', INOVANTAGE_DIR . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support(
		'html5',
		array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style')
	);
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 646,
			'width'       => 2048,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __('Primary Navigation', 'inovantage'),
			'footer-services' => __('Footer — Services', 'inovantage'),
			'footer-company'  => __('Footer — Company', 'inovantage'),
		)
	);
}
add_action('after_setup_theme', 'inovantage_setup');

/**
 * Enqueue the theme stylesheet and script.
 */
function inovantage_scripts() {
	wp_enqueue_style(
		'inovantage-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'inovantage-main',
		INOVANTAGE_URI . '/assets/js/main.js',
		array(),
		INOVANTAGE_VERSION,
		true
	);
}
add_action('wp_enqueue_scripts', 'inovantage_scripts');

/**
 * Register the theme's widget areas (used only if a template opts in).
 */
function inovantage_widgets_init() {
	register_sidebar(
		array(
			'name'          => __('Insights Sidebar', 'inovantage'),
			'id'            => 'insights-sidebar',
			'description'   => __('Optional widgets shown on insight articles.', 'inovantage'),
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'inovantage_widgets_init');

/**
 * Trim the default WordPress admin bar padding hack and keep output lean.
 */
function inovantage_body_classes( $classes ) {
	if ( is_page_template( array( 'page-contact.php' ) ) ) {
		$classes[] = 'has-contact-form';
	}
	return $classes;
}
add_filter('body_class', 'inovantage_body_classes');

/**
 * Limit excerpt length so it reads well as a meta description fallback.
 */
function inovantage_excerpt_length( $length ) {
	return 30;
}
add_filter('excerpt_length', 'inovantage_excerpt_length');
