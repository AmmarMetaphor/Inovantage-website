<?php
/**
 * Template Name: Legal — Cookie Notice
 */

get_header();
while ( have_posts() ) :
	the_post();
	$email = inovantage_company( 'email' );
	?>

<section class="page-hero">
	<div class="container page-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Legal', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Cookie notice', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'This website does not use advertising or visitor analytics cookies.', 'inovantage' ); ?></p>
		</div>
		<aside class="hero-aside">
			<strong><?php esc_html_e( 'If our tools change', 'inovantage' ); ?></strong>
			<p><?php esc_html_e( 'If analytics, embedded media or other third-party features are added in future, this notice will be updated and consent controls introduced where required.', 'inovantage' ); ?></p>
		</aside>
	</div>
</section>

<section class="section">
	<div class="container legal-layout">
		<nav class="legal-nav" aria-label="<?php esc_attr_e( 'Legal pages', 'inovantage' ); ?>">
			<strong><?php esc_html_e( 'Legal information', 'inovantage' ); ?></strong>
			<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy notice', 'inovantage' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>"><?php esc_html_e( 'Cookie notice', 'inovantage' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Website terms', 'inovantage' ); ?></a>
		</nav>
		<article class="prose">
			<p><strong><?php esc_html_e( 'Last updated:', 'inovantage' ); ?></strong> <?php esc_html_e( '27 August 2026', 'inovantage' ); ?></p>

			<h2 id="what"><?php esc_html_e( '1. What cookies are', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Cookies are small text files stored by a browser. Similar technologies include local storage and session storage. They can support essential features, remember choices, measure use or enable third-party services.', 'inovantage' ); ?></p>

			<h2 id="public-site"><?php esc_html_e( '2. Public website', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'The public pages of this website do not set analytics, advertising or personalisation cookies. Standard hosting infrastructure may process technical request data and security signals without placing a non-essential cookie in your browser.', 'inovantage' ); ?></p>

			<h2 id="admin"><?php esc_html_e( '3. Content administration', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Authorised editors who sign in to manage content use the authentication cookies required for signing in and editing. These are necessary for administration and are not used for ordinary public visitors.', 'inovantage' ); ?></p>

			<h2 id="third-parties"><?php esc_html_e( '4. Third-party content', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( "This website does not include embedded maps, video players, social feeds or chat widgets. Links to external services, such as social media profiles or WhatsApp, open on the provider's own website or app, where that provider's privacy and cookie practices apply.", 'inovantage' ); ?></p>

			<h2 id="controls"><?php esc_html_e( '5. Browser controls', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'You can use browser settings to delete or block cookies. Blocking essential authentication storage may prevent the content manager from working for editors.', 'inovantage' ); ?></p>

			<h2 id="changes"><?php esc_html_e( '6. Changes', 'inovantage' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: 1: contact email link */
					esc_html__( "We will update this notice if the website's cookies, storage or third-party tools change. Contact %1\$s with questions.", 'inovantage' ),
					'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>'
				);
				?>
			</p>
		</article>
	</div>
</section>

	<?php
endwhile;

get_footer();
?>
