<?php


namespace Yarscript\User\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\{Model, Relations\HasOne};
use Yarscript\Core\Eloquent\Repository;
use Yarscript\User\{
    Models\User as UserModel,
    Models\UserInfo as UserInfoModel,
    Contracts\Models\User as UserModelContract,
};

/**
 * Class UserInfoRepository
 * @package Yarscript\User\Repositories
 */
class UserInfoRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return UserInfoModel::class;
    }

    /**
     * @param ?UserModelContract|UserModel|null $user
     * @return HasOne|null
     */
    public function current(?UserModelContract $user): ?HasOne
    {
        return ($user = $user ?? Auth::user())->info();
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function getUserInfo(string $uuid)
    {
        return $this->findOneByField('info_uuid', $uuid);
    }

    /**
     * @param Authenticatable|UserModelContract|UserModel $user
     * @param array $data
     * @return Model
     */
    public function creteUserInfo(UserModelContract $user, array $data): Model
    {
        $this->checkUuid('info_uuid', $data);

        return $user->info()->create($data);
    }

    /**
     * @param UserModelContract $user
     * @param array $data
     * @return int
     */
    public function updateUserInfo(UserModelContract $user, array $data): int
    {
        return $user->info()->update($data);
    }

}
