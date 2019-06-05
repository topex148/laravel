<?php

namespace App\Listeners;

use App\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserWelcome;
use App\User;

class SendWelcomeEmail
{

  public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        Mail::to($event->user->email)->send(new NewUserWelcome($event->user));
    }

  //  public function handle(NewUserRegistered $event)
  //  {
      //send the welcome email to the user
    //    $user = $event->user;
    //    Mail::send('emails.welcome', ['user' => $user], function ($message) use ($user) {
      //    $message->from('hi@yourdomain.com', 'John Doe');
      //    $message->subject('Welcome aboard '.$user->name.'!');
      //    $message->to($user->email);
      //  });
    //  }
    }
