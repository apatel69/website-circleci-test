<?php

add_action( 'wp_enqueue_scripts', 'add_friendbuyscript' );   

/**
 * add swifttype script only to refer a friend pages based on the template
 */
function add_friendbuyscript () {
    $page_template = basename(get_page_template());

    $friendbuy_script = "window['friendbuy'] = window['friendbuy'] || [];window['friendbuy'].push(['widget', 'dME-nOw']);";
    
        if($page_template == "refer-a-friend.blade.php") {
            wp_add_inline_script('refer-a-friend', $friendbuy_script, 'before');
        }
    
}
