<?php

/*
 * Registering shortcakes shortcode
 * [invoice_templates_name]
 *
 */

add_action( 'register_shortcode_ui', 'register_invoice_template_name_shortcode' );

function register_invoice_template_name_shortcode() {
	$fields = array(
		array(
			'label'       => 'Prepend with a/an',
			'attr'        => 'aan',
			'type'        => 'checkbox',
		),
		array(
			'label'       => 'Capitalize A/An',
			'attr'        => 'capital_aan',
			'type'        => 'checkbox',
		),
		array(
			'label'       => 'Label type',
			'attr'        => 'content',
			'type'        => 'radio',
			'options'     => array(
				array( 'value' => '', 'label' => 'Default label' ),
				array( 'value' => 'title', 'label' => 'Label in Title' ),
				array( 'value' => 'desc', 'label' => 'Label in Description' ),
			),
		)
	);

	$shortcode_ui_args = array(
		'label' => esc_html__( 'Invoice Template Name', 'invoice_template_name_shortcode', 'shortcode-ui' ),
		'listItemImage' => 'dashicons-format-aside',
		'attrs' => $fields,		
	);

	shortcode_ui_register_for_shortcode( 'invoice_template_name', $shortcode_ui_args );
}

function invoice_template_name_shortcode( $attr, $content, $shortcode_tag ) {
	$attr = shortcode_atts( array(
		'aan'  => false,
		'capital_aan'  => false,
		'content'  => false,
	), $attr, $shortcode_tag );

	$vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
	$return = '';

	if ($attr['aan']) :
		if (in_array(get_field('profession')[0], $vowels)) :
			if ($attr['capital_aan']) :
				$return .= ('An ');
			else :
				$return .= ('an ');
			endif;
		else :
			if ($attr['capital_aan']) :
				$return .= ('A ');
			else :
				$return .= ('a ');
			endif;
		endif; 
	endif;  
	
	if ( get_field('profession') ) :
		$return .= wp_kses_post(get_field('profession'));
		
	elseif ( is_tax('invoice_templates_categories') ) :
		$term = get_queried_object();

		if (isset($attr['content']) && ($attr['content'] !== '')) :
			if ($attr['content'] == 'desc') :
				$return .= get_field('description_label', $term);
			elseif (get_field('label_type', $term) == 'hidden') :
				$return = '';
			elseif (get_field('label_type', $term) == 'custom') :
				$return .= get_field('custom_label', $term);
			else :
				$return .= $term->name;
			endif;
		else :
			if (get_field('label_type', $term) == 'hidden') :
				$return = '';
			elseif (get_field('label_type', $term) == 'custom') :
				$return .= get_field('custom_label', $term);
			else :
				$return .= $term->name;
			endif;
		endif;
	
	elseif ( is_tax('accounting_software_categories') ) :
		$term = get_queried_object();

		if (isset($attr['content'])) :
			if ($attr['content'] == 'title') :
				if (get_field('title_type', $term) == 'custom') :
					$return .= get_field('title_custom_label', $term);
				else : 
					$return .= $term->name;
				endif;
			elseif ($attr['content'] == 'desc') :
				if (get_field('desc_type', $term) == 'custom') :
					$return .= get_field('desc_custom_label', $term);
				else :
					$return .= $term->name;
				endif;
			else :
				$return .= $term->name;
			endif;
		else :
			$return .= $term->name;
		endif;
		
	endif;

	return $return;
}
