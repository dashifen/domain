<?php

namespace Dashifen\Domain\Entity\Factory;

use Dashifen\Domain\Entity\EntityException;
use Dashifen\Domain\Entity\EntityInterface;

/**
 * Class AbstractEntityFactory
 *
 * @package Dashifen\Domain\Entity\Factory
 */
abstract class AbstractEntityFactory implements EntityFactoryInterface {
	/**
	 * @var string $entityType
	 */
	protected $entityType;
	
	/**
	 * AbstractEntityFactory constructor.
	 *
	 * @param string $entityType
	 *
	 * @throws EntityException
	 */
	final public function __construct(string $entityType = "") {
		
		// we allow $entityType to be blank and, when it is, we assume that the
		// name of this class is {entityType}Factory.  so, if it's blank, we'll
		// get that name and manipulate it to produce what we expect.  if we don't
		// get something useful, the exception below will get thrown.
		
		if (empty($entityType)) {
			$entityType = str_replace("Factory", "", get_class());
		}
		
		// $entityType must be the name of an implementation of the EntityInterface.
		// otherwise, this factory won't be able to produce them.  so, we'll check that
		// here.
		
		if (!class_exists($entityType) || !is_subclass_of($entityType, "EntityInterface")) {
			throw new EntityException("Unknown entity type: $entityType.");
		}
		
		$this->entityType = $entityType;
	}
	
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface
	 */
	public function newEntity(array $data): EntityInterface {
		return new $this->entityType($data);
	}
	
	/**
	 * @param array $data
	 *
	 * @return EntityInterface[]
	 */
	public function newEntityCollection(array $data): array {
		$entities = [];
		foreach ($data as $datum) {
			$entities[] = $this->newEntity($datum);
		}
		
		return $entities;
	}
	
}
