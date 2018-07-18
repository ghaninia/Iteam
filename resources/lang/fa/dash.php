<?php

return [
    'profile' => [
        'username' => 'نام کاربری' ,
        'enterusername' => 'نام کاربری را وارد نمایید...' ,
        'firstname' => 'نام' ,
        'lastname' => 'نام خانوادگی' ,
        'password' => 'گذرواژه' ,
        'enterpassword' => 'گذرواژه را وارد نمایید...' ,
        'confirmed_password' => 'تایید گذرواژه' ,
        'guards' => [
            'user' => 'کاربر' ,
            'admin' => 'متخصص'
        ] ,
        'count_offers' => ' پیشنهادات من' ,
        'count_teams' => ' تیم های من' ,

    ] ,
    'panel' => [
        'user' => [
            'main' => 'پنل مدیریت' ,
            'confirm' => [
                'text' => 'تایید ایمیل' ,
            ]
        ] ,
        'sidebar' => [
            'mainpage' => 'صفحه اصلی' ,
            'profile' => [
                'edit' => 'ویرایش پروفایل' ,
                'password' => 'ویرایش گذرواژه' ,
                'notification' => 'ویرایش نوتیفیکیشن' ,
                'logout' => 'خروج از حساب کاربری' ,
            ]
        ],
    ],
    'messages' => [
        'success' => [
            'logout' =>  'شما با موفقیت از حساب کاربری خود خارج شده اید.' ,
        ] ,
        'error' => [
            'logout' =>  'خطایی در هنگام خروج رخ داده است لطفا به پشتیبان اطلاع دهید !' ,
        ]
    ] ,
    'active' => [
        'enable' => 'فعال' ,
        'disabled' => 'غیرفعال' ,
    ]
];