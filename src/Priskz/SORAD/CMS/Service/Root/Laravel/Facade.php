<?php namespace Priskz\SORAD\CMS\Service\Root\Laravel;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use Priskz\SORAD\CMS\Service\Root\Laravel\ServiceProvider;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
    	return ServiceProvider::getProviderKey();
    }
}