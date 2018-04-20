<?php namespace Priskz\SORAD\CMS\Service\Root\Laravel;

use Priskz\SORAD\CMS\API\Laravel\Routes;
use Priskz\SORAD\CMS\Service\Root\Service;
use Priskz\SORAD\CMS\Service\Root\Processor\Standard as Processor;
use Priskz\SORAD\ServiceProvider\Laravel\AbstractRootServiceProvider as RootServiceProvider;

class ServiceProvider extends RootServiceProvider
{
    /**
     * @property string $providerKey
     */
	protected static $providerKey = 'cms-root';

    /**
     * @property array $aggregates
     */
	protected $aggregates = [
		'content',
		'template',
		'schema',
		'entity-identifier',
		'entity-reference',
	];

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Load Module Configurations
	    $this->publishes([
	    	realpath(__DIR__ . '/../../..') . '/config/Laravel/cms.php' => config_path('sorad/cms.php'),
	    	realpath(__DIR__ . '/../../..') . '/views' => resource_path('views/vendor/priskz'),
	    ]);

	    // Load Module Migrations
	    $this->loadMigrationsFrom(realpath(__DIR__ . '/../../..') . '/migrations/Laravel');

	    // Load Routes
	    Routes::load();
	}

	/**
	 * Register Services.
	 *
	 * @return void
	 */
	protected function registerService()
	{
	    $this->app->singleton($this->getProviderKey(), function($app)
	    {
	    	return new Service($this->getProviderKey(), new Processor(), $this->getAggregateService());
	    });
	}
}