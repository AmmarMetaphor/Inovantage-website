<?php
/**
 * The header for the Inovantage theme.
 */
?><!doctype html>
<html lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/favicon-32.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/favicon-192.png">
<link rel="apple-touch-icon" href="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/apple-touch-icon.png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to main content', 'inovantage' ); ?></a>

<header class="site-header" data-header>
	<div class="container header-inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( inovantage_company( 'name' ) . ' home' ); ?>">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/inovantage-logo.png" width="2048" height="646" alt="<?php echo esc_attr( inovantage_company( 'name' ) ); ?>">
		</a>
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" data-menu-toggle>
			<span class="menu-open-icon"><?php inovantage_icon_e( 'menu' ); ?></span>
			<span class="menu-close-icon"><?php inovantage_icon_e( 'close' ); ?></span>
			<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'inovantage' ); ?></span>
		</button>
		<nav id="primary-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'inovantage' ); ?>" data-menu>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'menu_class'     => 'menu',
					'fallback_cb'    => 'inovantage_nav_fallback',
				)
			);
			?>
			<a class="button button-small" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a project', 'inovantage' ); ?></a>
		</nav>
	</div>
</header>
<main id="main-content">
