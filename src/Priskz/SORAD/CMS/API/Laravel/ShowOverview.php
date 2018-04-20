<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Config, View;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class ShowOverview extends Responder
{
	/**
	 *	Generate Response
	 */
	public function generateResponse($payload)
	{
		return View::make(Config::get('sorad.cms.view.prefix') . $this->getApiContext(true) . 'content.overview')
			->with('apiContext', $this->getApiContext());
	}
}