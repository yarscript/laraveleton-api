<?php


namespace Yarscript\Api\Http\Controllers\User;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Route;
use Yarscript\Core\Http\Controllers\BaseController;
use Yarscript\User\{
    Http\Resources\UserInfo as UserInfoResource,
    Contracts\Services\User as UserServiceContract,
    Http\Requests\Info\Create as CreateBillingRequest,
    Http\Requests\Info\Update as UpdateBillingRequest,
};

/**
 * Class InfoController
 * @package Yarscript\Api\Http\Controllers\User
 */
class InfoController extends BaseController
{
    /**
     * @var string[]|null
     */
    protected ?array $_config;

    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * InfoController constructor.
     * @param UserServiceContract $userService
     */
    public function __construct(
        UserServiceContract $userService
    )
    {
        $this->_config = request('_config');
        $this->userService = $userService;

        request()->merge(['_config' => null]);
    }

    /**
     * @param string|null $uuid
     * @return JsonResponse
     */
    public function index(?string $uuid = null): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', (array)$this->userService->getUserInfo($uuid)
            );
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }

    /**
     * @param CreateBillingRequest $request
     * @param string|null $user_uuid
     * @return JsonResponse
     */
    public function store(CreateBillingRequest $request, ?string $user_uuid = null): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success',
                (array) new UserInfoResource(
                    $this->userService->createUserInfo($request->input(), $user_uuid)->toArray()
                )
            );
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }

    /**
     * @param string|null $user_uuid
     * @param UpdateBillingRequest $request
     * @return JsonResponse
     */
    public function update(UpdateBillingRequest $request, ?string $user_uuid = null): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', (array)$this->userService->updateUserInfo($request->input(), $user_uuid)
            );
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }

}
