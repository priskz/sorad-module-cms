<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Redirect;
use Priskz\SORAD\CMS\API\Laravel\DeleteReference\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class DeleteReference extends Responder
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
		if($payload->getStatus() != 'deleted')
		{
			dd('Could not delete reference.');

			return Redirect::back();
		}

		return Redirect::back();
	}
}