<?php 

namespace Ads; 

class RetrieveFromMySQL implements RetrieveBehaviorInterface
{    
    /**
     * Get ad by id from mysql
     * 
     * @param  int $id 
     * @return [type] 
     */
    public function retrieve($id) 
    {
        $rowDataArray = getAdRecord($id);

        $adData = [
            'id' => $rowDataArray['id'],
            'name' => $rowDataArray['name'],
            'text' => $rowDataArray['text'],
            'price' => $rowDataArray['price'],
        ];

        return new Ad($adData);
    }
}