<?php


namespace Yarscript\Core\Providers;


use Illuminate\Routing\Router;
use \Illuminate\Support\ServiceProvider;
use Yarscript\Core\Http\Middleware\ForceJsonResponse;

/**
 * Class CoreServiceProvider
 * @package Yarscript\Core\Providers
 */
class CoreServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $router->aliasMiddleware('forceJson', ForceJsonResponse::class);
    }

    public function register()
    {

    }
}
