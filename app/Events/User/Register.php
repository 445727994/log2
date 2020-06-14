<?php

namespace App\Events\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Register
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $params;
    public $app;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params,$app)
    {
        $this->params = $params;
        $this->app=$app;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
