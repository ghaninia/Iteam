<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Larabookir\Gateway\Enum;

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
            $table->string('ref_id', 100)->nullable() ;
            $table->string('tracking_code', 50)->nullable()  ;
            $table->string('transaction_id')->nullable() ;
            $table->enum('status', [Enum::TRANSACTION_INIT, Enum::TRANSACTION_SUCCEED, Enum::TRANSACTION_FAILED])->default(Enum::TRANSACTION_INIT);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade") ;
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade")->onUpdate("cascade") ;

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
