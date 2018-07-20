<?php
namespace App\Repositories\Attachment ;
use App\Repositories\Attachment\Interfaces\AttachInterface ;
use App\Repositories\Attachment\Traits\staticTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Attach implements AttachInterface
{
    use staticTrait ;

    protected static $disk ;

    protected static $formats = [
        'file' => [
            'application/pdf',
            'image/vnd.adobe.photoshop',
            'application/postscript',
            'application/postscript',
            'application/postscript',
            'application/zip',
            'application/x-rar-compressed',
            'application/msword',
            'application/rtf',
            'application/vnd.ms-excel',
            'application/vnd.ms-powerpoint',
        ],
        'image' => [
            'image/jpeg',
            'image/png',
            'image/jpg'
        ]
    ];

    protected $format , $file ;
    
    public $errors = [] ; 

    // @name فعلا ما از local و ftp پشتیبانی میکنیم
    // @return $this ابتدا نام اتصال را چک کرده و سپس برمیگرداند
    public static function disk($name = 'local')
    {
        static::$disk = $name ;
        return new self() ;
    }

    // @name ست کردن فایل های که میخواهیم در آن
    // @return برای ما اندرخواست مورد نظر را بر میگرداند
    public function set($name)
    {

        if( request()->hasFile($name) )
        {
            $file = $this->file = request()->file($name) ;
            // search format input
            array_walk( static::$formats , function($value , $key) use ($file){
                array_walk($value , function($kvalue) use ($file , $key) {
                    if($file->getClientMimetype() === $kvalue )
                        $this->format = $key ;
                });
            }) ;
            if(is_null($this->format))
                $this->errors[] = 'File format is invalid.' ;
        }else
            $this->errors[] = 'The requested file could not be found.' ;
    }

    // @name نام فایل که از request میگیریم
    // @usage نوع استفاده را میگیریم
    // @return فایل را ذخیره میکند و اگر فایل موجود نبود غلط را برمیگرداند
    public function put($name , $usage )
    {
        $this->set($name) ;
        if (!empty($this->errors)) return false ;

        return static::upload(self::$disk , $this->format , $this->file , $usage ) ;
    }

    // @file فایل موجود را حذف میکند
    // @return فایل را حذف میکند و بولین بر میگرداند
    public static function remove($file)
    {

        if ($file->disk == 'local')
        {
            $root = str_replace(DIRECTORY_SEPARATOR , "/" , $file->url );
            return Storage::disk($file->disk)->delete($root) ;
        }
    }

    // @items ساخت لینک نمایش
    // @return برای ما collect بر میگرداند.
    public function show($items)
    {
        $links = [] ;
        if (self::$disk == 'local')
        {
            $root = config('filesystems.disks.local.root') ;
            $root = str_replace(public_path() , "" , $root) ;
            $root = trim($root , DIRECTORY_SEPARATOR ) ;
            foreach ($items as $item)
                $links[] = asset( str_replace(DIRECTORY_SEPARATOR , "/" , sprintf("%s/%s",$root,$item) ) );
        }
        return collect($links) ;
    }
}