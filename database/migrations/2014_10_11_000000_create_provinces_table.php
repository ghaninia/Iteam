<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
        });
        DB::table("provinces")->insert(
            [
                ['name' => 'آذربایجان شرقی','latitude'=>'37.90357330','longitude'=>'46.26821090'],
                ['name'=> 'آذربایجان غربی','latitude'=>' 37.45500620','longitude'=>' 45.00000000'],
                ['name'=> 'اردبیل','latitude'=>' 38.48532760','longitude'=>' 47.89112090'],
                ['name'=> 'اصفهان','latitude'=>' 32.65462750','longitude'=>' 51.66798260'],
                ['name'=> 'البرز','latitude'=>' 35.99604670','longitude'=>' 50.92892460'],
                ['name'=> 'ایلام','latitude'=>' 33.29576180','longitude'=>' 46.67053400'],
                ['name'=> 'بوشهر','latitude'=>' 28.92338370','longitude'=>' 50.82031400'],
                ['name'=> 'تهران','latitude'=>' 35.69611100','longitude'=>' 51.42305600'],
                ['name'=> 'چهارمحال و بختیاری','latitude'=>' 31.96143480','longitude'=>' 50.84563230'],
                ['name'=> 'خراسان جنوبی','latitude'=>' 32.51756430','longitude'=>' 59.10417580'],
                ['name'=> 'خراسان رضوی','latitude'=>' 35.10202530','longitude'=>' 59.10417580'],
                ['name'=> 'خراسان شمالی','latitude'=>' 37.47103530','longitude'=>' 57.10131880'],
                ['name'=> 'خوزستان','latitude'=>' 31.43601490','longitude'=>' 49.04131200'],
                ['name'=> 'زنجان','latitude'=>' 36.50181850','longitude'=>' 48.39881860'],
                ['name'=> 'سمنان','latitude'=>' 35.22555850','longitude'=>' 54.43421380'],
                ['name'=> 'سیستان و بلوچستان','latitude'=>' 27.52999060','longitude'=>' 60.58206760'],
                ['name'=> 'فارس','latitude'=>' 29.10438130','longitude'=>' 53.04589300'],
                ['name'=> 'قزوین','latitude'=>' 36.08813170','longitude'=>' 49.85472660'],
                ['name'=> 'قم','latitude'=>' 34.63994430','longitude'=>' 50.87594190'],
                ['name'=> 'كردستان','latitude'=>' 35.95535790','longitude'=>' 47.13621250'],
                ['name'=> 'كرمان','latitude'=>' 30.28393790','longitude'=>' 57.08336280'],
                ['name'=> 'كرمانشاه','latitude'=>' 34.31416700','longitude'=>' 47.06500000'],
                ['name'=> 'کهگیلویه و بویراحمد','latitude'=>' 30.65094790','longitude'=>' 51.60525000'],
                ['name'=> 'گلستان','latitude'=>' 37.28981230','longitude'=>' 55.13758340'],
                ['name'=> 'گیلان','latitude'=>' 37.11716170','longitude'=>' 49.52799960'],
                ['name'=> 'لرستان','latitude'=>' 33.58183940','longitude'=>' 48.39881860'],
                ['name'=> 'مازندران','latitude'=>' 36.22623930','longitude'=>' 52.53186040'],
                ['name'=> 'مركزی','latitude'=>' 33.50932940','longitude'=>' - 92.39611900'],
                ['name'=> 'هرمزگان','latitude'=>' 27.13872300','longitude'=>' 55.13758340'],
                ['name'=> 'همدان','latitude'=>' 34.76079990','longitude'=>' 48.39881860'],
                ['name'=> 'یزد','latitude'=>'32.10063870','longitude'=>' 54.43421380']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}
