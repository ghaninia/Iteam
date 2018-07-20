<?php

Auth::routes() ;

Route::namespace('Dashboard\\')->name('dashboard.')->prefix('dashboard')->group(function (){
    // Route access if Guard user
    Route::middleware('auth:user')->namespace('User\\')->name('user.')->group(function (){ //->prefix('member')

        Route::get('main', 'MainController@index')->name('main') ;
        Route::post('ajax', 'AjaxController@ajaxHandle')->name('ajax') ;

        //* روت های پروفایل کاربری  *//
        Route::name("profile.")->prefix("profile")->group(function (){
            Route::prefix("account")->name("account.")->group(function (){
                Route::get("/"  , "ProfileController@account")->name("index") ;
                Route::post( "/"  , "ProfileController@accountStore")->name("store")->middleware("throttle:1:10") ;
            });
            Route::prefix("password")->name("password.")->group(function (){
                Route::get("/"  , "ProfileController@password")->name("index") ;
                Route::post( "/"  , "ProfileController@passwordStore")->name("store") ;
            });
            Route::prefix("notification")->name("notification.")->group(function (){
                Route::get("/"  , "ProfileController@notification")->name("index") ;
                Route::post( "/"  , "ProfileController@notificationStore")->name("store") ;
            });
            Route::post( "logout"  , "ProfileController@logout")->name("logout") ;
        });

    });
});