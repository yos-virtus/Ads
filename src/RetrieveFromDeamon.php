<?php 

namespace Ads; 

use Ads\RetrieveBehaviorInterface;

class RetrieveFromDeamon implements RetrieveBehaviorInterface
{
    /**
     * Get ad by id from deaamon
     * 
     * @param  int $id 
     * @return [type] 
     */
    public function retrieve($id) 
    {
        $adDataString = get_deamon_ad_info($id);

        return $this->convertToAdObject($adDataString);
    }

    /**
     * Convert raw string data to Ad object
     * 
     * @param  string $adDataString 
     * @return 
     */
    private function convertToAdObject($adDataString)
    {
        $rawDataArray = explode("\t", $adDataString);

        $adData = [
            'id' => $rawDataArray[0],
            'name' => $rawDataArray[3],
            'text' => $rawDataArray[4],
            'price' => $rawDataArray[5],
        ];

        return new Ad($adData);
    }
}