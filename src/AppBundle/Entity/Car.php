<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 */
class Car
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="model", type="string", length=255)
	 */
	private $model;

    /**
     * @var int
     *
     * @ORM\Column(name="engine_capacity", type="integer")
     */
    private $engineCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="fuel_type", type="string", length=255)
     */
    private $fuelType;

    /**
     * @var string
     *
     * @ORM\Column(name="gearbox_type", type="string", length=255)
     */
    private $gearboxType;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set engineCapacity
     *
     * @param integer $engineCapacity
     *
     * @return Car
     */
    public function setEngineCapacity($engineCapacity)
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    /**
     * Get engineCapacity
     *
     * @return int
     */
    public function getEngineCapacity()
    {
        return $this->engineCapacity;
    }

    /**
     * Set fuelType
     *
     * @param string $fuelType
     *
     * @return Car
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * Get fuelType
     *
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Set gearboxType
     *
     * @param string $gearboxType
     *
     * @return Car
     */
    public function setGearboxType($gearboxType)
    {
        $this->gearboxType = $gearboxType;

        return $this;
    }

    /**
     * Get gearboxType
     *
     * @return string
     */
    public function getGearboxType()
    {
        return $this->gearboxType;
    }

	/**
	 * Get model
	 *
	 * @return string
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * Set model
	 *
	 * @param string $model
	 *
	 * @return Car
	 */
	public function setModel($model)
	{
		$this->model = $model;

		return $this;
	}
}

