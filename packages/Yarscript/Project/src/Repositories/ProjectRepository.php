<?php


namespace Yarscript\Project\Repositories;


use Prettus\Validator\Exceptions\ValidatorException;
use Yarscript\{Core\Eloquent\Repository,
    Organisation\Contracts\Models\Organisation,
    Project\Models\Project as ProjectModel};

/**
 * Class ProjectRepository
 * @package Yarscript\Project\Repositories
 */
class ProjectRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return ProjectModel::class;
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public function getProjectUuid($uuid)
    {
        return $this->findOneByField('project_uuid', $uuid);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->all();
    }

    /**
     * @param array $data
     * @param Organisation $organisation
     * @return mixed
     */
    public function createProject(array $data, Organisation $organisation)
    {
        $this->checkUuid('project_uuid', $data);

        return $organisation->projects()->create($data);
    }

    /**
     * @param array $data
     * @param string $uuid
     * @return mixed
     */
    public function updateProject(array $data, string $uuid)
    {
        return $this->findOneByUuid($uuid)->update($data);
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public function deleteProject($uuid)
    {
        return $this->findOneByUuid($uuid)->delete();
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function findOneByUuid(string $uuid)
    {
        return $this->findOneByField('project_uuid', $uuid);
    }
}
