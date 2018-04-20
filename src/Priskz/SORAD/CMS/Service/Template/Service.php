<?php namespace Priskz\SORAD\CMS\Service\Template;

use Priskz\SORAD\Service\Laravel\GenericCrudService;

class Service extends GenericCrudService
{
    /**
     * @property array $configuration
     */
	protected $configuration = [
		'CREATE' => [
			'keys'  => [
				'parent_id', 'view', 'slug', 'model_type', 'type_context', 'status', 'title', 'definition'
			],
			'rules' => [
				'parent_id'      =>  '',
				'view'           =>  '',
				'slug'           =>  '',
				'model_type'     =>  '',
				'type_context'   =>  '',
				'status'         =>  '',
				'title'          =>  '',
				'definition'     =>  ''
			],
			'defaults' => []
		],
		'UPDATE' => [
			'keys'  => [
				'parent_id', 'view', 'slug', 'model_type', 'type_context', 'status', 'title', 'field', 'definition'
			],
			'rules' => [
				'parent_id'      =>  '',
				'view'           =>  '',
				'slug'           =>  '',
				'model_type'     =>  '',
				'type_context'   =>  '',
				'status'         =>  '',
				'title'          =>  '',
				'field'          =>  '',
				'definition'     =>  ''
			],
			'defaults' => []
		],
		'DELETE' => [
			'keys'  => [],
			'rules' => []
		],
	];

	/**
	 *	Constructor
	 */
	public function __construct($alias, $dataSource)
	{
		parent::__construct($alias);
		$this->dataSource = $dataSource;
	}

	/**
	 * Update the given Model with the given data
	 *
	 * @param  array  $data
	 * @param  \Paylorm\Laravel\ $object
	 * @return Payload
	 */
	public function update($data, $object)
	{
		// Process data given.
		$processPayload = $this->process(__FUNCTION__, $data);

		if($processPayload->getStatus() != 'valid')
		{
			return $processPayload;
		}

		return $this->dataSource->update($processPayload->getData(), $object);
	}

	/**
	 * Find model(s) with the data given.
	 *
	 * @param  string  $type
	 * @param  string  $slug
	 * @return Payload
	 */
	public function find($type, $slug)
	{
		return $this->dataSource->find($type, $slug);
	}

	/**
	 * Get all of the Models of a certain type.
	 *
	 * @return Payload
	 */
	public function getAllByType($type)
	{
		return $this->dataSource->getAllByType($type);
	}

	/**
	 *	Get a Template by slug.
	 *
	 *	@param  $slug A template's unique slug.
	 *	@return Payload
	 */
	public function findBySlug($slug)
	{
		return $this->dataSource->findBySlug($slug);
	}

	/**
	 * Get all templates grouped by type.
	 *
	 * @return Payload
	 */
	public function getAllGroupedByType()
	{
		return $this->dataSource->getAllGroupedByType();
	}

	/**
	 * Get multiple models from list of slugs.
	 *
	 * @param  array $keys
	 * @return payload
	 */
	public function getManyBySlug(array $slugs)
	{
		return $this->dataSource->getManyBySlug($slugs);
	}

	/**
	 *	Get a Template by view.
	 *
	 *	@param string $view A template view name.
	 *	@return Payload
	 */
	public function findByView($view)
	{
		return $this->dataSource->findByView($view);
	}
}