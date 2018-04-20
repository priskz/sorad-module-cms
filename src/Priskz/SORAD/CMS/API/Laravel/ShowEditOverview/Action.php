<?php namespace Priskz\SORAD\CMS\API\Laravel\ShowEditOverview;

use CMS;
use Priskz\SORAD\Action\Laravel\AbstractAction;

class Action extends AbstractAction
{
	/**
	 * @var  array 	Data accepted by this action.
	 */
	protected $dataKeys = [];

	/**
	 * @var  array 	Rules for any data.
	 */
	protected $rules = [];

	/**
	 *	Main Method
	 */
	public function __invoke($requestData)
	{
		// Process Action Data Keys
		$actionDataPayload = $this->processor->process($requestData, $this->getDataKeys(), $this->getRules());

		if ($actionDataPayload->getStatus() != 'valid')
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
		return CMS::get();
	}
}