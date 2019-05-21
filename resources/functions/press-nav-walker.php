<?php

class Walker_Nav_Press_Menu extends Walker_Nav_Menu {
	
	public function start_lvl( &$output, $depth = 0, $args = array() ) { }

	public function end_lvl( &$output, $depth = 0, $args = array() ) { }
    
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $template;
        $cpt_template = basename($template);

        if ($cpt_template == "single-press_releases.blade.php" || $cpt_template == "single-data_research.blade.php") {    
            $press_page_id = get_field('press_listings_page', 'option')->ID;
            $menu_item_id = $item->object_id;
            $current_item = ($press_page_id == $menu_item_id);
        } else {
            $current_item = in_array( "current_page_item", $item->classes ) || in_array( "current-page-ancestor", $item->classes );
        }
        
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
        
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
        
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        
        if ($current_item) {
            $class_names .= ' current-menu-item ';
        }
        
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>";
	}

} 