<?php

namespace Dashifen\Domain;

use Dashifen\Domain\Payload\PayloadInterface;

interface DomainInterface {
	
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
