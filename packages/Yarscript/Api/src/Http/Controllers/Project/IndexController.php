<?php


namespace Yarscript\Api\Http\Controllers\Project;


use Exception;
use Illuminate\{Support\Facades\Auth, Http\JsonResponse};
use Yarscript\Core\Http\Controllers\BaseController;
use Yarscript\Project\{
    Contracts\Services\Project as ProjectServiceContract,
    Http\Requests\CreateProject as CreateProjectRequest
};
use Yarscript\User\Contracts\Services\User as UserServiceContract;

/**
 * Class ProjectController
 * @package Yarscript\Api\Http\Controllers
 */
class IndexController extends BaseController
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
     * @var ProjectServiceContract
     */
    protected ProjectServiceContract $projectService;

    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * IndexController constructor.
     *
     * @param ProjectServiceContract $projectService
     * @param UserServiceContract $userService
     */
    public function __construct(
        ProjectServiceContract $projectService,
        UserServiceContract $userService
    )
    {
        $this->guard = request()->has('token') ? 'api' : 'customer';
        $this->_config = request('_config');

        $this->projectService = $projectService;
        $this->userService = $userService;
    }

    /**
     * @param CreateProjectRequest $request
     * @return JsonResponse
     */
    public function store(CreateProjectRequest $request): JsonResponse
    {
        try {
            $project = $this->projectService->createProject($request->input(), Auth::user());

            return $this->jsonResponse('Success', ['project_uuid' => $project->getAttribute('project_uuid')]);
        } catch (Exception $e) {
            return $this->jsonResponse($e->getMessage(), ['code' => $e->getCode()], 500);
        }
    }

    /**
     * @param $uuid
     * @return JsonResponse
     */
    public function update($uuid): JsonResponse
    {
        return $this->jsonResponse('Success!', [
            'data' => $this->projectService->updateProject(request('data'), $uuid)
        ]);
    }

    /**
     * @param $uuid
     * @return JsonResponse
     */
    public function delete($uuid): JsonResponse
    {
        return response()->json([
            'data' => $this->projectService->deleteProject($uuid)
        ]);
    }
}
