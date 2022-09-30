<?php


namespace Yarscript\User\Repositories;


use Illuminate\Database\Eloquent\Model;
use Yarscript\{
    Core\Eloquent\Repository,
    User\Models\User as UserModel,
    User\Models\UserBilling as UserBillingModel,
    User\Contracts\Models\User as UserModelContract
};

/**
 * Class UserBillingRepository
 * @package Yarscript\User\Repositories
 */
class UserBillingRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return UserBillingModel::class;
    }

    /**
     * @param UserModelContract|UserModel $user
     * @param array $data
     * @return int
     */
    public function updateUserBillingInfo(UserModelContract $user, array $data): int
    {
        return $user->billing()->update($data);
    }

    /**
     * @param UserModelContract|UserModel $user
     * @param array $data
     * @return Model
     */
    public function createUserBillingInfo(UserModelContract $user, array $data): Model
    {
        $this->checkUuid('billing_info_uuid', $data);

        return $user->billing()->create($data);
    }
}
