<?php


namespace Yarscript\Api\Http\Controllers\ServicePlan;

use Exception;
use Illuminate\Http\JsonResponse;
use Yarscript\Core\Http\Controllers\BaseController;
use Yarscript\ServicePlan\Contracts\Services\ServicePlan as ServicePlanServiceContract;

/**
 * Class IndexController
 * @package Yarscript\Api\Http\Controllers\ServicePlan
 */
class IndexController extends BaseController
{
    protected ServicePlanServiceContract $servicePlanService;

    public function __construct(
        ServicePlanServiceContract $servicePlanService
    )
    {
        $this->servicePlanService = $servicePlanService;
    }

    public function index(): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success',
                $this->servicePlanService->getResourceCollection($this->servicePlanService->getServicePlanCollection())
            );
        } catch (Exception $exception) {
            return $this->jsonResponse($exception->getMessage(), $exception);
        }
    }

    public function get()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
