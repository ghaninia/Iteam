<?php
namespace App\Repositories\Attachment ;
use App\Repositories\Attachment\Interfaces\AttachInterface ;
use App\Repositories\Attachment\Traits\staticTrait;
use Illuminate\Support\Facades\Storage;

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

    public function put($name , $usage )
    {
        $this->set($name) ;
        if (!empty($this->errors)) return false ;

        return static::upload(self::$disk , $this->format , $this->file , $usage ) ;
    }

    public static function remove($file)
    {
        if ($item->disk == 'local')
        {
            $root = str_replace(DIRECTORY_SEPARATOR , "/" , $item->url );
            return Storage::disk($item->disk)->delete($root) ;
        }
    }

    public function show($items)
    {
        $links = [] ;
        if (self::$disk == 'local')
        {
            $root = config('filesystems.disks.local.root') ;
            $root = str_replace(public_path() , "" , $root) ;
            $root = trim($root , DIRECTORY_SEPARATOR ) ;
            foreach ($items as $item)
            {
                $links[] = asset( str_replace(DIRECTORY_SEPARATOR , "/" , sprintf("%s/%s",$root,$item) ) );
            }
        }elseif ( self::$disk == 'ftp')
        {
            foreach ($items as $item)
            {
                $root = config('filesystems.disks.ftp.host') ;
                return $root ;
            }
        }
        return collect($links) ;
    }
}