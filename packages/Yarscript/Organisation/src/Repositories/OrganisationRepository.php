<?php


namespace Yarscript\Organisation\Repositories;

use Yarscript\{Core\Eloquent\Repository,
    Organisation\Models\Organisation,
    User\Models\User as UserModel,
    User\Contracts\Models\User as UserModelContract,
    Organisation\Models\Organisation as OrganisationModel,
    Organisation\Contracts\Repositories\Organisation as OrganisationRepositoryContract
};
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrganisationRepository
 * @package Yarscript\Organisation\Repositories
 */
class OrganisationRepository extends Repository implements OrganisationRepositoryContract
{
    /**
     * @return string
     */
    public function model(): string
    {
        return OrganisationModel::class;
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public function getOrganisationUuid($uuid)
    {
        return $this->findOneByField('organisation_uuid', $uuid);
    }

    /**
     * @param Authenticatable|UserModel $user
     * @param array $with
     * @return mixed
     */
    public function getOrganisationList(Authenticatable $user, array $with)
    {
        return $user->organisations()->with($with)->latest()->limit(10)->paginate();
    }

    /**
     * @param UserModelContract|UserModel $user
     * @param array $data
     * @return Model
     */
    public function createOrganisation(array $data, UserModelContract $user): Model
    {
        return $user->organisations()->create(
            $data + ['user_uuid' => $user->getAttribute('user_uuid')]
        );
    }

    /**
     * @param string $uuid
     * @param array $data
     * @return bool
     */
    public function updateOrganisation(string $uuid, array $data): bool
    {
        return $this->getOrganisationUuid($uuid)->update($data);
    }

    /**
     * @param string $uuid
     * @return bool
     * @throws Exception
     */
    public function deleteOrganisation(string $uuid): bool
    {
        return $this->getOrganisationUuid($uuid)->delete();
    }

    /**
     * @param Authenticatable|UserModel $user
     * @param string|null $uuid
     * @return mixed
     */
    public function getUserOrganisation(Authenticatable $user, ?string $uuid = null)
    {
        if ($uuid !== null) {
            return $user->organisations()->firstWhere('organisation_uuid', $uuid);
        }

        return $user->organisations()->getResults();
    }
}
