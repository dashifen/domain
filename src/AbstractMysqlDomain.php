<?php

namespace Dashifen\Domain;

use Dashifen\Database\Mysql\MysqlInterface;
use Dashifen\Domain\Payload\PayloadInterface;
use Dashifen\Domain\Entity\Factory\EntityFactoryInterface;
use Dashifen\Domain\Payload\Factory\PayloadFactoryInterface;
use Dashifen\Session\SessionInterface;

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
	
	/**
	 * @var SessionInterface $session
	 */
	protected $session;
	
	/**
	 * AbstractMysqlDomain constructor.
	 *
	 * @param MysqlInterface          $db
	 * @param SessionInterface        $session
	 * @param EntityFactoryInterface  $entityFactory
	 * @param PayloadFactoryInterface $payloadFactory
	 */
	public function __construct(
		MysqlInterface $db,
		SessionInterface $session,
		EntityFactoryInterface $entityFactory,
		PayloadFactoryInterface $payloadFactory
	) {
		$this->db = $db;
		$this->session = $session;
		$this->entityFactory = $entityFactory;
		$this->payloadFactory = $payloadFactory;
	}
	
	/**
	 * creates the specified entities in the database and returns their IDs
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	abstract public function create(array $data): PayloadInterface;
	
	/**
	 * reads information from the database returning a list of entities
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	abstract public function read(array $data = []): PayloadInterface;
	
	/**
	 * updates the specified entities in the database returning the number of affected rows
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	abstract public function update(array $data): PayloadInterface;
	
	/**
	 * deletes the specified entities returning the number of affected rows.
	 *
	 * @param array $data
	 *
	 * @throws MysqlDomainException
	 * @return PayloadInterface
	 */
	abstract public function delete(array $data): PayloadInterface;
}
