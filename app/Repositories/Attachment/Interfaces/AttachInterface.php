<?php
namespace App\Repositories\Attachment\Interfaces ;

interface AttachInterface {

    public static function disk($name) ;

    public function put($name, $usage) ;

    public function show($attachment) ;

    public static function remove($file) ;

}