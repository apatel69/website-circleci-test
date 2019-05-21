<?php

/*
 * Registering shortcakes shortcode
 * [blockquote]
 *
 */

add_action( 'register_shortcode_ui', 'register_blockquote_shortcode' );

function register_blockquote_shortcode() {
	$fields = array(
		array(
			'label'       => esc_html__( 'Alignment', 'blockquote_shortcode', 'shortcode-ui' ),
			'description' => esc_html__( 'Whether the quotation should be displayed as pull-left, pull-right, or neither.', 'blockquote_shortcode', 'shortcode-ui' ),
			'attr'        => 'alignment',
			'type'        => 'select',
			'options'     => array(
				array( 'value' => 'left', 'label' => esc_html__( 'Left', 'blockquote_shortcode', 'shortcode-ui' ) ),
				array( 'value' => 'right', 'label' => esc_html__( 'Right', 'blockquote_shortcode', 'shortcode-ui' ) ),
			),
		),
		array(
			'label'       => esc_html__( 'Length', 'blockquote_shortcode', 'shortcode-ui' ),
			'description' => esc_html__( 'Length of blockquote' ),
			'attr'        => 'length',
			'type'        => 'select',
			'options'     => array(
				array( 'value' => 'short', 'label' => esc_html__( 'Short', 'blockquote_shortcode', 'shortcode-ui' ) ),
				array( 'value' => 'long', 'label' => esc_html__( 'Long', 'blockquote_shortcode', 'shortcode-ui' ) ),
			),
		)
	);

	$shortcode_ui_args = array(
		'label' => esc_html__( 'Blockquote', 'blockquote_shortcode', 'shortcode-ui' ),
		'listItemImage' => 'dashicons-editor-quote',
		'post_type' => array( 'post', 'page' ),
		'inner_content' => array(
			'label'        => esc_html__( 'Quote', 'blockquote_shortcode', 'shortcode-ui' ),
		),
		'attrs' => $fields,
	);

	shortcode_ui_register_for_shortcode( 'blockquote', $shortcode_ui_args );
}

function blockquote_shortcode( $attr, $content, $shortcode_tag ) {

	$attr = shortcode_atts( array(
		'alignment'  => '',
		'length'  => ''
	), $attr, $shortcode_tag );

	ob_start();
	?>
	<?php if ( ! empty( $content ) ) : ?>
		<blockquote class="quote-<?php echo($attr['alignment'])?> pull-quote <?php echo($attr['length'])?>">
			<?php echo( wp_kses_post( $content ) ); ?>
		</blockquote>
	<?php endif; ?>
	<?php

	return ob_get_clean();
}