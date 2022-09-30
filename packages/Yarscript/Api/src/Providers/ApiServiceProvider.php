<?php


namespace Yarscript\Api\Providers;


use Illuminate\Support\{Facades\Request, Facades\Route, ServiceProvider};
use Yarscript\{
    Api\Http\Controllers\User\BillingController,
    Api\Http\Controllers\User\IndexController as UserController,
    ServicePlan\Contracts\Services\ServicePlan as ServicePlanServiceContract,
    User\Http\Requests\Billing\Update as BillingUpdateRequest
};

/**
 * Class ApiServiceProvider
 * @package Yarscript\Api\Providers
 */
class ApiServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public array $bindings = [

    ];

    /**
     * @param ServicePlanServiceContract $servicePlanService
     */
    public function boot(ServicePlanServiceContract $servicePlanService)
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        Route::bind('service_plan_uuid', function ($value) use ($servicePlanService) {
            return $servicePlanService->getServicePlanUuid($value);
        });
    }

    /**
     *
     */
    public function register()
    {
    }
}
