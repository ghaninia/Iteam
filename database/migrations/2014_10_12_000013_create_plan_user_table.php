<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_user', function (Blueprint $table) {
            //$table->increments('id') ;
            $table->unsignedInteger('user_id') ;
            $table->unsignedInteger('plan_id') ;

            $table->boolean('status')->default(false) ;
            $table->timestamp('expired_at')->nullable() ;
            $table->timestamps() ;

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('plan_id')
                ->references('id')->on('plans')
                ->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_user');
    }
}
