<?php


function acf_populate_menus_in_dropdown( $field ) {
    
    // reset choices
    $field['choices'] = array();

    $choices = get_registered_nav_menus();
    
    if( is_array($choices) ) {
        foreach( $choices as $choice => $val) {
            $field['choices'][$choice] = $val;
        }
    }
    
    return $field;
}

add_filter('acf/load_field/name=tab-menu', 'acf_populate_menus_in_dropdown');
add_filter('acf/load_field/name=sidebar_menu', 'acf_populate_menus_in_dropdown');
add_filter('acf/load_field/name=custom_header_menu', 'acf_populate_menus_in_dropdown');
add_filter('acf/load_field/name=custom_classic_menu', 'acf_populate_menus_in_dropdown');