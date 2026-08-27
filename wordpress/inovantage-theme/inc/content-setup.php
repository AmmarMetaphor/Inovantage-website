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
	$home_id     = inovantage_get_or_create( 'page', 'home', __( 'Home', 'inovantage' ), 0, __( 'Inovantage is a connected B2B digital growth partner. AI automation, conversion-focused websites, managed content operations and business apps that increase capacity, improve conversion and support scalable growth.', 'inovantage' ) );

	/* The four service detail pages are children of the "services" page, so
	   that page has to stay in place for /services/<service>/ to keep
	   resolving. It carries no template of its own any more: the overview
	   moved to "solutions", and inovantage_legacy_redirects() sends
	   /services/ there permanently. */
	$services_id   = inovantage_get_or_create( 'page', 'services', __( 'Services', 'inovantage' ), 0, '' );
	$solutions_id  = inovantage_get_or_create( 'page', 'solutions', __( 'Connected Digital Solutions for B2B Growth', 'inovantage' ), 0, __( 'Connect a business challenge to the right solution: B2B AI automation, website design and development, social media management and business app development from Inovantage.', 'inovantage' ) );
	$cases_id      = inovantage_get_or_create( 'page', 'case-studies', __( 'Solutions in Practice', 'inovantage' ), 0, __( 'See how Inovantage designs connected digital systems that improve lead response, website conversion, content operations and scalable service delivery for B2B companies.', 'inovantage' ) );
	$insights_id = inovantage_get_or_create( 'page', 'insights', __( 'Insights for Digital Growth', 'inovantage' ), 0, __( 'Practical guidance for business leaders on automation, website conversion, content operations and application development, focused on confident digital investment decisions.', 'inovantage' ) );
	$about_id    = inovantage_get_or_create( 'page', 'about', __( 'About Inovantage', 'inovantage' ), 0, __( 'Inovantage is a connected digital partner for ambitious B2B businesses, improving customer journeys, operational capacity and scalable digital services.', 'inovantage' ) );
	$contact_id  = inovantage_get_or_create( 'page', 'contact', __( 'Book a Growth Consultation', 'inovantage' ), 0, __( 'Tell Inovantage what you want your business to achieve. Describe the current challenge and desired outcome, and we will recommend a practical next step.', 'inovantage' ) );
	$privacy_id  = inovantage_get_or_create( 'page', 'privacy', __( 'Privacy Notice', 'inovantage' ), 0, __( 'How Inovantage handles personal information submitted through this website.', 'inovantage' ) );
	$cookies_id  = inovantage_get_or_create( 'page', 'cookies', __( 'Cookie Notice', 'inovantage' ), 0, __( 'Information about cookies and local storage used by the Inovantage website.', 'inovantage' ) );
	$terms_id    = inovantage_get_or_create( 'page', 'terms', __( 'Website Terms', 'inovantage' ), 0, __( 'Terms governing use of the Inovantage website.', 'inovantage' ) );
	$thanks_id   = inovantage_get_or_create( 'page', 'thank-you', __( 'Thank You', 'inovantage' ), 0, __( 'Thank you for contacting Inovantage.', 'inovantage' ) );

	$ai_id     = inovantage_get_or_create( 'page', 'ai-automation', __( 'B2B AI Automation Services', 'inovantage' ), $services_id, __( 'B2B AI automation and workflow automation that helps teams respond to opportunities faster, reduce repeated administration and scale output without scaling repetitive work.', 'inovantage' ) );
	$web_id    = inovantage_get_or_create( 'page', 'website-design', __( 'B2B Website Design & Development', 'inovantage' ), $services_id, __( 'Conversion-focused website design and development for B2B companies: clear positioning, buyer-focused structure and credible digital experiences that generate qualified enquiries.', 'inovantage' ) );
	$social_id = inovantage_get_or_create( 'page', 'social-media-management', __( 'B2B Social Media Management', 'inovantage' ), $services_id, __( 'Managed B2B social media: strategy, content planning, production, stakeholder approval, scheduling and performance review that build visibility, credibility and demand.', 'inovantage' ) );
	$app_id    = inovantage_get_or_create( 'page', 'app-development', __( 'Business App Development', 'inovantage' ), $services_id, __( 'Business app development for B2B growth: customer portals, dashboards, internal tools and workflow applications that improve delivery, customer experience and operational efficiency.', 'inovantage' ) );

	$templates = array(
		$solutions_id => 'page-solutions.php',
		$cases_id     => 'page-case-studies.php',
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
			'title'       => 'Seven Business Processes That Could Be Limiting Your Capacity',
			'date'        => '2026-07-30 09:00:00',
			'excerpt'     => 'Identify the repetitive, high-volume processes that limit team capacity and learn where automation can create room to grow without removing essential human judgement.',
			'category'    => 'AI Automation',
			'file'        => 'seven-business-processes-to-automate-first.html',
		),
		array(
			'slug'        => 'website-brief-checklist',
			'title'       => 'How to Plan a B2B Website That Converts More Opportunities',
			'date'        => '2026-07-22 09:00:00',
			'excerpt'     => 'Plan a B2B website around audience, offer, content, actions and technical constraints so design decisions support conversion and prevent expensive rework.',
			'category'    => 'Website Design',
			'file'        => 'website-brief-checklist.html',
		),
		array(
			'slug'        => 'social-media-approval-workflow',
			'title'       => 'A Social Media Approval Workflow That Supports Consistent Growth',
			'date'        => '2026-07-15 09:00:00',
			'excerpt'     => 'Use a clear draft, review, approval and scheduling process to publish social media content consistently while keeping full control of your brand.',
			'category'    => 'Social Media',
			'file'        => 'social-media-approval-workflow.html',
		),
		array(
			'slug'        => 'how-to-choose-the-right-mvp',
			'title'       => 'How to Define an MVP That Can Prove Commercial Demand',
			'date'        => '2026-07-08 09:00:00',
			'excerpt'     => 'Define a focused minimum viable product by choosing one user and one important task, then building the smallest release that can prove commercial demand.',
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
 * Creates the "Inovantage Primary" navigation menu (Solutions, Solutions in
 * Practice, Articles & Guides, About) if no menu is already assigned to the
 * "primary" theme location, and assigns it. "Book a Consultation" is
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
		array( __( 'Solutions', 'inovantage' ), home_url( '/solutions/' ) ),
		array( __( 'Solutions in Practice', 'inovantage' ), home_url( '/case-studies/' ) ),
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
	inovantage_bootstrap_case_services();
	inovantage_bootstrap_categories();
	inovantage_bootstrap_insight_posts();
	inovantage_bootstrap_menu();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'inovantage_bootstrap_content' );
