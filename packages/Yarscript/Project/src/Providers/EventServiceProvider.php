<?php


namespace Yarscript\Project\Providers;


use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Yarscript\Project\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        Event::listen('user.invite.create.after', 'Yarscript\Project\Listeners\Invited@sendEmailInvite');
    }
}
