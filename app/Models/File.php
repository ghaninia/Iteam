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

    // @usage = اسم قراردادی به عنوان کلید دریافت اطلاعات
    // @item  = ابجکنی که میخواهیم به ان ریلیشن بزنیم
    // @filename = فایل موجود در درخواست ها
    // @disk = نحوه ذخیره شدن اطلاعات و تصاویر بر اساس ftp , local
    // @return در صورت تایید ایجاد مثبت و در صورت مشکل منفی
    public static function create( $item , $filename , $usage )
    {

        $fileUploaded = Attach::disk(config('iteam.disk'))->put($filename);
        if ($fileUploaded)
        {
            $file = new File() ;
            $file->size = $fileUploaded['size'] ;
            $file->format = $fileUploaded['format'] ;
            $file->disk = $fileUploaded['disk'] ;
            $file->url = $fileUploaded['url'] ;
            $file->usage = $usage ;
            $item->files()->save($file) ;
            return true ;
        }
        return false ;
    }


    // @item ایتمی که دارای ریلیشن files میباشد
    // @usage جایی که این ایتم استفاده گردید .
    // @size سایز و اندازه تصاویر
    // @disk جایگاه دیسک که میتواند ftp , local باشد .
    public static function show( $item , $usage , array $size = [] )
    {
        $where = [
                'disk'   => config('iteam.disk') ,
                'usage'  => $usage
            ];
        $items = $item->files()->where($where) ;
        if (!empty($size)) $items->whereIn('size') ;
        $items = $items->pluck('url') ;
        return Attach::disk(config('iteam.disk'))->show($items) ;
    }

    public static function remove( $item  )
    {
        
    }
}
