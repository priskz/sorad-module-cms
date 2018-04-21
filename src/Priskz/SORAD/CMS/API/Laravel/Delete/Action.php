<?php namespace Priskz\SORAD\CMS\API\Laravel\Delete;

use CMS;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [
		'uuid',
	];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [
		'uuid'  =>  'required',
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
		return CMS::persist($data + ['persist' => 'DELETE']);
	}
}