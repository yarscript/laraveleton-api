<?php


namespace Yarscript\Organisation\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Yarscript\Organisation\Contracts\Models\OrganisationUser as OrganisationUserContract;
use Yarscript\User\Models\User as UserModel;
use Yarscript\Organisation\Models\Organisation as OrganisationModel;

/**
 * Class OrganisationUser
 * @package Yarscript\Organisation\Models
 */
class OrganisationUser extends Pivot implements OrganisationUserContract
{
    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @return BelongsTo
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(OrganisationModel::class, 'organisation_id', 'organisation_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
