<?php namespace Priskz\SORAD\CMS\API\Laravel\Reference;

use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Laravel\AbstractAction;
use CMS;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'uuid', 'reference',
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
		'uuid'       =>  'required',
		'reference'  =>  'required',
	];

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
		return CMS::reference($data);
	}
}