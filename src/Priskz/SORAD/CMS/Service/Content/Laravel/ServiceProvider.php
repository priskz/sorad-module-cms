<?php namespace Priskz\SORAD\CMS\Service\Content\Laravel;

use Priskz\SORAD\ServiceProvider\Laravel\AbstractServiceProvider as SORADServiceProvider;
use Priskz\SORAD\CMS\Domain\Content\Data\MySQL\Eloquent\Model as Model;
use Priskz\SORAD\CMS\Service\Content\Service;
use Priskz\SORAD\CMS\Domain\Content\Repository\CRUD as DataSource;
use Priskz\SORAD\CMS\Service\Content\Processor\Standard as Processor;

class ServiceProvider extends SORADServiceProvider
{
    /**
     * @property string $providerKey
     */
	protected static $providerKey = 'content';

	/**
	 * Register Services.
	 *
	 * @return void
	 */  
	protected function registerService()
	{
		$this->app->singleton($this->getProviderKey(), function($app)
		{
			return new Service($this->getProviderKey(), new Processor(), new DataSource(new Model()));
		});
	}
}