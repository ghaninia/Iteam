<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id") ; // maker team user id
            $table->unsignedInteger("plan_id")->nullable() ; // maker team user id
            $table->boolean('default_plan')->default(true) ; // agar plan ma default boot hatman in ra true kon ;
            $table->integer('expire_day') ;
            $table->boolean('expired')->default(false) ;

            $table->string("name") ;

            // dar sorate pardaljt ghabel namayesh ast !
            $table->string("phone")->nullable() ;
            $table->string("fax")->nullable() ;
            $table->string("mobile")->nullable() ;
            $table->string("email")->nullable() ;
            $table->string("website")->nullable() ;


            $table->text("excerpt")->nullable() ;
            $table->text("content")->nullable() ;
            $table->text("address")->nullable() ;
            $table->text('required_gender')->nullable() ;
            $table->integer('count_member')->default(1) ;
            $table->text("type_assist")->nullable()  ; // نوع همکاری  dorkari,tamamvaght,parevaght,karamozi,
            $table->text("interplay_fiscal")->nullable() ; //نوع تعامل مالی : هم بنیان گذار / شراکتی حقوق ثابت
            $table->string("min_salary")->default(0) ;
            $table->string("max_salary")->default(0) ;



            $table->unsignedInteger("province_id")->nullable();
            $table->unsignedInteger("city_id")->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate('cascade') ;
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade")->onUpdate('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
