<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 31.08.2017
 * Time: 10:55
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace AppBundle\Repository\Specification;


use Happyr\DoctrineSpecification\BaseSpecification;
use Happyr\DoctrineSpecification\Spec;

class FieldSpecification extends BaseSpecification
{
	/** @var string */
	private $fieldName;
	/** @var */
	private $fieldValue;

	public function __construct(string $fieldName, $fieldValue, $dqlAlias = null)
	{
		parent::__construct($dqlAlias);

		$this->fieldName  = $fieldName;
		$this->fieldValue = $fieldValue;
	}

	/** @inheritdoc */
	public function getSpec()
	{
		return Spec::eq($this->fieldName, $this->fieldValue);
	}
}