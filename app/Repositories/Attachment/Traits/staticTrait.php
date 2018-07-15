<?php
namespace App\Repositories\Attachment\Traits ;
use Illuminate\Support\Facades\File;
use Image ;

trait staticTrait{
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

    protected static $path = "public" ;

    private function upload($disk , $format , $file , $size )
    {
        if ($disk == 'local')
        {
            $folder = $this->DirLocal($format) ;
            if ($format == 'image')
            {

            }
        }
    }

    // @return string
    // @return اسم دایرکتوری
    //**  چک وجود داشتن یا نداشتن دایرکتوری در لوکال برنامه **//
    private function DirLocal($format , $size = null )
    {
        $path = (static::$path . "_path")(
            "uploads" .
            DIRECTORY_SEPARATOR .
            $format .
            ( !is_null($size) ? DIRECTORY_SEPARATOR.$size  : "" )
        ) ;
        if (! File::exists( $path ) )
        {
            File::makeDirectory($path , 0777 , true );
        }
        return $path ;
    }

}