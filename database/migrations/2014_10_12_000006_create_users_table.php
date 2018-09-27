<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('plan_id') ;
            $table->timestamp('plan_expired_at')->nullable()->default(null) ;
            $table->timestamp('plan_created_at')->nullable()->default(null) ;

            $table->foreign('plan_id')
                ->references('id')->on('plans')
                ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->boolean('is_active')->default(FALSE);
            $table->boolean('confirmed_email')->default(FALSE);

            $table->string('name');
            $table->string('family');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->length(11)->unique();
            $table->string('website')->nullable() ;
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->enum("gender" , ['male','female'])->default("male");

            $table->text("type_assist")->nullable()  ; // نوع همکاری  dorkari,tamamvaght,parevaght,karamozi,
            $table->text("interplay_fiscal")->nullable() ; //نوع تعامل مالی : هم بنیان گذار / شراکتی حقوق ثابت
            $table->string("min_salary")->default(0) ;
            $table->string("max_salary")->default(0) ;

            $table->text('bio')->nullable() ;
            $table->text('instagram_account')->nullable() ;
            $table->text('linkedin_account')->nullable() ;


            $table->string('password');
            $table->rememberToken();
            
            $table->unsignedInteger("province_id")->nullable();
            $table->unsignedInteger("city_id")->nullable();

            $table->timestamps();

            $table->foreign("province_id")->references("id")->on("provinces")->onDelete("cascade")->onUpdate("cascade") ;
            $table->foreign("city_id")->references("id")->on("cities")->onDelete("cascade")->onUpdate("cascade") ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
