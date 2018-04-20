<?php namespace Priskz\SORAD\CMS\Service\Content\Laravel;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use Priskz\SORAD\CMS\Service\Content\Laravel\ServiceProvider;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
    	return ServiceProvider::getProviderKey();
    }
}