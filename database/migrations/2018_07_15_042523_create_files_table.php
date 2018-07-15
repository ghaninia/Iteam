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
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string("fileable_id")->nullable() ;
            $table->string("fileable_type")->nullable() ;

            $table->unsignedInteger('guard_id')->nullable() ;
            $table->string('guard_type')->nullable() ;

            $table->string("size")->nullable() ;
            $table->string("format")->nullable();
            $table->string("disk")->nullable();
            $table->text('url') ;
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
        Schema::dropIfExists('files');
    }
}
