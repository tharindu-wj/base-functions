<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 2/11/19
 * Time: 4:56 PM
 */

namespace E25\Base\Models;


class CssClass
{
    protected  $json_path;

    /**
     * CssClass constructor.
     * @param $module
     */
    public function __construct()
    {
        $this->json_path = get_template_directory_uri().'/src/json/core-components--theme.json';
    }

    /**
     * @return array
     */
    public static function all(){
        $modules= json_decode(file_get_contents((new self)->json_path), true);
        $options = [];
        foreach ($modules as $module){
            foreach ($module as $class){
                $options[$class] = $class;
            }
        }
        return $options;
    }

    /**
     * @param $module
     * @return array
     */
    public static function find($module){
        $classes= json_decode(file_get_contents((new self)->json_path), true);
        $module_classes = $classes['bs-'.$module];
        $options = [];

        foreach ($module_classes as $key => $value){
            $options[$value] = $value;
        }
       return $options;
    }
}