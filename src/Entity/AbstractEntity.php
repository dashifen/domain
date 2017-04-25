<?php

namespace Dashifen\Domain\Entity;

/**
 * Class AbstractEntity
 *
 * @package Dashifen\Domain\Entity
 */
abstract class AbstractEntity implements EntityInterface {
	protected $errors = null;
	
	/**
	 * AbstractEntity constructor.
	 *
	 * @param array $values
	 */
	final public function __construct(array $values) {
		$this->setAll($values);
	}
	
	/**
	 * @param array $values
	 *
	 * @throws EntityException
	 * @returns void
	 */
	public function setAll(array $values): void {
		$skipped = array();
		
		foreach ($values as $key => $value) {
			try {
				$this->set($key, $value);
			} catch (EntityException $e) {
				$skipped[$key] = $value;
			}
		}
		
		if (($skippedCount = sizeof($skipped)) > 0) {
			$message = sprintf("Unknown %s (%s) in %s.",
				$skippedCount === 1 ? "property" : "properties",
				join(", ", $skipped),
				get_class()
			);
			
			throw new EntityException($message, EntityException::UNKNOWN_PROPERTY);
		}
	}
	
	/**
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @throws EntityException
	 * @returns void
	 */
	public function set(string $key, $value): void {
		if (!property_exists($this, $key)) {
			throw new EntityException(
				sprintf("Unknown property (%s) in %s.", $key, get_class()),
				EntityException::UNKNOWN_PROPERTY
			);
		}
		
		$this->{$key} = $value;
	}
	
	/**
	 * @param string $property
	 *
	 * @returns mixed|null
	 */
	public function get(string $property) {
		
		// since our $errors property is special, we don't want to return it
		// here.  instead, it should be returned when someone calls the validate
		// method below.
		
		return property_exists($this, $property) && $property !== "errors"
			? $this->{$key}
			: null;
	}
	
	/**
	 * @param array $exceptions
	 * @param bool  $withEmpties
	 *
	 * @return array
	 */
	public function getAllExcept(array $exceptions, bool $withEmpties = true): array {
		$properties = $this->getAll($withEmpties);
		
		// the $properties is an associative array of this object's properties
		// and their values.  the $exceptions argument is a list of the properties
		// we do not want to retrieve.  so, we'll get the keys of $properties and
		// for those that are in $exceptions, we unset them.  note: the $errors
		// property is not returned from getAll so we don't have to worry about
		// it being returned from here.
		
		$keys = array_keys($properties);
		foreach ($keys as $key) {
			if (in_array($key, $exceptions)) {
				unset($properties[$key]);
			}
		}
		
		return $properties;
	}
	
	/**
	 * @param bool $withEmpties
	 *
	 * @return array
	 */
	public function getAll(bool $withEmpties = true): array {
		$properties = get_object_vars($this);
		
		// our $errors property shouldn't be accessed except with the
		// specialized getErrors() method below.  so, we'll unset that
		// one here.
		
		unset($properties["errors"]);
		
		// if we do not want the empty properties, we can use the default
		// behavior of array_filter, which removes any values that appear
		// to be false-y, to get rid of them.
		
		if (!$withEmpties) {
			$properties = array_filter($properties);
		}
		
		return $properties;
	}
	
	/**
	 * @return array
	 */
	public function getErrors(): array {
		return $this->errors;
	}
	
	/**
	 * @param array $exceptions
	 *
	 * @return array
	 */
	public static function getProperties(array $exceptions = []): array {
		
		// because we're static, we can't use $this and get_object_vars().
		// we could use the class name and get_class_vars() but then we'd only
		// get public properties, and we want public and protected ones.  so,
		// we'll use a ReflectionClass.
		
		$reflection = new \ReflectionClass(get_called_class());
		$properties = $reflection->getProperties(
			\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED
		);
		
		$temp = [];
		foreach ($properties as $property) {
			$property = $property->getName();
			
			// we don't really care where in the $exceptions we find $property
			// so we'll use in_array(): bool instead of array_search(): mixed
			// here.
			
			if (!in_array($property, $exceptions)) {
				$temp[] = $property;
			}
		}
		
		return $temp;
	}
	
	public function isSavable(): bool {
		
		// by default, an entity that is savable is one that is valid.
		// this may not be the case for all entities, though, so our
		// children can change this as needed.
		
		return $this->isValid();
	}
	
	public function isValid(): bool {
		
		// by default, an entity that is valid, is one that has no errors.
		// if our $errors property is null, we'll call the validate() method
		// to initialize it and then we can see if it has contents to see
		// if we're valid.
		
		if (is_null($this->errors)) {
			$this->validate();
		}
		
		return sizeof($this->errors) === 0;
	}
	
	/**
	 * checks this entity for errors and returns a true if it found some,
	 * false otherwise.
	 *
	 * @return bool
	 */
	abstract public function validate(): bool;
}
