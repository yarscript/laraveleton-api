<?php

namespace Yarscript\User\Providers;


use Illuminate\{Routing\Router, Support\Facades\Auth, Support\ServiceProvider};

use Yarscript\User\{Models\User as UserModel,
    Http\Middleware\VerifyMiddleware,
    Observers\UserObserver,
    Repositories\UserInfoRepository,
    Services\User as UserService,
    Http\Middleware\RedirectIfNotUser,
    Contracts\Services\User as UserServiceContract};
use Yarscript\Project\{
    Contracts\Services\Project,
    Services\Project as ProjectService,
    Contracts\Services\Project as ProjectServiceContract,
};

class UserServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $router->aliasMiddleware('user', RedirectIfNotUser::class);

        $router->aliasMiddleware('api-user', VerifyMiddleware::class);

        UserModel::observe(UserObserver::class);

//        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'customer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->app->register(EventServiceProvider::class);

        $this->app->bind(UserServiceContract::class, UserService::class);

        $this->app->bind(ProjectServiceContract::class, ProjectService::class);
    }
}
