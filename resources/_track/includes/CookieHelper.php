<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/includes/RequestUtil.php';

class CookieHelper
{
	protected $name;
	protected $value;
	protected $domain;
	protected $expiry;
	protected $path;
	protected $secure;
	protected $httpOnly;
	protected $emitOnDestruction;
	protected $emitted;

	public function __construct()
	{
		$this->name("")
			->domain()
			->expireWithSession()
			->path()
			->secure()
			->httpOnly();
		$this->emitted = false;
	}

	public function __destruct()
	{
		if ($this->emitOnDestruction && !$this->emitted) {
			$this->set();
		}
	}

	public static function emit()
	{
		$cookieSetter = new CookieHelper;
		$cookieSetter->emitOnDestruction = true;
		return $cookieSetter;
	}

	public static function get($name)
	{
		return RequestUtil::cookie($name);
	}

	public function set()
	{
		if (setcookie(
			$this->name,
			$this->value,
			$this->expiry,
			$this->path,
			$this->domain,
			$this->secure,
			$this->httpOnly))
		{
			$this->emitted = true;
			return true;
		}
		return false;
	}

	public function name($name)
	{
		$this->name = $name;
		return $this;
	}

	public function value($value)
	{
		$this->value = $value;
		return $this;
	}

	public function expireWithSession()
	{
		$this->expiry = 0;
		return $this;
	}

	public function expiresIn($dateString)
	{
		$tz = new DateTimeZone('UTC');
		$expiry = new DateTime($dateString, $tz);
		$this->expiry = $expiry->format('U');
		return $this;
	}

	public function path($path = null)
	{
		if ($path == null) {
			$path = $this->getPathInfo();
		}
		$this->path = $path;
		return $this;
	}

	public function domain($domain = null)
	{
		if ($domain == null) {
			$domain = $this->getDomain();
		}
		$this->domain = $domain;
		return $this;
	}

	public function baseDomain()
	{
		$domain = $this->getDomain();
		$parts = explode(".", $domain);
		$lastTwoParts = "." . implode(".", array_slice($parts, sizeof($parts)-2, 2));
		return $this->domain($lastTwoParts);
	}

	public function secure($secure=true)
	{
		$this->secure = $secure;
		return $this;
	}

	public function httpOnly($httpOnly=true)
	{
		$this->httpOnly = (bool)$httpOnly;
		return $this;
	}

	protected function getDomain()
	{
		return RequestUtil::env('HTTP_HOST', RequestUtil::env('SERVER_NAME'));
	}

	protected function getPathInfo()
	{
		return RequestUtil::env('PATH_INFO', '/');
	}
}
