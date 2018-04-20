<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Alert, Config, Redirect, View;
use Priskz\SORAD\CMS\API\Laravel\ShowEdit\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowEdit extends Responder
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
			Alert::danger('Could not find any content.');

			return Redirect::back();
		}

		return View::make(Config::get('sorad.cms.view.prefix') . $this->getApiContext(true) . 'content.edit')
			->with('apiContext', $this->getApiContext())
			->with('content', $payload->getData()->first());
	}
}