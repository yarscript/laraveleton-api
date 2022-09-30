<?php


namespace Yarscript\ServicePlan\Contracts\Repositories;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface ServicePlan Repository Contract
 * @package Yarscript\ServicePlan\Contracts\Repositories
 */
interface ServicePlan
{
    /**
     * @param array $with
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function getServicePlanCollection(array $with = [], int $limit = 20): LengthAwarePaginator;

    /**
     * @param string $uuid
     * @param array $load
     * @return mixed
     */
    public function getServicePlanUuid(string $uuid, array $load = []);
}
