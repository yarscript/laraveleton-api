<?php


namespace Yarscript\User\Models;


use Illuminate\Database\Eloquent\Model;
use \Yarscript\User\Contracts\Models\UserInvite as UserInviteContract;

/**
 * Class UserInvite
 *
 * @property mixed user_invite_uuid
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed email
 * @property mixed invited_by_id
 * @property mixed invited_by_uuid
 *
 * @package Yarscript\User\Models
 */
class UserInvite extends Model implements UserInviteContract
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_invite_uuid', 'organisation_uuid', 'first_name', 'last_name', 'email', 'invited_by_id', 'invited_by_uuid'
    ];

}
