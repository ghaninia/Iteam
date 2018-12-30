<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->name ,
        'price' => $faker->randomNumber(5) ,
        'description' => $faker->realText(200) ,
        'max_create_team' => random_int(1,10) ,
        'max_create_offer' => random_int(1,10) ,
    ];
});
