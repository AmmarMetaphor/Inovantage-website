<?php
/**
 * Template Name: Contact
 *
 * Renders the project enquiry form and posts it to admin-post.php, which
 * inc/contact-form.php processes (nonce + honeypot + sanitisation +
 * wp_mail()) before redirecting to /thank-you/.
 */

get_header();
while ( have_posts() ) :
	the_post();

	$contact_error = isset( $_GET['contact_error'] ) ? sanitize_key( wp_unslash( $_GET['contact_error'] ) ) : '';
	$error_message = $contact_error ? inovantage_contact_error_message( $contact_error ) : '';
	?>

<section class="page-hero">
	<div class="container page-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Contact', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Tell us what you want to improve, automate or build.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'A useful first message explains what is happening now, what better would look like, who needs the solution and any important timing or budget constraints.', 'inovantage' ); ?></p>
		</div>
		<div class="page-hero-visual">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/heroes/contact-hero.png" width="1536" height="1024" alt="<?php esc_attr_e( 'Project enquiry, planning, communication and agreed next steps.', 'inovantage' ); ?>" loading="eager" decoding="async">
		</div>
	</div>
</section>

<section class="section">
	<div class="container contact-grid">
		<div class="contact-details">
			<p class="eyebrow"><?php esc_html_e( 'Start with context', 'inovantage' ); ?></p>
			<h2><?php esc_html_e( 'A clear problem is enough for the first conversation.', 'inovantage' ); ?></h2>
			<p><?php esc_html_e( 'You do not need to arrive with a technical specification. We can help turn the opportunity into a practical scope and sequence.', 'inovantage' ); ?></p>
			<div class="contact-list">
				<div class="contact-item"><strong><?php esc_html_e( 'Email', 'inovantage' ); ?></strong><a href="mailto:<?php echo esc_attr( inovantage_company( 'email' ) ); ?>"><?php echo esc_html( inovantage_company( 'email' ) ); ?></a></div>
				<div class="contact-item"><strong><?php esc_html_e( 'Service area', 'inovantage' ); ?></strong><span><?php echo esc_html( inovantage_company( 'location' ) ); ?></span></div>
				<div class="contact-item"><strong><?php esc_html_e( 'Registered office', 'inovantage' ); ?></strong><span><?php echo esc_html( inovantage_registered_address() ); ?></span></div>
				<div class="contact-item"><strong><?php esc_html_e( 'Typical first step', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Discovery conversation and written next-step recommendation', 'inovantage' ); ?></span></div>
			</div>
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
					<label for="service"><?php esc_html_e( 'What can we help with?', 'inovantage' ); ?> <span aria-hidden="true">*</span></label>
					<select id="service" name="service" required>
						<option value=""><?php esc_html_e( 'Select a service', 'inovantage' ); ?></option>
						<?php foreach ( inovantage_contact_service_options() as $option ) : ?>
							<option><?php echo esc_html( $option ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="field">
					<label for="budget"><?php esc_html_e( 'Approximate budget', 'inovantage' ); ?></label>
					<select id="budget" name="budget">
						<option value=""><?php esc_html_e( 'Prefer not to say', 'inovantage' ); ?></option>
						<?php foreach ( inovantage_contact_budget_options() as $option ) : ?>
							<option><?php echo esc_html( $option ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="field">
					<label for="timeline"><?php esc_html_e( 'Ideal start', 'inovantage' ); ?></label>
					<select id="timeline" name="timeline">
						<option value=""><?php esc_html_e( 'No fixed date', 'inovantage' ); ?></option>
						<?php foreach ( inovantage_contact_timeline_options() as $option ) : ?>
							<option><?php echo esc_html( $option ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="field field-full">
					<label for="message"><?php esc_html_e( 'Tell us what you want to improve or build', 'inovantage' ); ?> <span aria-hidden="true">*</span></label>
					<textarea id="message" name="message" rows="7" required placeholder="<?php esc_attr_e( 'What is happening now, what would better look like, and who needs to use the solution?', 'inovantage' ); ?>"></textarea>
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
			<button class="button" type="submit"><?php esc_html_e( 'Send project enquiry', 'inovantage' ); ?></button>
			<p class="form-note"><?php esc_html_e( 'This form is protected by a hidden spam trap. Please do not send passwords, payment details, or other highly sensitive information.', 'inovantage' ); ?></p>
		</form>
	</div>
</section>

	<?php
endwhile;

get_footer();
?>
