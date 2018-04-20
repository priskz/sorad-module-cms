<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Alert, Config, Redirect, View;
use Priskz\SORAD\CMS\API\Laravel\ShowCreate\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowCreate extends Responder
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
			Alert::danger('Could not find any templates.');

			return Redirect::back();
		}

		if($payload->getData()->count() > 1)
		{
			return View::make(Config::get('sorad.cms.view.prefix') . $this->getApiContext(true) . 'content.create-overview')
				->with('apiContext', $this->getApiContext())
				->with('templates', $payload->getData());	
		}

		return View::make(Config::get('sorad.cms.view.prefix') . $this->getApiContext(true) . 'content.create')
			->with('apiContext', $this->getApiContext())
			->with('template', $payload->getData()->first());	
	}
}