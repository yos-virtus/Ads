<?php 

namespace Ads;

class CurrenciesHelper 
{
    public static $currencies = [
        'RU' => ['ratio' => 58.22, 'abbr' => 'руб'],
        'EU' => ['ratio' => 0.91, 'abbr' => 'euro'],
    ];

    public static function getCurrencyData($key)
    {
        if(! array_key_exists($key, static::$currencies)) {
            throw new \Exception("This currency does not exists in the list");
        }

        return static::$currencies[$key];
    }
}