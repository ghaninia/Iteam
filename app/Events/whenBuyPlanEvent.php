<?php

namespace App\Events;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class whenBuyPlanEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user , $plan ;
    public function __construct(User $user ,Plan $plan)
    {
        $this->user = $user ;
        $this->plan = $plan ;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
