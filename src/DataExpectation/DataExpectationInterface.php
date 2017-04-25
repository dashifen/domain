<?php

namespace Dashifen\Domain\DataExpectation;

/**
 * Interface DataExpectationInterface
 *
 * Objects implementing this interface could be understood to break the single
 * responsibility principle because they'll both perform both validation and
 * transformation actions on data -- either coming from a data source or from
 * the visitor.  but, both of these actions requires a knowledge of what we
 * expect within our data, and that's how we're defining these objects' single
 * responsibility:  they know about our expectations and can ensure that we
 * meet them before move on.
 *
 * @package Dashifen\Domain\DataExpectationInterface
 */
interface DataExpectationInterface {
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
	 * @param array $data
	 *
	 * @return array
	 */
	public function transformCreate(array $data = []): array;
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function transformRead(array $data = []): array;
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function transformUpdate(array $data = []): array;
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function transformDelete(array $data = []): array;
	
	/**
	 * @return array
	 */
	public function getValidationErrors(): array;
	
	/**
	 * @return array
	 */
	public function getTransformationErrors(): array;
}
