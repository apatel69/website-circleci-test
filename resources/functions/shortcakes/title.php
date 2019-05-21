<?php

/*
 * Registering shortcakes shortcode
 * [title]
 *
 */

add_action( 'register_shortcode_ui', 'register_title_shortcode' );

function register_title_shortcode() {
	$shortcode_ui_args = array(
		'label' => esc_html__( 'Title', 
		'title_shortcode', 'shortcode-ui' ),
		'listItemImage' => 'dashicons-format-aside',
	);

	shortcode_ui_register_for_shortcode( 'title', $shortcode_ui_args );
}

function title_shortcode( $attr, $content, $shortcode_tag ) {
	return get_the_title();
}
