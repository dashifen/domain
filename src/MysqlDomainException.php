<?php

namespace Dashifen\Domain;

use Dashifen\Database\DatabaseExceptionInterface;

/**
 * Class DomainException
 *
 * @package Dashifen\Domain
 */
class MysqlDomainException extends DomainException implements DatabaseExceptionInterface {
	/**
	 * @var string $query
	 */
	protected $query;
	
	/**
	 * @return string
	 */
	public function getQuery(): string {
		return $this->query;
	}
	
	/**
	 * @param string $query
	 */
	public function setQuery(string $query): void {
		$this->query = $query;
	}
}
