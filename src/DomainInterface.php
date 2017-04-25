<?php

namespace Dashifen\Domain;

use Dashifen\Domain\Payload\PayloadInterface;

interface DomainInterface {
	/**
	 * gets the entity type that this domain works with
	 *
	 * @return string
	 */
	public function getEntityType(): string;
	
	/**
	 * sets the entity type that the domain works with, likely passing
	 * it onto an instance of an EntityFactory.
	 *
	 * @param string $entityType
	 *
	 * @return void
	 */
	public function setEntityType(string $entityType): void;
	
	/**
	 * creates the specified entities in the database and returns their IDs
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	public function create(array $data): PayloadInterface;
	
	/**
	 * reads information from the database returning a list of entities
	 *
	 * @param array $criteria
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	public function read(array $criteria = []): PayloadInterface;
	
	/**
	 * updates the specified entities in the database returning the number of affected rows
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	public function update(array $data): PayloadInterface;
	
	/**
	 * deletes the specified entities returning the number of affected rows.
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	public function delete(array $data): PayloadInterface;
}
