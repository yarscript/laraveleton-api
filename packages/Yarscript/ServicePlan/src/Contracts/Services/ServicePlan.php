<?php


namespace Yarscript\ServicePlan\Contracts\Services;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface ServicePlan
 * @package Yarscript\ServicePlan\Contracts\Services
 */
interface ServicePlan
{
    /**
     * @param string $uuid
     * @return mixed
     */
    public function getServicePlanUuid(string $uuid);

    /**
     * @return LengthAwarePaginator
     */
    public function getServicePlanCollection(): LengthAwarePaginator;

    /**
     * @param Authenticatable $user
     * @return mixed
     */
    public function getUserServicePlan(Authenticatable $user);
}
