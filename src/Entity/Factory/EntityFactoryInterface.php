<?php

namespace Dashifen\Domain\Entity\Factory;

use Dashifen\Domain\Entity\EntityInterface;

interface EntityFactoryInterface {
	/**
	 * @return string
	 */
	public function getEntityType(): string;
	
	/**
	 * @param string $entityType
	 *
	 * @return void
	 * @throws EntityFactoryException
	 */
	public function setEntityType(string $entityType): void;
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface
	 * @throws EntityFactoryException
	 */
	public function newEntity(array $data): EntityInterface;
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface[]
	 * @throws EntityFactoryException
	 */
	public function newEntityCollection(array $data): array;
}
