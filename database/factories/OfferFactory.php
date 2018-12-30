<?php
use Faker\Generator as Faker;
$factory->define(App\Models\Offer::class, function (Faker $faker) {
    return [
        'viewed' => array_rand([0,1]) ,
        'status' => array_rand([0,1]) ,
        'default_plan' => array_rand([0,1]) ,
        'user_ip' => $faker->ipv4 ,
        'user_id' => random_int(1,5) ,
        'team_id' => random_int(1,5) ,
        'content' => $faker->realText(200) ,
    ];
});
