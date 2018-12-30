<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name() ,
        'slug' => $faker->slug() ,
        'phone' => $faker->phoneNumber ,
        'fax'  => $faker->phoneNumber ,
        'mobile' => "093902745".random_int(10,99) ,
        'email' => $faker->email ,
        'website' => $faker->url ,
        'excerpt' => $faker->realText(100) ,
        'content' => $faker->realText(200) ,
        'address' => $faker->address ,
        'count_member' => rand(1,5) ,
        'required_gender' => [array_random(genders())] ,
        'type_assist' => [array_random( typeAssists() )] ,

        'interplay_fiscal' => array_random(interplayFiscals()) ,
        'user_id' => rand(1,5) ,
        'plan_id' => 1 ,
        'default_plan' => true
    ];
});
