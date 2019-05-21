<?php

if ( ! is_admin() ) {
    add_action( 'send_headers', 'custom_http_headers' );
}

/**
 * Add custom HTTP headers
 */
function custom_http_headers () {
    // This structure will ideally be replaced in the future with a call to get_field('custom_page_headers', option) or something similar.
    $custom_page_headers = [
        [
            'path'    => '^/holiday-thank-you',
            'headers' => [
                'Fastly-No-Shield: 1',
                'Cache-Control: private' ,
            ],
        ],
    ];

    foreach ($custom_page_headers as $page_headers) {
        $pattern = '`' . $page_headers['path'] . '`'; // preg_match needs delimiters added that won't exist in the string
        if (preg_match($pattern, $_SERVER['REQUEST_URI'])) {
            foreach ($page_headers['headers'] as $header_value) {
                header($header_value);
            }
        }
    }
}
