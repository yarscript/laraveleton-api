<?php


namespace Yarscript\Api\Http\Controllers\Organisation;


use Exception;
use Yarscript\Core\Http\Controllers\BaseController;
use Illuminate\{Http\JsonResponse, Support\Facades\Auth};
use Yarscript\User\{Contracts\Services\User as UserServiceContract};
use Yarscript\Organisation\{
    Http\Requests\InviteUser as UserInviteRequest,
    Http\Requests\Update as UpdateRequest,
    Http\Requests\Create as CreateRequest,
    Contracts\Services\Organisation as OrganisationServiceContract,
    Http\Resources\Organisation as OrganisationResource,
};

/**
 * Class IndexController
 * @package Yarscript\Api\Http\Controllers\Organisation
 */
class IndexController extends BaseController
{
    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * @var OrganisationServiceContract
     */
    protected OrganisationServiceContract $organisationService;

    /**
     * IndexController constructor.
     *
     * @param UserServiceContract $userService
     * @param OrganisationServiceContract $organisationService
     */
    public function __construct(
        UserServiceContract $userService,
        OrganisationServiceContract $organisationService
    )
    {
        $this->userService = $userService;
        $this->organisationService = $organisationService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json(OrganisationResource::collection(
                $this->organisationService->getOrganisationList(Auth::user(), [])
            ));
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }

    /**
     * @param string|null $uuid
     * @return JsonResponse
     */
    public function get(?string $uuid = null): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', $this->organisationService->getOrganisation($uuid)->toArray()
            );
        } catch (Exception $exception) {
            return $this->jsonException($exception);
        }
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success',
                new OrganisationResource(
                    $this->organisationService->createOrganisation($request->input(), Auth::user())
                )
            );
        } catch (Exception $exception) {
            return $this->jsonResponse(
                $exception->getMessage(), ['code' => $exception->getCode()], 500
            );
        }
    }

    /**
     * @param string $uuid
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(string $uuid, UpdateRequest $request): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', [$this->organisationService->updateOrganisation($uuid, $request->input())]
            );
        } catch (Exception $exception) {
            return $this->jsonResponse(
                $exception->getMessage(), ['code' => $exception->getCode(), 500]
            );
        }
    }

    /**
     * @param string $uuid
     * @return JsonResponse
     */
    public function delete(string $uuid): JsonResponse
    {
        try {
            return $this->jsonResponse(
                'Success', [$this->organisationService->deleteOrganisation($uuid)]
            );
        } catch (Exception $exception) {
            return $this->jsonResponse(
                $exception->getMessage(), ['code' => $exception->getCode()]
            );
        }
    }
}
