<?php

namespace Dashifen\Domain\Payload;

class EmptyPayload extends AbstractPayload {
	public function __construct() {
		parent::__construct(true, "empty");
	}

	// because an EmptyPayload should be empty, we're going to override some
	// of our accessor functions from our abstract parent:
	
	public function getDatum(string $index, $default = null) {
		return $default;
	}
	
	public function setDatum(string $index, $value): void {
		throw new PayloadException("Cannot add data to empty payload.", PayloadException::ATTEMPT_TO_FILL_EMPTY_PAYLOAD);
	}
	
	public function getData(): array {
		return [];
	}
	
	public function setData(array $data): void {
		throw new PayloadException("Cannot add data to empty payload.", PayloadException::ATTEMPT_TO_FILL_EMPTY_PAYLOAD);
	}
}
