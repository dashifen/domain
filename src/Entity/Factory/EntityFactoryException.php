<?php

namespace Dashifen\Domain\Entity\Factory;

use Throwable;

class EntityFactoryException extends \Exception {
	public const UNSET_ENTITY_TYPE = 1;
	public const UNKNOWN_ENTITY = 2;
	public const UNKNOWN_ERROR  = 3;
	
	public function __construct($message = "", $code = 0, Throwable $previous = null) {
		$reflection = new \ReflectionClass(__CLASS__);
		if (!in_array($code, $reflection->getConstants())) {
			$code = self::UNKNOWN_ERROR;
		}
		
		parent::__construct($message, $code, $previous);
	}
}
