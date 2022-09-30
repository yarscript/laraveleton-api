<?php


namespace Yarscript\Api\Http\Controllers\Project;


use Exception;
use Yarscript\Core\Http\Controllers\BaseController;
use Yarscript\Project\{
    Http\Requests\InviteUser as InviteUserRequest,
    Contracts\Services\Project as ProjectServiceContract,
};
use Yarscript\User\{
    Contracts\Services\User as UserServiceContract,
    Http\Requests\AcceptInvited as AcceptInvitedRequest,
};
use Illuminate\{Http\JsonResponse, Support\Facades\Auth, Support\Facades\Crypt};

/**
 * Class InviteController
 * @package Yarscript\Api\Http\Controllers\Project
 */
class InviteController extends BaseController
{
    /**
     * @var string
     */
    protected string $guard;

    /**
     * @var array|null
     */
    protected ?array $_config;

    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * @var ProjectServiceContract
     */
    protected ProjectServiceContract $projectService;

    /**
     * InviteController constructor.
     * @param UserServiceContract $userService
     * @param ProjectServiceContract $projectService
     */
    public function __construct(UserServiceContract $userService, ProjectServiceContract $projectService)
    {
        $this->guard = request()->has('token') ? 'api' : 'customer';

        $this->_config = request('_config');

        $this->userService = $userService;
        $this->projectService = $projectService;
    }

    /**
     * @param InviteUserRequest $request
     * @return JsonResponse
     */
    public function inviteUser(InviteUserRequest $request): JsonResponse
    {
        try {
            $userInvite = $this->userService->inviteUser($request->input(), $this->userService->getUser(Auth::id()));

            return $this->jsonResponse('Success', ['uuid' => $userInvite->user_invite_uuid]);
        } catch (Exception $e) {
            return $this->jsonResponse($e->getMessage(), ['code' => $e->getCode()], 403);
        }
    }

    /**
     * @param string $hash
     * @param AcceptInvitedRequest $request
     * @return JsonResponse
     */
    public function acceptInvited(string $hash, AcceptInvitedRequest $request): JsonResponse
    {
        try {
            $uuid = Crypt::decryptString($hash);

            $invite = $this->userService->getInviteUuid($uuid);

            $data = $request->input();
            $data[ 'email' ] = $invite->getAttribute('email');

            $user = $this->userService->createUser($data, true);

            return $this->jsonResponse('Success!', ['uuid' => $user->user_uuid]);
        } catch (Exception $e) {
            return $this->jsonResponse($e->getMessage(), ['code' => $e->getCode()], 403);
        }
    }
}
