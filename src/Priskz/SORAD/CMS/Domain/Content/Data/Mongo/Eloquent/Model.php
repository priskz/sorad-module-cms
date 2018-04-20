<?php namespace Priskz\SORAD\CMS\Domain\Content\Data\Mongo\Eloquent;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
use Priskz\Payload\Payload;

class Model extends MongoModel
{
	/**
	 * @var Collection Name
	 */
	protected $collection = 'content';

	/**
	 * @var Database Connection Name
	 */
	protected $connection = 'mongodb';
}