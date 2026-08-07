<?php
/**
 * Inovantage theme bootstrap.
 */

if (!defined('ABSPATH')) {
	exit;
}

define('INOVANTAGE_VERSION', '1.0.0');
define('INOVANTAGE_DIR', get_template_directory());
define('INOVANTAGE_URI', get_template_directory_uri());

require_once INOVANTAGE_DIR . '/inc/company-data.php';
require_once INOVANTAGE_DIR . '/inc/setup.php';
require_once INOVANTAGE_DIR . '/inc/template-tags.php';
require_once INOVANTAGE_DIR . '/inc/seo.php';
require_once INOVANTAGE_DIR . '/inc/contact-form.php';
require_once INOVANTAGE_DIR . '/inc/content-setup.php';
require_once INOVANTAGE_DIR . '/inc/customizer.php';
