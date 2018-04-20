<?php namespace Priskz\SORAD\CMS\Domain\Template\Repository;

use Priskz\Paylorm\Data\MySQL\Eloquent\CrudRepository;
use Priskz\Payload\Payload;

class CRUD extends CrudRepository
{
	/**
	 * Eager loading configuration. Note: This is good for loading
	 * relationships that are statically assigned.
	 */
	protected $eagerLoad = [
		'parent', 'schema'
	];

	/**
	 * Update the given Model with the given data
	 *
	 * @param  mixed  $object
	 * @param  array  $data
	 * @return Payload
	 */
	public function update($data, $object)
	{
		foreach($object->getSchema()->getDefinition(true)['passive'] as $passive)
		{
			$data[$passive] = $object->$passive;
		}

		foreach($object->getSchema()->getDefinition(true)['index'] as $index)
		{
			$dataKeys[] = $index['property'];
		}

		$instance = json_encode($data);

		$data = array_intersect_key($data, array_flip($dataKeys));

		$data['instance'] = $instance;

		$updated = $object->update($data);

		if($updated)
		{
			return new Payload($object , 'updated');
		}

		return new Payload($object, 'not_updated');
	}

	/**
	 * @todo: Deprecate this
	 * 
	 *	Search for a Tempalte with the data provided.
	 *
	 *	@param  $data   array
	 *	@return Payload
	 */
	public function find($type, $slug)
	{
		// Look for exact slug match.
	    $query = $this->model->where('model_type', '=', $type)
							 ->where('slug', '=', $slug);

	    $retrieved = $this->retrieve($query);

		if($retrieved->isEmpty())
		{
			// Look for exact type match.
		    $query = $this->model->where('model_type', 'LIKE', $type);

		    $retrieved = $this->retrieve($query);
		    
		    if($retrieved->isEmpty())
			{
		    	return new Payload(null, 'not_found');
			}

			return new Payload($retrieved, 'found');
		}

		return new Payload($retrieved, 'found');
	}

	/**
	 * @todo: Deprecate this
	 * 
	 *	Get all Template(s) by type.
	 *
	 *	@param  $type
	 *	@return Payload
	 */
	public function getAllByType($type)
	{
	    $query = $this->model
	    	->where('model_type', '=', $type);

	    $retrieved = $this->retrieve($query);

		if($retrieved->isEmpty())
		{
			return new Payload(null, 'not_found');
		}

		return new Payload($retrieved, 'found');
	}

	/**
	 * @todo: Deprecate this
	 * 
	 *	Get a Template by slug.
	 *
	 *	@param  $slug A template's unique slug.
	 *	@return Payload
	 */
	public function findBySlug($slug)
	{
	    $query = $this->model
	    	->where('slug', '=', $slug);

	    $retrieved = $this->retrieve($query);

		if($retrieved->isEmpty())
		{
			return new Payload(null, 'not_found');
		}


		return new Payload($retrieved->first(), 'found');
	}

	/**
	 * @todo: Deprecate this
	 * 
	 * Get all of the Models, but grouped by model type.
	 *
	 * @return Payload
	 */
	public function getAllGroupedByType()
	{
		$query = $this->model->get();

	    $retrieved = $this->retrieve($query);

		if($retrieved->isEmpty())
		{
			return new Payload(null, 'not_found');
		}

		return new Payload($retrieved->groupBy('model_type'), 'found');
	}

	/**
	 * @todo: Deprecate this
	 * 
	 * Get multiple from list of slugs.
	 *
	 * @param  array $keys
	 * @return payload
	 */
	public function getManyBySlug(array $slugs)
	{
		$query = $this->model->whereIn('slug', $slugs);

	    $retrieved = $this->retrieve($query);

		if($retrieved->isEmpty())
		{
			return new Payload(null, 'not_found');
		}

		return new Payload($retrieved, 'found');
	}

	/**
	 * @todo: Deprecate this
	 * 
	 *	Get a Template by view.
	 *
	 *	@param  $view A template's view name.
	 *	@return Payload
	 */
	public function findByView($view)
	{
	    $query = $this->model
	    	->where('display_view', '=', $view)
	    	->orWhere('create_view', '=', $view);

	    $retrieved = $this->retrieve($query);

		if($retrieved->isEmpty())
		{
			return new Payload(null, 'not_found');
		}

		return new Payload($retrieved->first(), 'found');
	}
}