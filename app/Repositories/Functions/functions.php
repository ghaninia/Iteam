<?php

function options($key , $default = null )
{
    return \App\Models\Option::get($key , $default ) ;
}