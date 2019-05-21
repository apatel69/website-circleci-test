<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/env.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/includes/RequestUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/includes/SimpleLog.php';
// TODO: Consider making TrackingMarketing non-static like TrackingMultichannel to avoid lines like this
TrackingMarketing::$log = new SimpleLog($GLOBALS['api_log_enabled'], $GLOBALS['api_log_level']);
TrackingMarketing::setMarketingCookies();


class TrackingMarketing
{
	public static $log;

	public static function setMarketingCookies()
	{
		$httpMethod = RequestUtil::getHttpMethod();
		if ($httpMethod == "POST" && RequestUtil::isAjax()) {
			if (RequestUtil::isSameOrigin()) {
				self::$log->debug('[marketing.php] Received POST params: '. var_export($_POST, true));

				self::setCorsHeaders();
				if (is_null(RequestUtil::post('landing_url')) || is_null(RequestUtil::post('referring_url'))) {
					self::sendErrorResponse(400, '[marketing.php] Missing parameters in request, cannot set cookies');
					return;
				}

				http_response_code(204);
				self::setReferralCookies();
				self::$log->info('[marketing.php] Successfully set cookies for visit: '.RequestUtil::post('landing_url'));
			} else {
				self::$log->debug('[marketing.php] isSameOrigin: '. RequestUtil::isSameOrigin());
				self::sendErrorResponse(403, 'No Cross-Origin Requests allowed');

			}
		} else {
			self::$log->debug('[marketing.php] isSameOrigin: '. RequestUtil::isSameOrigin());
			self::sendErrorResponse(403, 'Method of accessing endpoint not permitted');
		}
	}

	/**
	 * Sets cookies to store relevant information for attributing the customer to a marketing source.
	 * (E.g. campaign ad they clicked, referring url.)
	 * Cookies are used to communicate information from the website without an additional service layer.
	 * @param bool|string $overrideQueryString This is a point to inject a different query string for reporting.
	 *        This is used by referrals, where it is more convenient to have deriving the referralid (and source) from
	 *        the url be the app's responsibility, because it depends on parsing the subdomain of the landing  url into a system.
	 * @param bool $skipLegacy
	 * @internal param \skipLegacy $bool Skip old stuff rife with notice errors, for testing.
	 */
	protected static function setReferralCookies($overrideQueryString=false, $skipLegacy = false, $mockCookieFn = null)
	{
		self::$log->debug('Called: setReferralCookies()');
		if (!$skipLegacy) {
			self::$log->debug('setLegacyReferralCookies');
			self::setLegacyReferralCookies();
		}

		list($tld, $host) = array_reverse(explode('.', $_SERVER['HTTP_HOST'])); // Last 2 parts
		$parts = explode('.', $_SERVER['HTTP_HOST']);
		$cookie_domain = "." . implode('.', array_slice($parts, sizeof($parts) - 2, 2));
		self::$log->debug("Cookie Domain:".$cookie_domain);

		$landingUrl = self::landingUrl($overrideQueryString);
		$referringUrl = RequestUtil::post('referring_url', "http://<unknown host>/<unknown path>");
		$landingTime = self::landingTime();
		$oldLandingUrl = RequestUtil::cookie('fb_landing_url');

		if (!self::isAttributable($landingUrl) && self::isAttributable($oldLandingUrl)) {
			self::$log->debug('Never overwrite an attribution that we can extract data from with one we cannot.');
			// Never overwrite an attribution that we can extract data from with one we cannot.
			return;
		}

		$oldRef = self::refFromUrl($oldLandingUrl);
		$newRef = self::refFromUrl($landingUrl);
		$keepOriginal = !self::isAttributable($landingUrl) || ($oldRef == $newRef);
		if ($oldLandingUrl && self::isFbUrl($referringUrl) && $keepOriginal) {
			// If there is already a landing url,
			// and we have just been referred from another FB url
			// and the new page has no ref parameter, or has the same ref parameter as the existing cookie,
			// then don't overwrite it - keep the existing landing as the important one.
			self::$log->debug('Return state based on existing url');
			return;
		}

		self::$log->debug('landing url'.$landingUrl);

		$expires = new DateTime("+30 days", new DateTimeZone('UTC'));
		$expiresTimestamp = $expires->format('U');

		setcookie("fb_landing_url", $landingUrl, $expiresTimestamp, '/', $cookie_domain);
		setcookie("fb_referring_url", $referringUrl, $expiresTimestamp, '/', $cookie_domain);
		setcookie("fb_landing_time", $landingTime, $expiresTimestamp, '/', $cookie_domain);

		$fbReferringUrlOverride = RequestUtil::cookie('fb_referring_url_sudo');
		if ($fbReferringUrlOverride) {
			setcookie("fb_referring_url", $fbReferringUrlOverride, $expiresTimestamp, '/',$cookie_domain);
		}
	}

