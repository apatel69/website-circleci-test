<?php 
/**
 * Walker class to remove <a> tag for current <li> menu item 
 * on Policies sidebar
 */

class Policies_Sidebar_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {

        $level = $depth + 1;
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu sub-menu-level-$level\" role=\"menu\" aria-hidden=\"true\">\n";

    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        $default_classes = empty($item->classes) ? array () : (array) $item->classes;

        $custom_classes = (array)get_post_meta($item->ID, '_menu_item_classes', true);

        // Global class for all items
        $custom_classes[] = 'menu-item';

        // Now with 100% more accessibility!
        $aria_attr[] = 'role="menuitem"';

        // Is this a top-level menu item?
        if ($depth == 0)
            $custom_classes[] = 'menu-item-top-level';

        // Does this menu item have children?
        if (in_array('menu-item-has-children', $default_classes))
            $custom_classes[] = 'menu-item-has-children';
            $aria_attr[] = 'aria-haspopup="true"';

        // Is this menu item active? (Top level only)
        $active_classes = array('current-menu-item', 'current-menu-parent', 'current-menu-ancestor', 'current_page_item', 'current-page-parent', 'current-page-ancestor');
        if ($depth == 0 && array_intersect($default_classes, $active_classes))
            $custom_classes[] = 'menu-item-active';

        // Give menu item a class based on its level/depth
        $level = $depth + 1;
        if ($depth > 0)
            $custom_classes[] = "menu-item-level-$level";

        $classes = join(' ', $custom_classes);
        $aria = join(' ', $aria_attr);
        !empty($classes)
            and $classes = ' class="'. trim(esc_attr($classes)) . '"';

        $output .= "<li $classes $aria>";

        $attributes  = '';

        !empty($item->attr_title)
            and $attributes .= ' title="'  . esc_attr($item->attr_title) .'"';
        !empty($item->target)
            and $attributes .= ' target="' . esc_attr($item->target    ) .'"';
        !empty($item->xfn)
            and $attributes .= ' rel="'    . esc_attr($item->xfn       ) .'"';
        !empty($item->url)
            and $attributes .= ' href="'   . esc_attr($item->url       ) .'"';

        $title = apply_filters('the_title', $item->title, $item->ID);
        if (in_array('menu-item-active', $custom_classes)) {
            $item_output = $args->before
                . $args->link_before
                . $title
                . $args->after;
        } else { 
        $item_output = $args->before
            . "<a class='menu-item-link' $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $args->after;
        }

        $output .= apply_filters(
            'walker_nav_menu_start_el',   
            $item_output,   
            $item,   
            $depth,   
            $args
        );
    }
}
