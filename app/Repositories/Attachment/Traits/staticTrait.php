<?php
namespace App\Repositories\Attachment\Traits ;
use App\Events\UploadedEvent;
use Illuminate\Support\Facades\File;
use Image ;

trait staticTrait{
    //* سایز عمس ها *//
    protected static $sizes = [
        'full' => [
            "H" => "" ,
            "W" => "" ,
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

    private function upload($disk , $format , $file ,array $size )
    {
        $attachInformation = [] ;
        if ($disk == 'local')
        {
            $this->DirLocal($format);
            if ($format == 'image')
            {
                foreach ( $size as $key )
                {
                    $newName = $this->NewNameImage($file) ;
                    $currentDir = $this->DirLocal($format , $key)  ;
                    $fullCurrentpath = $currentDir.DIRECTORY_SEPARATOR.$newName ;
                    Image::make($file)
                        ->resize(static::$sizes[$key]['W'] , static::$sizes[$key]['H'] )
                        ->save($fullCurrentpath) ;
                    event(new UploadedEvent($attachment = [
                        'size' => $key ,
                        'format' => $format ,
                        'disk' => $disk ,
                        'url' => $newName ,
                        'base_path' => static::$path ,
                    ]));
                    $attachInformation[] = $attachment ;
                }
            }elseif($format == 'file'){
               
            }
        }
        return $attachInformation ;
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


    // @return string
    // @return name jadid
    private function NewNameImage($file)
    {
        $mime =  $file->getClientOriginalExtension() ;
        $orginalName = basename($file->getClientOriginalName() , ".".$mime ) ;
        $orginalName = str_slug($orginalName) ;
        $orginalName .= sprintf("_%s_%s.%s" ,  str_random(7) , time() , $mime );

        return $orginalName ;
    }



}