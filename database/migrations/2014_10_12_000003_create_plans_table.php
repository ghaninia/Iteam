<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{

    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name') ;
            $table->text('description')->nullable() ;
            $table->float("price")->default(0) ;
            $table->integer("max_create_team")->default(0) ;
            $table->integer("max_create_offer")->default(0) ;
            $table->integer('count_skill')->default(0) ;
            $table->boolean('sms_notification')->default(false) ;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
