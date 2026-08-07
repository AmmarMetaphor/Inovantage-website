<?php
/**
 * The footer for the Inovantage theme.
 */

$inovantage_socials = array(
	'LinkedIn'  => inovantage_company( 'linkedin' ),
	'Instagram' => inovantage_company( 'instagram' ),
	'Facebook'  => inovantage_company( 'facebook' ),
	'X'         => inovantage_company( 'x' ),
);
$inovantage_socials = array_filter( $inovantage_socials );
$inovantage_phone   = inovantage_company( 'phone' );
$inovantage_address = inovantage_registered_address();
?>
</main>
<footer class="site-footer">
	<div class="container footer-grid">
		<div class="footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( inovantage_company( 'name' ) . ' home' ); ?>">
				<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/inovantage-logo.png" width="2048" height="646" alt="<?php echo esc_attr( inovantage_company( 'name' ) ); ?>">
			</a>
			<p><?php echo esc_html( inovantage_company( 'tagline' ) ); ?></p>
			<?php if ( ! empty( $inovantage_socials ) ) : ?>
				<div class="footer-social">
					<?php foreach ( $inovantage_socials as $label => $url ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $label ); ?>">
							<?php if ( 'Facebook' === $label ) : ?>
								<span class="social-icon"><?php inovantage_icon_e( 'facebook' ); ?></span>
							<?php else : ?>
								<?php echo esc_html( $label ); ?>
							<?php endif; ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<div>
			<h2><?php esc_html_e( 'Services', 'inovantage' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/services/ai-automation/' ) ); ?>"><?php esc_html_e( 'AI automation', 'inovantage' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/website-design/' ) ); ?>"><?php esc_html_e( 'Website design', 'inovantage' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'Social media', 'inovantage' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/app-development/' ) ); ?>"><?php esc_html_e( 'App development', 'inovantage' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h2><?php esc_html_e( 'Company', 'inovantage' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'inovantage' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>"><?php esc_html_e( 'Work', 'inovantage' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'Insights', 'inovantage' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'inovantage' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h2><?php esc_html_e( 'Contact', 'inovantage' ); ?></h2>
			<address>
				<a href="mailto:<?php echo esc_attr( inovantage_company( 'email' ) ); ?>"><?php echo esc_html( inovantage_company( 'email' ) ); ?></a>
				<?php if ( $inovantage_phone ) : ?>
					<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $inovantage_phone ) ); ?>"><?php echo esc_html( $inovantage_phone ); ?></a>
				<?php endif; ?>
				<span><?php echo esc_html( inovantage_company( 'location' ) ?: 'United Kingdom' ); ?></span>
				<?php if ( $inovantage_address ) : ?>
					<span><?php esc_html_e( 'Registered office:', 'inovantage' ); ?> <?php echo esc_html( $inovantage_address ); ?></span>
				<?php endif; ?>
				<?php if ( inovantage_company( 'company_number' ) ) : ?>
					<span><?php esc_html_e( 'Company number', 'inovantage' ); ?> <?php echo esc_html( inovantage_company( 'company_number' ) ); ?></span>
				<?php endif; ?>
			</address>
		</div>
	</div>
	<div class="container footer-bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( inovantage_company( 'legal_name' ) ?: inovantage_company( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'inovantage' ); ?></p>
		<div>
			<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'inovantage' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>"><?php esc_html_e( 'Cookies', 'inovantage' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'inovantage' ); ?></a>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
