<?php
/**
 * 404 template — matches the approved not-found design. Marked noindex
 * via inc/seo.php (inovantage_is_noindex()).
 */

get_header();
?>

<section class="section not-found">
	<div class="container">
		<div class="state-card">
			<span class="state-icon"><?php inovantage_icon_e( 'web' ); ?></span>
			<p class="eyebrow"><?php esc_html_e( '404 error', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'That page is not here.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'The address may be incorrect, or the page may have moved.', 'inovantage' ); ?></p>
			<div class="button-row" style="justify-content:center">
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go to the homepage', 'inovantage' ); ?></a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Inovantage', 'inovantage' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
