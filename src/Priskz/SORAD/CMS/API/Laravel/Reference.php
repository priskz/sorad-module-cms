<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Alert, Redirect;
use Priskz\SORAD\CMS\API\Laravel\Reference\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Reference extends Responder
{
	/**
	 *	Constructor
	 */
	public function __construct(Action $action)
	{
		$this->action = $action;
	}

	/**
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		if($payload->getStatus() != 'created')
		{
			Alert::danger('Could not create reference!');

			return Redirect::back();
		}

		return Redirect::route('content.edit', ['api_context' => $this->getApiContext(), 'uuid' => $payload->getData()->getUuid()]);
	}
}