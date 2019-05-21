<?php

/* Add Links on Sitemap to Yoast Sitemap Index */

add_filter( 'wpseo_sitemap_index', 'add_sitemap_custom_urls' );

function add_sitemap_custom_urls() {

    $query_eps_files = array(
        'post_type'      => 'attachment',
        'post_mime_type' => ['application/postscript'], // only EPS files
        'post_status'    => 'inherit',
        'posts_per_page' => -1,
    );

    $eps_attachments = new WP_Query($query_eps_files);

    $sitemap_custom_items = '';

    $timezone = get_option('timezone_string');

    foreach ( $eps_attachments->posts as $attachment ) {
        $utcdatetime = (new DateTime($attachment->post_modified, new DateTimeZone($timezone)))->format('c');
        $url = wp_get_attachment_url( $attachment->ID );
        $sitemap_custom_items = $sitemap_custom_items.'
        <sitemap>
        <loc>'.$url.'</loc>
        <lastmod>'.$utcdatetime.'</lastmod>
        </sitemap>';
    }

    return $sitemap_custom_items;
}

// Uncomment in development to clear sitemap cache if needed
// add_filter( 'wpseo_enable_xml_sitemap_transient_caching', '__return_false');
