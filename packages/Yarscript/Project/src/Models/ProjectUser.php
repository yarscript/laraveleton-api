<?php


namespace Yarscript\Project\Models;


use Illuminate\Database\Eloquent\Model;
use Yarscript\Project\Contracts\Models\ProjectUser as ProjectUserContract;

/**
 * Class ProjectUser
 * @package Yarscript\Project\Models
 */
class ProjectUser extends Model implements ProjectUserContract
{
    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'project_uuid', 'user_id', 'user_uuid'];
}
