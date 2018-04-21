<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Redirect;
use Priskz\SORAD\CMS\API\Laravel\Store\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Store extends Responder
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
			dd('Could not create content.');

			return Redirect::back();
		}

		dd('Successfully created.');

		return Redirect::route('content.edit', ['api_context' => $this->getApiContext(), 'uuid' => $payload->getData()->first()->getUuid()]);
	}
}