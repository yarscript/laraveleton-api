<?php


namespace Yarscript\User\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};
use Yarscript\User\{Contracts\Models\UserInfo as UserInfoContract, Models\User as UserModel};

class UserInfo extends Model implements UserInfoContract
{
    /**
     * @var string
     */
    protected $table = 'user_info';

    /**
     * @var string[]
     */
    protected $fillable = [
        'info_uuid',
        'user_id',
    ];

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
