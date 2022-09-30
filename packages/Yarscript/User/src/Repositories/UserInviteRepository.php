<?php


namespace Yarscript\User\Repositories;


use Yarscript\Core\{Eloquent\Repository};
use Prettus\Validator\Exceptions\ValidatorException;
use Yarscript\User\{Contracts\Models\User as UserContract, Models\UserInvite};

class UserInviteRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return 'Yarscript\User\Models\UserInvite';
    }

    /**
     * @param array $data
     * @param $user
     * @return UserInvite
     * @throws ValidatorException
     */
    public function createUserInvite(array $data, UserContract $user): UserInvite
    {
        $this->checkUuid('user_invite_uuid', $data);

        $dataUserKey = [
            'invited_by_id'    => 'user_id',
            'invited_by_uuid'  => 'user_uuid'
        ];

        foreach ($dataUserKey as $dKey => $uKey) {
            $data[$dKey] = $data[$dKey] ?? $user->{$uKey};
        }

        return $this->create($data);
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function getInviteUuid(string $uuid)
    {
        return $this->findOneByField('user_invite_uuid', $uuid);
    }
}
