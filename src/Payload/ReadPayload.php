<?php

namespace Dashifen\Domain\Payload;

class ReadPayload extends AbstractPayload {
	public function __construct($success, array $data = []) {
		parent::__construct($success, "read");
		$this->setData($data);
	}
}
