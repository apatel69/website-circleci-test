<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/freshbooks/resources/_track/env.php';

class SimpleLog
{
	const FATAL = 0;
	const ERROR = 1;
	const WARN = 2;
	const INFO = 3;
	const DEBUG = 4;

	/**
	 * @var int
	 */
	private $level;

	protected static $levels = array(
		self::FATAL => 'FATAL',
		self::ERROR => 'ERROR',
		self::WARN => 'WARN',
		self::INFO => 'INFO',
		self::DEBUG => 'DEBUG'
	);

	public function __construct($enabled = false, $strLevel = 'debug')
	{
		$this->level = $this->mapLevel($strLevel);
		$this->enabled = $enabled;
	}

	public function setLevel($level)
	{
		$this->level = $level;
	}

	public function setEnabled($enabled)
	{
		$this->enabled = (bool)$enabled;
	}

	public function isEnabled()
	{
		return $this->enabled;
	}

	public function debug($message)
	{
		return $this->write($message, self::DEBUG);
	}

	public function info($message)
	{
		return $this->write($message, self::INFO);
	}

	public function warn($message)
	{
		return $this->write($message, self::WARN);
	}

	public function error($message)
	{
		return $this->write($message, self::ERROR);
	}

	public function fatal($message)
	{
		return $this->write($message, self::FATAL);
	}

	protected function mapLevel($levelAsString)
	{
		$nameToLevel = array_flip(self::$levels);
		if (array_key_exists(strtoupper($levelAsString), $nameToLevel)) {
			return $nameToLevel[strtoupper($levelAsString)];
		} else {
			// "Safe default" in case an invalid value is passed in
			return self::ERROR;
		}
	}

	protected function write($message, $level)
	{
		if ($this->enabled && $level <= $this->level) {
			// This causes all messages to show up with a "[error]" in the logged line somewhere
			// Only way to fix this is to either use a formal logging framework, or explicitly write to a file
			return error_log(sprintf("[%s] %s", self::$levels[$level], $message));
		}

		return false;
	}
}
