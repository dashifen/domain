<?php

namespace Dashifen\Domain\Payload;

class OtherPayload extends AbstractPayload {
	public function __construct($success, array $data = []) {
		parent::__construct($success, "other");
		$this->setData($data);
	}
}
