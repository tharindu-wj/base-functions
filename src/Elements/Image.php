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
    public static function options($prfix, $key, $label, $description) {
        $field_name =  $prfix.$key;
        return array(
            $field_name   => array(
                'type'  => 'upload',
                'label' => __($label, 'fw'),
                'description' => __($description, 'fw'),
            ),
            $field_name.'_mask'   => array(
                'type'  => 'upload',
                'label' => __('Mask Image', 'fw'),
                'description' => __('Add mask image for above image. *View will effected only if you add mask.', 'fw'),
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
     * @param $img : default mode unyson image array and author mode need author id
     * @param $mask : mask image array:optional
     * @param $module_prefix : prefix css class used in module
     * @param string $type : default, author
     * @return string : template string of the image
     */
    public static function render($img, $mask, $module_prefix, $type = 'default')
    {

        switch ($type) {
            case 'author' :
                $tab_img_url = get_avatar_url($img);
                $tab_img_title = get_the_author_meta('display_name', $img);

                $tab_img_attr = "src='$tab_img_url' class='figure-img img-fluid'";
                $tab_img_attr .= " alt='$tab_img_title' title='$tab_img_title'";
                break;

            default :
                //$img_obj = WpHelper::getImageData($img);
                $img_obj = (new self)->getImageData($img);

                $tab_img_url = $img_obj['url'];
                $tab_img_title = $img_obj['title'];
                $tab_img_alt = $img_obj['alt'];

                $tab_img_attr = "src='$tab_img_url' class='figure-img img-fluid'";
                $tab_img_attr .= " alt='$tab_img_alt' title='$tab_img_title'";

        }

        $element = "";
        /* TODO if(!empty($mask)){
            $element .= "<div class='-mask__wrap'>";
        }*/
        $element .= "<div class='$module_prefix-image'>";
        $element .= "<figure class='figure'>";
        $element .= "<img $tab_img_attr />";
        $element .= "<figcaption class='figure-caption'>$tab_img_title</figcaption>";
        $element .= "</figure>";
        $element .= "</div>";
        /*TODO if(!empty($mask)){
            $element .= "</div>";
        }*/

        return $element; //html element
    }


    /**
     * @param $img
     * @param string $type
     * @return bool|false|string
     */
    public function getImageData($img)
    { // TODO need to do for image object.
        if (is_array($img)) {
            if ($img['attachment_id']) {
                return array(
                    'url' => wp_get_attachment_url($img['attachment_id']),
                    'alt' => get_post_meta($img['attachment_id'], '_wp_attachment_image_alt', true),
                    'title' => get_post_meta($img['attachment_id'], '_wp_attachment_image_alt', true)
                );
                //wp_get_attachment_url( $img['attachment_id'] );
            } else {
                return array(
                    'url' => self::$placeholder['url'],
                    'alt' => self::$placeholder['alt'],
                    'title' => self::$placeholder['title']
                );
            }
        } else {
            return array(
                'url' => self::$placeholder['url'],
                'alt' => self::$placeholder['alt'],
                'title' => self::$placeholder['title']
            );
        }
    }
}
