<?php
/**
 * Template Name: Legal — Website Terms
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
			<h1><?php esc_html_e( 'Website terms', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'These terms apply to general use of the Inovantage public website.', 'inovantage' ); ?></p>
		</div>
		<aside class="hero-aside">
			<strong><?php esc_html_e( 'Review before launch', 'inovantage' ); ?></strong>
			<p><?php esc_html_e( 'Confirm the correct legal entity, jurisdiction and liability wording for your business. Client services should be governed by a separate proposal, statement of work or contract.', 'inovantage' ); ?></p>
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
			<p>
				<?php
				printf(
					/* translators: 1: legal name, 2: company number, 3: registered office */
					esc_html__( 'This website is operated by %1$s (company number %2$s), whose registered office is at %3$s.', 'inovantage' ),
					esc_html( inovantage_company( 'legal_name' ) ),
					esc_html( inovantage_company( 'company_number' ) ),
					esc_html( inovantage_registered_address() )
				);
				?>
			</p>

			<h2 id="acceptance"><?php esc_html_e( '1. Using this website', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'By using this website, you agree to use it lawfully and not to interfere with its operation, attempt unauthorised access, introduce malicious code, scrape it in a harmful manner or use its content to mislead others.', 'inovantage' ); ?></p>

			<h2 id="information"><?php esc_html_e( '2. General information only', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Website content is provided for general information and does not constitute legal, financial, regulatory or other professional advice. You should obtain advice appropriate to your circumstances before relying on information for an important decision.', 'inovantage' ); ?></p>

			<h2 id="services"><?php esc_html_e( '3. Services and enquiries', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Submitting an enquiry does not create a client relationship or require either party to proceed. Any project will be subject to a separate written agreement covering scope, responsibilities, fees, intellectual property, confidentiality, data protection, acceptance and support.', 'inovantage' ); ?></p>

			<h2 id="accuracy"><?php esc_html_e( '4. Accuracy and availability', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'We aim to keep the website useful and accurate but do not guarantee that every page will always be complete, current, error-free or available. We may change, suspend or remove content without notice.', 'inovantage' ); ?></p>

			<h2 id="ip"><?php esc_html_e( '5. Intellectual property', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( "Unless stated otherwise, the website's original text, design, code and branding are owned by or licensed to the website operator. You may view and share links to public pages for lawful purposes. You may not reproduce substantial content, remove ownership notices or present the material as your own without permission.", 'inovantage' ); ?></p>

			<h2 id="links"><?php esc_html_e( '6. External links', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Links to third-party websites are provided for convenience. We do not control those websites and are not responsible for their content, security, availability or privacy practices.', 'inovantage' ); ?></p>

			<h2 id="liability"><?php esc_html_e( '7. Liability', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Nothing in these terms excludes liability that cannot legally be excluded. Subject to that, the website operator is not responsible for indirect or consequential loss arising solely from general use of, or inability to use, this public website. The final clause should be reviewed for the legal structure and jurisdiction of your business.', 'inovantage' ); ?></p>

			<h2 id="law"><?php esc_html_e( '8. Governing law', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Before launch, replace this paragraph with the governing law and courts appropriate to the legal entity operating Inovantage. For a business established in England and Wales, a common formulation is that these terms are governed by the laws of England and Wales and disputes are subject to the jurisdiction of its courts.', 'inovantage' ); ?></p>

			<h2 id="contact"><?php esc_html_e( '9. Contact', 'inovantage' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: 1: contact email link */
					esc_html__( 'Questions about these terms can be sent to %1$s.', 'inovantage' ),
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
