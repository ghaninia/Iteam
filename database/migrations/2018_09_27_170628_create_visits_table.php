<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id")->nullable() ; //* در صورتی که کاربر میهمان باشد نال میشود *//
            $table->unsignedInteger("team_id") ;
            $table->ipAddress("ip") ;
            $table->macAddress("mac_address") ;
            $table->text("user_agent") ;
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade") ;
            $table->foreign("team_id")->references("id")->on("teams")->onDelete("cascade")->onUpdate("cascade") ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
