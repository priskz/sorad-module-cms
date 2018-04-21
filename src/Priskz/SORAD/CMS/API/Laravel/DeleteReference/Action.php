<?php namespace Priskz\SORAD\CMS\API\Laravel\DeleteReference;

use CMS;
use Priskz\SORAD\Action\Laravel\AbstractAction;

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

		if($actionDataPayload->getStatus() != 'valid')
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
		return CMS::deleteReference($data);
	}
}