	/**
	 * This will be removed soon - it will be replaced by set_referral_cookies. Even sooner now.
	 * @param string $referralid
	 */
	protected static function setLegacyReferralCookies($referralid='')
	{
		$parts = explode('.', $_SERVER['HTTP_HOST']);
		$cookie_domain = "." . implode('.', array_slice($parts, sizeof($parts) - 2, 2));

		$utcTz = new DateTimeZone('UTC');
		$now = new DateTime(null, $utcTz);
		$expires = new DateTime("+500 days", $utcTz); // 500 days from now
		$expiresTimestamp = $expires->format('U');

		// Retrieve parameters from landing URL (instead of inspecting '$_REQUEST' since this is an AJAX call now
		$params = RequestUtil::queryParams(self::landingUrl());

		$referralid = RequestUtil::array_get($params, 'ref', $referralid);
		$referralid_type = RequestUtil::array_get($params, 'reftype');

		self::$log->debug('Cookie_domain').$cookie_domain;

		self::$log->debug('Cookie_domain').$cookie_domain;
		self::$log->debug('Expires').$expiresTimestamp;

		if ($referralid) {
			if (!empty($_COOKIE["cookie_referral"]) && empty($_COOKIE["initial_cookie_referral"])) {
				setcookie("initial_cookie_referral", $_COOKIE["cookie_referral"], $expiresTimestamp, '/','');
			}
			setcookie("cookie_referral", $referralid, $expiresTimestamp, '/',$cookie_domain);
			setcookie("cookie_referral_type", $referralid_type, $expiresTimestamp, '/', $cookie_domain);

			// If we know where a referral originated from set a cookie for use elsewhere in the app.
			if (array_key_exists('fb_source', $params)) {
				setcookie("cookie_referral_source", $params['fb_source'], $expiresTimestamp, '/', $cookie_domain);
			}
		}

		if (!empty($params['ref_systemid'])) {
			setcookie("cookie_referral_systemid", $params['ref_systemid'], $expiresTimestamp, '/','');
		}

		if ($referralid || (array_key_exists('c1', $params) && $params['c1']) AND $params['source'] AND $params['kw']) {
			setcookie("referral_present", true, $expiresTimestamp, '/',$cookie_domain);
		}

		$fbReferrer   = RequestUtil::cookie('fb_referrer');
		$fbEntryPage  = RequestUtil::cookie('fb_entrypage');
		// Since it's an AJAX now, only way to get the _actual_ referer is via a POSTed variable
		$httpReferrer = RequestUtil::post('referring_url', "");
		$requestUri = parse_url(self::landingUrl(), PHP_URL_PATH);

		if (!$fbReferrer && !$fbEntryPage && preg_match("!freshbooks.com!ui", $httpReferrer) == false) {
			setcookie("fb_referrer", $httpReferrer, $expiresTimestamp, '/',"$cookie_domain");
			setcookie("fb_entrypage", $requestUri, $expiresTimestamp, '/',"$cookie_domain");
			setcookie("fb_landtime", $now->format('Y-m-d H:i:s'), $expiresTimestamp, '/',"$cookie_domain");
		}

		$fbReferrerOverride = RequestUtil::cookie('fb_referrer_sudo');
		if ($fbReferrerOverride) {
			setcookie("fb_referrer", $fbReferrerOverride, $expiresTimestamp, '/',"$cookie_domain");
			if (!$fbEntryPage) {
				setcookie("fb_entrypage", $requestUri, $expiresTimestamp, '/',"$cookie_domain");
				setcookie("fb_landtime", $now->format('Y-m-d H:i:s'), $expiresTimestamp, '/',"$cookie_domain");
			}
		}

		// cookies for working planet campaigns
		if ((array_key_exists('c1', $params) && $params['c1']) && $params['source'] && $params['kw']) {

			setcookie("referral_present", true, $expiresTimestamp, '/','');

			// if the user has already clicked on a PPC link before
			if (RequestUtil::cookie('cookie_c1', false) &&
				RequestUtil::cookie("cookie_source") &&
				RequestUtil::cookie("cookie_kw", false) &&
				(!RequestUtil::cookie("initial_cookie_c1", false) &&
					!RequestUtil::cookie("initial_cookie_source", false) &&
					!RequestUtil::cookie("initial_cookie_time", false)))
			{
				// Remember the old values
				setcookie("initial_cookie_c1", $_COOKIE["cookie_c1"], $expiresTimestamp, '/',$cookie_domain);
				setcookie("initial_cookie_source",$_COOKIE["cookie_source"], $expiresTimestamp, '/',$cookie_domain);
				setcookie("initial_cookie_kw", $_COOKIE["cookie_kw"], $expiresTimestamp, '/',$cookie_domain);
				setcookie("initial_cookie_time", $_COOKIE["cookie_time"], $expiresTimestamp, '/',$cookie_domain);
			}

			// Record the values to a cookie
			setcookie("cookie_c1", $params['c1'], $expiresTimestamp, '/',$cookie_domain);
			setcookie("cookie_source", $params['source'], $expiresTimestamp, '/',$cookie_domain);
			setcookie("cookie_kw", $params['kw'], $expiresTimestamp, '/',$cookie_domain);
			setcookie("cookie_time", time(), $expiresTimestamp, '/',$cookie_domain);
		}
	}

