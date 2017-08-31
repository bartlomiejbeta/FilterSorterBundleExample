<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 10:54
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\Repository\Specification;


use BartB\FilterSorterBundle\Data\Sorter\Sort;
use Happyr\DoctrineSpecification\BaseSpecification;
use Happyr\DoctrineSpecification\Spec;

class OrderByFieldSpecification extends BaseSpecification
{
	/** @var Sort */
	private $sortType;

	public function __construct(Sort $sortType, $dqlAlias = null)
	{
		parent::__construct($dqlAlias);
		$this->sortType = $sortType;
	}

	/** @inheritdoc */
	public function getSpec()
	{
		$orderField = $this->sortType->getSortableEnum()->getValue();
		$direction  = $this->sortType->getSortDirection()->getValue();

		return Spec::orderBy($orderField, $direction);
	}
}