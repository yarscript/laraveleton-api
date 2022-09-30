<?php


namespace Yarscript\Project\Models;


use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Relations\BelongsTo,
    Relations\BelongsToMany,
};
use Yarscript\{
    User\Contracts\Models\User as UserModelContract,
    Project\Contracts\Models\Project as ProjectContract,
    Organisation\Models\Organisation as OrganisationModel,
    Project\Contracts\Models\ProjectUser as ProjectUserModelContract,
    Organisation\Contracts\Models\Organisation as OrganisationModelContract,
};

/**
 * Class Project
 * @package Yarscript\Project\Models
 */
class Project extends Model implements ProjectContract
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * @var array
     */
    protected $fillable = [
        'project_uuid',
        'name',
        'user_id',
        'user_uuid',
        'organisation_id',
        'organisation_uuid',
    ];

    protected $hidden = ['deleted_at', 'created_by', 'user_id', 'project_id', 'organisation_id'];

    /**
     * @var string
     */
    protected $primaryKey = 'project_id';

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(UserModelContract::class, 'user_id', '', 'user');
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(UserModelContract::class, ProjectUserModelContract::TABLE_NAME);
    }

    /**
     * @return BelongsTo
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(OrganisationModel::class, OrganisationModelContract::TABLE_NAME);
    }
}
