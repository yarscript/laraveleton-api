<?php


namespace Yarscript\Project\Listeners;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Yarscript\User\Contracts\Models\UserInvite;
use Yarscript\Project\Mail\InvitationEmail;

/**
 * Class Invited
 * @package Yarscript\User\Listeners
 */
class Invited
{
    /**
     * @param UserInvite $invite
     * @return bool
     */
    public function sendEmailInvite(UserInvite $invite): bool
    {
        $inviteData = method_exists($invite, 'getAttributes') ? $invite->getAttributes() : null;

        if ($inviteData) {
            $emailInviteData = [
                'token' => Crypt::encryptString($inviteData['user_invite_uuid']),
                'email' => $invite['email']
            ];

            return (bool)Mail::queue(new InvitationEmail($emailInviteData));
        }

        return false;
    }
}
