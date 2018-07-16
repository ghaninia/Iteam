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
    public static function create( $item , $filename , $usage , $disk = 'local' )
    {
        $fileUploaded = Attach::disk($disk)->put($filename);
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

    public static function show( $item , $usage , $format ,array $size = [] , $disk = 'local' )
    {
        $where =
            [
                'format' => $format ,
                'disk'   => $disk,
                'usage'  => $usage
            ] ;
        $items = $item->files()->where($where) ;
        if (!empty($size)) $items->whereIn('size') ;
        $items = $items->pluck('url') ;
        return Attach::disk($disk)->show($items) ;

    }

}
