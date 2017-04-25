<?php

namespace Dashifen\Domain\DataExpectation;

/**
 * Class AbstractExpectation
 *
 * @package Dashifen\Domain\DataExpectation
 */
abstract class AbstractDataExpectation implements DataExpectationInterface {
	/**
	 * @var array $validationErrors
	 */
	protected $validationErrors = [];
	
	/**
	 * @var array $transformationErrors
	 */
	protected $transformationErrors = [];
	
	/**
	 * @return array
	 */
	public function getValidationErrors(): array {
		return $this->validationErrors;
	}
	
	/**
	 * @return array
	 */
	public function getTransformationErrors(): array {
		return $this->transformationErrors;
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
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	abstract public function transformCreate(array $data = []): array;
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	abstract public function transformRead(array $data = []): array;
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	abstract public function transformUpdate(array $data = []): array;
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	abstract public function transformDelete(array $data = []): array;
}
