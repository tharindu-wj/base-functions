<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 1/21/19
 * Time: 12:11 PM
 */

namespace E25\Base\Elements;

use E25\Base\Models\DataAttribute;
use E25\Base\Models\CssClass;

class DataAttributes
{
    private $module;

    /**
     * DataAttributes constructor.
     * @param $module
     */
    public function __construct($module)
    {
        $this->module = $module;
    }


    /**
     * get data attribute string by option array
     * @param $data_attributes
     * @param $type
     * @return string
     */
    public function getDataAttribute($data_attributes, $type)
    {
        $data_attr_str = ' ';
        foreach ($data_attributes as $data_attribute) {
            if ($type == 'list') {
                if (isset($data_attribute['attribute'][0])) {
                    $data_attr_str .= $data_attribute['attribute'][0];
                } else {
                    continue;
                }

            } elseif ($type == 'custom') {
                $data_attr_str .= $data_attribute['attribute'];
            }

            if ($data_attribute['value'] !== '') {
                $data_attr_str .= "='" . $data_attribute['value'] . "' ";
            } else {
                $data_attr_str .= " ";
            }
        }
        return $data_attr_str;
    }


    /**
     * @name predefined base data attributes options
     * @input DataAttribute::all() : all data atrributes from data attribute model
     * @return array
     */
    public function baseDataAttributeOptions()
    {
        return array(
            'type' => 'addable-box',
            'label' => __('Base Data Attributes', '{domain}'),
            'desc' => __('Select data attributes in base predefined list. *Empty attributes will ignored in view.', '{domain}'),
            'template' => '{{- attribute }} : ' . '{{- value }}',
            'box-options' => array(
                'attribute' => array(
                    'type' => 'multi-select',
                    'choices' => DataAttribute::all(),
                    'limit' => 1,
                ),
                'value' => array('type' => 'text'),
            ),
        );
    }

    
    /**
     * @name custom data attributes option
     * @return array
     */
    public function customeDataAttributeOptions()
    {
        return array(
            'type' => 'addable-box',
            'label' => __('Custom Data Attributes', '{domain}'),
            'desc' => __('Enter custom data attribute. *Empty attributes will ignored in view.', '{domain}'),
            'template' => '{{- attribute }} : ' . '{{- value }}',
            'box-options' => array(
                'attribute' => array('type' => 'text'),
                'value' => array('type' => 'text'),
            ),
        );
    }


    /**
     * @name predefined base data attributes options
     * @input DataAttribute::all() : all data atrributes from data attribute model
     * @return array
     */
    public function baseCssClassesOptions()
    {
        return array(
                'type' => 'multi-select',
                'value' => '',
                'label' => __('Base CSS classes', 'fw'),
                'desc' => __('Add predefined css classes from theme.', 'fw'),
                'choices' => CssClass::find($this->module),
                'limit' => 100,
        );
    }

    
    /**
     * @return array
     */
    public function advancedTabOptions() {
        return array(
            'css_class_base' => $this->baseCssClassesOptions(),
            'data_attr_base' => $this->baseDataAttributeOptions(),
            'data_attr_custom' => $this->customeDataAttributeOptions()
        );
    }
}
