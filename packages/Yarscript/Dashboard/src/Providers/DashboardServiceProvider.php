<?php


namespace Yarscript\Dashboard\Providers;


use Illuminate\Routing\Router;
use \Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * @param Router $router
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views/', 'dashboard');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'dashboard');

        $this->publishes([__DIR__.'/../Resources/lang' => resource_path('lang/vendor/Yarscript/dashboard')]);

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/webkul/admin/assets'),
        ], 'public');
    }

    /**
     *
     */
    public function register()
    {

    }
}
