<?php

function get_deamon_ad_info($id) {
    return "{$id}\t235678\t12348\tAdName_FromDaemon\tAdText_FromDaemon\t11";
}

function getAdRecord($id) {
        return [
            'id'       => $id,
            'name'     => 'AdName_FromMySQL',
            'text'     => 'AdText_FromMySQL',
            'keywords' => 'Some Keywords',
            'price'    => 10, // 10$
        ];

}
