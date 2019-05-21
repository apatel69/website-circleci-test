<?php 

function disable_wp_search() {
    if (!is_admin()) {
        if (isset($_GET['s'])) {
            $url = home_url() . strtok($_SERVER["REQUEST_URI"], '?');
            wp_redirect($url);
            exit();
        }
    }
}
add_action( 'parse_query', 'disable_wp_search' );
