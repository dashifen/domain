<?php

namespace Dashifen\Domain\Transformer;

use Dashifen\Domain\Payload\PayloadInterface;

/**
 * Interface TransformerInterface
 *
 * @package Dashifen\Domain\Transformer
 */
interface TransformerInterface {
	/**
	 * @param PayloadInterface $payload
	 *
	 * @return PayloadInterface
	 */
	public function transformCreate(PayloadInterface $payload): PayloadInterface;
	
	/**
	 * @param PayloadInterface $payload
	 *
	 * @return PayloadInterface
	 */
	public function transformRead(PayloadInterface $payload): PayloadInterface;
	
	/**
	 * @param PayloadInterface $payload
	 *
	 * @return PayloadInterface
	 */
	public function transformUpdate(PayloadInterface $payload): PayloadInterface;
	
	/**
	 * @param PayloadInterface $payload
	 *
	 * @return PayloadInterface
	 */
	public function transformDelete(PayloadInterface $payload): PayloadInterface;
}
