<?php
/* Function to move the jQuery and jQuery Migrate which WP uses natively to load in footer and not in head section */

function starter_scripts()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, null, true);
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'starter_scripts');
