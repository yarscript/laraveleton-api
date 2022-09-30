<?php


namespace Yarscript\ServicePlan\Repositories;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Yarscript\Core\Eloquent\Repository;
use Yarscript\ServicePlan\Contracts\Repositories\ServicePlan as ServicePlanRepositoryContract;
use Yarscript\ServicePlan\Models\ServicePlan as ServicePlanModel;

/**
 * Class ServicePlanRepository
 * @package Yarscript\ServicePlan\Repositories
 */
class ServicePlanRepository extends Repository implements ServicePlanRepositoryContract
{
    /**
     * @return string
     */
    public function model(): string
    {
        return ServicePlanModel::class;
    }

    /**
     * @param array $with
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function getServicePlanCollection(array $with = [], int $limit = 20): LengthAwarePaginator
    {
        return ServicePlanModel::with($with)->latest()->paginate($limit);
    }

    /**
     * @param string $uuid
     * @param array $load
     * @return Model|mixed
     */
    public function getServicePlanUuid(string $uuid, array $load = []): Model
    {
        return ServicePlanModel::with($load)->where('service_plan_uuid', $uuid)->firstOrFail();
    }
}
