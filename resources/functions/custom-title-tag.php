<?php

add_filter('wpseo_title','custom_title');
function custom_title( $title ){
    global $template;
    $cpt_template = basename($template);

    if ($cpt_template === 'single-api.blade.php') {
        $title = str_replace('|', '- API |', $title);
    }   
    return $title;
}
