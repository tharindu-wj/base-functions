<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 1/30/19
 * Time: 3:36 PM
 */

namespace E25\Base\Elements;


class Image
{
    /**
     * @param $prfix
     * @param $key
     * @param $label
     * @param $description
     * @return array
     */
    public static function options($prfix, $key, $label, $description) {
        $field_name =  $prfix.$key;
        return array(
            $field_name   => array(
                'type'  => 'upload',
                'label' => __($label, 'fw'),
                'desc' => __($description, 'fw'),
                'images_only' => true,
            ),
            $field_name.'_mask'   => array(
                'type'  => 'upload',
                'label' => __('Mask Image', 'fw'),
                'desc' => __('Add mask image for above image. *View will effected only if you add mask.', 'fw'),
                'images_only' => true,
            ),
            $field_name.'_alt'   => array(
                'type'  => 'text',
                'label' => __($label.' Alt Text', 'fw'),
            ),
            $field_name.'_caption'   => array(
                'type'  => 'text',
                'label' => __($label.' Caption Text', 'fw'),
            ),
        );
    }

    
    /**
     * @param $img : image filed key
     * @param $arr : image filed root array
     * @param string $type
     * @return bool|false|string
     */
    public static function data($img, $arr)
    { // TODO need to do for image object.
        $img_arr = $arr[$img]; //Image option array
        $mask_img_arr = $arr[$img.'_mask']; //Mask Image option array
        if (is_array($img_arr)) {
            if ($img_arr['attachment_id']) {
                return array(
                    'url' => wp_get_attachment_url($img_arr['attachment_id']),
                    'mask_url' => (is_array($mask_img_arr)) ? wp_get_attachment_url($arr[$img.'_mask']['attachment_id']) : null,
                    'alt' => $arr[$img.'_alt'],
                    'caption' => $arr[$img.'_caption'],
                    'image'  => true
                );
                //wp_get_attachment_url( $img['attachment_id'] );
            } else {
                return array(
                    'url' => 'https://via.placeholder.com/300.png',
                    'mask_url' => '',
                    'alt' => 'placeholder',
                    'caption' => 'placeholder',
                    'image'  => false
                );
            }
        } else {
            return array(
                'url' => 'https://via.placeholder.com/300.png',
                'mask_url' => '',
                'alt' => 'placeholder',
                'caption' => 'placeholder',
                'image'  => false
            );
        }
    }
}
