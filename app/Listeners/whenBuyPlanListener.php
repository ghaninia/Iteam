<?php

namespace App\Listeners;

use App\Events\whenBuyPlanEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class whenBuyPlanListener
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
     * @param  whenBuyPlanEvent  $event
     * @return void
     */
    public function handle(whenBuyPlanEvent $event)
    {
        //
    }
}
