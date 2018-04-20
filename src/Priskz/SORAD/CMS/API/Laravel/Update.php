<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Alert, Redirect;
use Priskz\SORAD\CMS\API\Laravel\Update\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Update extends Responder
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
		if($payload->getStatus() != 'updated')
		{
			Alert::danger('Could not update content, try again.');

			return Redirect::back();
		}

		return Redirect::route('content.edit', ['api_context' => $this->getApiContext(), 'uuid' => $payload->getData()->first()->getUuid()]);
	}
}