<?php
namespace App\Console\Commands;
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
        $now = new Carbon() ;
        $now = $now->toDateTimeString() ;

        //@ وقتی که اکانتی منقضی میشود کامنت پایین کاربر را شناسایی میکند @//
        //@ سپس پلن کاربر که دیفالت نیست را به false تبدیل میکنه  @//
        //@ اکانت دیفالت کاربر را برای او فعال میکند @//

        $users =
            DB::table('plan_user')
                ->where('status',true)
                ->whereNotNull("expired_at") // user has default plan
                ->where('expired_at' , "<" , $now)->pluck('user_id')->toArray();

            DB::table('plan_user')
                ->whereIn("user_id" , $users )
                ->update([
                    'status' => false
                ]);

            //*  کاربرانی ک منقضی شدند را بگیر و پنل دیفالت سیستم را برایشان فعال کن *//
            DB::table('plan_user')
                ->whereIn("user_id" , $users )
                ->where('plan_id', config('timo.default_plan_id') )
                ->update([
                    'status' => true ,
                    'expired_at' => null
                ]);

    }
}
