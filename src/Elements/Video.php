<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 2/12/19
 * Time: 12:34 PM
 */

namespace E25\Base\Elements;


class Video
{
    public static function options($prfix, $key, $label, $description) {
        $field_name =  $prfix.$key;
        return array(
            $field_name   => array(
                'type'  => 'upload',
                'label' => __($label, 'fw'),
                'desc' => __($description, 'fw'),
                'images_only' => false,
            ),
            $field_name.'_mobile_img'   => array(
                'type'  => 'upload',
                'label' => __('Mobile Image', 'fw'),
                'desc' => __('Add image to display in mobile devices.', 'fw'),
                'images_only' => true,
            ),
            /**TODO
            $field_name.'_mask'   => array(
                'type'  => 'upload',
                'label' => __('Mask Image', 'fw'),
                'desc' => __('Add mask image for above image. *View will effected only if you add mask.', 'fw'),
                'images_only' => true,
            ),

             * $field_name.'_alt'   => array(
                'type'  => 'text',
                'label' => __($label.' Alt Text', 'fw'),
            ),
            $field_name.'_caption'   => array(
                'type'  => 'text',
                'label' => __($label.' Caption Text', 'fw'),
            ),*/
        );
    }

    public static function data($key, $arr)
    { // TODO need to do for image object.
        $vid_arr = $arr[$key]; //Image option array
        $mobile_img_arr = $arr[$key.'_mobile_img']; //Mask Image option array

        if (is_array($vid_arr)) {
            if ($vid_arr['attachment_id']) {
                return array(
                    'url' => wp_get_attachment_url($vid_arr['attachment_id']),
                    'mobile_img' => (is_array($mobile_img_arr)) ? wp_get_attachment_url($arr[$key.'_mobile_img']['attachment_id']) : null,
                    'image'  => true
                );
                //wp_get_attachment_url( $img['attachment_id'] );
            } else {
                return array(
                    'url' => 'https://via.placeholder.com/300.png',
                    'image'  => false
                );
            }
        } else {
            return array(
                'url' => 'https://via.placeholder.com/300.png',
                'image'  => false
            );
        }
    }
}