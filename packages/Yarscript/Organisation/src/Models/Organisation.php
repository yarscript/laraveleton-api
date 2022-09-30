<?php


namespace Yarscript\Organisation\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, Relations\BelongsToMany, Relations\HasMany, SoftDeletes};
use Yarscript\{
    User\Models\User,
    Project\Models\Project,
    User\Contracts\Models\User as UserModelContract,
    Organisation\Models\OrganisationUser as OrganisationUserModel,
    Organisation\Contracts\Models\Organisation as OrganisationContract
};

/**
 * Class Organisation
 *
 * @property mixed organisation_uuid
 * @property int type
 *
 * @package Yarscript\Organisation\Models
 */
class Organisation extends Model implements OrganisationContract
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'user_id',
        'user_uuid',
        'organisation_uuid',
    ];

    protected $hidden = ['deleted_at', 'created_by', 'user_id', 'organisation_id'];

    /**
     * @var string
     */
    protected $primaryKey = 'organisation_id';

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            UserModelContract::class, 'user_id', '', 'user'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            UserModelContract::class, OrganisationUserModel::TABLE_NAME, 'organisation_id', 'user_id'
        );
    }

    /**
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'organisation_id', 'organisation_id');
    }
}
