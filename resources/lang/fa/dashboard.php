<?php

return [
    "profile" => [
        "account" => [
            "label" => "حساب کاربری" ,
            "completed" => "درصد تکمیل پروفایل" ,
            "submit" => "ویرایش حساب من" ,
            "color_dark" => "مُـد&zwnj;شب"
        ] ,
        "password" => [
            "label" => "گذرواژه" ,
            "new" => "گذرواژه جدید" ,
            "repeat" => "تکرار گذرواژه جدید" ,
            "submit" => "ویرایش گذرواژه"
        ] ,
        "plan" => [
            "label" => "پلن کاربری" ,
            'change' => 'تغییر پلن' ,
            'description' => 'توضیحات' ,
            'order' => 'سفارش' ,
            'features' => [
                'text' => 'ویژگی ها' ,
                'max_create_team' => 'حداکثر تیم' ,
                'max_create_offer' => ' حداکثر پیشنهاد' ,
                'count_skill' => 'حداکثر مهارت' ,
                'sms_notification' => 'اطلاعیه&zwnj;های پیامکی' ,
                'max_life' => 'حداکثر زندگی' ,
            ]
        ],
        "notification" => [
            "label" => "اعلان ها" ,
            "submit" => "ویرایش نوتیفیکشن من" ,
            'when_login' => 'زمانی که وارد سایت میشود به من پیام بده ' ,
            'when_edit_profile' => 'وقتی پروفایل خودم را آپدیت میکنم به من پیام بده ' ,
            'when_create_offer' => 'وقتی که پیشنهاد میدهم به من پیام بده ' ,
            'when_create_team' => 'وقتی تیم میسازم به من پیام بده ' ,
            'when_offer_confirmed' => 'وقتی درخواست من تایید میشود به من پیام بده ' ,
            'when_expired_panel' => 'وقتی پنلی که دارم منقضی میشود ' ,
            'when_myteamhave_offer' => 'وقتی برای تیم من پیشنهاد داده میشود '
        ],
        "skill" => [
            "label" => "مهارت ها"
        ],
        "logout" => [
            "label" => "خروج از حساب"
        ] ,
    ] ,
    "message" => [
        "log" => [
            "empty" => "هیچ لاگی برای شما ثبت نگردیده است!"
        ] ,
        "success" => [
            "register" => [
                "title"  => "ثبت نام کاربر جدید" ,
                "desc"   => "همین الان عضو سایت ما شوید و از امکانات ما بهره مند شوید" ,
                "create" => "حساب کاربری شما ساخته شده است , ایمیلی به پست الکترونیکی شما ارسال شده است 😎" ,
                "mail" => [
                    "title" => "تایید پست الکترونیکی" ,
                    "desc"  => "با سلام حساب شما با موفقیت ساخته شده است اگر شما حسابی در سایت ما نساخته اید میتوانید این ایمیل را نادیده بگیرید در غیر این صورت بر روی لینک زیر کلیک کنید" ,
                    "link"  => "من موافقم بزن بریم 😎"
                ]
            ] ,
            "login" => [

            ] ,
            'profile' => [
                'update' => 'حساب کاربری شما با موفقیت ویرایش گردید .' ,
                'pass' => 'رمز عبور با موفقیت بروزرسانی گردید .' ,
                'notification' => 'نوتیفیکیشن های ارسالی حساب شما ویرایش گردید .'
            ],
            'logout' => "شما با موفقیت از حساب کاربری خود خارج شده اید." ,
            "payment" => [
                "confirm" => "پرداخت شما با موفقیت انجام گردید."
            ]
        ]
    ],
    "pages" => [
        "dashboard" => [
            "label" => "داشبورد" ,
            "desc"  => "به حساب کاربری خود خوش آمده اید"
        ],
        "payment" => [
            "factor" => "صورتحساب" ,
            "label" => "فاکتور" ,
            "transaction_id" => "تراکنش بانکی" ,
            "tracking_code" => "کدرهگیری" ,
            "ip" => "آی&zwnj;پی" ,
            "price" => "قیمت" ,
            "sum" => "جمع&zwnj;کل" ,
            "status" => "وضعیت" ,
            "ok" => [
                \Larabookir\Gateway\Enum::TRANSACTION_SUCCEED => "موفق" ,
                \Larabookir\Gateway\Enum::TRANSACTION_FAILED  => "ناموفق" ,
                \Larabookir\Gateway\Enum::TRANSACTION_INIT    => "انتظار" ,
            ]
        ] ,
        "log" => [
            "label" => "لاگ هـای کاربری" ,
        ],
        "team" => [
            "my_team" => ":attribute تیم" ,
            "desc" => "کلیه تیم های ساخته شده"
        ],
        "offer" => [
            "my_offer" => ":attribute پیشنهاد" ,
            "desc" => "کلیه پیشنهادات داده شده"
        ],
        "profile" => [
            "label" => "کاربری"
        ]
    ],
    "logs" => [
        "login" => "ورود به حساب کاربری" ,
        "register" => "ثبت نام" ,
        "logout" => "خارج شده اید." ,
        "confirm_email" => "تایید پست الکترونیکی" ,
        "succesed_payment" => "تراکنش موفق" ,
        "faild_payment" => "تراکنش ناموفق" ,
        "account_edit" => "ویرایش حساب کاربری" ,
        "account_pass" => "ویرایش پسورد" ,
    ] ,
    "items" => [
        "new" => "جدید"
    ] ,
    'currency' => [
        'rial' => 'ریال' ,
        'thousandrial' => 'هزار ریال' ,
        'millionrial' => 'میلیون ریال' ,
        'toman' => 'تومان' ,
        'thousandtoman' => 'هزار تومان' ,
        'milliontoman' => 'میلیون تومان' ,
    ] ,
];


