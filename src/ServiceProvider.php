<?php

/*
|--------------------------------------------------------------------------
| Sandip Patel
|--------------------------------------------------------------------------
|
| Date: 2017-09-18
| Time: 11:28 AM
*/
namespace PCB\Laravel;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class ServiceProvider extends RouteServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/routes.php');
        $this->loadMigrationsFrom(__DIR__. '/migrations');
        $this->loadTranslationsFrom(__DIR__.'/translations', 'modules');

        $this->publishes([
            __DIR__. 'config.php'   => config_path('modules.php'),
            __DIR__.'/translations' => resource_path('lang/vendor/modules')
        ]);


        $plugins = config('plugins', []);

        foreach ($plugins as $plugin => $desc)
        {
            $plugin_code   = str_replace('_', '', strtolower($plugin));
            $plugin_path   = app_path(). '/Plugins/' .ucfirst($plugin_code). DIRECTORY_SEPARATOR;
            $plugin_config = $plugin_path. 'config.php';

            if( \File::exists($plugin_config) )
            {
                $this->mergeConfigFrom($plugin_config, $plugin_code);
                $this->loadMigrationsFrom($plugin_path. 'Migrations');
                $this->loadViewsFrom($plugin_path.'Views', $plugin_code);
                $this->loadTranslationsFrom($plugin_path.'Translations', $plugin_code);

                $plugin_route = $plugin_path. 'routes.php';
                $plugin_namespace = 'App\Plugins\\' .ucfirst($plugin_code). '\\Controllers';

                if( \File::exists($plugin_route) )
                {
                    Route::namespace($plugin_namespace)->group($plugin_path. 'routes.php');
                }
            }
        }
    }
}