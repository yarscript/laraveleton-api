<?php


namespace Yarscript\Organisation\Services;

use Exception;
use Illuminate\{Contracts\Auth\Authenticatable, Database\Eloquent\Model, Support\Facades\Auth};
use Yarscript\User\Models\User as UserModel;
use Yarscript\Organisation\{
    Repositories\OrganisationRepository,
    Contracts\Services\Organisation as OrganisationServiceContract
};

/**
 * Class Organisation
 * @package Yarscript\Organisation\Services
 */
class Organisation implements OrganisationServiceContract
{
    /**
     * @param string|null $uuid
     * @param bool $returnCurrent
     * @return mixed
     */
    public function getOrganisation(?string $uuid = null, bool $returnCurrent = true)
    {
        if ($uuid === null && $returnCurrent) {
            return $this->organisationRepository->getUserOrganisation(Auth::user());
        }

        return $this->organisationRepository->getOrganisationUuid($uuid);
    }

    /**
     * @param Authenticatable $user
     * @param array $with
     * @return mixed|void
     */
    public function getOrganisationList(Authenticatable $user, array $with)
    {
        return $this->organisationRepository->getOrganisationList($user, $with);
    }

    /**
     * @var OrganisationRepository
     */
    protected OrganisationRepository $organisationRepository;

    /**
     * Organisation constructor.
     * @param OrganisationRepository $organisationRepository
     */
    public function __construct(
        OrganisationRepository $organisationRepository
    )
    {
        $this->organisationRepository = $organisationRepository;
    }

    /**
     * @param array $data
     * @param Authenticatable|UserModel $user
     * @return Model
     */
    public function createOrganisation(array $data, Authenticatable $user): Model
    {
        return $this->organisationRepository->createOrganisation($data, $user);
    }

    /**
     * @param string $uuid
     * @param array $data
     * @return bool
     */
    public function updateOrganisation(string $uuid, array $data): bool
    {
        return $this->organisationRepository->updateOrganisation($uuid, $data);
    }

    /**
     * @param string $uuid
     * @return bool
     * @throws Exception
     */
    public function deleteOrganisation(string $uuid): bool
    {
        return $this->organisationRepository->deleteOrganisation($uuid);
    }
}
