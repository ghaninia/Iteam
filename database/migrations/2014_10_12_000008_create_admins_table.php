<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("departement_id") ;
            $table->string('name');
            $table->string('family');
            $table->string('username')->unique();            
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('website')->nullable() ;
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->enum("gender" , ['male','female'])->default("male");
            
            $table->text('information');
            $table->string('password');

            $table->unsignedInteger("province_id")->nullable();
            $table->unsignedInteger("city_id")->nullable();
            $table->unsignedInteger("village_id")->nullable();

            $table->timestamps();

            $table->foreign("departement_id")->references("id")->on("departements")->onDelete("cascade")->onUpdate("cascade") ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
