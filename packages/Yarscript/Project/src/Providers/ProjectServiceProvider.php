<?php


namespace Yarscript\Project\Providers;


use Illuminate\Support\ServiceProvider;
use Yarscript\{
    User\Models\User as UserModel,
    Project\Models\Project as ProjectModel,
    User\Contracts\Models\User as UserModelContract,
};

/**
 * Class ProjectServiceProvider
 * @package Providers
 */
class ProjectServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->app->register(EventServiceProvider::class);
    }

    /**
     *
     */
    public function register()
    {
        $this->app->when(ProjectModel::class)
            ->needs(UserModelContract::class)
            ->give(UserModel::class);
    }
}
