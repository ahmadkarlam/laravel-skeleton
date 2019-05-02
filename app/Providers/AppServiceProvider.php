<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->backendViewCompose();
    }

    /**
     * Set variable to every view.
     *
     * @return void
     */
    private function backendViewCompose()
    {
        //compose all the views....
        view()->composer('*', function ($view)
        {
            $userRoles = ucwords(implode(', ', userRoles()->toArray()));

            //...with this variable
            $view->with('userRoles', $userRoles );
        });
    }
}
