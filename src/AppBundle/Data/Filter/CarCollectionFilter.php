<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 10:10
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\Data\Filter;

use JMS\Serializer\Annotation as Serializer;
use BartB\FilterSorterBundle\Data\Filter\FilterInterface;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class CarCollectionFilter implements FilterInterface
{
	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getBrand", setter="setBrand")
	 * @Serializer\Expose()
	 */
	private $brand;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getModel", setter="setModel")
	 * @Serializer\Expose()
	 */
	private $model;

	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getEngineCapacity", setter="setEngineCapacity")
	 * @Serializer\Expose()
	 */
	private $engineCapacity;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getFuelType", setter="setFuelType")
	 * @Serializer\Expose()
	 */
	private $fuelType;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getGearboxType", setter="setGearboxType")
	 * @Serializer\Expose()
	 */
	private $gearboxType;

	/**
	 * @return string|null
	 */
	public function getBrand()
	{
		return $this->brand;
	}

	public function setBrand(string $brand): CarCollectionFilter
	{
		$this->brand = $brand;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getModel()
	{
		return $this->model;
	}

	public function setModel(string $model): CarCollectionFilter
	{
		$this->model = $model;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getEngineCapacity()
	{
		return $this->engineCapacity;
	}

	public function setEngineCapacity(int $engineCapacity): CarCollectionFilter
	{
		$this->engineCapacity = $engineCapacity;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getFuelType()
	{
		return $this->fuelType;
	}

	public function setFuelType(string $fuelType): CarCollectionFilter
	{
		$this->fuelType = $fuelType;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getGearboxType()
	{
		return $this->gearboxType;
	}

	public function setGearboxType(string $gearboxType): CarCollectionFilter
	{
		$this->gearboxType = $gearboxType;

		return $this;
	}
}