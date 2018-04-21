<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Config, Redirect, View;
use Priskz\SORAD\CMS\API\Laravel\Show\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Show extends Responder
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
		if($payload->getStatus() != 'found')
		{
			dd('Could not find content.');

			return Redirect::back();
		}

		return View::make(Config::get('sorad.cms.view.prefix') . $payload->getData()->first()->getTemplate()->getFullyQualifiedView())
			->with('apiContext', $this->getApiContext())
			->with('content', $payload->getData()->first());
	}
}