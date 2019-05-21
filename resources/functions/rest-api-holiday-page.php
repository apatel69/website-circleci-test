<?php
/**
 * Checks for transient before running a query to get the post_id
 */
function get_holiday_page_id() {
    $post_id = get_transient( 'holiday_page_id' );

    if ( false === $post_id ) {
        $custom_query = new WP_Query( [
            'post_type' => 'page',
            'pagename'  => 'holiday-thank-you',
            'fields'    => 'ids',
        ] );

        if ( !empty($custom_query->posts) && is_array($custom_query->posts) && count($custom_query->posts) > 0 ) {
            $post_id = $custom_query->posts[0];
            set_transient( 'holiday_page_id', $post_id, 0 );
        }
    }

    return $post_id;
}

/**
 * Sets the transient value to whatever the holiday page is
 */
function update_holiday_page_id( $post_id, $post, $update ) {
    if ( $post->post_name === 'holiday-thank-you' ) {
        set_transient( 'holiday_page_id', $post_id, 0 );
    }
}
add_action( 'save_post_page', 'update_holiday_page_id', 10, 3 );

/**
 * Gets the current value for meal_count
 */
function get_meal_count() {
    $meal_count = 0;

    $post_id = get_holiday_page_id();

    if ( $post_id ) {
        $meal_count = intval(get_field('meal_count', $post_id));
    }

    return $meal_count;
}

/**
 * Increments the value of meal_count
 */
function update_meal_count() {
    $post_id = get_holiday_page_id();

    if ( $post_id ) {
        update_field('meal_count', intval(get_field('meal_count', $post_id)) + 1, $post_id);
    }
}

/**
 * Checks if the maximum count has been reached or the deadline has passed
 */
function is_holiday_page_active() {
    $now = new DateTime("now", new DateTimeZone('America/Toronto') );
    $active = false;

    $post_id = get_holiday_page_id();

    if ( $post_id ) {
        $end = DateTime::createFromFormat('Y-m-d H:i:s', get_field('end_date', $post_id), new DateTimeZone('America/Toronto'));
        $active = $now < $end && intval(get_field('meal_count', $post_id)) < intval(get_field('count_maximum', $post_id));
    }

    return $active;
}

/**
 * Handles the API request for returning all of the relevant holiday page data
 */
function get_holiday_page_data( WP_REST_Request $request ) {
    $post_id = get_holiday_page_id();

    return [
        'active' => is_holiday_page_active(),
        'count' => get_meal_count(),
        'max' => intval(get_field('count_maximum', $post_id)),
        'header_text' => get_field('active_header_text', $post_id),
    ];
}

/**
 * Registers the holiday page endpoint(s)
 */
function register_holiday_endpoints () {
    register_rest_route( 'wp/v2', 'holiday/get-data', [
        'methods'  => 'GET',
        'callback' => 'get_holiday_page_data',
    ] );
    register_rest_route( 'wp/v2', 'holiday/get-count', [
        'methods'  => 'GET',
        'callback' => 'get_meal_count',
    ] );
    register_rest_route( 'wp/v2', 'holiday/update-count', [
        'methods'  => 'POST',
        'callback' => 'update_meal_count',
    ] );
    register_rest_route( 'wp/v2', 'holiday/is-active', [
        'methods'  => 'GET',
        'callback' => 'is_holiday_page_active',
    ] );
}
add_action( 'rest_api_init', 'register_holiday_endpoints' );
