<?php
/**
 * Approved Inovantage company data.
 *
 * These are the defaults carried over from the approved static website
 * (src/data/site.json). They can be edited without touching code via
 * Appearance -> Customize -> Inovantage Company Details.
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Returns the default (approved) company data.
 *
 * @return array<string, string>
 */
function inovantage_company_defaults() {
	return array(
		'name'             => 'Inovantage',
		'legal_name'       => 'INOVANTAGE LTD',
		'company_number'   => '14524243',
		'tagline'          => 'Digital systems that move your business forward.',
		'email'            => 'info@inovantage.co.uk',
		'phone'            => '+44 7375 803774',
		'location'         => 'Serving businesses across the United Kingdom and the United States',
		'address_street'   => '9 Cheriton Road',
		'address_locality' => 'Leicester',
		'address_region'   => 'England',
		'address_postcode' => 'LE2 8DE',
		'address_country'  => 'GB',
		'linkedin'         => '',
		'instagram'        => '',
		'facebook'         => 'https://www.facebook.com/1HVYU4LZa1/',
		'x'                => '',
	);
}

/**
 * Reads a single company data value, preferring a Customizer override.
 *
 * @param string $key One of the keys from inovantage_company_defaults().
 * @return string
 */
function inovantage_company( $key ) {
	$defaults = inovantage_company_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'inovantage_company_' . $key, $default );
}

/**
 * Returns the full registered-office address as a single formatted string.
 *
 * @return string
 */
function inovantage_registered_address() {
	$parts = array_filter(
		array(
			inovantage_company( 'address_street' ),
			inovantage_company( 'address_locality' ),
			inovantage_company( 'address_region' ),
			inovantage_company( 'address_postcode' ),
		)
	);
	return implode( ', ', $parts );
}
