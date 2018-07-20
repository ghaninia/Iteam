<?php
namespace App\Models;
use App\Repositories\Attachment\Attach ;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'size' ,
        'usage' ,
        'format' ,
        'disk' ,
        'url' ,
        'fileable_id' ,
        'fileable_type' ,
    ];

    protected $guarded = [
        'fileable_id' ,
        'fileable_type' ,
    ];

    public $timestamps = false ;

    protected $dates = [
        'created_at'
    ];

    public function fileables(){
        return $this->morphTo() ;
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($file){
            Attach::remove($file) ;
        });
    }

    // @usage = اسم قراردادی به عنوان کلید دریافت اطلاعات
    // @item  = ابجکنی که میخواهیم به ان ریلیشن بزنیم
    // @filename = فایل موجود در درخواست ها
    // @return حذف فایل های مربوط بر اساس $usage و ساخت دوباره فایل ها
    public static function pull( $item , $filename , $usage )
    {
        if(request()->has($filename))
            $item->files()->Where([
                'disk'   => config('timo.disk') ,
                'usage'  => $usage ,
            ])->delete() ;

        return self::put($item , $filename , $usage) ;
    }

    // @usage = اسم قراردادی به عنوان کلید دریافت اطلاعات
    // @item  = ابجکنی که میخواهیم به ان ریلیشن بزنیم
    // @filename = فایل موجود در درخواست ها
    // @return در صورت تایید ایجاد مثبت و در صورت مشکل منفی
    public static function put( $item , $filename , $usage )
    {
        $disk = config('timo.disk') ;
        $uploads = Attach::disk($disk)->put($filename , $usage) ;
        if (is_array($uploads) && !empty($uploads))
        {
            $item->files()->createMany($uploads) ;
            return true ;
        }
        return false ;
    }

    // @item ایتمی که دارای ریلیشن files میباشد
    // @usage جایی که این ایتم استفاده گردید .
    // @size سایز و اندازه تصاویر
    // @disk جایگاه دیسک که میتواند ftp , local باشد .
    public static function show( $item , $usage , $size = "full" )
    {
        $where = [
                'disk'   => config('timo.disk') ,
                'usage'  => $usage ,
                'size'   => $size
            ];
        $items = $item->files()->where($where) ;
        $items = $items->pluck('url') ;
        return Attach::disk(config('timo.disk'))->show($items) ;
    }


}
