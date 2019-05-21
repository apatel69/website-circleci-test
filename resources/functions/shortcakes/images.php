<?php

/*
 * Registering shortcakes shortcode
 * [image]
 *
 */

add_action( 'register_shortcode_ui', 'register_image_shortcode' );

function register_image_shortcode() {
	$fields = array(
		array(
			'label'       => esc_html__( 'Image', 'image_shortcode', 'shortcode-ui' ),
			'attr'        => 'image_id',
			'type'        => 'attachment',
			'libraryType' => array( 'image' ),
			'addButton'   => esc_html__( 'Select Image', 'image_shortcode', 'shortcode-ui' ),
			'frameTitle'  => esc_html__( 'Select Image', 'image_shortcode', 'shortcode-ui' ),
		),
		array(
			'label'       => esc_html__( 'Retina Image', 'image_shortcode', 'shortcode-ui' ),
			'attr'        => 'retina_id',
			'type'        => 'attachment',
			'libraryType' => array( 'image' ),
			'addButton'   => esc_html__( 'Select Image', 'image_shortcode', 'shortcode-ui' ),
			'frameTitle'  => esc_html__( 'Select Image', 'image_shortcode', 'shortcode-ui' ),
		),
		array(
			'label'       => esc_html__( 'CSS Classes', 'image_shortcode', 'shortcode-ui' ),
			'description' => esc_html__( 'Custom image classes. Seprate multiple classes with a space.', 'image_shortcode', 'shortcode-ui' ),
			'attr'        => 'classes',
			'type'        => 'text',
			'encode'	  => true,
		),
	);

	$shortcode_ui_args = array(
		'label' => esc_html__( 'image', 'image_shortcode', 'shortcode-ui' ),
		'listItemImage' => 'dashicons-format-image',
		'post_type' => array( 'post', 'page' ),
		'attrs' => $fields,
	);

	shortcode_ui_register_for_shortcode( 'image', $shortcode_ui_args );
}

function image_shortcode( $attr, $content, $shortcode_tag ) {

	$attr = shortcode_atts( array(
		'image_id'  => 0,
		'retina_id'  => 0,
		'classes'  => ''
	), $attr, $shortcode_tag );

	ob_start();
	?>
	<?php if ( ! empty( $attr['image_id'] ) ) : 
		$img_id = $attr['image_id']; ?>
		
		<img class="<?php echo wp_kses_post( $attr['classes'] ); ?>"
		src="<?php echo wp_kses_post( wp_get_attachment_url( $img_id)); ?>"
		<?php if ( ! empty( $attr['retina_id'] ) ) : ?>
			srcset="<?php echo wp_kses_post( wp_get_attachment_url( $attr['retina_id'])); ?> 2x"
		<?php endif; ?>
		alt="<?php echo get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>"
		>
	<?php endif; ?>
	<?php

	return ob_get_clean();
}