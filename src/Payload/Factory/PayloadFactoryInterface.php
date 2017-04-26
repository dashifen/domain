<?php

namespace Dashifen\Domain\Payload\Factory;

use Dashifen\Domain\Payload\PayloadInterface;

/**
 * Interface PayloadFactoryInterface
 *
 * @package Dashifen\Domain\Payload\Factory
 */
interface PayloadFactoryInterface {
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newCreatePayload(bool $success, array $data = []): PayloadInterface;
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newReadPayload(bool $success, array $data = []): PayloadInterface;
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newUpdatePayload(bool $success, array $data = []): PayloadInterface;
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newDeletePayload(bool $success, array $data = []): PayloadInterface;
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newOtherPayload(bool $success, array $data = []): PayloadInterface;
	
	/**
	 * @return PayloadInterface
	 */
	public function newEmptyPayload(): PayloadInterface;
}
