<?php

namespace Dashifen\Domain\Payload;

/**
 * Interface PayloadInterface
 *
 * @package Dashifen\Domain\Payload
 */
interface PayloadInterface {
	/**
	 * @return string
	 */
	public function getType(): string;
	
	/**
	 * @return bool
	 */
	public function getSuccess(): bool;
	
	/**
	 * @param string $index
	 * @param mixed  $default
	 *
	 * @return mixed|null
	 */
	public function getDatum(string $index, $default = null);
	
	/**
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @return void
	 */
	public function setDatum(string $key, $value): void;
	
	/**
	 * @returns array
	 */
	public function getData(): array;
	
	/**
	 * @param array $data
	 */
	public function setData(array $data): void;
	
	/**
	 * @return void
	 */
	public function reset(): void;
}
