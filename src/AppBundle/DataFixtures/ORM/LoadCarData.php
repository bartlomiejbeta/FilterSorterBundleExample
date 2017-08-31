<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 09:41
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\DataFixtures\ORM;


use AppBundle\DataFixtures\Common\CarTrait;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCarData implements FixtureInterface
{
	use CarTrait;

	/** @inheritdoc */
	public function load(ObjectManager $manager)
	{
		$bmwM3 = self::createCar('bmw','m3',3000,'petrol','manual');
		$jaguarFType = self::createCar('jaguar','f-type',3000,'petrol','automatic');

		$manager->persist($bmwM3);
		$manager->persist($jaguarFType);

		$manager->flush();
	}

}