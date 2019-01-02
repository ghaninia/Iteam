<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $key , $user ;

    public function __construct( $user , $key )
    {
        $this->user = $user ;
        $this->key  = $key  ;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
