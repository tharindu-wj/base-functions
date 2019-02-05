<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 1/21/19
 * Time: 12:11 PM
 */

namespace E25\Base\Elements;

use E25\Base\Models\DataAttributeModel;

class DataAttributes
{
    private $dataAttributesModel = '';

    /**
     * DataAttributes constructor.
     */
    public function __construct()
    {
        $this->dataAttributesModel = new DataAttributeModel();
    }


    /**
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
                    'choices' => $this->dataAttributesModel->getBaseDataAttributes(),
                    'limit' => 1,
                ),
                'value' => array('type' => 'text'),
            ),
        );
    }

    /**
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
     * @return array
     */
    public static function advancedTabOptions() {
        return array(
            'css_class' => array(
                'type' => 'multi-select',
                'value' => '',
                'label' => __('CSS Classes', 'fw'),
                'desc' => __('Add predefined css classes from theme.', 'fw'),
                'choices' => (new self)->dataAttributesModel->getBaseCssClasses(),
                'limit' => 100,
            ),
            'data_attr_predefined' => (new self)->baseDataAttributeOptions(),
            'data_attr' => (new self)->customeDataAttributeOptions()
        );
    }
}
