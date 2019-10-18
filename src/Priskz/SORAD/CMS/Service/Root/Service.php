<?php namespace Priskz\SORAD\CMS\Service\Root;

use Priskz\Payload\Payload;
use Priskz\SORAD\Service\Laravel\GenericEntityService;

class Service extends GenericEntityService
{
    /**
     * @property string $entityType
     */
	protected static $entityType = 'content';

    /**
     * @property array $configuration
     */
	protected $configuration = [
		'FIND_TEMPLATE' => [
			'keys'  => [
				'model_type', 'slug'
			],
			'rules' => [
				'context' => []
			],
			'defaults' => [
				'model_type' => null,
				'slug'       => null
			],
		],
		'UPDATE' => [
			'keys'  => [
				'uuid', 'alias', 'template_id', 'data', 'order'
			],
			'rules' => [
				'uuid'          => 'required',
				'alias'         => '',
				'template_id'   => '',
				'order'         => '',
				'data'          => '',
				'context'       => []
			],
			'defaults' => [],
		],
		'DATA' => [
			'keys'  => [
				'entity_type', 'uuid', 'filter', 'sort', 'field', 'embed',
			],
			'rules' => [
				'entity_type'     => 'required', // @todo: Add this to the generic EntityService as a base config.
				'uuid'            => '',
				'filter.*.field'  => 'in:id,template_id,alias',
				'sort.*.field'    => 'in:id,created_at,updated_at',
				'field'           => '',
				'embed'           => '',
				'context'         => []
			],
			'defaults' => [
				'filter' => [],
				'sort'   => [],
				'field'  => [],
				'embed'  => [],
			],
		],
	];

	/**
	 * Find Template(s).
	 *
	 * @param  array  $data
	 * @return Payload
	 */
	public function findTemplate($data)
	{
		// Process the given data.
		$processPayload = $this->process('FIND_TEMPLATE', $data);

		if( ! $processPayload->isStatus(Payload::STATUS_VALID))
		{
			return $processPayload;
		}

		return $this->aggregate['template']->find($processPayload->get('model_type'), $processPayload->get('slug'));
	}
}