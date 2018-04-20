<?php namespace Priskz\SORAD\CMS\Service\Content;

use Priskz\SORAD\Service\Laravel\GenericCrudService;

class Service extends GenericCrudService
{
    /**
     * @property array $configuration
     */
	protected $configuration = [
		'CREATE' => [
			'keys'  => [
				'alias', 'template_id', 'data'
			],
			'rules' => [
				'alias'         =>  '',
				'template_id'   =>  '',
				'data'          =>  ''
			],
			'defaults' => [
				'data' => null
			],
		],
		'UPDATE' => [
			'keys'  => [
				'alias', 'template_id', 'data'
			],
			'rules' => [
				'alias'         =>  '',
				'template_id'   =>  '',
				'data'          =>  ''
			],
			'defaults' => [
				'data' => null
			],
		],
	];

	/**
	 *	Constructor
	 */
	public function __construct($alias, $processor, $dataSource)
	{
		parent::__construct($alias, $processor);
		$this->dataSource = $dataSource;		
	}
}