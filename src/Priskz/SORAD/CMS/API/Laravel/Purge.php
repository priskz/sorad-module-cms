<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Alert, Redirect;
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
			Alert::danger('Could not purge.');

			return Redirect::back();
		}

		Alert::success('Successfully purged.');

		return Redirect::back();
	}
}