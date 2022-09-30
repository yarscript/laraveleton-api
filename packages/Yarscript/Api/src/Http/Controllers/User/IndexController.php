<?php


namespace Yarscript\Api\Http\Controllers\User;


use Exception;
use Illuminate\Http\JsonResponse;
use Yarscript\Core\Http\Controllers\BaseController;
use Yarscript\User\Contracts\Models\ServicePlan as ServicePlanModelContract;
use Yarscript\User\Contracts\Services\User as UserServiceContract;

/**
 * Class IndexController
 * @package Yarscript\Api\Http\Controllers\User
 */
class IndexController extends BaseController
{
    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * IndexController constructor.
     * @param UserServiceContract $userService
     */
    public function __construct(
        UserServiceContract $userService
    )
    {
        $this->userService = $userService;
    }

    /**
     * @param $servicePlan
     * @return JsonResponse
     */
    public function applyServicePlan($servicePlan): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'success', [$this->userService->applyServicePlan($servicePlan)]
            );
        } catch (Exception $e) {
            return $this->jsonResponse($e->getMessage(), $e);
        }
    }

    public function discardServicePlan()
    {

    }
}
