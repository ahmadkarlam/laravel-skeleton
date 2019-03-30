<?php

namespace App\Modules\Auditrail\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('auditrail', 'Resources/Lang', 'app'), 'auditrail');
        $this->loadViewsFrom(module_path('auditrail', 'Resources/Views', 'app'), 'auditrail');
        $this->loadMigrationsFrom(module_path('auditrail', 'Database/Migrations', 'app'), 'auditrail');
        $this->loadConfigsFrom(module_path('auditrail', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('auditrail', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
