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

            $table->unsignedInteger('plan_user_id')->nullable() ;
            $table->unsignedInteger('plan_id')->nullable() ;

            $table->boolean('is_active')->default(FALSE);

            $table->string('name')->nullable() ;
            $table->string('family')->nullable() ;
            $table->string('username' , 191 )->unique() ;
            $table->string('email')->unique()->nullable() ;
            $table->string('mobile' , 11 )->unique()->nullable() ;
            $table->string('website')->nullable() ;
            $table->string('phone')->nullable() ;
            $table->string('fax')->nullable() ;
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

            $table->timestamp("email_verified_at")->nullable() ;
            $table->timestamps();

            $table->foreign("province_id")->references("id")->on("provinces")->onDelete("cascade")->onUpdate("cascade") ;
            $table->foreign("city_id")->references("id")->on("cities")->onDelete("cascade")->onUpdate("cascade") ;
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("SET NULL")->onUpdate("SET NULL") ;
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
