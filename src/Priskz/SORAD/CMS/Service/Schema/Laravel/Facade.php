<?php namespace Priskz\SORAD\CMS\Service\Schema\Laravel;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use Priskz\SORAD\CMS\Service\Schema\Laravel\ServiceProvider;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
    	return ServiceProvider::getProviderKey();
    }
}