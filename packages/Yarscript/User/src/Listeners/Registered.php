<?php


namespace Yarscript\User\Listeners;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Yarscript\User\Contracts\Models\User;
use Yarscript\User\Mail\RegistrationEmail;

/**
 * Class Registered
 * @package Yarscript\User\Listeners
 */
class Registered
{
    /**
     * @param User $user
     * @return bool
     */
    public function sendEmailVerification(User $user): bool
    {
        $userData = method_exists($user, 'getAttributes') ? $user->getAttributes() : null;

        if (!($userData && (!$userData['email_verified_at'] ?? false))) {
            return false;
        }

        $verificationData = [
            'token' => Crypt::encryptString($userData['user_uuid']),
            'email' => $user['email']
        ];

        return (bool)Mail::queue(new RegistrationEmail($verificationData));
    }
}
