<?php

use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{

    public function run()
    {

        \App\Models\Plan::create([
            'name' => "پنل رایگان" ,
            'price' => "0" ,
            "default" => true ,
            'description' => "پنل رایگان را استفاده مینمایید" ,
            'max_create_team' => 1 ,
            'max_create_offer' => 5 ,
        ]);

        \App\Models\User::create([
            'name' => "محمدامین",
            'family' => "غنی نیا",
            'username' => 'aminghaninia' ,
            'mobile' => "09390274570" ,
            'website' => "https://ghaninia.ir" ,
            'phone' => "01132475241" ,
            'gender' => "male",
            'bio' => "تا به امروز هدف ما پیشرفت کاربران ایرانی در دنیای برنامه نویسی و طراحی وب بوده است, ما با کمک شما توانسته‌ایم بسیار قدرتمند در این مسیر قدم بگذاریم و حالا توانایی این را داریم که بگوییم یکی از پرتلاش‌ترین وبسایت‌ها در حوزه برنامه‌نویسی و طراحی وب هستیم و خواهیم بود, شما میتوانید مقالات و دوره‌های جدید را از بخش‌های مقالات و دوره های آموزشی مشاهده و استفاده کنید پس زمان را از دست ندهید . برای رسیدن به موفقیت ابتدا نیاز است که شروع کنید ." ,
            'email' => "aminghaninia4@Gmail.com" ,
            'password' =>  bcrypt("secret") , // secret
            'remember_token' => bcrypt("secret") ,
        ]);
    }
}
