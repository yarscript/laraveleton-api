<?php


namespace Yarscript\Project\Services;

use Illuminate\Support\Facades\Event;
use Prettus\Validator\Exceptions\ValidatorException;
use Yarscript\{Organisation\Models\Organisation,
    User\Models\User as UserModel,
    Project\Repositories\ProjectRepository,
    User\Contracts\Models\User as UserModelContract,
    Project\Contracts\Services\Project as ProjectServiceContract
};

/**
 * Class Project
 * @package Yarscript\Project\Services
 */
class Project implements ProjectServiceContract
{
    /**
     * @var ProjectRepository
     */
    protected ProjectRepository $projectRepository;

    /**
     * Project constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(
        ProjectRepository $projectRepository
    )
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param array $data
     * @param UserModelContract|UserModel $user
     * @return mixed
     */
    public function createProject(array $data, UserModelContract $user)
    {
//        foreach (['user_id', 'user_uuid'] as $key) {
//            $data[ $key ] = $user->getAttribute($key);
//        }

        $data[ 'created_by' ] = $data['user_id'] = $user->user_id;

        /** @var Organisation $organisation */
        $organisation = $user->organisations()->firstWhere(
            'organisation_uuid', $data[ 'organisation_uuid' ]
        );

        $data['organisation_uuid'] = $organisation->organisation_uuid;

        $project = $this->projectRepository->createProject($data, $organisation);

        Event::dispatch('catalog.product.create.after', $project);

        return $project;
    }

    /**
     * @param array $data
     * @param string $uuid
     * @return bool
     */
    public function updateProject(array $data, string $uuid): bool
    {
        return $this->projectRepository->updateProject($data, $uuid);
    }

    /**
     * @param string $uuid
     * @return bool
     */
    public function deleteProject(string $uuid): bool
    {
        return $this->projectRepository->deleteProject($uuid);
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function getProjectUuid(string $uuid)
    {
        return $this->projectRepository->getProjectUuid($uuid);
    }
}
