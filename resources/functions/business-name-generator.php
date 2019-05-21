<?php

function business_name_generator($request)
{

    $industry = $request->get_param('industry');
    $nonce = $request->get_param('nonce');
    $keyWord = $request->get_param('keyWord');
    $start = intval($request->get_param('start'));
    $count = intval($request->get_param('count'));

    /**
     * Check if nonce empty
     */

    if (!isset($nonce)) {
        $response = new WP_REST_Response(array('message' => 'Nonce is empty'));
        $response->set_status(400);
        return $response;
    }

    /**
     * Verify nonce
     */

    if (!wp_verify_nonce($nonce, 'business_name_generator')) {
        $response = new WP_REST_Response(array('message' => 'Invalid nonce'));
        $response->set_status(400);
        return $response;
    }

    //Server side validation
    $errors = array();

    if (empty($industry)){
        array_push($errors, "Industry not provided.");
    } elseif (!preg_match("/^(creatives|legal|trades|it)$/", $industry)){
        array_push($errors, "Industry not valid.");
    }

    if (empty($keyWord)){
        array_push($errors, "Key Word not provided.");
    } elseif (!preg_match("/^[a-zA-Z0-9][a-zA-Z\'0-9\-]*( [a-zA-Z0-9][a-zA-Z\'0-9\-]*)*$/", $keyWord)){
        array_push($errors, "Key Word not valid.");
    }

    if (empty($count)){
        array_push($errors, "Count not provided.");
    } elseif ($count <= 0){
        array_push($errors, "Count not valid.");
    }
    
    if (empty($start) || $start < 0){
        array_push($errors, "Start not valid.");
    }        

    if (!empty($errors)){
        $response = new WP_REST_Response($errors);
        $response->set_status(400);
        return $response;
    } else {
        $nameGenerator = new NameGenerator($industry, $keyWord, $start);
        $names = $nameGenerator->generate($count);
        return $names;
    }

}

add_action('rest_api_init', function () {
    register_rest_route('bng', '/generate/', array(
        'methods' => 'GET',
        'callback' => 'business_name_generator'
    ));
});


