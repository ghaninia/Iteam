<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketables', function (Blueprint $table) {
            $table->string("tracking_code")->nullable() ;
            $table->string("ticket_id") ;
            $table->string("ticketable_id") ;
            $table->string("ticketable_type") ;
            $table->timestamps() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketables');
    }
}
