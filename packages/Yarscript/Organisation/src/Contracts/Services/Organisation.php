<?php


namespace Yarscript\Organisation\Contracts\Services;

use Yarscript\User\Models\User as UserModel;
use Illuminate\{Contracts\Auth\Authenticatable, Database\Eloquent\Model};

/**
 * Interface Organisation
 * @package Yarscript\Organisation\Contracts\Services
 */
interface Organisation
{
    /**
     * @param array $data
     * @param Authenticatable $user
     * @return mixed
     */
    public function createOrganisation(array $data, Authenticatable $user): Model;

    /**
     * @param string $uuid
     * @param array $data
     * @return bool
     */
    public function updateOrganisation(string $uuid, array $data): bool;

    /**
     * @param string $uuid
     * @return bool
     */
    public function deleteOrganisation(string $uuid): bool;

    /**
     * @param string|null $uuid
     * @param bool $returnCurrent
     * @return mixed
     */
    public function getOrganisation(?string $uuid = null, bool $returnCurrent = true);

    /**
     * @param Authenticatable $user
     * @param array $with
     * @return mixed
     */
    public function getOrganisationList(Authenticatable $user, array $with);
}
