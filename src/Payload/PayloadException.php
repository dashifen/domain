<?php

namespace Dashifen\Domain\Payload;

use Dashifen\Domain\DomainException;
use Throwable;

class PayloadException extends DomainException {
	public const ATTEMPT_TO_FILL_EMPTY_PAYLOAD = 1;
	public const UNKNOWN_ERROR = 2;
	
	public function __construct($message = "", $code = 0, Throwable $previous = null) {
		$reflection = new \ReflectionClass(__CLASS__);
		if (!in_array($code, $reflection->getConstants())) {
			$code = self::UNKNOWN_ERROR;
		}
		
		parent::__construct($message, $code, $previous);
	}
}
