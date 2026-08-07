<?php
/**
 * Safely provisions the required WordPress Pages, the Insights posts,
 * categories, the static front page/posts page settings and the primary
 * navigation menu when the theme is activated.
 *
 * Every step here is idempotent and additive only:
 *  - pages/posts are looked up by slug (and parent) before creating
 *  - nothing is ever deleted or overwritten if it already exists
 *  - running this more than once (e.g. re-activating the theme) is safe
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Finds an existing page/post by slug (and, for pages, parent) or creates
 * it. Never overwrites existing content.
 *
 * @param string $post_type
 * @param string $slug
 * @param string $title
 * @param int    $parent
 * @return int Post ID.
 */
function inovantage_get_or_create( $post_type, $slug, $title, $parent = 0, $excerpt = '' ) {
	$existing = get_posts(
		array(
			'post_type'      => $post_type,
			'name'           => $slug,
			'post_parent'    => $parent,
			'post_status'    => 'any',
			'numberposts'    => 1,
			'fields'         => 'ids',
			'suppress_filters' => true,
		)
	);

	if ( ! empty( $existing ) ) {
		return (int) $existing[0];
	}

	return wp_insert_post(
		array(
			'post_type'    => $post_type,
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_excerpt' => $excerpt,
			'post_status'  => 'publish',
			'post_parent'  => $parent,
			'post_author'  => inovantage_default_author_id(),
		),
		true
	);
}

/**
 * The first administrator account, used as the author for auto-created
 * content. Falls back to user ID 1 (the account created during install).
 *
 * @return int
 */
function inovantage_default_author_id() {
	$admins = get_users(
		array(
			'role'    => 'administrator',
			'number'  => 1,
			'orderby' => 'ID',
			'order'   => 'ASC',
			'fields'  => 'ID',
		)
	);
	return ! empty( $admins ) ? (int) $admins[0] : 1;
}

/**
 * Creates the required pages (if missing), assigns their bespoke
 * templates, and configures the static front page / posts page.
 */
