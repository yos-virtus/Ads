<?php 

namespace Ads; 

class Ad 
{
    public function __construct($adData)
    {
        // $this->checkDataForIntegrity($adData);

        $this->id = $adData['id'];
        $this->name = $adData['name'];
        $this->text = $adData['text'];
        $this->price = $adData['price'];
    }

    public function convertPriceTo($currency)
    {
        $currencyData = CurrenciesHelper::getCurrencyData('RU');
        return $this->price * $currencyData['ratio'] . ' ' . $currencyData['abbr'];    
    }

    // protected function checkDataForIntegrity($adData)
    // {
    //     $keys = ['id', 'name', 'text', 'price'];
    //     foreach ($keys as $key) {
    //         if(! array_key_exists($key, $adData)) {
    //             throw new \Exception("Fields is missing");
    //         }
    //     }
    // }
}