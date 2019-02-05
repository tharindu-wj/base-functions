<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 2/5/19
 * Time: 5:15 PM
 */

namespace E25\Base\Models;


class DataAttributeModel
{
    protected $json_path;
    protected $theme_core_json;
    protected $theme_theme_json;

    /**
     * DataAttributeModel constructor.
     * @param $json_path
     */
    public function __construct()
    {
        $this->json_path = get_template_directory_uri().'/src/json';
    }


    /**
     * @return array
     * TODO
     */
    public function getBaseDataAttributes()
    {
        return array(
            'data-float' => __('data-float', '{domain}'),
            'data-fixed' => __('data-fixed', '{domain}'),
            'data-test' => __('data-test', '{domain}'),
        );
    }

    public function getBaseCssClasses()
    {
        $classes_json = file_get_contents($this->json_path . '/core-components--theme.json');
        return array(
            'default' => __('Default', '{domain}'),
            'base' => __('Base Theme', '{domain}'),
        );
    }
}