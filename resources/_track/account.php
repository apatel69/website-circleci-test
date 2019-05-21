<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/includes/RequestUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/env.php';

	// We pass along the querystring from the original request to the freshApp API call
	$queryString = parse_url(RequestUtil::getCurrentUrl(), PHP_URL_QUERY);
	$filterArgs = array(
		'company' => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags' =>FILTER_FLAG_NO_ENCODE_QUOTES),
		'email' => FILTER_SANITIZE_EMAIL
		);
	$_GET = filter_input_array(INPUT_GET, $filterArgs);

	if ( !empty($_GET) ) {
		if (array_key_exists('company', $_GET)) {
			$qv['company'] = $_GET['company'];
		}
		if (array_key_exists('email', $_GET)) {
			$qv['email'] = $_GET['email'];
		}
		$queryString = http_build_query( $qv );
	}

	$ch = curl_init($GLOBALS['freshapp_endpoint'] . "/ajax/setup/processSignupForm?" . $queryString);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json'));
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result;
	return $result;
?>
