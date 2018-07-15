<?php
namespace App\Repositories\Attachment\Interfaces ;
interface AttachInterface {
    public static function disk($name) ;
    public function put($name) ;
}