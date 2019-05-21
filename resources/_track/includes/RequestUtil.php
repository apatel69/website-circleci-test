<?php

// Class to replace some Statamic/Slim utilities we were using - helps improve readability and be DRY
class RequestUtil
{
	public static function isSameOrigin()
	{
		$origin = self::getOrigin();
		$site = self::getSiteUrl();

		// Ignore scheme in URL till TLS/SSL enabled on statamic
		$originHost = strtolower(parse_url($origin)['host']);
		$siteHost = strtolower(parse_url($site)['host']);
		
		return $originHost == $siteHost;
	}

	public static function getCurrentUrl()
	{
		$url = self::getSiteUrl() . self::env($_SERVER['SERVER_NAME'], '');
	}

	public static function getSiteUrl()
	{
		$host = self::array_get($_SERVER, 'HTTP_HOST');
		if (!$host) {
			return null;
		}
		$url = 'http';
		if (self::isHttps()) {
			$url .= 's';
		}
		$url .= '://'.$host;
		$port = self::array_get($_SERVER, 'SERVER_PORT', '80');
		

		return $url;
	}

	public static function getHttpMethod()
	{
		return self::env('REQUEST_METHOD', 'GET');
	}

	public static function getOrigin()
	{
		$origin = "http://".$_SERVER['SERVER_NAME'];
		if (is_null($origin)) {
			$origin = self::getHost(self::getReferer());
		}	
		return $origin;
	}

	public static function getHost($uri)
	{
		$parts = parse_url($uri);
		if (!$parts['host']) {
			return null;
		}

		$scheme = $parts['scheme'] ? $parts['scheme']."://" : '';
		$host = $scheme.$parts['host'];

		$noPortRequired =
			empty($parts['port']) ||
			($parts['scheme'] == 'http' && $parts['port'] == '80') ||
			($parts['scheme'] == 'https' && $parts['port'] == '443');

		if (!$noPortRequired) {
			$host .= ':'.$parts['port'];
		}

		return $host;
	}

	public static function getUserAgent()
	{
		return $_SERVER['HTTP_USER_AGENT'];
	}

	public static function getReferer($default = null)
	{
		return $_SERVER['HTTP_REFERER'];
	}

	public static function isAjax()
	{
		if (self::queryParams(self::getCurrentUrl(), 'isajax')) {
			return true;
		} elseif (strtolower(self::env('HTTP_X_REQUESTED_WITH', '')) == 'xmlhttprequest') {
			return true;
		}
		return false;
	}

	public static function isHttps()
	{
		return !empty($_SERVER['HTTPS']);
	}

	public static function queryParams($url, $paramName = null, $default = null)
	{
		parse_str(parse_url($url, PHP_URL_QUERY), $params);
		if ($paramName) {
			return self::array_get($params, $paramName, $default);
		}
		return $params;
	}

	public static function request($paramName, $default = null)
	{
		return self::array_get($_REQUEST, $paramName, $default);
	}

	public static function post($name, $default = null)
	{
		return self::array_get($_POST, $name, $default);
	}

	public static function env($name, $default = null)
	{
		return self::array_get($_SERVER, $name, $default);
	}

	public static function cookie($name, $default = null)
	{
		return self::array_get($_COOKIE, $name, $default);
	}

	public static function array_get(array $array, $key, $default = null)
	{
		return array_key_exists($key, $array) ? $array[$key] : $default;
	}
}
