<?php

Route::get('/', 'TestController@index');

Route::post('/', 'TestController@store')->name('file.store');