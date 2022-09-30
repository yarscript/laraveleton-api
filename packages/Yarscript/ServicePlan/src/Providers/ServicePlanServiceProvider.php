<?php


namespace Yarscript\ServicePlan\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Yarscript\ServicePlan\{
    Repositories\ServicePlanRepository,
    Models\ServicePlan as ServicePlanModel,
    Services\ServicePlan as ServicePlanService,
    Contracts\Models\ServicePlan as ServicePlanModelContract,
    Contracts\Services\ServicePlan as ServicePlanServiceContract,
    Contracts\Repositories\ServicePlan as ServicePlanRepositoryContract,
};

/**
 * Class ServicePlanServiceProvider
 * @package Yarscript\ServicePlan\Providers
 */
class ServicePlanServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @var array|string[]
     */
    public array $singletons = [
        ServicePlanServiceContract::class    => ServicePlanService::class,
        ServicePlanRepositoryContract::class => ServicePlanRepository::class
    ];

    /**
     *
     */
    public function boot()
    {

    }

    /**
     *
     */
    public function register()
    {
        $this->app->bind(ServicePlanModelContract::class, ServicePlanModel::class);
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [ServicePlanServiceContract::class];
    }
}
