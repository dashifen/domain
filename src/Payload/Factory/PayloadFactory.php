<?php

namespace Dashifen\Domain\Payload\Factory;

use Dashifen\Domain\Payload\CreatePayload;
use Dashifen\Domain\Payload\DeletePayload;
use Dashifen\Domain\Payload\EmptyPayload;
use Dashifen\Domain\Payload\OtherPayload;
use Dashifen\Domain\Payload\PayloadInterface;
use Dashifen\Domain\Payload\ReadPayload;
use Dashifen\Domain\Payload\UpdatePayload;

/**
 * Class PayloadFactory
 *
 * @package Dashifen\Domain\Payload\Factory
 */
class PayloadFactory implements PayloadFactoryInterface {
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newCreatePayload(bool $success, array $data = []): PayloadInterface {
		return new CreatePayload($success, $data);
	}
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newReadPayload(bool $success, array $data = []): PayloadInterface {
		return new ReadPayload($success, $data);
	}
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newUpdatePayload(bool $success, array $data = []): PayloadInterface {
		return new UpdatePayload($success, $data);
	}
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newDeletePayload(bool $success, array $data = []): PayloadInterface {
		return new DeletePayload($success, $data);
	}
	
	/**
	 * @param bool  $success
	 * @param array $data
	 *
	 * @return PayloadInterface
	 */
	public function newOtherPayload(bool $success, array $data = []): PayloadInterface {
		return new OtherPayload($success, $data);
	}
	
	/**
	 * @return PayloadInterface
	 */
	public function newEmptyPayload(): PayloadInterface {
		return new EmptyPayload();
	}
}
