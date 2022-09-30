<?php


namespace Yarscript\User\Services;

use App\Http\Middleware\Authenticate;
use Illuminate\{Database\Eloquent\Model,
    Database\Eloquent\Relations\HasOne,
    Http\Resources\Json\AnonymousResourceCollection,
    Support\Facades\Auth,
    Support\Facades\Event};
use Prettus\{Repository\Exceptions\RepositoryException, Validator\Exceptions\ValidatorException};
use Yarscript\User\Models\{
    UserInvite,
    User as UserModel,
};
use Yarscript\User\Http\Resources\{
    User as UserResource,
    UserInfo as UserInfoResource
};
use Yarscript\User\Repositories\{
    UserBillingRepository, UserInfoRepository, UserRepository, UserInviteRepository
};
use Yarscript\User\Contracts\{
    Models\User as UserContract,
    Services\User as UserServiceContract,
};
use Yarscript\ServicePlan\Contracts\Models\ServicePlan as ServicePlanModelContract;

/**
 * Class User
 * @package Yarscript\User\Services
 */
class User implements UserServiceContract
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var UserInfoRepository
     */
    protected UserInfoRepository $userInfoRepository;

    /**
     * @var UserInviteRepository
     */
    protected UserInviteRepository $userInviteRepository;

    /**
     * @var UserBillingRepository
     */
    protected UserBillingRepository $userBillingRepository;

    /**
     * User constructor.
     *
     * @param UserRepository $userRepository
     * @param UserInfoRepository $userInfoRepository
     * @param UserInviteRepository $userInviteRepository
     * @param UserBillingRepository $userBillingRepository
     */
    public function __construct(
        UserRepository $userRepository,
        UserInfoRepository $userInfoRepository,
        UserInviteRepository $userInviteRepository,
        UserBillingRepository $userBillingRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->userInfoRepository = $userInfoRepository;
        $this->userInviteRepository = $userInviteRepository;
        $this->userBillingRepository = $userBillingRepository;
    }

    /**
     * @param $data
     * @return UserResource
     */
    public function getResource($data): UserResource
    {
        return new UserResource($data);
    }

    /**
     * @param $data
     * @return AnonymousResourceCollection
     */
    public function getResourceCollection($data): AnonymousResourceCollection
    {
        return UserResource::collection($data);
    }

    /**
     * @param ?int $id
     * @return mixed
     * @throws RepositoryException
     */
    public function getUser(?int $id)
    {
        return isset($id) ? $this->userRepository->getUser($id) : Auth::user();
    }

    /**
     * @param string|null $uuid
     * @return UserInfoResource|UserModel|mixed
     */
    public function getUserInfo(?string $uuid)
    {
        return isset($uuid)
            ? $this->userInfoRepository->getUserInfo($uuid)
            : UserInfoResource::collection($this->userRepository->currentUser()->info()->get());
    }

    /**
     * @param array $data
     * @param bool $forceVerify
     * @return UserModel
     * @throws ValidatorException
     */
    public function createUser(array $data, bool $forceVerify = false): UserModel
    {
        $data[ 'password' ] = bcrypt($data[ 'password' ]);

        $user = $this->userRepository->createUser($data, $forceVerify);

        Event::dispatch('user.create.after', $user);

        return $user;
    }

    /**
     * @param string $uuid
     * @return UserModel
     */
    public function getUserUuid(string $uuid): UserModel
    {
        return $this->userRepository->getUserUuid($uuid);
    }

    /**
     * @param UserContract $user
     * @return bool
     */
    public function verifyUser(UserContract $user): bool
    {
        return $this->userRepository->verify($user);
    }

    /**
     * @param array $data
     * @param UserContract $user
     * @return UserInvite
     * @throws ValidatorException
     */
    public function inviteUser(array $data, UserContract $user): UserInvite
    {
        $userInvite = $this->userInviteRepository->createUserInvite($data, $user);

        Event::dispatch('user.invite.create.after', $userInvite);

        return $userInvite;
    }

    /**
     * @param string $uuid
     * @return UserInvite
     */
    public function getInviteUuid(string $uuid): UserInvite
    {
        return $this->userInviteRepository->getInviteUuid($uuid);
    }

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return Model
     */
    public function createUserInfo(array $data, ?string $user_uuid): Model
    {
        return $this->userInfoRepository->creteUserInfo(
            $user_uuid ? $this->getUserUuid($user_uuid) : Auth::user(), $data
        );
    }

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return int
     */
    public function updateUserInfo(array $data, ?string $user_uuid): int
    {
        return $this->userInfoRepository->updateUserInfo(
            $user_uuid ? $this->getUserUuid($user_uuid) : Auth::user(), $data
        );
    }

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return Model
     */
    public function createBillingInfo(array $data, ?string $user_uuid): Model
    {
        return $this->userBillingRepository->createUserBillingInfo(
            $this->getUserUuid($user_uuid), $data
        );
    }

    /**
     * @param array $data
     * @param ?string $user_uuid
     * @return int
     */
    public function updateBillingInfo(array $data, ?string $user_uuid): int
    {
        return $this->userBillingRepository->updateUserBillingInfo(
            $this->getUserUuid($user_uuid), $data
        );
    }

    /**
     * @param ServicePlanModelContract $servicePlan
     * @param Authenticate|UserModel|null $user
     * @return mixed
     */
    public function applyServicePlan(ServicePlanModelContract $servicePlan, ?Authenticate $user = null)
    {
        $user = $user ?? Auth::user();

        return $user->servicePlan()->associate($servicePlan)->save();
    }

}
