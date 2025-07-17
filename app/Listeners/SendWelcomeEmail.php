<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::to($event->user->email)->locale($event->user_locale)->send(new UserCreated($event->user));
    }
}
