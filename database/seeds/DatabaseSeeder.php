<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultSeeder::class) ;
        factory(\App\Models\Plan::class , 4)->create() ;
        factory(\App\Models\User::class , 4)->create() ;
        factory(\App\Models\Skill::class , 5)->create() ;
        factory(\App\Models\Tag::class , 5)->create() ;
        factory(\App\Models\Team::class , 5)->create() ;
        factory(\App\Models\Offer::class , 10 )->create() ;
    }
}
