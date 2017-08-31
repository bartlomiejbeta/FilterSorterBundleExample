<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 09:42
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\DataFixtures\Common;


use AppBundle\Entity\Car;

trait CarTrait
{
	public static function createCar(string $brand, string $model, int $engineCapacity, string $fuelType, string $gearboxType): Car
	{
		$car = (new Car())
			->setBrand($brand)
			->setModel($model)
			->setEngineCapacity($engineCapacity)
			->setFuelType($fuelType)
			->setGearboxType($gearboxType);

		return $car;
	}
}