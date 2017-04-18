<?php

namespace Dashifen\Domain\Entity\Factory;

use Dashifen\Domain\Entity\EntityInterface;

interface EntityFactoryInterface {
	/**
	 * @param array $data
	 *
	 * @return EntityInterface
	 */
	public function newEntity(array $data): EntityInterface;
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface[]
	 */
	public function newEntityCollection(array $data): array;
}
