<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 09:59
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\Service\Filter\Adapter;


use AppBundle\Data\Filter\CarCollectionFilter;
use AppBundle\Repository\CarRepository;
use AppBundle\Repository\Specification\FieldSpecification;
use AppBundle\Repository\Specification\OrderByFieldSpecification;
use BartB\FilterSorterBundle\Data\Filter\FilterAdapterInterface;
use BartB\FilterSorterBundle\Data\Filter\FilterContextInterface;
use BartB\FilterSorterBundle\Data\Filter\FilterInterface;
use BartB\FilterSorterBundle\Data\Sorter\Sort;
use BartB\FilterSorterBundle\Repository\AbstractEntitySpecificationAwareRepository;
use Doctrine\ORM\QueryBuilder;
use Happyr\DoctrineSpecification\Spec;
use Happyr\DoctrineSpecification\Specification\Specification;

class FilterCarAdapter implements FilterAdapterInterface
{
	const CAR_ALIAS = 'car';

	/** @inheritdoc */
	public function supports(AbstractEntitySpecificationAwareRepository $entityRepository, FilterContextInterface $filterContext = null): bool
	{
		return $entityRepository instanceof CarRepository;
	}

	/** @inheritdoc */
	public function getQueryBuilder(AbstractEntitySpecificationAwareRepository $entityRepository): QueryBuilder
	{
		$entityRepository->setAlias(self::CAR_ALIAS);

		$query = $entityRepository->createQueryBuilder(self::CAR_ALIAS);

		return $query;
	}

	/**
	 * @inheritdoc
	 *
	 * @param $filter CarCollectionFilter
	 */
	public function getSpecification(FilterInterface $filter): Specification
	{
		$filtersToApply = [];

		$brand = $filter->getBrand();

		if (false === empty($brand))
		{
			$filtersToApply[] = new FieldSpecification('brand', $brand);
		}

		$model = $filter->getModel();

		if (false === empty($model))
		{
			$filtersToApply[] = new FieldSpecification('model', $model);
		}

		$engineCapacity = $filter->getEngineCapacity();

		if (false === empty($engineCapacity))
		{
			$filtersToApply[] = new FieldSpecification('engineCapacity', $engineCapacity);
		}

		$fuelType = $filter->getFuelType();

		if (false === empty($fuelType))
		{
			$filtersToApply[] = new FieldSpecification('fuelType', $fuelType);
		}

		$gearboxType = $filter->getGearboxType();

		if (false === empty($gearboxType))
		{
			$filtersToApply[] = new FieldSpecification('gearboxType', $gearboxType);
		}

		return $spec = forward_static_call_array([Spec::class, 'andX'], $filtersToApply);
	}

	/** @inheritdoc */
	public function getOrderSpecification(Sort $sort): Specification
	{
		return new OrderByFieldSpecification($sort);
	}
}