<?php
/**
 * Add optimizely script only to selected pages in Site Configuration > Optimizely Settings
 */

 if(defined('WP_ENV') && WP_ENV  == 'production') {
    add_action( 'wp_enqueue_scripts', 'add_optimizely_script' );
    add_action('wp_head', 'optimimzely_prefetch', 0);
}

function add_optimizely_script () {
    global $post;

    if (isset($post->ID) && in_array($post->ID, get_field('active_optimizely_urls', 'option'))) {
        wp_enqueue_script('optimizely', 'https://cdn.optimizely.com/js/10802526514.js');
    } else {
        wp_enqueue_script('optimizely', 'https://cdn.optimizely.com/js/10802526514.js#asyncload');
    }
}

function optimimzely_prefetch(){
    echo '<style>.async-hide { opacity: 0 !important};</style>
        <link rel="prefetch" href="//cdn.optimizely.com/js/10802526514.js">
        <link rel="preconnect" href="//logx.optimizely.com">
        ';
}
