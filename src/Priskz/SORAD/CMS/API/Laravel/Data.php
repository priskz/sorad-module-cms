<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Priskz\SORAD\CMS\API\Laravel\Data\Action;
use Priskz\SORAD\Responder\Laravel\AbstractGenericResponder as Responder;

class Data extends Responder
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
		$json            = [];
		$json['type']    = 'content';
		$json['action']  = 'data';
		$json['message'] = $payload->getStatus();
		$json['status']  = $payload->getStatus();
		$json['data']    = $payload->getData();

		return json_encode($json);
	}
}