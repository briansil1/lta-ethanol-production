<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Registered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $user_locale;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $user_locale)
    {
        $this->user = $user;
        $this->user_locale = $user_locale;
    }
}
