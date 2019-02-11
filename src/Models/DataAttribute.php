<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 2/5/19
 * Time: 5:15 PM
 */

namespace E25\Base\Models;


class DataAttribute
{

    /**
     * DataAttributeModel constructor.
     * @param $json_path
     */
    public function __construct()
    {

    }


    /**
     * @return array
     * TODO
     */
    public static function all()
    {
        return array(
            'data-float' => __('data-float', '{domain}'),
            'data-fixed' => __('data-fixed', '{domain}'),
            'data-test' => __('data-test', '{domain}'),
        );
    }
    
}