<?php

namespace Dashifen\Domain\Payload;

/**
 * Class AbstractPayload
 *
 * @package Dashifen\Domain\Payload
 */
abstract class AbstractPayload implements PayloadInterface {
	/**
	 * @var array $data
	 */
	protected $data = [];
	
	/**
	 * @var bool $successful
	 */
	protected $success = false;
	
	/**
	 * @var string $type
	 */
	protected $type;
	
	/**
	 * AbstractPayload constructor.
	 *
	 * @param bool   $success
	 * @param string $type
	 */
	
	public function __construct(bool $success, string $type) {
		$this->success = $success;
		$this->type = $type;
	}
	
	/**
	 * returns the type of this payload (e.g. create vs. read)
	 *
	 * @return string
	 */
	public function getType(): string {
		return $this->type;
	}
	
	/**
	 * returns the internal record of success
	 *
	 * @return bool
	 */
	public function getSuccess(): bool {
		return $this->success;
	}
	
	/**
	 * given an $index, return its data or $default if it doesn't exist
	 *
	 * @param string     $index
	 * @param mixed|null $default
	 *
	 * @return mixed|null
	 */
	public function getData(string $index, $default = null) {
		return $this->data[$index] ?? $default;
	}
	
	/**
	 * saves $value at $index in our internal data
	 *
	 * @param string $index
	 * @param mixed  $value
	 * @return void
	 */
	public function setDatum(string $index, $value): void {
		$this->data[$index] = $value;
	}
	
	/**
	 * @param array $data
	 * @return void
	 */
	public function setData(array $data): void {
		
		// at first blush, it might seem like we could simply do $this->data = $data
		// and call it a day.  but, because we may have set other indices not found
		// within $data, we want make sure that we don't remove those by replacing
		// our data property with our data argument.
		
		foreach ($data as $index => $value) {
			$this->setDatum($index, $value);
		}
	}
	
	/**
	 * resets internal data array
	 */
	public function reset(): void {
		$this->data = [];
	}
	
}
