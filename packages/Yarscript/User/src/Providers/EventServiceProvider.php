<?php


namespace Yarscript\User\Providers;


use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Yarscript\User\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        Event::listen('user.created.after', 'Yarscript\User\Listeners\Registered@sendEmailVerification');
    }
}
