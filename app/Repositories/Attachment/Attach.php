<?php
namespace App\Repositories\Attachment ;
use App\Repositories\Attachment\Interfaces\AttachInterface ;
use App\Repositories\Attachment\Traits\staticTrait;

use Illuminate\Support\Facades\File;
use Image;
class Attach implements AttachInterface
{
    use staticTrait ;

    protected static $disk ;
    //* سایز عمس ها *//
    protected static $sizes = [
        'full' => [
            "H" => null ,
            "W" => null ,
        ],
        'thumbnail' => [
            "H" => 200 , 
            "W" => 200 ,
        ],
        'medium' => [
            "H" => 400 ,
            "W" => 400 ,
        ]
    ];

    protected $format ; 
    
    public $errors = [] ; 

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

    public static function disk($name = 'local')
    {
        if( !in_array( $name , ['local','ftp'] ) )
            abort('404');
        static::$disk = $name ;
        return new self() ;
    }

    public function set($name){
        if( request()->hasFile($name) )
        {
            
            $file = request()->file($name) ;
            // search format input
            array_walk( static::$formats , function($value , $key) use ($file){
                array_walk($value , function($kvalue) use ($file , $key) {
                    if($file->getClientMimetype() === $kvalue )
                        $this->format = $key ;
                });
            });
            if(is_null($this->format))
            {
                $this->errors[] = 'File format is invalid.' ;
            }
        }else{
            $this->errors[] = 'The requested file could not be found.' ;
        }
        return ;
    }

    public function put($name , $size = ['thumbnail' , 'full'] )
    {
        $this->set($name) ;
        if( !empty($this->errors) ) return $this->errors ;
        $file = request()->file($name) ;
        return static::put( self::$disk , $file , $size ) ;
    }

}