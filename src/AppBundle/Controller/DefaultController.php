<?php

namespace AppBundle\Controller;

use AppBundle\Data\Filter\CarCollectionFilter;
use AppBundle\Data\Sort\CarSort;
use BartB\FilterSorterBundle\Data\Sorter\Sort;
use BartB\FilterSorterBundle\Data\Sorter\SortDirectionType;
use BartB\FilterSorterBundle\Filter\FilterQueryManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="homepage")
	 */
	public function indexAction(Request $request)
	{
		$carCollectionFilter = (new CarCollectionFilter())
			->setGearboxType('automatic');

		$carSorter     = new CarSort(CarSort::FUEL_TYPE);
		$sortDirection = new SortDirectionType(SortDirectionType::DESC);

		/** @var FilterQueryManager $filterQueryManager */
		$filterQueryManager = $this->get('filter.query.manager');
		$carRepository      = $this->get('repository.car');

		$queryBuilder = $filterQueryManager->getQueryBuilder($carRepository, $carCollectionFilter, new Sort($sortDirection, $carSorter));
		$query        = $queryBuilder->getQuery();
		$result       = $query->execute();

		var_dump($result);

		return $this->render('default/index.html.twig', [
			'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
		]);
	}
}
