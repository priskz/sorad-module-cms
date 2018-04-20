<?php namespace Priskz\SORAD\CMS\Domain\Content\Repository;

use Priskz\Paylorm\Data\MySQL\Eloquent\EntityCrudRepository as Repository;

class CRUD extends Repository
{
	protected $eagerLoad = [
		'children',
	];
}