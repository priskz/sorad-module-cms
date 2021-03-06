<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Redirect;
use Priskz\SORAD\CMS\API\Laravel\Delete\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Delete extends Responder
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
			dd('Could not delete.');

			return Redirect::back();
		}

		dd('Successfully deleted.');

		return Redirect::back();
	}
}