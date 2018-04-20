<?php namespace Priskz\SORAD\CMS\Service\Template\Laravel;

use Priskz\SORAD\ServiceProvider\Laravel\AbstractServiceProvider as SORADServiceProvider;
use Priskz\SORAD\CMS\Domain\Template\Data\MySQL\Eloquent\Model as Model;
use Priskz\SORAD\CMS\Domain\Template\Repository\CRUD as DataSource;
use Priskz\SORAD\CMS\Service\Template\Service;

class ServiceProvider extends SORADServiceProvider
{
    /**
     * @property string $providerKey
     */
	protected static $providerKey = 'template';

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