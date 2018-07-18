<?php

use Faker\Generator as Faker;

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
        'mobile' => "093902745".random_int(10,99) ,
        'website' => $faker->domainName ,
        'phone' => $faker->phoneNumber ,
        'gender' => array_random(['male' ,'female']) ,
        'bio' => $faker->realText(100) ,

        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
