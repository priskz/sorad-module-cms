<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Redirect;
use Priskz\SORAD\CMS\API\Laravel\Purge\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Purge extends Responder
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
		if($payload->getStatus() != 'purged')
		{
			dd('Could not purge.');

			return Redirect::back();
		}

		dd('Successfully purged.');

		return Redirect::back();
	}
}