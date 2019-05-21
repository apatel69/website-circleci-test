<?php

add_action( 'wp_enqueue_scripts', 'add_fic_resources' );   

function add_fic_resources (){
    global $template;
    $cpt_template = basename($template);
    $page_template = basename(get_page_template());
    $resourceURL = 'https://storage.googleapis.com/fic-react-static/asset-manifest.json'; 
    $data = @file_get_contents($resourceURL);

    if ($data) {
        $jsonData = json_decode($data, true);
        $basePath = "https://storage.googleapis.com/fic-react-static/";
        $mainCssPath = $basePath.$jsonData['main.css'];
        $bootStrapCssPath = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
        $mainJsPath = $basePath.$jsonData['main.js'];
    
        if($page_template == "free-invoice-creator.blade.php") {
            wp_enqueue_script('fic-JS', $mainJsPath,'', null, true);
            wp_enqueue_style('fic-bootstrap', $bootStrapCssPath, false, null);
            wp_enqueue_style('fic', $mainCssPath, false, null);
        }
    } 
}


