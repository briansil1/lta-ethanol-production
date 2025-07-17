<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class SendToken extends Mailable
{
    use Queueable, SerializesModels, Notifiable;

    public $token;

    public $url;

    public $name;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $name, $email)
    {
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
        $this->url = route(__('routes.change-pass'), ['token' => $this->token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.user-token');
    }
}
