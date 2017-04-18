<?php

namespace Dashifen\Domain\Payload;

class UpdatePayload extends AbstractPayload {
	public function __construct($success, array $data = []) {
		parent::__construct($success, "update");
		$this->setData($data);
	}
}
