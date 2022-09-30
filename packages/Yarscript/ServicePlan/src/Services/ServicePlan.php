<?php


namespace Yarscript\ServicePlan\Services;

use Illuminate\Contracts\{
    Auth\Authenticatable, Pagination\LengthAwarePaginator
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Yarscript\ServicePlan\{
    Repositories\ServicePlanRepository,
    Http\Resources\ServicePlan as ServicePlanResource,
    Contracts\Services\ServicePlan as ServicePlanServiceContract,
    Contracts\Repositories\ServicePlan as ServicePlanRepositoryContract,
};

class ServicePlan implements ServicePlanServiceContract
{
    /**
     * @var ServicePlanRepositoryContract|ServicePlanRepository
     */
    protected ServicePlanRepositoryContract $servicePlanRepository;

    /**
     * ServicePlan constructor.
     * @param ServicePlanRepositoryContract $servicePlanRepository
     */
    public function __construct(
        ServicePlanRepositoryContract $servicePlanRepository
    )
    {
        $this->servicePlanRepository = $servicePlanRepository;
    }

    public function getResource($data)
    {

    }

    /**
     * @param $data
     * @return AnonymousResourceCollection
     */
    public function getResourceCollection($data): AnonymousResourceCollection
    {
        return ServicePlanResource::collection($data);
    }

    /**
     * @param string $uuid
     * @param array $load
     * @return Model|mixed
     */
    public function getServicePlanUuid(string $uuid, array $load = []): Model
    {
        return $this->servicePlanRepository->getServicePlanUuid($uuid, $load);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getServicePlanCollection(): LengthAwarePaginator
    {
        return $this->servicePlanRepository->getServicePlanCollection();
    }

    public function getUserServicePlan(Authenticatable $user)
    {

    }
}
