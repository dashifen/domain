<?php

namespace Dashifen\Domain\Payload;

class DeletePayload extends AbstractPayload {
	public function __construct($success, array $data = []) {
		parent::__construct($success, "delete");
		$this->setData($data);
	}
}
