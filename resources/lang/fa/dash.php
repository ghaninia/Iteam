<?php

return [

    'currency' => [
        'rial' => 'ریال' ,
        'thousandrial' => 'هزار ریال' ,
        'millionrial' => 'میلیون ریال' ,

        'toman' => 'تومان' ,
        'thousandtoman' => 'هزار تومان' ,
        'milliontoman' => 'میلیون تومان' ,
    ] ,

    'profile' => [
        'username' => 'نام کاربری' ,
        'enterusername' => 'نام کاربری را وارد نمایید...' ,
        'firstname' => 'نام' ,
        'lastname' => 'نام خانوادگی' ,
        'password' => 'رمز عبور' ,
        'enterpassword' => 'گذرواژه را وارد نمایید...' ,
        'confirmed_password' => 'تایید گذرواژه' ,
        'guards' => [
            'user' => 'کاربر' ,
            'admin' => 'متخصص'
        ] ,
        'count_offers' => ' پیشنهادات من' ,
        'count_teams' => ' تیم های من' ,
        'contact_information' => 'اطلاعات تماس' ,
        'social_information' => 'شبکه اجتماعی' ,
        'further_information'=> 'اطلاعات تکمیلی' ,
        'please_select_item' => 'یک گزینه انتخاب نمایید .' ,
        'save_submit' => 'ذخیره تغییرات' ,
        'choose_picture' => 'انتخاب تصویر' ,
        'choose_skills' => 'انتخاب مهارت ها' ,
        'notification' => [
            'when_login' => 'زمانی که وارد سایت میشود به من پیام بده ' ,
            'when_edit_profile' => 'وقتی پروفایل خودم را آپدیت میکنم به من پیام بده ' ,
            'when_create_offer' => 'وقتی که پیشنهاد میدهم به من پیام بده ' ,
            'when_create_team' => 'وقتی تیم میسازم به من پیام بده ' ,
            'when_offer_confirmed' => 'وقتی درخواست من تایید میشود به من پیام بده ' ,
            'when_expired_panel' => 'وقتی پنلی که دارم منقضی میشود ' ,
            'when_myteamhave_offer' => 'وقتی برای تیم من پیشنهاد داده میشود '
        ] ,
        'plan' => [
            'change' => 'تغییر پلن' ,
            'description' => 'توضیحات' ,
            'order' => 'سفارش' ,
            'features' => [
                'text' => 'ویژگی ها' ,
                'max_create_team' => 'حداکثر :attribute تیم ' ,
                'max_create_offer' => 'حداکثر :attribute پیشنهاد ' ,
                'count_skill' => 'حداکثر :attribute مهارت ' ,
                'sms_notification' => 'اطلاعیه های پیامکی'
            ]
        ]
    ] ,

    'panel' => [
        'user' => [
            'avatar' => 'تصویر پروفایل' ,
            'cover' => 'کاور پروفایل' ,
            'skills' => 'مهارت های من' ,
            'main' => 'پنل مدیریت' ,
            'confirm' => [
                'text' => 'تایید ایمیل' ,
            ],
            'activated_team' => 'فعالیت تیم سازی',
            'activated_offer' => 'فعالیت پیشنهاددهی' ,
            'edit' => [
                'text' =>  'ویرایش پروفایل' ,
                'desc' =>  'بهتر است برای معرفی خود و هم تیمی شدن به صورت دقیق مشخصات زیر را پر کنید همچنین شما میتوانید رزومه و تصویر خود را آپلود نمایید.'
            ],
            'username' => 'نام کاربری' ,
            'name' => 'نام' ,
            'family' => 'نام خانوادگی' ,
            'email' => 'پست الکترونیکی' ,
            'mobile' => 'موبایل' ,
            'website' => 'وب سایت' ,
            'phone' => 'تلفن ثابت' ,
            'fax' => 'فکس' ,
            'instagram_account' => 'اینستاگرام' ,
            'linkedin_account' => 'لینکدین' ,

            'gender' => 'جنسیت' ,
            'type_assist' => 'نوع همکاری' ,
            'interplay_fiscal' => 'نوع تعامل مالی' ,
            'min_salary' => 'حداقل دستمزد' ,
            'max_salary' => 'حداکثر دستمزد' ,
            'bio' => 'بیوگرافی' ,
            'password' => 'رمز عبور' ,
            'password_lasted' => 'رمز عبور فعلی' ,
            'repassword'=> 'تکرار رمز عبور' ,
            'password_new' => 'رمز عبور جدید' ,
            'province_id' => 'استان' ,
            'city_id' => 'شهر' ,
            'village_id' => 'روستا' ,
            'resume' => 'فایل رزومه'  ,
        ] ,
        'sidebar' => [
            'mainpage' => 'صفحه اصلی' ,
            'profile' => [
                'edit' => 'ویرایش پروفایل' ,
                'password' => 'ویرایش گذرواژه' ,
                'notification' => 'ویرایش نوتیفیکیشن' ,
                'logout' => 'خروج ' ,
                'changeplan' => ' پلن کاربری'
            ]
        ],
    ],

    'messages' => [
        'success' => [
            'logout' =>  'شما با موفقیت از حساب کاربری خود خارج شده اید.' ,
            'profile' => [
                'enter'  => 'سلام :attribute شما با موفقیت وارد حساب کاربری خود شده اید .' ,
                'update' => 'حساب کاربری شما با موفقیت ویرایش گردید .' ,
                'pass' => 'رمز عبور با موفقیت بروزرسانی گردید .' ,
                'notification' => 'نوتیفیکیشن های ارسالی حساب شما ویرایش گردید .'
            ]
        ] ,
        'error' => [
            'password' => 'پسورد باید شامل حروف بزرگ و کوچک انگلیسی و اعداد باشد .' ,
            'logout' =>  'خطایی در هنگام خروج رخ داده است لطفا به پشتیبان اطلاع دهید !' ,
            'token_expired' => 'توکن شما اکسپایر شده است لطفا بعدا تلاش نمایید .' ,
        ]
    ] ,

    'active' => [
        'enable' => 'فعال' ,
        'disabled' => 'غیرفعال' ,
    ] ,

    'genders' => [
        'male'   => 'آقا' ,
        'female' => 'خانم'
    ] ,

    'sidebar' => [
        'payments' => 'پرداخت ها' ,
        'teams' => 'تیم ها'
    ],

    'payment' => [
        'message' => [
            'succeed' => 'تراکنش با موفقیت انجام گردید .' ,
            'failed' => 'تراکنش انجام نگردید .' ,
        ] ,
        'table' => [
            'status' => 'وضعیت پرداخت' ,
            'date' => 'تاریخ فاکتور' ,
            'planname' => 'نام پلن' ,
            'trackingcode' => 'شماره رهگیری' ,
            'price' => 'قیمت' ,
            'created_at' => 'تاریخ ثبت'
        ],
        'alert' => [
            'title' => 'فاکتورها `در حال انتظار`' ,
            'description' => 'این فاکتور در صورتی به وجود می آید شما به درگاه پرداخت رفته و از صفحه خارج شده باشید , در زمان بندی سیستم این فاکتور ها پس از گذشت یک هفته از فاکتور های شما حذف میگردد و امکان پرداخت آنها وجود ندارد.'
        ],
        'alled' => 'پرداخت ها گذشته' ,
        'successed' => 'پرداخت ها موفق' ,
        'failed' => 'ناموفق' ,
        'information' => 'مشاهده جزییات' ,
        'show_factor' => "جزییات فیش :attribute " ,
        'new_plan' => 'پلن کاربری جدید' ,
        'overview' => 'جزییات پرداخت ها' ,
        'lasted_transaction' => '10 فاکتور آخر ' ,
        'factor' => 'شماره فاکتور' ,
        'transaction_id' => 'شماره تراکنش' ,
        'ref_id' => 'شماره ارجاع بانک' ,
        'ip' => 'آی پی' ,
        'result_message' => 'توضیحات بانک' ,
        'sum' => 'جمع کل' ,
        'price' => 'قیمت' ,
    ] ,

    'team' => [
        'active' => 'فعال' ,
        'closed' => 'بسته شده' ,
        'overview' => 'مشاهده همه' ,
        'make' => 'تیم جدید' ,

    ] ,

    'status' => [
        'succeed' => 'پرداخت شد' ,
        'failed' => 'پرداخت ناموفق' ,
        'init' => 'در حال انتظار'
    ]
];