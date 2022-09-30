<?php


namespace Yarscript\Project\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Class InvitationEmail
 * @package Yarscript\Project\Mail
 */
class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Email invitation view
     * @var string
     */
    const INVITE_VIEW = 'dashboard::emails.project.invite';

    /**
     * @var array
     */
    protected array $data;

    /**
     * InvitationEmail constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return InvitationEmail
     */
    public function build(): InvitationEmail
    {
        return $this->from('test@test.test', 'test name')
            ->to($this->data['email'])
            ->subject('Subject')
            ->view(self::INVITE_VIEW)
            ->with('data', [
                    'user_email' => $this->data['email'],
                    'token' => $this->data['token'],
                ]
            );
    }
}
