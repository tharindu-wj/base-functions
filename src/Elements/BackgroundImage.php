<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 2/12/19
 * Time: 1:52 PM
 */

namespace E25\Base\Elements;


class BackgroundImage
{
    public static function data($key, $arr) {
        $img_arr = $arr[$key]; //Image option array

        if (is_array($img_arr)) {
            if ($img_arr['custom']) {
                return array(
                    'url' => wp_get_attachment_url($img_arr['custom']),
                    'image'  => true
                );
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