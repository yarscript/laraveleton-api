<?php


namespace Yarscript\Project\Repositories;


use Yarscript\Core\Eloquent\Repository;

/**
 * Class ProjectUserRepository
 * @package Yarscript\Project\Repositories
 */
class ProjectUserRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return  'Yarscript\Project\Models\ProjectUser';
    }
}
