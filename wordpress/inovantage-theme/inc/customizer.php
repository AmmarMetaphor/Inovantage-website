<?php
/**
 * Customizer controls for the approved company details. Defaults match
 * the values already approved for the public website (src/data/site.json
 * in the original static project); editing here never changes legal
 * content, only contact/organisation metadata used in the footer, the
 * contact page and structured data.
 */

if (!defined('ABSPATH')) {
	exit;
}

function inovantage_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'inovantage_company',
		array(
			'title'       => __( 'Inovantage Company Details', 'inovantage' ),
			'description' => __( 'Contact details and organisation information used in the footer, contact page and SEO structured data.', 'inovantage' ),
			'priority'    => 30,
		)
	);

	$fields = array(
		'name'             => array( __( 'Brand name', 'inovantage' ), 'text' ),
		'legal_name'       => array( __( 'Legal company name', 'inovantage' ), 'text' ),
		'company_number'   => array( __( 'Company number', 'inovantage' ), 'text' ),
		'tagline'          => array( __( 'Tagline', 'inovantage' ), 'text' ),
		'email'            => array( __( 'Contact email', 'inovantage' ), 'email' ),
		'phone'            => array( __( 'Telephone', 'inovantage' ), 'text' ),
		'location'         => array( __( 'Service area', 'inovantage' ), 'text' ),
		'address_street'   => array( __( 'Registered office — street', 'inovantage' ), 'text' ),
		'address_locality' => array( __( 'Registered office — town/city', 'inovantage' ), 'text' ),
		'address_region'   => array( __( 'Registered office — county/region', 'inovantage' ), 'text' ),
		'address_postcode' => array( __( 'Registered office — postcode', 'inovantage' ), 'text' ),
		'address_country'  => array( __( 'Registered office — country code', 'inovantage' ), 'text' ),
		'linkedin'         => array( __( 'LinkedIn URL', 'inovantage' ), 'url' ),
		'instagram'        => array( __( 'Instagram URL', 'inovantage' ), 'url' ),
		'facebook'         => array( __( 'Facebook URL', 'inovantage' ), 'url' ),
		'x'                => array( __( 'X URL', 'inovantage' ), 'url' ),
	);

	$defaults = inovantage_company_defaults();

	foreach ( $fields as $key => $field ) {
		list( $label, $type ) = $field;
		$setting_id = 'inovantage_company_' . $key;

		$sanitize_cb = 'sanitize_text_field';
		if ( 'email' === $type ) {
			$sanitize_cb = 'sanitize_email';
		} elseif ( 'url' === $type ) {
			$sanitize_cb = 'esc_url_raw';
		}

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
				'sanitize_callback' => $sanitize_cb,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => 'inovantage_company',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'inovantage_customize_register' );
