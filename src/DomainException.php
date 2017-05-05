<?php

namespace Dashifen\Domain;

class DomainException extends \Exception {
	public const UNKNOWN_ERROR = 1;
	public const UNEXPECTED_BEHAVIOR = 2;
	
	public function __construct($message = "", $code = 0, \Throwable $previous = null) {
		$reflection = new \ReflectionClass($this);
		if (!in_array($code, $reflection->getConstants())) {
			$code = self::UNKNOWN_ERROR;
		}
		
		parent::__construct($message, $code, $previous);
	}
}
