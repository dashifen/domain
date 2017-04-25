<?php

namespace Dashifen\Domain\Validator;

/**
 * Interface ValidatorInterface
 *
 * @package Dashifen\Domain\Validator
 */
interface ValidatorInterface {
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function validateCreate(array $data = []): bool;
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function validateRead(array $data = []): bool;
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function validateUpdate(array $data = []): bool;
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function validateDelete(array $data = []): bool;
	
	/**
	 * @return array
	 */
	public function getValidationErrors(): array;
}
