<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 1/30/19
 * Time: 3:38 PM
 */

namespace E25\Base\Helpers;

class ArrayHelper
{
    /**
     * @param $orderArr: original array will order according to this array values
     * @param $originalArr: original array to order
     * @return array: ordered array
     */
    public function sortArrayByValue($orderArr, $originalArr){
        $output_array = [];
        foreach ($orderArr as $key => $value) {
            if (array_key_exists($value, $originalArr)) {
                $output_array[$value] = $originalArr[$value];
            } else {
                continue;
            }
        }
        return $output_array;
    }
}
