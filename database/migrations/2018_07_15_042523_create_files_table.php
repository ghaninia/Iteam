<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("fileable_id")->nullable() ;
            $table->string("fileable_type")->nullable() ;
            $table->text('url') ;
            $table->string("usage")->nullable();
            $table->string("disk")->nullable();
            $table->string("format")->nullable();
            $table->string("size")->nullable() ;
            $table->timestamp("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonts');
    }
}
