<?php


namespace Yarscript\User\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Yarscript\{
    User\Models\User as UserModel,
    User\Contracts\Models\UserBilling as UserBillingContract
};

/**
 * Class UserBilling
 * @package Yarscript\User\Models
 */
class UserBilling extends Model implements UserBillingContract
{
    /**
     * @var string
     */
    protected $table = 'user_billing_info';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
