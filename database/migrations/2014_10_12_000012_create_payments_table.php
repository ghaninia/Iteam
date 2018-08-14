<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id") ;
            $table->unsignedInteger("plan_id") ;
            $table->boolean("status")->default(false) ;


            $table->string("transaction_code");
            $table->string("ref_code");

            $table->string("tracking_code")->nullable() ;
            $table->string('card_number')->nullable() ;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
