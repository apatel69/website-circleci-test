<?php

function bypass_wpautop_filter( $content ) {
    if ( 'support' === get_post_type() ) {
        remove_filter( 'the_content', 'wpautop' );
    }

    return $content;
}
add_filter( 'the_content', 'bypass_wpautop_filter', 0 );

function remove_excerpt_more_suffix( $more ) {
    if ( 'support' === get_post_type() ) {
        return '';
    }

    return $more;
}
add_filter( 'excerpt_more', 'remove_excerpt_more_suffix' );

function custom_support_excerpt( $excerpt ) {
    if ( is_admin() ) {
        return $excerpt;
    }

    if ( 'support' === get_post_type() ) {
        $excerpt = rtrim( mb_substr( html_entity_decode($excerpt), 0, get_field('support_excerpt_length', 'option') ) ) . '...';
    }

    return $excerpt;
}
add_filter( 'wp_trim_excerpt', 'custom_support_excerpt', 10, 1 );
