<?php

namespace App\Providers;

use App\Modules\Dashboard\Models\Menu;
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
            $userRoles = null;
            $menu = new Menu;
            if(\Auth::check()) {
                $menus = $menu->getMenus('backend');
                $userRoles = ucwords(implode(', ', userRoles()->toArray()));
            } else {
                $menus = $menu->getMenus('frontend');
            }
            //...with this variable
            $view->with([
                'userRoles' => $userRoles,
                'menus' => $menus
            ]);
        });
    }
}
