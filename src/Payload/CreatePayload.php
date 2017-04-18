<?php

namespace Dashifen\Domain\Payload;

class CreatePayload extends AbstractPayload {
	public function __construct($success, array $data = []) {
		parent::__construct($success, "create");
		$this->setData($data);
	}
}
