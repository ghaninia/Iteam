<?php

Auth::routes(['verify' => true]);

Route::namespace('Dashboard')->name('Dashboard.')->middleware('auth:user')->group(function (){

});
