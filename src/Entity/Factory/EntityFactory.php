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
		
		// now that we know a class with the name of entityType exists, we need
		// to see if it is an implementation of our EntityInterface object.  the
		// use of the Aura DI container to inject dependencies seems to prevent
		// the use of the PHP is_a() and is_subclass_of() functions.  instead,
		// we'll try to instantiate it like it's an EntityInterface and then we
		// can use the instanceof operator to be sure.
		
		$this->entityType = $entityType;
		$temp = $this->newEntity([]);
		
		if (!($temp instanceof EntityInterface)) {
			
			// if that didn't work, then not only do we want to throw an
			// exception, but we also want to be sure that we set the
			// entityType property back to null so that it doesn't accidentally
			// get used elsewhere after the exception is caught.
			
			$this->entityType = null;
			throw new EntityFactoryException("Not an entity: $entityType.", EntityFactoryException::NOT_AN_ENTITY);
		}
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
