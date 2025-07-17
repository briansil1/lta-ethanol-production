<?php

namespace App\Listeners;

use App\Events\PasswordReset;
use App\Mail\PasswordChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordChanged
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
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $link = route(__('routes.home'));
        Mail::to($event->user->email)->send(new PasswordChanged($link, $event->user->email));
    }
}
