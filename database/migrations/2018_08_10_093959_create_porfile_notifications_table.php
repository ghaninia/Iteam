<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorfileNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porfile_notifications', function (Blueprint $table) {
            $table->unsignedInteger('user_id') ;
            $table->boolean('when_login')->default(true) ;
            $table->boolean('when_create_team')->default(true) ;
            $table->boolean('when_create_offer')->default(true) ;
            $table->boolean('when_edit_profile')->default(true) ;
            $table->boolean('when_myteamhave_offer')->default(true) ;
            $table->boolean('when_expired_panel')->default(true) ;
            $table->boolean('when_offer_confirmed')->default(true) ;

            $table->foreign("user_id")->references("id")->on('users')->onDelete("CASCADE")->onUpdate('CASCADE') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('porfile_notifications');
    }
}
