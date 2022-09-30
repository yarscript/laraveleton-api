<?php


namespace Yarscript\User\Observers;

use Yarscript\ServicePlan\Contracts\Repositories\ServicePlan as ServicePlanRepositoryContract;
use Yarscript\User\Contracts\Models\User as UserModelContract;
use Yarscript\User\Models\User as UserModel;

/**
 * Class UserObserver
 * @package Yarscript\User\Observers
 */
class UserObserver
{
    /**
     * @param UserModelContract|UserModel $user
     */
    public function saving(UserModelContract $user)
    {
        if ($user->service_plan_id && $user->service_plan_uuid === null) {
            $servicePlan = $user->servicePlan()->find($user->service_plan_id);

            $user->service_plan_uuid = $servicePlan->service_plan_uuid;
        }
    }
}
