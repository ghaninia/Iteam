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
    }
}
