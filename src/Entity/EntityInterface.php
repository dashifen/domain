<?php

namespace Dashifen\Domain\Entity;

/**
 * Interface EntityInterface
 *
 * @package Dashifen\Domain\Entity
 */
interface EntityInterface {
	/**
	 * @param array $exceptions
	 *
	 * @return array
	 */
	public static function getProperties(array $exceptions = []): array;
	
	/**
	 * @param string $property
	 *
	 * @return mixed|null
	 */
	public function get(string $property);
	
	/**
	 * @param bool $withEmpties
	 *
	 * @return array
	 */
	public function getAll(bool $withEmpties = true): array;
	
	/**
	 * @param array $exceptions
	 * @param bool  $withEmpties
	 *
	 * @return array
	 */
	public function getAllExcept(array $exceptions, bool $withEmpties = true): array;
	
	/**
	 * @return array
	 */
	public function getErrors(): array;
	
	/**
	 * @param string $key
	 * @param        $value
	 *
	 * @throws EntityException
	 * @return void
	 */
	public function set(string $key, $value): void;
	
	/**
	 * @param array $values
	 *
	 * @throws EntityException
	 * @return void
	 */
	public function setAll(array $values): void;
	
	/**
	 * @return bool
	 */
	public function isValid(): bool;
	
	/**
	 * @return bool
	 */
	public function isSavable(): bool;
	
	/**
	 * @return bool
	 */
	public function validate(): bool;
	
}
