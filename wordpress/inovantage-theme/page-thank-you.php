<?php
/**
 * Template Name: Thank You
 *
 * Marked noindex via inc/seo.php (inovantage_is_noindex()).
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="section success-state">
	<div class="container">
		<div class="state-card">
			<span class="state-icon"><?php inovantage_icon_e( 'check' ); ?></span>
			<p class="eyebrow"><?php esc_html_e( 'Message received', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Thank you.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Your project enquiry has been submitted. A member of the Inovantage team can review the details and respond using the email address you provided.', 'inovantage' ); ?></p>
			<div class="button-row" style="justify-content:center">
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'inovantage' ); ?></a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'Read our insights', 'inovantage' ); ?></a>
			</div>
		</div>
	</div>
</section>

	<?php
endwhile;

get_footer();
?>
