<?php


namespace Yarscript\Api\Http\Controllers\Organisation;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\{Facades\Auth, Facades\Crypt};
use Yarscript\{
    Core\Http\Controllers\BaseController,
    User\Contracts\Services\User as UserServiceContract,
    User\Http\Requests\AcceptInvited as AcceptInvitedRequest,
    Organisation\Http\Requests\InviteUser as InviteUserRequest,
    Project\Contracts\Services\Project as ProjectServiceContract
};

/**
 * Class InviteController
 * @package Yarscript\Api\Http\Controllers\Organisation
 */
class InviteController extends BaseController
{
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
            $userInvite = $this->userService->inviteUser($request->input(), Auth::user());

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
