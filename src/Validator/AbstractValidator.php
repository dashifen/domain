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
	 * confirms that $expected values have been $provided.
	 *
	 * @param array $expected
	 * @param array $provided
	 *
	 * @return bool
	 */
	protected function confirmExpectations(array $expected, array $provided): bool {
		
		// the array_intersect() function returns the items in the first
		// parameter that are also found in the second one.  so if the
		// intersection of $expected and $provided is equal to $expected,
		// we've confirmed our expectations.  the intersection shouldn't
		// alter the item order, but just in case that changes, we'll not
		// use the identity operator here and just check for equality.
		
		return array_intersect($expected, $provided) == $expected;
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
