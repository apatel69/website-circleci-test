<?php

function acf_load_category_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('api_categories', 'option') ) {
        
        // while has rows
        while( have_rows('api_categories', 'option') ) {
            
            // instantiate row
            the_row();
            
            
            // vars
            $label = get_sub_field('category_name');
            $value = strtolower(preg_replace('/\s*/', '_', $label));
            
            // append to choices
            $field['choices'][ $value ] = $label;
            
        }
        
    }


    // return the field
    return $field;
    
}

add_filter('acf/load_field/name=api_category', 'acf_load_category_choices');