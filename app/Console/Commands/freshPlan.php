<?php
namespace App\Console\Commands;
use App\Models\PlanUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class freshPlan extends Command
{

    protected $signature = 'fresh:plan';

    protected $description = 'If your plan expires, then the default will be replaced.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        //@ وقتی که اکانتی منقضی میشود کامنت پایین کاربر را شناسایی میکند @//
        DB::transaction(function (){
            $now = ( new Carbon() )->toDateTimeString() ;
            $planUsers = PlanUser::whereDoesntHave("plan" , function ($Query){
                return $Query
                    ->where("default" , true  )
                    ->whereId(config("timo.panel_default")) ;
            })
            ->whereDate("expire_at" , "<" , $now)->pluck("id")->toArray() ;
            User::whereIn("plan_user_id" , $planUsers )->update([
                "plan_user_id" => null ,
                "plan_id" => null
            ]) ;
            PlanUser::whereIn("id" , $planUsers )->update([
                "status" => false ,
            ]);
        });
    }
}
