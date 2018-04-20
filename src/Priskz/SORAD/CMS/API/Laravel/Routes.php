<?php namespace Priskz\SORAD\CMS\API\Laravel;

use Illuminate\Support\Facades\Route;
use Priskz\SORAD\Routes\Laravel\AbstractRoutes;

class Routes extends AbstractRoutes
{
    /**
     * @property string $prefix
     */
	protected static $prefix     = '';

    /**
     * @property array $middleware
     */
	protected static $middleware = ['web', 'auth'];

    /**
     * @property array $nameSpace
     */
	protected static $namespace  = __NAMESPACE__;

    /**
     * Register the route group.
     * 
     * @return void
     */
	protected static function register()
	{
		Route::group(['prefix' => static::$prefix, 'middleware' => static::$middleware, 'namespace' => static::$namespace], function()
		{
			Route::get('{api_context?}/content/data', 'Data')->name('content.data')
				->where('api_context', '.*');

			Route::get('{api_context?}/content/{uuid}/data', 'Data')->name('content.data')
				->where('api_context', '.*');

			Route::get('{api_context?}/content', 'ShowOverview')->name('content.overview')
				->where('api_context', '.*');

			Route::get('{api_context?}/content/overview/create', 'ShowCreateOverview')->name('content.create.overview')
				->where('api_context', '.*');

			Route::get('{api_context?}/content/overview/edit', 'ShowEditOverview')->name('content.edit.overview')
				->where('api_context', '.*');

			Route::get('{api_context?}/content/create/{type?}/{slug?}', 'ShowCreate')->name('content.create')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/{template_id}/store', 'Store')->name('content.store')
				->where('api_context', '.*');

			Route::get('{api_context?}/content/{uuid}/edit', 'ShowEdit')->name('content.edit')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/update', 'Update')->name('content.update')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/{uuid}/delete', 'Delete')->name('content.delete')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/{uuid}/purge', 'Purge')->name('content.purge')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/{uuid}/reference', 'Reference')->name('content.reference')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/{uuid}/reference/{reference}/delete', 'DeleteReference')->name('content.reference.delete')
				->where('api_context', '.*');

			Route::post('{api_context?}/content/persist/{persist}', 'Persist')->name('content.persist')
				->where('api_context', '.*');

			Route::get('{api_context?}/content/{uuid}/view', 'Show')->name('content.show')
				->where('api_context', '.*');
		});
	}
}