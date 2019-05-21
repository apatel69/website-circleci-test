<?php

/**
 * Add custom REST API endpoints/functions for invoice templates gallery page
 */
function get_cat_posts($request) {
    // json-api params
    $parameters = $request->get_query_params();
    $catParam = $request->get_param('category');
    $paged = $request->get_param('page');
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
    $search = $request->get_param('search');

    $args = array(
        'post_type' => 'invoice_templates',
        'post_status' => 'publish',
        'posts_per_page' => 5, 
        'order' => 'ASC',
        'meta_key' => 'profession',
        'orderby' => 'meta_value',
        'paged' => (int)$paged
    );

    if ($catParam !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'invoice_templates_categories',
                'field' => 'term_id',
                'terms' => (int)$catParam
            )
        );
    }

    if($search && $catParam == 'all') {
        $args['s'] = $search;
    }

    $posts = get_posts($args);

    // get ACF content of post
    if ( empty( $posts ) ) {
        return null;
    } else {
        foreach ($posts as $key => $post) {
            $posts[$key]->flexible_content = get_fields($post->ID);
        }
    }

    $result = new WP_Query($args);
    $nextPage = $result->max_num_pages > (int)$paged;

    // return results
    $data = array(
        'request' => $parameters,
        'next_page' => $nextPage,
        'count' => count($posts),
        'posts' => $posts
    );

    return new WP_REST_Response($data, 200);
}

add_action('rest_api_init', function () {
    register_rest_route('invoice_templates', 'posts', array(
        'methods' => 'GET',
        'callback' => 'get_cat_posts'
    ));
});


/**
 * Custom Query Vars for Frontend Url of invoice templates gallery page
 */
function add_custom_query_var( $vars ){
    $vars[] = 'template_category';
    $vars[] = 'search';
    return $vars;
}

add_filter('query_vars', 'add_custom_query_var');
