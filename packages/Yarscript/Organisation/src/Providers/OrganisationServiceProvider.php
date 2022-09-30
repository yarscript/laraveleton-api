<?php


namespace Yarscript\Organisation\Providers;

use Illuminate\Support\ServiceProvider;
use Yarscript\User\{
    Models\User as UserModel,
    Contracts\Models\User as UserModelContract,
};
use Yarscript\Organisation\{
    Models\Organisation as OrganisationModel,
    Services\Organisation as OrganisationService,
    Observers\Organisation as OrganisationObserver,
    Contracts\Services\Organisation as OrganisationServiceContract
};

/**
 * Class OrganisationServiceProvider
 * @package Yarscript\Organisation\Providers
 */
class OrganisationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        OrganisationModel::observe(OrganisationObserver::class);
    }

    public function register()
    {
        $this->app->bind(
            OrganisationServiceContract::class, OrganisationService::class
        );

        $this->app->when(OrganisationModel::class)
            ->needs(UserModelContract::class)
            ->give(UserModel::class);
    }
}
