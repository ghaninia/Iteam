<?php

namespace App\Listeners;

use App\Events\AcceptOfferEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\acceptedOffer;

class AcceptOfferListener
{

    public function __construct()
    {

    }

    public function handle(AcceptOfferEvent $event)
    {
        //send notification
        if ($event->user->porfileNotification->when_offer_confirmed)
            $event->user->notify( new acceptedOffer($event->team) ) ;

    }
}
