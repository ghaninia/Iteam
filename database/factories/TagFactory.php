<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->name() ,
        'slug' => $faker->slug() ,
        'description' => $faker->realText(200)
    ];
});
