<?php

namespace Dashifen\Domain\Payload\Factory;

use Dashifen\Domain\Payload\CreatePayload;
use Dashifen\Domain\Payload\DeletePayload;
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
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulCreatePayload(array $data = []): PayloadInterface {
		return new CreatePayload(true, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulReadPayload(array $data = []): PayloadInterface {
		return new ReadPayload(true, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulUpdatePayload(array $data = []): PayloadInterface {
		return new UpdatePayload(true, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulDeletePayload(array $data = []): PayloadInterface {
		return new DeletePayload(true, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newSuccessfulOtherPayload(array $data = []): PayloadInterface {
		return new OtherPayload(true, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulCreatePayload(array $data = []): PayloadInterface {
		return new CreatePayload(false, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulReadPayload(array $data = []): PayloadInterface {
		return new ReadPayload(false, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulUpdatePayload(array $data = []): PayloadInterface {
		return new UpdatePayload(false, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulDeletePayload(array $data = []): PayloadInterface {
		return new DeletePayload(false, $data);
	}
	
	/**
	 * @param array $data ;
	 *
	 * @return PayloadInterface
	 */
	public function newUnsuccessfulOtherPayload(array $data = []): PayloadInterface {
		return new OtherPayload(false, $data);
	}
}
