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
        $plugins = config('modules', []);

        foreach ($plugins as $plugin => $desc)
        {
            $plugin_code   = str_replace('_', '', strtolower($plugin));
            $plugin_path   = app_path(). '/Modules/' .ucfirst($plugin_code). DIRECTORY_SEPARATOR;
            $plugin_config = $plugin_path. 'config.php';

            if( \File::exists($plugin_config) )
            {
                $this->mergeConfigFrom($plugin_config, $plugin_code);
                $this->loadMigrationsFrom($plugin_path. 'Migrations');
                $this->loadViewsFrom($plugin_path.'Views', $plugin_code);
                $this->loadTranslationsFrom($plugin_path.'Translations', $plugin_code);

                $plugin_route = $plugin_path. 'routes.php';
                $plugin_namespace = 'App\\Modules\\' .ucfirst($plugin_code). '\\Controllers';

                if( \File::exists($plugin_route) )
                {
                    Route::namespace($plugin_namespace)->group($plugin_path. 'routes.php');
                }
            }
        }

        $this->publishes([
            __DIR__. '/config.php' => config_path('modules.php')
        ]);
    }
}