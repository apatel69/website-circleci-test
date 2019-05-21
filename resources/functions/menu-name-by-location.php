<?php

// Get menu name from menu location

function get_menu_name( $location ) {
	if( empty($location) ) return false;
	
	$locations = get_nav_menu_locations();
	if( ! isset( $locations[$location] ) ) return false;

	$menu_obj = get_term( $locations[$location], 'nav_menu' );
	$menu_name = $menu_obj->name;

	return $menu_name;

}