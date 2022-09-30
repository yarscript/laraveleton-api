<?php


namespace Yarscript\Organisation\Repositories;

use Yarscript\{
    Core\Eloquent\Repository,
    Organisation\Models\OrganisationUser as OrganisationUserModel,
    Organisation\Contracts\Repositories\OrganisationUser as OrganisationUserRepositoryContract,
};

/**
 * Class OrganisationUserRepository
 * @package Yarscript\Organisation\Repositories
 */
class OrganisationUserRepository extends Repository implements OrganisationUserRepositoryContract
{
    /**
     * @return string
     */
    public function model(): string
    {
        return OrganisationUserModel::class;
    }
}
