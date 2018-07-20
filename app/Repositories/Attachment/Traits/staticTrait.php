<?php
namespace App\Repositories\Attachment\Traits ;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image ;

trait staticTrait{
    //* سایز عمس ها *//


    protected static $rootPath = 'uploads' ;

    // @return array
    // @return اطلاعات فایل ضمیمه
    //** تمام خصوصیات فایل آپلود شده را بر میگرداند **//
    private function upload($disk , $format , $file , $usage)
    {
        $newName = $this->createNewName($file) ;
        if ($format == 'image')
        {
            $size = array_keys(config("timo.size")) ;

            foreach ($size  as $key )
            {
                $path = $this->makeDirectory($disk , $format , $key ) ;

                $image = Image::make($file)
                    ->resize( config("timo.size.{$key}.W") , config("timo.size.{$key}.H") );
                $image->stream() ;

                $pathSave = $path . DIRECTORY_SEPARATOR . $newName ;

                Storage::disk($disk)->put($pathSave,$image);

                $attachmemts[] = [
                    'size' => $key ,
                    'format' => $format ,
                    'disk' => $disk ,
                    'url' => $pathSave ,
                    'usage' => $usage
                ] ;

            }

        }elseif($format == 'file'){
            $path = $this->makeDirectory($disk , $format ) ;
            $pathSave = $path . DIRECTORY_SEPARATOR . $newName ;
            Storage::disk($disk)->put($path,$file);
            $attachmemts[] = [
                'size' => $file->getClientSize() ,
                'format' => $format ,
                'disk' => $disk ,
                'url' => $pathSave ,
                'usage' => $usage
            ] ;
        }

        return $attachmemts ;
    }

    // @return string
    // @return اسم دایرکتوری
    //**  چک وجود داشتن یا نداشتن دایرکتوری در لوکال برنامه **//
    private function makeDirectory($disk , $format , $size = null )
    {

        $path = $format . ( !is_null($size) ? DIRECTORY_SEPARATOR . $size : "" ) ;
        Storage::disk($disk)->makeDirectory($path, $mode = 0755);;
        return $path ;
    }


    // @return string
    // @return new name
    private function createNewName($file)
    {
        $mime =  $file->getClientOriginalExtension() ;
        $orginalName = basename($file->getClientOriginalName() , ".".$mime ) ;
        $orginalName = str_slug($orginalName) ;
        $orginalName .= sprintf("_%s_%s.%s" ,  str_random(7) , time() , $mime );

        return $orginalName ;
    }


}