<?php namespace Priskz\SORAD\CMS\API\Laravel\Data;

use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Laravel\AbstractAction;
use Priskz\SORAD\CMS\API\Laravel\Data\Processor;
use CMS;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data Key
	 */
	protected $dataKeys = [
		'uuid', 'embed', 'sort', 'filter', 'or'
	];

	/**
	 * @var  array Rules.
	 */
	protected $rules = [
		'uuid'    =>  '',
		'embed'   =>  '',
		'sort'    =>  '',
		'filter'  =>  'required_with:or',
		'or'      =>  'filled',
	];

	/**
	 *	Constructor
	 */
	public function __construct(Processor $processor)
	{
		parent::__construct($processor);
	}

	/**
	 *	Main Method
	 */
	public function __invoke($requestData)
	{
		// Process Action Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		if( ! $actionDataPayload->isStatus(Payload::STATUS_VALID))
		{
			return $actionDataPayload;
		}

		// Execute the domain.
		return $this->execute($actionDataPayload->getData());
	}

	/**
	 *	Execute
	 */
	public function execute($data)
	{
		return CMS::data($data);
	}
}