<?php 

namespace Ads;

class FileLogger 
{
    public function log($string)
    {
        file_put_contents('./logs.txt', $string . PHP_EOL , FILE_APPEND | LOCK_EX);
    }
}