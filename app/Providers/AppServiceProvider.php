<?php

namespace App\Providers;

use App\Models\Payment;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        Schema::defaultStringLength(191) ;

        //* فقط فاکتور های خودت رو ببین *//
        $gate->define("payment" , function ( $user , Payment $payment){
            return $payment->user_id == $user->id ;
        });

        Relation::morphMap([
            'team' => 'App\Models\Team'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
