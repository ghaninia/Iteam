<?php
namespace App\Repositories\Attachment ;
use App\Repositories\Attachment\Interfaces\AttachInterface ;
use App\Repositories\Attachment\Traits\staticTrait;

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

    public static function disk($name = 'local')
    {
        if( !in_array( $name , ['local','ftp'] ) )
            abort('404');
        static::$disk = $name ;
        return new self() ;
    }

    private function set($name){
        if( request()->hasFile($name) )
        {
            $file = $this->file = request()->file($name) ;
            // search format input
            array_walk( static::$formats , function($value , $key) use ($file){
                array_walk($value , function($kvalue) use ($file , $key) {
                    if($file->getClientMimetype() === $kvalue )
                        $this->format = $key ;
                });
            });
            if(is_null($this->format))
                $this->errors[] = 'File format is invalid.' ;
        }else
            $this->errors[] = 'The requested file could not be found.' ;
    }

    public function put($name , $size = ['full'] )
    {
        $this->set($name) ;
        if (!empty($this->errors)) return $this->errors ;

        return static::upload(self::$disk , $this->format , $this->file , $size ) ;
    }

    public static function remove($attachments)
    {
    }

}