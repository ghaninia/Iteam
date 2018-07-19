<?php
namespace App\Console\Commands;
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
            $now = new Carbon() ;
            $now = $now->toDateTimeString() ;
            User::where( "plan_id" , "<>" , config('timo.default_plan_id') )
                ->where('plan_expired_at' , '<' , $now)
                ->update([
                    'plan_created_at' => null ,
                    'plan_expired_at' => null ,
                    'plan_id' => config('timo.default_plan_id')
                ]);
        });

    }
}
