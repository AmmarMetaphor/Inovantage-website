<?php
/**
 * Template Name: Legal — Privacy Notice
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
			<h1><?php esc_html_e( 'Privacy notice', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'This notice explains how information submitted through the Inovantage website is collected, used and protected.', 'inovantage' ); ?></p>
		</div>
		<aside class="hero-aside">
			<strong><?php esc_html_e( 'Questions about your information', 'inovantage' ); ?></strong>
			<p>
				<?php
				printf(
					/* translators: 1: contact email link */
					esc_html__( 'Privacy enquiries, including requests about your personal information, can be sent to %1$s.', 'inovantage' ),
					'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>'
				);
				?>
			</p>
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

			<h2 id="who-we-are"><?php esc_html_e( '1. Who we are', 'inovantage' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: 1: legal name, 2: company number, 3: registered office, 4: contact email link */
					esc_html__( 'This website is operated by %1$s (company number %2$s), whose registered office is at %3$s. %1$s is the organisation responsible for deciding how personal information submitted through this site is used. You can contact us at %4$s.', 'inovantage' ),
					esc_html( inovantage_company( 'legal_name' ) ),
					esc_html( inovantage_company( 'company_number' ) ),
					esc_html( inovantage_registered_address() ),
					'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>'
				);
				?>
			</p>
			<h2 id="information"><?php esc_html_e( '2. Information we collect', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'When you submit an enquiry through this website, we may collect your name, email address, company, the area you would like to improve, an estimated investment range if you choose to share one, your preferred start timing and the information you include in your message. We may also receive technical information normally processed when you visit a website, such as IP address, browser type, device information and server logs.', 'inovantage' ); ?></p>
			<p><?php esc_html_e( 'Please do not send passwords, payment card information, medical records or other highly sensitive information through the contact form.', 'inovantage' ); ?></p>

			<h2 id="use"><?php esc_html_e( '3. How we use information', 'inovantage' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'To read and respond to enquiries.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'To understand whether and how we may be able to provide a service.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'To prepare proposals, estimates or next-step recommendations you request.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'To protect the website, investigate misuse and maintain appropriate records.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'To comply with legal, regulatory, tax or accounting obligations.', 'inovantage' ); ?></li>
			</ul>

			<h2 id="lawful-bases"><?php esc_html_e( '4. Lawful bases', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Depending on the situation, processing may be necessary to take steps at your request before entering a contract, to perform a contract, to comply with a legal obligation, or for legitimate interests such as responding to business enquiries and protecting the website. Where consent is the appropriate basis, you may withdraw it for future processing.', 'inovantage' ); ?></p>

			<h2 id="sharing"><?php esc_html_e( '5. Service providers and sharing', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Enquiries submitted through the contact form on this website are delivered to us by email and handled through the hosting and email services we use to operate the website and respond to you.', 'inovantage' ); ?></p>
			<p><?php esc_html_e( 'We do not sell personal information. Information may be disclosed where necessary to service providers working under appropriate terms, professional advisers, a potential business successor, or authorities where required by law.', 'inovantage' ); ?></p>

			<h2 id="international"><?php esc_html_e( '6. International processing', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Some service providers may process information outside the United Kingdom. Where that happens, we rely on appropriate safeguards, such as an adequacy regulation or approved contractual protections.', 'inovantage' ); ?></p>

			<h2 id="retention"><?php esc_html_e( '7. Retention', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'We keep enquiry information only as long as reasonably necessary for the purpose it was collected, including follow-up, contractual, legal and record-keeping needs, and we review stored enquiries periodically. Information that is no longer needed is deleted.', 'inovantage' ); ?></p>

			<h2 id="security"><?php esc_html_e( '8. Security', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'We use reasonable technical and organisational measures to protect information. No internet transmission or storage system can be guaranteed completely secure, so please avoid sending unnecessary sensitive information.', 'inovantage' ); ?></p>

			<h2 id="rights"><?php esc_html_e( '9. Your rights', 'inovantage' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: 1: contact email link */
					esc_html__( 'Depending on the applicable law, you may have rights to ask for access, correction, deletion, restriction, objection, portability or withdrawal of consent. To make a request, email %1$s. We may need to verify your identity before responding.', 'inovantage' ),
					'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>'
				);
				?>
			</p>

			<h2 id="complaints"><?php esc_html_e( '10. Complaints', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( "Please contact us first so we can try to resolve your concern. You may also have the right to complain to the UK Information Commissioner's Office through its official complaints service.", 'inovantage' ); ?></p>

			<h2 id="changes"><?php esc_html_e( '11. Changes to this notice', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'We may update this notice when our website, services, providers or legal obligations change. The date at the top shows the latest version.', 'inovantage' ); ?></p>
		</article>
	</div>
</section>

	<?php
endwhile;

get_footer();
?>
