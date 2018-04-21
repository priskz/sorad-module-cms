<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Redirect;
use Priskz\SORAD\CMS\API\Laravel\Persist\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Persist extends Responder
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
			dd('Could not persist.');

			return Redirect::back();
		}

		dd('Successfully persisted!');

		return Redirect::back();
	}
}