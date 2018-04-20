<?php namespace Priskz\SORAD\CMS\Service\Schema\Laravel;

use Priskz\SORAD\ServiceProvider\Laravel\AbstractServiceProvider as SORADServiceProvider;
use Priskz\SORAD\CMS\Domain\Schema\Data\MySQL\Eloquent\Model as Model;
use Priskz\SORAD\CMS\Domain\Schema\Repository\CRUD as DataSource;
use Priskz\SORAD\CMS\Service\Schema\Service;

class ServiceProvider extends SORADServiceProvider
{
    /**
     * @property string $providerKey
     */
	protected static $providerKey = 'schema';

	/**
	 * Register Services.
	 *
	 * @return void
	 */  
	protected function registerService()
	{
		$this->app->singleton($this->getProviderKey(), function($app)
		{
			return new Service($this->getProviderKey(), new DataSource(new Model()));
		});
	}
}