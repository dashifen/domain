<?php

namespace Dashifen\Domain\Entity;

use Throwable;

class EntityException extends \Exception {
	public const UNKNOWN_PROPERTY = 1;
	public const PROPERTY_TYPE_MISMATCH = 2;
	public const INVALID_PROPERTY_VALUE = 3;
	public const UNKNOWN_ERROR = 4;
	
	public function __construct($message = "", $code = 0, Throwable $previous = null) {
		$reflection = new \ReflectionClass(__CLASS__);
		if (!in_array($code, $reflection->getConstants())) {
			$code = self::UNKNOWN_ERROR;
		}
		
		parent::__construct($message, $code, $previous);
	}
	
}
