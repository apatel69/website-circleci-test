<?php

function custom_resources_permalink($post_link, $post) {
    if ( false !== strpos( $post_link, '%resource_categories%' ) ) {
        $resource_category = get_the_terms( $post->ID, 'resource_categories' );
        $post_link = str_replace( '%resource_categories%', array_pop( $resource_category )->slug, $post_link );
    }
    return $post_link;
}

add_filter('post_type_link', 'custom_resources_permalink', 10, 2);

function archive_rewrite_rules() {
    add_rewrite_rule(
        '^(hub)/page/?([0-9]{1,})/?$',
        'index.php?pagename=$matches[1]&paged=$matches[2]',
        'top'
    );
}

add_action( 'init', 'archive_rewrite_rules' );
