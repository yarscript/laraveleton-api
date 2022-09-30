<?php


namespace Yarscript\Api\Http\Controllers\User;


use Exception;
use Illuminate\Http\JsonResponse;
use Yarscript\{
    Core\Http\Controllers\BaseController,
    User\Contracts\Services\User as UserServiceContract,
    User\Http\Requests\Billing\Create as BillingCreateRequest,
    User\Http\Requests\Billing\Update as UserUpdateRequest
};

/**
 * Class BillingController
 * @package Yarscript\Api\Http\Controllers\User
 */
class BillingController extends BaseController
{
    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * BillingController constructor.
     * @param UserServiceContract $userService
     */
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param string $user_uuid
     * @param BillingCreateRequest $request
     * @return JsonResponse
     */
    public function store(string $user_uuid, BillingCreateRequest $request): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', [$this->userService->createBillingInfo($request->input(), $user_uuid)]
            );
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }

    /**
     * @param string $user_uuid
     * @param UserUpdateRequest $request
     * @return JsonResponse
     */
    public function update(string $user_uuid, UserUpdateRequest $request): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', (array)$this->userService->updateBillingInfo($request->post(), $user_uuid)
            );
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }
}
