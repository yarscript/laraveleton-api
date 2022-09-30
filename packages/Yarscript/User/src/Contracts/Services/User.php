<?php


namespace Yarscript\User\Contracts\Services;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Yarscript\User\{Http\Resources\User as UserResource,
    Http\Resources\UserInfo as UserInfoResource,
    Models\User as UserModel,
    Contracts\Models\User as UserContract,
    Models\UserInvite};
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Yarscript\ServicePlan\Contracts\Models\ServicePlan as ServicePlanModelContract;

/**
 * Interface User
 * @package Yarscript\User\Contracts\Services
 */
interface User
{
    /**
     * @param $data
     * @return UserResource
     */
    public function getResource($data): UserResource;

    /**
     * @param $data
     * @return AnonymousResourceCollection
     */
    public function getResourceCollection($data): AnonymousResourceCollection;

    /**
     * @param array $data
     * @param bool $forceVerify
     * @return UserModel
     */
    public function createUser(array $data, bool $forceVerify = false): UserModel;

    /**
     * @param int $id
     * @return mixed
     */
    public function getUser(int $id);

    /**
     * @param string $uuid
     * @return UserModel
     */
    public function getUserUuid(string $uuid): UserModel;

    /**
     * @param UserContract $user
     * @return bool
     */
    public function verifyUser(UserContract $user): bool;

    /**
     * @param array $data
     * @param UserContract|Authenticatable $user
     * @return UserInvite
     */
    public function inviteUser(array $data, UserContract $user): UserInvite;

    /**
     * @param string $uuid
     * @return UserInvite
     */
    public function getInviteUuid(string $uuid): UserInvite;

    /**
     * @param array $data
     * @param string|null $user_uuid
     * @return Model
     */
    public function createUserInfo(array $data, ?string $user_uuid): Model;

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return int
     */
    public function updateBillingInfo(array $data, ?string $user_uuid): int;

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return Model
     */
    public function createBillingInfo(array $data, ?string $user_uuid): Model;

    /**
     * @param ?string $uuid
     * @return mixed
     */
    public function getUserInfo(?string $uuid);

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return int
     */
    public function updateUserInfo(array $data, ?string $user_uuid): int;

    /**
     * @param ServicePlanModelContract $servicePlan
     * @param Authenticate|null $user
     * @return mixed
     */
    public function applyServicePlan(ServicePlanModelContract $servicePlan, ?Authenticate $user = null);
}
