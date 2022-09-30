<?php


namespace Yarscript\User\Models;


use Yarscript\ServicePlan\Models\ServicePlan as ServicePlanModel;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Yarscript\Organisation\{
    Models\Organisation as OrganisationModel,
    Models\OrganisationUser as OrganisationUserModel
};
use Yarscript\User\{
    Models\UserInfo as UserInfoModel,
    Contracts\Models\User as UserContract,
    Models\UserBilling as UserBillingModel,
};
use Illuminate\Database\Eloquent\{Relations\BelongsTo,
    SoftDeletes,
    Relations\HasOne,
    Relations\HasMany,
    Relations\BelongsToMany,
    Relations\HasManyThrough
};
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int user_id
 * @property string user_uuid
 *
 * @package Yarscript\User\Http\Models
 */
class User extends Authenticatable implements UserContract, JWTSubject, MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_uuid',
        'first_name',
        'last_name',
        'email',
        'password',
        'email_verified_at'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string[]
     */
    protected $hidden = ['password', 'remember_token', 'user_id'];

    /**
     * @var array
     */
    protected $dates = ['email_verified_at'];

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * @return HasOne
     */
    public function info(): HasOne
    {
        return $this->hasOne(
            UserInfoModel::class, 'user_id', 'user_id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function servicePlan(): BelongsTo
    {
        return $this->belongsTo(
            ServicePlanModel::class, 'service_plan_id', 'service_plan_id'
        );
    }

    /**
     * @return HasMany
     */
    public function organisations(): HasMany
    {
        return $this->hasMany(OrganisationModel::class, $this->primaryKey, '');
    }

    /**
     * @return BelongsToMany
     */
    public function relatedOrganisations(): BelongsToMany
    {
        return $this->belongsToMany(
            OrganisationModel::class, OrganisationUserModel::TABLE_NAME,
            'user_id',
            'organisation_id'
        );
    }

    /**
     * @return array
     */
    public function getUserIds(): array
    {
        return [$this->user_id, $this->user_uuid];
    }

    /**
     * @return HasOne
     */
    public function billing(): HasOne
    {
        return $this->hasOne(UserBillingModel::class, 'user_id', 'user_id');
    }
}
