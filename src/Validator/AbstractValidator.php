<?php

namespace Dashifen\Domain\Validator;

/**
 * Class AbstractExpectation
 *
 * @package Dashifen\Domain\DataExpectation
 */
abstract class AbstractValidator implements ValidatorInterface {
	/**
	 * @var array $validationErrors
	 */
	protected $validationErrors = [];
	
	/**
	 * @return array
	 */
	public function getValidationErrors(): array {
		return $this->validationErrors;
	}
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	abstract public function validateCreate(array $data = []): bool;
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	abstract public function validateRead(array $data = []): bool;
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	abstract public function validateUpdate(array $data = []): bool;
	
	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	abstract public function validateDelete(array $data = []): bool;
}
