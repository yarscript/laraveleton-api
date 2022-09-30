<?php


namespace Yarscript\ServicePlan\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Yarscript\ServicePlan\Contracts\Models\ServicePlan as ServicePlanModelContract;
use Yarscript\User\Models\User as UserModel;

/**
 * Class ServicePlan
 * @package Yarscript\ServicePlan\Models
 */
class ServicePlan extends Model implements ServicePlanModelContract
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'service_plans';

    /**
     * @var string[]
     */
    protected $fillable = [
        'service_plan_id',
        'service_plan_uuid',
        'name',
        'plan',
        'created_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var string[]
     */
    protected $hidden = ['service_plan_id'];

    /**
     * @var string
     */
    protected $primaryKey = 'service_plan_id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(UserModel::class);
    }
}
