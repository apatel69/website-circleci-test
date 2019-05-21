<?php

/*
 * Registering shortcakes shortcode
 * [integration_url]
 *
 */

add_action( 'register_shortcode_ui', 'register_integration_url_shortcode' );

function register_integration_url_shortcode() {
	$shortcode_ui_args = array(
		'label' => esc_html__( 'Integration URL', 
		'integration_url_shortcode', 'shortcode-ui' ),
		'listItemImage' => 'dashicons-format-aside',
	);

	shortcode_ui_register_for_shortcode( 'integration_url', $shortcode_ui_args );
}

function integration_url_shortcode( $attr, $content, $shortcode_tag ) {
		$content = '';
	
	if (get_field('app_url')) {
		$content .= get_field('app_url');
	}
	
	return $content;
}
