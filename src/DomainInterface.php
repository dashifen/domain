<?php

namespace Dashifen\Domain;

use Dashifen\Domain\Entity\EntityInterface;

interface DomainInterface {
	
	/**
	 * creates the specified entities in the database and returns their IDs
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return array
	 */
	public function create(array $data): array;
	
	/**
	 * reads information from the database returning a list of entities
	 *
	 * @param array $criteria
	 *
	 * @throws DomainException
	 * @return EntityInterface[]
	 */
	public function read(array $criteria = []): array;
	
	/**
	 * updates the specified entities in the database returning the number of affected rows
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return int
	 */
	public function update(array $data): int;
	
	/**
	 * deletes the specified entities returning the number of affected rows.
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return int
	 */
	public function delete(array $data): int;
}
