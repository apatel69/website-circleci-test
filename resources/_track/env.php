<?php
// TODO: the following 3 sections should be deleted, with instructions in README.md how to setup your own env.local.php

// database variables
$GLOBALS['db_host'] = "db-master";
$GLOBALS['db_user'] = "dev";
$GLOBALS['db_pass'] = "barkin9";
$GLOBALS['db'] = "staging_web";

// secrets for multichannel tracking
$GLOBALS['multichannel_endpoint'] = "http://mct.fb-assets.com/system";
$GLOBALS['multichannel_hmac_algo'] = 'sha1';
$GLOBALS['multichannel_hmac_key'] = 'a3ed7d72b4551bb8482b7840d052f58eaee33400961ab972330a1ce3b3f8028e';
$GLOBALS['multichannel_cookie'] = 'fb_visitor_id';

// logging config for APIs
$GLOBALS['api_log_enabled'] = true;
$GLOBALS['api_log_level'] = 'error';

// FreshApp Endpoint
$GLOBALS['freshapp_endpoint'] = 'https://secure.freshbooks.com';

// Selligent API auths
$GLOBALS['selligent_organization'] = 'Sandbox';
$GLOBALS['selligent_api_key'] = '0001d8cb8166a33439f735e972ddf4e913cd1e20754555e01930249268a5b73c0059';
$GLOBALS['selligent_ids_id'] = 151;
$GLOBALS['selligent_program_id'] = 205;

// PHP 5.2 fix for __DIR__
$includeDirectory = dirname(__FILE__);

if (file_exists($includeDirectory . '/env.local.php')) {
	include($includeDirectory . '/env.local.php');
}

if (defined('TEST_ENVIRONMENT')) {
	include($includeDirectory . '/env.test.php');
}
