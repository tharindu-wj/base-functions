<?php
/**
 * Created by PhpStorm.
 * User: tharindu
 * Date: 1/30/19
 * Time: 3:39 PM
 */

namespace E25\Base\Models;


class Prefix
{
    private $prefix = 'bs-';
    private $common_selector_prefix = 'bs-commom';

    private $pre_text = '_txt_';
    private $pre_img = '_img_';
    private $pre_settings = '_settings_';
    private $pre_editor = '_editor_';
    private $pre_common = '_cms_';
    private $pre_addable = '_addable_';
    private $pre_icon = '_icon_';

    private $placeholder = array(
        'url' => 'https://via.placeholder.com/728x90',
        'alt' => 'placeolder',
        'title' => 'placeolder',
    );

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getCommonSelectorPrefix()
    {
        return $this->common_selector_prefix;
    }

    /**
     * @return string
     */
    public function getPreText()
    {
        return $this->pre_text;
    }

    /**
     * @return string
     */
    public function getPreImg()
    {
        return $this->pre_img;
    }

    /**
     * @return string
     */
    public function getPreSettings()
    {
        return $this->pre_settings;
    }

    /**
     * @return string
     */
    public function getPreEditor()
    {
        return $this->pre_editor;
    }

    /**
     * @return string
     */
    public function getPreCommon()
    {
        return $this->pre_common;
    }

    /**
     * @return string
     */
    public function getPreAddable()
    {
        return $this->pre_addable;
    }

    /**
     * @return string
     */
    public function getPreIcon()
    {
        return $this->pre_icon;
    }

    /**
     * @return array
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }
}