	/**
	 * Returns a timestamp used for reporting and attribution.
	 */
	protected static function landingTime()
	{
		$now = new DateTime(null, new DateTimeZone('UTC'));
		return $now->format('Y-m-d H:i:s');
	}

	/**
	 * Returns whichever one is found first:
	 *  - the 'landing_url' parameter sent as a POST variable
	 *  - the URL of page that made the AJAX Request (HTTP Referer)
	 *  - 'http://<unknown host>/<unknown path>'
	 *
	 * @param bool $overrideQueryString A query string to override that already exists, for the case of referrals where
	 *        teasing out a referring system from
	 * a subdomain would be a pain for reporting.
	 * @return string
	 */
	protected static function landingUrl($overrideQueryString=false)
	{
		// Landing URL is either explicitly provided, or is the URL of page making this AJAX call is used
		$url = RequestUtil::post('landing_url', RequestUtil::getReferer('http://<unknown host>/<unknown path>/'));

		if ($overrideQueryString) {
			$urlParts = parse_url($url);
			$urlParts['query'] = $overrideQueryString;
			$url = http_build_url($urlParts);
		}

		return $url;
	}

	protected static function isAttributable($url)
	{
		// If it has a ref, we can get reporting info on it.
		return (bool) self::refFromUrl($url);
	}

	/**
	 * Check if a URL has a FreshBooks domain, as determined by top-level domain and the previous part.
	 * (This makes it work on test environments.)
	 */
	protected static function isFbUrl($url)
	{
		list($tld, $host) = array_reverse(explode('.', $_SERVER['HTTP_HOST'])); // Last 2 parts

		$parsedUrl = parse_url($url);
		if ($parsedUrl && !empty($parsedUrl['host'])) {
			if (preg_match('/(^|[.])' . $host . '[.]' . $tld . '$/i', $parsedUrl['host'])) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Searches for 'ref=' in URL query string, and deals with edges cases where the URL is malformed but may still have
	 * the reference id in there.
	 * @param $url
	 * @return int or null
	 */
	protected static function refFromUrl($url)
	{
		if (strpos($url, '?') === false && (preg_match('/^ref=/', $url) || preg_match('/&ref=/', $url))) {
			// Unfortunately, the landing url passed through to api-created systems omits the '?'.
			// A value like 'ref=WPMG&c1=GAW_SE_NW&source=NA&kw=free_invoice_template' needs to work here.
			$url = '?' . $url;
		}
		$parsed = parse_url($url);
		if (!$parsed || empty($parsed['query'])) {
			return null;
		}
		parse_str($parsed['query'], $params); // $params set by reference.
		if (!is_array($params)) {
			return null;
		}
		return RequestUtil::array_get($params, 'ref');
	}

	protected static function setCorsHeaders()
	{
		header('Access-Control-Allow-Origin: '.RequestUtil::getSiteUrl());
		header('Access-Control-Allow-Credentials: true');
	}

	protected static function sendErrorResponse($status, $errorMsg)
	{
		self::$log->error('[marketing.php] '.$errorMsg);
		http_response_code($status);
		header('Content-Type: application/json');
		echo json_encode(array('error' => $errorMsg));
	}
}
