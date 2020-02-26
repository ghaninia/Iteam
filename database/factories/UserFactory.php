<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'family' => $faker->name,
        'username' => $faker->userName ,
        'mobile' => "0939027".random_int(1000,9999) ,
        'website' => $faker->domainName ,
        'phone' => $faker->phoneNumber ,
        'gender' => \Illuminate\Support\Arr::random(["male" , "female"]) ,
        'bio' => $faker->realText(100) ,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(20)
    ];
});
