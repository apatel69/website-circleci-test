<?php

/*Function to asynchronously load scripts */

function add_js_async_attr($tag){

    # Add async attribute to these scripts
    $scripts_to_include = array('trustpilot','crazyegg');

    foreach($scripts_to_include as $include_script){
        if(true == strpos($tag, $include_script ))
        # Async the scripts included above
        return str_replace( ' src', ' async src', $tag );
    }

    # Return original tag for all scripts not included
    return $tag;

}

add_filter( 'script_loader_tag', 'add_js_async_attr', 10 );