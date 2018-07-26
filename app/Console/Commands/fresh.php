<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class fresh extends Command
{

    protected $signature = 'fresh';
    protected $description = 'fresh Database , remove Cache and insert FAKE data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Artisan::call("migrate:fresh") ;
        Artisan::call("cache:clear") ;
        Artisan::call("view:clear") ;
        Artisan::call("db:seed") ;
        Artisan::call("config:clear") ;
    }
}
