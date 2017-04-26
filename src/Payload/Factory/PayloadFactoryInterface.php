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
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulCreatePayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulReadPayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulUpdatePayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulDeletePayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulOtherPayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulCreatePayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulReadPayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulUpdatePayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulDeletePayload(array $data = []): PayloadInterface;
	
	/**
	 * @param array $data;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulOtherPayload(array $data = []): PayloadInterface;
	
	/**
	 * @return PayloadInterface
	 */
	public function newEmptyPayload(): PayloadInterface;
}
