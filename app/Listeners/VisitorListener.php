<?php

namespace App\Listeners;
use App\Events\VisitorEvent;
use App\Models\Visit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class VisitorListener
{
    public function __construct()
    {
    }

    public function handle(VisitorEvent $event)
    {
        $user = Auth::guard("user")->check() ? Auth::guard("user")->id() : NULL;

        $search = Auth::guard("user")->check() ? [
            'user_id' => $user,
            'team_id' => $event->team->id,
            'ip' => request()->ip()
        ] : [
            'user_id' => NULL,
            'team_id' => $event->team->id,
        ];

        $isExists = Visit::where($search)->first() ;

        if (!$isExists)
        {
            $search['user_agent'] = request()->userAgent() ;
            $search['mac_address'] = macAddress() ;
            $search['ip'] = request()->ip() ;
            Visit::create($search) ;
        }

    }
}
