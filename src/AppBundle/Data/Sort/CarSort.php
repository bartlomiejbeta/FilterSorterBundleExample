<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 10:30
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\Data\Sort;


use BartB\FilterSorterBundle\Data\Sorter\SortableEnum;
use MyCLabs\Enum\Enum;

/**
 * @method static CarSort BRAND()
 * @method static CarSort MODEL()
 * @method static CarSort ENGINE_CAPACITY()
 * @method static CarSort FUEL_TYPE()
 * @method static CarSort GEARBOX_TYPE()
 */
class CarSort extends Enum implements SortableEnum
{
	const BRAND           = 'brand';
	const MODEL           = 'model';
	const ENGINE_CAPACITY = 'engineCapacity';
	const FUEL_TYPE       = 'fuelType';
	const GEARBOX_TYPE    = 'gearboxType';
}