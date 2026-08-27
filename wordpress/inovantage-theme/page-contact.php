<?php
/**
 * Template Name: Contact
 *
 * Renders the consultation enquiry form and posts it to admin-post.php, which
 * inc/contact-form.php processes (nonce + honeypot + sanitisation +
 * wp_mail()) before redirecting to /thank-you/.
 */

get_header();
while ( have_posts() ) :
	the_post();

	$contact_error = isset( $_GET['contact_error'] ) ? sanitize_key( wp_unslash( $_GET['contact_error'] ) ) : '';
	$error_message = $contact_error ? inovantage_contact_error_message( $contact_error ) : '';
	?>

<section class="page-hero consult-hero">
	<div class="container page-hero-grid consult-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Book a growth consultation', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Tell us what you want your business to achieve.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'You may want to generate more enquiries, improve conversion, automate repeated work, strengthen your digital presence or build a service that can scale. Describe the current situation and the outcome you want. You do not need to arrive with a technical specification.', 'inovantage' ); ?></p>
		</div>
		<div class="page-hero-visual">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/heroes/home-hero-orbital.webp" srcset="<?php echo esc_attr( sprintf( '%1$s/assets/images/heroes/home-hero-orbital-760.webp 760w, %1$s/assets/images/heroes/home-hero-orbital-1180.webp 1180w, %1$s/assets/images/heroes/home-hero-orbital.webp 1672w', INOVANTAGE_URI ) ); ?>" sizes="(max-width: 900px) 92vw, (max-width: 1400px) 45vw, 640px" width="1672" height="941" alt="" loading="eager" decoding="async">
		</div>
	</div>
</section>

<section class="section">
	<div class="container contact-grid">
		<div class="contact-details">
			<p class="eyebrow"><?php esc_html_e( 'Start with context', 'inovantage' ); ?></p>
			<h2><?php esc_html_e( 'A clear business challenge is enough to begin.', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'Helpful information includes:', 'inovantage' ); ?></p>
			<ul class="contact-help-list">
				<li><?php esc_html_e( 'What is happening today', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'Where time, opportunities or capacity are being lost', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'Who experiences the problem', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'What better performance would look like', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'Which systems or channels are currently involved', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'Any important timing requirements', 'inovantage' ); ?></li>
			</ul>
			<p><?php esc_html_e( 'After reviewing your enquiry, we will recommend a sensible next conversation or discovery step.', 'inovantage' ); ?></p>
			<p class="contact-tagline"><?php esc_html_e( 'Digital systems that move your business forward.', 'inovantage' ); ?></p>
		</div>

		<form class="contact-form" id="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="<?php echo esc_attr( INOVANTAGE_CONTACT_ACTION ); ?>">
			<?php wp_nonce_field( INOVANTAGE_CONTACT_ACTION, INOVANTAGE_CONTACT_NONCE ); ?>

			<?php if ( $error_message ) : ?>
				<p class="form-alert" role="alert"><?php echo esc_html( $error_message ); ?></p>
			<?php endif; ?>

			<p class="honeypot"><label><?php esc_html_e( 'Do not fill this out if you are human:', 'inovantage' ); ?> <input name="inovantage_hp_field" tabindex="-1" autocomplete="off"></label></p>

			<div class="form-grid">
				<div class="field"><label for="name"><?php esc_html_e( 'Name', 'inovantage' ); ?> <span aria-hidden="true">*</span></label><input id="name" name="name" type="text" autocomplete="name" required></div>
				<div class="field"><label for="email"><?php esc_html_e( 'Work email', 'inovantage' ); ?> <span aria-hidden="true">*</span></label><input id="email" name="email" type="email" autocomplete="email" required></div>
				<div class="field"><label for="company"><?php esc_html_e( 'Company', 'inovantage' ); ?></label><input id="company" name="company" type="text" autocomplete="organization"></div>
				<div class="field">
					<label for="service"><?php esc_html_e( 'Which area would you like to improve?', 'inovantage' ); ?> <span aria-hidden="true">*</span></label>
					<select id="service" name="service" required>
						<option value=""><?php esc_html_e( 'Select an area', 'inovantage' ); ?></option>
						<?php foreach ( inovantage_contact_service_options() as $option ) : ?>
							<option><?php echo esc_html( $option ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="field">
					<label for="budget"><?php esc_html_e( 'Estimated investment range (optional)', 'inovantage' ); ?></label>
					<select id="budget" name="budget">
						<option value=""><?php esc_html_e( 'Prefer not to say', 'inovantage' ); ?></option>
						<?php foreach ( inovantage_contact_budget_options() as $option ) : ?>
							<option><?php echo esc_html( $option ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="field">
					<label for="timeline"><?php esc_html_e( 'When would you like to begin?', 'inovantage' ); ?></label>
					<select id="timeline" name="timeline">
						<option value=""><?php esc_html_e( 'No fixed date', 'inovantage' ); ?></option>
						<?php foreach ( inovantage_contact_timeline_options() as $option ) : ?>
							<option><?php echo esc_html( $option ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="field field-full">
					<label for="message"><?php esc_html_e( 'Describe the current challenge and desired business outcome', 'inovantage' ); ?> <span aria-hidden="true">*</span></label>
					<textarea id="message" name="message" rows="7" required placeholder="<?php esc_attr_e( 'What is happening today, what would better performance look like, who is affected and which systems are currently involved?', 'inovantage' ); ?>"></textarea>
				</div>
				<div class="field field-full checkbox-field">
					<input id="consent" name="consent" type="checkbox" required value="yes">
					<label for="consent">
						<?php
						printf(
							/* translators: 1: company name, 2: opening link tag, 3: closing link tag */
							esc_html__( 'I agree that %1$s may use these details to respond to my enquiry. See the %2$sprivacy notice%3$s.', 'inovantage' ),
							esc_html( inovantage_company( 'name' ) ),
							'<a href="' . esc_url( home_url( '/privacy/' ) ) . '">',
							'</a>'
						);
						?>
					</label>
				</div>
			</div>
			<button class="button" type="submit"><?php esc_html_e( 'Request a Consultation', 'inovantage' ); ?></button>
			<p class="form-note"><?php esc_html_e( 'This form is protected by a hidden spam trap. Please do not send passwords, payment details, or other highly sensitive information.', 'inovantage' ); ?></p>
		</form>
	</div>
</section>

	<?php
endwhile;

get_footer();
?>