function inovantage_bootstrap_pages() {
	$home_id     = inovantage_get_or_create( 'page', 'home', __( 'Home', 'inovantage' ), 0, __( 'Inovantage helps ambitious businesses automate repetitive work, build high-performing websites, manage social media with approval controls, and launch practical web and mobile apps.', 'inovantage' ) );
	$services_id = inovantage_get_or_create( 'page', 'services', __( 'Services', 'inovantage' ), 0, __( 'Explore Inovantage services across AI automation, website design, social media management, and app development.', 'inovantage' ) );
	$work_id     = inovantage_get_or_create( 'page', 'work', __( 'Solutions', 'inovantage' ), 0, __( 'Explore examples of the digital systems Inovantage can design: automated lead operations, approval-led content engines, and customer portals.', 'inovantage' ) );
	$insights_id = inovantage_get_or_create( 'page', 'insights', __( 'Insights', 'inovantage' ), 0, __( 'Practical guidance on AI automation, website performance, social media operations, and app development.', 'inovantage' ) );
	$about_id    = inovantage_get_or_create( 'page', 'about', __( 'About', 'inovantage' ), 0, __( 'A practical digital partner focused on useful automation, clear communication, thoughtful design, and dependable delivery.', 'inovantage' ) );
	$contact_id  = inovantage_get_or_create( 'page', 'contact', __( 'Contact', 'inovantage' ), 0, __( 'Tell Inovantage what you want to improve, build, or automate. Start with a clear, no-pressure discovery conversation.', 'inovantage' ) );
	$privacy_id  = inovantage_get_or_create( 'page', 'privacy', __( 'Privacy Notice', 'inovantage' ), 0, __( 'How Inovantage handles personal information submitted through this website.', 'inovantage' ) );
	$cookies_id  = inovantage_get_or_create( 'page', 'cookies', __( 'Cookie Notice', 'inovantage' ), 0, __( 'Information about cookies and local storage used by the Inovantage website.', 'inovantage' ) );
	$terms_id    = inovantage_get_or_create( 'page', 'terms', __( 'Website Terms', 'inovantage' ), 0, __( 'Terms governing use of the Inovantage website.', 'inovantage' ) );
	$thanks_id   = inovantage_get_or_create( 'page', 'thank-you', __( 'Thank You', 'inovantage' ), 0, __( 'Thank you for contacting Inovantage.', 'inovantage' ) );

	$ai_id     = inovantage_get_or_create( 'page', 'ai-automation', __( 'AI Automation', 'inovantage' ), $services_id, __( 'Practical AI automation for lead handling, customer support, reporting, data entry, content operations, and connected business workflows.', 'inovantage' ) );
	$web_id    = inovantage_get_or_create( 'page', 'website-design', __( 'Website Design', 'inovantage' ), $services_id, __( 'Fast, accessible, conversion-focused websites designed around your brand, customers, content, and growth goals.', 'inovantage' ) );
	$social_id = inovantage_get_or_create( 'page', 'social-media-management', __( 'Social Media Management', 'inovantage' ), $services_id, __( 'Strategy, content planning, design, captions, approval workflows, scheduling, community support, and clear performance reporting.', 'inovantage' ) );
	$app_id    = inovantage_get_or_create( 'page', 'app-development', __( 'App Development', 'inovantage' ), $services_id, __( 'From discovery and prototype to production, Inovantage builds practical apps, portals, dashboards, and internal tools.', 'inovantage' ) );

	$templates = array(
		$services_id => 'page-services.php',
		$work_id     => 'page-work.php',
		$about_id    => 'page-about.php',
		$contact_id  => 'page-contact.php',
		$privacy_id  => 'page-privacy.php',
		$cookies_id  => 'page-cookies.php',
		$terms_id    => 'page-terms.php',
		$thanks_id   => 'page-thank-you.php',
		$ai_id       => 'page-ai-automation.php',
		$web_id      => 'page-website-design.php',
		$social_id   => 'page-social-media-management.php',
		$app_id      => 'page-app-development.php',
	);

	foreach ( $templates as $post_id => $template ) {
		if ( $post_id && ! is_wp_error( $post_id ) ) {
			$current = get_post_meta( $post_id, '_wp_page_template', true );
			if ( $current !== $template ) {
				update_post_meta( $post_id, '_wp_page_template', $template );
			}
		}
	}

	// Configure the static front page and the page used for the Insights
	// (Articles & Guides) archive, without disturbing any other setting.
	if ( 'page' !== get_option( 'show_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
	}
	if ( (int) get_option( 'page_on_front' ) !== (int) $home_id ) {
		update_option( 'page_on_front', $home_id );
	}
	if ( (int) get_option( 'page_for_posts' ) !== (int) $insights_id ) {
		update_option( 'page_for_posts', $insights_id );
	}
}

/**
 * Creates the Insights categories used by the approved content.
 */
function inovantage_bootstrap_categories() {
	$categories = array( 'AI Automation', 'Website Design', 'Social Media', 'App Development', 'Digital Growth' );
	foreach ( $categories as $name ) {
		if ( ! term_exists( $name, 'category' ) ) {
			wp_insert_term( $name, 'category' );
		}
	}
}

/**
 * Seeds the four approved insight articles as WordPress Posts, if a post
 * with that slug does not already exist. Every future article is created
 * and managed entirely through wp-admin (Posts -> Add New) using the
 * normal Draft -> review -> Publish workflow.
 */
function inovantage_bootstrap_insight_posts() {
	$seed_dir = INOVANTAGE_DIR . '/inc/seed-content';

	$posts = array(
		array(
			'slug'        => 'seven-business-processes-to-automate-first',
			'title'       => 'Seven business processes worth automating first',
			'date'        => '2026-07-30 09:00:00',
			'excerpt'     => 'A practical way to identify repetitive, high-volume work that is suitable for automation without removing essential human judgement.',
			'category'    => 'AI Automation',
			'file'        => 'seven-business-processes-to-automate-first.html',
		),
		array(
			'slug'        => 'website-brief-checklist',
			'title'       => 'The website brief checklist that prevents expensive rework',
			'date'        => '2026-07-22 09:00:00',
			'excerpt'     => 'Define the audience, offer, content, actions and technical constraints before website design begins with this practical briefing checklist.',
			'category'    => 'Website Design',
			'file'        => 'website-brief-checklist.html',
		),
		array(
			'slug'        => 'social-media-approval-workflow',
			'title'       => 'A simple social media approval workflow for busy teams',
			'date'        => '2026-07-15 09:00:00',
			'excerpt'     => 'Use a clear draft, review, approval and scheduling process to publish social content consistently without losing control of your brand.',
			'category'    => 'Social Media',
			'file'        => 'social-media-approval-workflow.html',
		),
		array(
			'slug'        => 'how-to-choose-the-right-mvp',
			'title'       => 'How to choose the right MVP for a business app',
			'date'        => '2026-07-08 09:00:00',
			'excerpt'     => 'Define a focused minimum viable product by choosing one user, one important task and the smallest evidence-producing release.',
			'category'    => 'App Development',
			'file'        => 'how-to-choose-the-right-mvp.html',
		),
	);

	foreach ( $posts as $post ) {
		$existing = get_posts(
			array(
				'post_type'   => 'post',
				'name'        => $post['slug'],
				'post_status' => 'any',
				'numberposts' => 1,
				'fields'      => 'ids',
			)
		);
		if ( ! empty( $existing ) ) {
			continue;
		}

		$content_path = $seed_dir . '/' . $post['file'];
		if ( ! file_exists( $content_path ) ) {
			continue;
		}
		$content = file_get_contents( $content_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		$post_id = wp_insert_post(
			array(
				'post_type'    => 'post',
				'post_name'    => $post['slug'],
				'post_title'   => $post['title'],
				'post_excerpt' => $post['excerpt'],
				'post_content' => wp_kses_post( $content ),
				'post_status'  => 'publish',
				'post_date'    => $post['date'],
				'post_author'  => inovantage_default_author_id(),
			),
			true
		);

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			$term = term_exists( $post['category'], 'category' );
			if ( $term ) {
				wp_set_post_categories( $post_id, array( (int) $term['term_id'] ) );
			}
		}
	}
}

/**
 * Creates the "Inovantage Primary" navigation menu (Services, Solutions,
 * Articles & Guides, About) if no menu is already assigned to the
 * "primary" theme location, and assigns it. "Start a project" is
 * rendered separately in header.php as a call-to-action button, not as a
 * menu item, matching the approved navigation. No Home item is added.
 */
function inovantage_bootstrap_menu() {
	$locations = get_nav_menu_locations();
	if ( ! empty( $locations['primary'] ) && wp_get_nav_menu_object( $locations['primary'] ) ) {
		return;
	}

	$menu_name = __( 'Inovantage Primary', 'inovantage' );
	$menu_id   = 0;
	$existing  = wp_get_nav_menu_object( $menu_name );
	if ( $existing ) {
		$menu_id = $existing->term_id;
	} else {
		$created = wp_create_nav_menu( $menu_name );
		if ( ! is_wp_error( $created ) ) {
			$menu_id = $created;
		}
	}

	if ( ! $menu_id ) {
		return;
	}

	$items = array(
		array( __( 'Services', 'inovantage' ), home_url( '/services/' ) ),
		array( __( 'Solutions', 'inovantage' ), home_url( '/work/' ) ),
		array( __( 'Articles & Guides', 'inovantage' ), home_url( '/insights/' ) ),
		array( __( 'About', 'inovantage' ), home_url( '/about/' ) ),
	);

	$existing_items = wp_get_nav_menu_items( $menu_id );
	if ( empty( $existing_items ) ) {
		foreach ( $items as $position => $item ) {
			list( $label, $url ) = $item;
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => $label,
					'menu-item-url'       => $url,
					'menu-item-status'    => 'publish',
					'menu-item-position'  => $position + 1,
				)
			);
		}
	}

	$locations             = get_nav_menu_locations();
	$locations['primary']  = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Runs the full, idempotent content bootstrap on theme activation.
 */
function inovantage_bootstrap_content() {
	inovantage_bootstrap_pages();
	inovantage_bootstrap_categories();
	inovantage_bootstrap_insight_posts();
	inovantage_bootstrap_menu();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'inovantage_bootstrap_content' );
