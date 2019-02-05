<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 1/21/19
 * Time: 12:11 PM
 */

namespace E25\Base\Elements;


class DataAttributes
{
    /**
     * @param $data_attributes
     * @param $type
     * @return string
     */
    public static function getDataAttribute($data_attributes, $type)
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
     * @return array
     */
    public static function baseDataArray()
    {
        return array(
            'type' => 'addable-box',
            'label' => __('Base Data Attributes', '{domain}'),
            'desc' => __('Select data attributes in base predefined list. *Empty attributes will ignored in view.', '{domain}'),
            'template' => '{{- attribute }} : ' . '{{- value }}',
            'box-options' => array(
                'attribute' => array(
                    'type' => 'multi-select',
                    'choices' => self::getBaseAttributes(),
                    'limit' => 1,
                ),
                'value' => array('type' => 'text'),
            ),
        );
    }

    /**
     * @return array
     */
    public static function customDataArray()
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
     * @return array
     * TODO
     */
    protected static function getBaseAttributes()
    {
        return array(
            'data-float' => __('data-float', '{domain}'),
            'data-fixed' => __('data-fixed', '{domain}'),
            'data-test' => __('data-test', '{domain}'),
        );
    }

    /**
     * @return array
     */
    public static function advancedTabOptions() {
        return array(
            'css_class' => array(
                'type' => 'text',
                'value' => '',
                'label' => __('Custom Class', 'fw'),
                'desc' => __('Enter custom CSS class.', 'fw'),
                'help' => __('when adding more than one class, use space to separate them  eg- class-1 class-2')
            ),
            'data_attr_predefined' => DataAttributes::baseDataArray(),
            'data_attr' => DataAttributes::customDataArray(),
        );
    }
}