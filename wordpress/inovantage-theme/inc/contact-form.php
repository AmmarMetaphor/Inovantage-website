<?php
/**
 * WordPress-native contact form processing.
 *
 * Replaces the Netlify Forms submission used by the static site. The form
 * markup lives in page-contact.php; this file only handles the POST.
 *
 * Security measures:
 *  - wp_nonce_field() / wp_verify_nonce() to prevent CSRF and drive-by posts
 *  - a hidden honeypot field to silently drop bot submissions
 *  - sanitize_text_field() / sanitize_textarea_field() / sanitize_email()
 *    on every field before use
 *  - esc_html()/esc_attr() on every value that is echoed back into HTML
 *  - wp_mail() instead of any custom SMTP/mail code, so mail transport can
 *    be managed separately (e.g. by a WP Mail SMTP plugin)
 */

if (!defined('ABSPATH')) {
	exit;
}

define('INOVANTAGE_CONTACT_ACTION', 'inovantage_contact_submit');
define('INOVANTAGE_CONTACT_NONCE', 'inovantage_contact_nonce');

/**
 * The list of accepted "service" and "budget"/"timeline" option values,
 * carried over from the approved static contact form.
 */
function inovantage_contact_service_options() {
	return array( 'AI automation', 'Website design', 'Social media management', 'App development', 'Multiple services', 'Not sure yet' );
}

function inovantage_contact_budget_options() {
	return array( 'Under £2,500', '£2,500–£5,000', '£5,000–£10,000', '£10,000–£25,000', '£25,000+' );
}

function inovantage_contact_timeline_options() {
	return array( 'As soon as possible', 'Within 1 month', 'Within 3 months', 'Later this year' );
}

/**
 * Handles the contact form POST for both logged-in and anonymous visitors.
 */
function inovantage_handle_contact_submit() {
	$contact_url = home_url( '/contact/' );

	if ( ! isset( $_POST[ INOVANTAGE_CONTACT_NONCE ] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ INOVANTAGE_CONTACT_NONCE ] ) ), INOVANTAGE_CONTACT_ACTION )
	) {
		wp_safe_redirect( add_query_arg( 'contact_error', 'nonce', $contact_url ) );
		exit;
	}

	// Honeypot: real visitors never see or fill this field. Silently drop.
	if ( ! empty( $_POST['inovantage_hp_field'] ) ) {
		wp_safe_redirect( home_url( '/thank-you/' ) );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$service = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
	$budget  = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
	$timeline = isset( $_POST['timeline'] ) ? sanitize_text_field( wp_unslash( $_POST['timeline'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$consent = ! empty( $_POST['consent'] );

	$errors = array();
	if ( '' === $name ) {
		$errors[] = 'name';
	}
	if ( '' === $email || ! is_email( $email ) ) {
		$errors[] = 'email';
	}
	if ( '' === $service || ! in_array( $service, inovantage_contact_service_options(), true ) ) {
		$errors[] = 'service';
	}
	if ( '' === $message ) {
		$errors[] = 'message';
	}
	if ( ! $consent ) {
		$errors[] = 'consent';
	}

	if ( ! empty( $errors ) ) {
		wp_safe_redirect( add_query_arg( 'contact_error', 'missing_fields', $contact_url ) . '#contact-form' );
		exit;
	}

	$recipient = inovantage_company( 'email' );
	$subject   = sprintf( '[Project enquiry] %s — %s', $service, $name );

	$body_lines = array(
		"A new project enquiry was submitted through inovantage.co.uk/contact/.",
		'',
		'Name: ' . $name,
		'Work email: ' . $email,
		'Company: ' . ( '' !== $company ? $company : 'Not provided' ),
		'Service: ' . $service,
		'Approximate budget: ' . ( '' !== $budget ? $budget : 'Not provided' ),
		'Ideal start: ' . ( '' !== $timeline ? $timeline : 'Not provided' ),
		'',
		'Message:',
		$message,
	);
	$body = implode( "\n", $body_lines );

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$sent = wp_mail( $recipient, $subject, $body, $headers );

	/**
	 * Fires after a contact form submission has been processed, whether or
	 * not the notification email was sent successfully.
	 */
	do_action( 'inovantage_contact_submitted', $sent, compact( 'name', 'email', 'company', 'service', 'budget', 'timeline', 'message' ) );

	if ( ! $sent ) {
		wp_safe_redirect( add_query_arg( 'contact_error', 'mail_failed', $contact_url ) . '#contact-form' );
		exit;
	}

	wp_safe_redirect( home_url( '/thank-you/' ) );
	exit;
}
add_action( 'admin_post_nopriv_' . INOVANTAGE_CONTACT_ACTION, 'inovantage_handle_contact_submit' );
add_action( 'admin_post_' . INOVANTAGE_CONTACT_ACTION, 'inovantage_handle_contact_submit' );

/**
 * Human-readable copy for each possible ?contact_error= code.
 *
 * @param string $code
 * @return string
 */
function inovantage_contact_error_message( $code ) {
	$messages = array(
		'missing_fields' => __( 'Please complete your name, work email, service, message and consent before sending.', 'inovantage' ),
		'nonce'          => __( 'Your session expired before the form was sent. Please try again.', 'inovantage' ),
		'mail_failed'    => __( 'Something went wrong sending your message. Please try again or email us directly.', 'inovantage' ),
	);
	return isset( $messages[ $code ] ) ? $messages[ $code ] : '';
}
