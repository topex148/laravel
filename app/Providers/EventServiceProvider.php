<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

use Illuminate\Auth\Events\NewUser;
use Illuminate\Auth\Listeners\SendWelcomeEmail;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

            'App\Events\NewUserRegistered' => [
            'App\Listeners\SendWelcomeEmail',
            ],


    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
