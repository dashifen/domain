<?php

namespace Dashifen\Domain\Entity\Factory;

use Dashifen\Domain\Entity\EntityInterface;

/**
 * Class AbstractEntityFactory
 *
 * @package Dashifen\Domain\Entity\Factory
 */
class EntityFactory implements EntityFactoryInterface {
	/**
	 * @var string $entityType
	 */
	protected $entityType;
	
	/**
	 * AbstractEntityFactory constructor.
	 *
	 * @param string $entityType
	 */
	final public function __construct(string $entityType = "") {
		if (!empty($entityType)) {
			$this->setEntityType($entityType);
		}
	}
	
	/**
	 * @return string
	 */
	public function getEntityType(): string {
		return $this->entityType;
	}
	
	/**
	 * @param string $entityType
	 *
	 * @return void
	 * @throws EntityFactoryException
	 */
	public function setEntityType(string $entityType): void {
		if (!class_exists($entityType)) {
			throw new EntityFactoryException("Unknown entity: $entityType.", EntityFactoryException::UNKNOWN_ENTITY);
		}
		
		if (!is_a($entityType, "EntityInterface", true)) {
			throw new EntityFactoryException("Not an entity: $entityType.", EntityFactoryException::NOT_AN_ENTITY);
		}
		
		$this->entityType = $entityType;
	}
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface
	 * @throws EntityFactoryException
	 */
	public function newEntity(array $data): EntityInterface {
		if (empty($this->entityType)) {
			throw new EntityFactoryException("Cannot produce entity without type.", EntityFactoryException::UNSET_ENTITY_TYPE);
		}
		
		return new $this->entityType($data);
	}
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface[]
	 * @throws EntityFactoryException
	 */
	public function newEntityCollection(array $data): array {
		if (empty($this->entityType)) {
			throw new EntityFactoryException("Cannot produce entity without type.", EntityFactoryException::UNSET_ENTITY_TYPE);
		}
		
		$entities = [];
		foreach ($data as $datum) {
			$entities[] = $this->newEntity($datum);
		}
		
		return $entities;
	}
	
}
