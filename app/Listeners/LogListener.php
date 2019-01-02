<?php

namespace App\Listeners;

use App\Events\LogEvent;
use App\Models\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogListener
{

    public function __construct()
    {

    }

    public function handle(LogEvent $event)
    {
        $log = new Log() ;
        $log->user_id = $event->user->id  ;
        $log->key = $event->key ;
        $log->save() ;
    }
}
