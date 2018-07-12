<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Image Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Return image url
* @param $path, $width, $height
* @return image path
*/
if(!function_exists('get_timthumb_image_url')) {
	function get_timthumb_image_url($path, $width, $height) {
	    return(get_cms_url('').'timthumb/timthumb.php?src='.urlencode($path).'&zc=1&a=t&w='.$width.'&h='.$height.'&time='.time());
    }
}

/**
* Return timthumb image url
* @param $path, $width, $height
* @return image path
*/
if(!function_exists('display_image_url')) {
	function display_image_url($path, $width, $height) {
	    return('timthumb/timthumb.php?src='.urlencode(base_url($path)).'&zc=2&a=t&w='.$width.'&h='.$height.'&time='.time());
    }
}


/**
* Retun img HTML
* @param $path, $width, $height
* @return img HTML
*/
if(!function_exists('display_image')) {
	function display_image($path, $width, $height, $class = '') {
	    return('<img class="'.$class.'" src='.base_url().'timthumb/timthumb.php?src='.base_url().urlencode($path).'&zc=2&a=t&w='.$width.'&h='.$height.'?time='.time().'/>');
    }
}

/**
* Retun img HTML
* @param $path, $width, $height
* @return img HTML
*/
if(!function_exists('display_profile_pic')) {
	function display_profile_pic($path, $width, $height, $class = '') {
	    return('<img class="'.$class.'" src='.base_url().'timthumb/timthumb.php?src='.urlencode($path).'&zc=1&a=t&w='.$width.'&h='.$height.'?time='.time().'/>');
    }
}
/* End of file image_helper.php */
/* Location: ./system/application/helpers/image_helper.php */