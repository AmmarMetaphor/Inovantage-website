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
			<p class="lede"><?php esc_html_e( 'The starter website does not include advertising or visitor analytics cookies by default.', 'inovantage' ); ?></p>
		</div>
		<aside class="hero-aside">
			<strong><?php esc_html_e( 'Review when adding tools', 'inovantage' ); ?></strong>
			<p><?php esc_html_e( 'If you add analytics, embedded video, chat, advertising pixels or other third-party features, reassess consent requirements and update this notice before enabling them.', 'inovantage' ); ?></p>
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
			<p><strong><?php esc_html_e( 'Last updated:', 'inovantage' ); ?></strong> <?php esc_html_e( '3 August 2026', 'inovantage' ); ?></p>

			<h2 id="what"><?php esc_html_e( '1. What cookies are', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Cookies are small text files stored by a browser. Similar technologies include local storage and session storage. They can support essential features, remember choices, measure use or enable third-party services.', 'inovantage' ); ?></p>

			<h2 id="public-site"><?php esc_html_e( '2. Public website', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'The supplied public website does not intentionally set analytics, advertising or personalisation cookies. Standard hosting infrastructure may process technical request data and security signals without placing a non-essential cookie in your browser.', 'inovantage' ); ?></p>

			<h2 id="admin"><?php esc_html_e( '3. Content administration', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Authorised editors who use the private content manager at /admin/ may use authentication storage or cookies provided by Netlify Identity, Git Gateway or the connected Git provider. These features are necessary for signing in and managing content and are not intended for ordinary public visitors.', 'inovantage' ); ?></p>

			<h2 id="third-parties"><?php esc_html_e( '4. Third-party content', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'The starter site avoids embedded maps, video players, social feeds and chat widgets. Adding one of these services may cause that provider to set cookies or collect device information. Review the provider, update this notice and implement consent controls where required before deployment.', 'inovantage' ); ?></p>

			<h2 id="controls"><?php esc_html_e( '5. Browser controls', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'You can use browser settings to delete or block cookies. Blocking essential authentication storage may prevent the content manager from working for editors.', 'inovantage' ); ?></p>

			<h2 id="changes"><?php esc_html_e( '6. Changes', 'inovantage' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: 1: contact email link */
					esc_html__( 'This notice should be reviewed whenever the site\'s tracking, embeds, authentication or marketing tools change. Contact %1$s with questions.', 'inovantage' ),
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
