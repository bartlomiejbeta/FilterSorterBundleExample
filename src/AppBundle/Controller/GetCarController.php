<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 15:10
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\Controller;


use AppBundle\Data\Filter\CarCollectionFilter;
use BartB\FilterSorterBundle\Data\Sorter\Sort;
use BartB\FilterSorterBundle\Filter\FilterQueryManager;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GetCarController
 *
 * paramConverters example usage
 *
 * @package AppBundle\Controller
 */
class GetCarController extends FOSRestController
{
	/**
	 * @Rest\Route("/api/cars", name="get_cars")
	 * @ParamConverter("carCollectionFilter", converter="filter")
	 * @ParamConverter("sort", converter="sort", options={"enum":"AppBundle\Data\Sort\CarSort"})
	 */
	public function getCarCollection(Request $request, CarCollectionFilter $carCollectionFilter = null, Sort $sort = null): Response
	{
		/** @var FilterQueryManager $filterQueryManager */
		$filterQueryManager = $this->get('filter.query.manager');
		$carRepository      = $this->get('repository.car');

		$queryBuilder = $filterQueryManager->getQueryBuilder($carRepository, $carCollectionFilter, $sort);
		$query        = $queryBuilder->getQuery();
		$result       = $query->execute();

		$view = $this->view($result,Response::HTTP_OK);

		return $this->handleView($view);
	}
}