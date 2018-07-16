<?php

namespace App\Providers;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        \Schema::defaultStringLength(191) ;
//        Relation::morphMap([
//            'user' => 'App\Models\User',
//            'admin' => 'App\Models\Admin'
//        ]);
    }

    public function register()
    {

    }

}
