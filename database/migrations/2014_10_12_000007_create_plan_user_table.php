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
            $table->increments('id');
            $table->string("uid")->unique()->nullable() ;
            $table->boolean("status")->nullable() ;
            $table->unsignedInteger("user_id") ;
            $table->unsignedInteger("plan_id") ;
            $table->timestamp("expire_at")->nullable() ;
            $table->timestamps();

            $table->index([
                "id" ,
                "user_id" ,
                "plan_id"
            ]) ;

            $table->foreign("user_id")->references("id")->on("users")->onDelete("CASCADE")->onUpdate("CASCADE") ;
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("CASCADE")->onUpdate("CASCADE") ;
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
