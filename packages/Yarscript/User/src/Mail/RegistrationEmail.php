<?php


namespace Yarscript\User\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;


/**
 * Class RegistrationEmail
 * @package Yarscript\User\Mail
 */
class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    public array $data;

    /**
     * Create a new mailable instance.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return RegistrationEmail
     */
    public function build(): RegistrationEmail
    {
        return $this->from('test@test.test', 'test name')
            ->to($this->data['email'])
            ->subject('Subject')
            ->view('dashboard::emails.user.verification-email')
            ->with('data', [
                    'user_email' => $this->data['email'],
                    'token' => $this->data['token'],
                ]
            );
    }
}
