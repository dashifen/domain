<?php

namespace Dashifen\Domain;

use Dashifen\Database\Mysql\MysqlInterface;
use Dashifen\Domain\Entity\EntityInterface;
use Dashifen\Domain\Entity\Factory\EntityFactoryInterface;
use Dashifen\Domain\Payload\Factory\PayloadFactoryInterface;

/**
 * Class AbstractMysqlDomain
 *
 * while a domain use any type of storage, the ones that Dash usually works
 * with use MySQL to do so.  so, he's included this as an abstract base class
 * for his own convenience.
 *
 * @package Dashifen\Domain
 */
abstract class AbstractMysqlDomain implements DomainInterface {
	/**
	 * @var MysqlInterface $db;
	 */
	protected $db;
	
	/**
	 * @var EntityFactoryInterface $entityFactory
	 */
	protected $entityFactory;
	
	/**
	 * @var PayloadFactoryInterface $payloadFactory
	 */
	protected $payloadFactory;
	
	public function __construct(
		MysqlInterface $db,
		EntityFactoryInterface $entityFactory,
		PayloadFactoryInterface $payloadFactory
	) {
		$this->db = $db;
		$this->entityFactory = $entityFactory;
		$this->payloadFactory = $payloadFactory;
	}
	
	/**
	 * creates the specified entities in the database and returns their IDs
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return array
	 */
	abstract public function create(array $data): array;
	
	/**
	 * reads information from the database returning a list of entities
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return EntityInterface[]
	 */
	abstract public function read(array $data = []): array;
	
	/**
	 * updates the specified entities in the database returning the number of affected rows
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return int
	 */
	abstract public function update(array $data): int;
	
	/**
	 * deletes the specified entities returning the number of affected rows.
	 *
	 * @param array $data
	 *
	 * @throws DomainException
	 * @return int
	 */
	abstract public function delete(array $data): int;
}
