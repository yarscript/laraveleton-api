<?php


namespace Yarscript\User\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;
use Yarscript\Core\Eloquent\Repository;
use Illuminate\Support\{Carbon, Facades\Auth, Facades\Event};
use Yarscript\User\{Models\User as UserModel, Contracts\Models\User as UserContract};
use Prettus\{Repository\Exceptions\RepositoryException, Validator\Exceptions\ValidatorException};

/**
 * Class UserRepository
 * @package Yarscript\User\Repositories
 */
class UserRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return 'Yarscript\User\Models\User';
    }

    /**
     * @return Authenticatable|UserModel|null
     */
    public function currentUser(): UserModel
    {
        return Auth::user();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws RepositoryException
     */
    public function getUser(int $id)
    {
        return $this->find($id);
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function getUserUuid(string $uuid)
    {
        return $this->findOneByField('user_uuid', $uuid);
    }

    /**
     * @param array $data
     * @param bool $forceVerify
     * @return UserModel
     * @throws ValidatorException
     */
    public function createUser(array $data, bool $forceVerify = false): UserModel
    {
        $this->checkUuid('user_uuid', $data);

        $data[ 'password' ] = bcrypt($data[ 'password' ]);

        /** @var UserModel $user */
        $user = $this->create($data);

        if ($forceVerify) {
            $this->verify($user);
        }

        return $user;
    }

    /**
     * @param UserContract $user
     * @return bool
     */
    public function verify(UserContract $user): bool
    {
        /** @var UserModel $user */
        return $user->update(['email_verified_at' => Carbon::now()]);
    }
}
