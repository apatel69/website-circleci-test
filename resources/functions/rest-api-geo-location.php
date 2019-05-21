<?php
function get_geo_location( WP_REST_Request $request ) {
$geolocation_API_Key = get_field('geo_api_secret', 'option');
$testIP = "207.35.8.98";
$userIP = get_client_ip_env();

// Initialize CURL:
$ch = curl_init('https://ipapi.co/'.$userIP.'/json/?key='.$geolocation_API_Key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$api_result = json_decode($json, true);

return $api_result;
}

function get_client_ip_env() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
     $ipaddress = 'UNKNOWN';

    if( strpos($ipaddress, ",") !== false ) {
        $ipaddress = strtok($ipaddress, ",");
    }
    
    return $ipaddress;
}

/**
 * Registers the geo api endpoint
 */
function register_geo_location_endpoints () {
    register_rest_route( 'wp/v2', 'geo-location/get-data', [
        'methods'  => 'GET',
        'callback' => 'get_geo_location',
    ] );
}
add_action( 'rest_api_init', 'register_geo_location_endpoints' );
