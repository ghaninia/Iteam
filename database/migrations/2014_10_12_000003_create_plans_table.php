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
            $table->boolean("default")->default(FALSE ) ;
            $table->text('description')->nullable() ;
            $table->decimal('price', 15, 2)->default(0) ;
            $table->integer("max_life")->default(1) ; // chand roz bad bemirad barhasb roooz

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
