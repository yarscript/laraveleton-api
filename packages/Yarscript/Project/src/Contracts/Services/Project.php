<?php


namespace Yarscript\Project\Contracts\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Yarscript\User\Contracts\Models\User as UserContract;

/**
 * Interface Project
 * @package Yarscript\Project\Contracts\Services
 */
interface Project
{
    /**
     * @param array $data
     * @param UserContract|Authenticatable $user
     * @return mixed
     */
    public function createProject(array $data, UserContract $user);

    /**
     * @param array $data
     * @param string $uuid
     * @return bool
     */
    public function updateProject(array $data, string $uuid): bool;

    /**
     * @param string $uuid
     * @return bool
     */
    public function deleteProject(string $uuid): bool;

    /**
     * @param string $uuid
     * @return mixed
     */
//    public function getInviteUuid(string $uuid);
}
