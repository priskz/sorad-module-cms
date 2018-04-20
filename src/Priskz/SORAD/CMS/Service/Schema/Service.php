<?php namespace Priskz\SORAD\CMS\Service\Schema;

use Priskz\SORAD\Service\Laravel\GenericCrudService;

class Service extends GenericCrudService
{
    /**
     * @property array $configuration
     */
	protected $configuration = [
		'CREATE' => [
			'keys'  => [
				'definition'
			],
			'rules' => [
				'definition' => ''
			],
			'defaults' => []
		],
		'UPDATE' => [
			'keys'  => [
				'definition'
			],
			'rules' => [
				'definition' => ''
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
}