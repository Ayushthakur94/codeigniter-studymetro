<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Admin Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Skin Colors attributes
* @return Array of skins attributes
*/
if(!function_exists('skin_color_attributes')) {
	function skin_color_attributes() {
		return array(
			array(
				'section' => 'Header',
				'key' => 'header',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					)
				)
			), array(
				'section' => 'Footer',
				'key' => 'footer',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					)
				)
			), array(
				'section' => 'Left Menu',
				'key' => 'left_menu',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					), array(
						'label' => 'Sub Menu Background',
						'key' => 'sub_menu_background_color'
					), array(
						'label' => 'Sub Menu Link Color',
						'key' => 'sub_menu_link_color'
					), array(
						'label' => 'Sub Menu Active Link Color',
						'key' => 'sub_menu_active_link_color'
					), array(
						'label' => 'Sub Menu Link Hover Color',
						'key' => 'sub_menu_link_hover_color',
					), array(
						'label' => 'Sub Menu Active Link Background Color',
						'key' => 'sub_menu_link_background_color'
					)
				)
			), array(
				'section' => 'Content Section',
				'key' => 'content',
				'attributes' => array(
					array(
						'label' => 'Background Color',
						'key' => 'background_color'
					), array(
						'label' => 'Text Color',
						'key' => 'text_color'
					), array(
						'label' => 'Link Color',
						'key' => 'link_color'
					), array(
						'label' => 'Active Link Color',
						'key' => 'active_link_color'
					), array(
						'label' => 'Link Hover Color',
						'key' => 'link_hover_color',
					), array(
						'label' => 'Active Link Background Color',
						'key' => 'link_background_color'
					)
				)
			)
		);
	}
}

function fileUploading($name,$subfolder)
{
    $f_name1 = $_FILES[$name]['name'];
    $f_tmp1  = $_FILES[$name]['tmp_name'];
    $f_size1 = $_FILES[$name]['size'];
    $f_extension1 = explode('.',$f_name1); 
    $f_extension1 = strtolower(end($f_extension1)); 
    $f_newfile1="";
    if($f_name1){
	    $f_newfile1 = get_seo_str($f_name1)."-SM-".time().'.'.$f_extension1; 
	    $store1 = "uploads/".$subfolder."/". $f_newfile1;
	    if(move_uploaded_file($f_tmp1,$store1)){
	    	chmod($store1, 0777);
	    	return $store1;
	    }else{
    		return "";
	    }
    }else{
    	return "";
    }
    
}

function imgUpload($filename,$subfolder,$ext,$size="",$width="",$height="")
{
    $CI = & get_instance();
    $config['upload_path']   = 'uploads/'.$subfolder.'/'; 
    $config['allowed_types'] = $ext; 
    if($size){
      $config['max_size']   = 10000; 
    }
    if($width){
      $config['max_width']  = 102400; 
    }
    if($height){
      $config['max_height'] = 76800;  
    }
    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    if (!$CI->upload->do_upload($filename)) {
      $error = array('error' => $CI->upload->display_errors()); 
      return $error;
    }
   else { 
      $data = array('upload_data' => $CI->upload->data()); 
      return $data;
   } 
}

function getAllPages()
{
	$pages = array(
				'1' => 'Home',
				'2' => 'About Us',
				'3' => 'University',
				'4' => 'Search Programs',
				'5' => 'Study Work Abroad',
				'6' => 'Forum',
				'7' => 'Visa',
				'8' => 'Summer Programs',
				'9' => 'Online Training',
				'10' => 'Blogs',
				'11' => 'FAQS',
				'12' => 'Contact US',
				'13' => 'Default Template',
				'15' => 'College Campus Office',
				'16' => 'Terms Conditions',
				'17' => 'Internship',
				'18' => 'Work As Agent',
				'19' => 'Pricing',
				'20' => 'Abroad Courses',
				'21' => 'Privacy Policy',
				'22' => 'City Events',
				'23' => 'Indian University'
			);
	return $pages;
}

function countries()
{
	$list = array('Australia','Asia','Canada','China','Europe','France','Ireland','Medical','New Zealand','USA','UK');
	return $list;
}

function getCountryFlag($country)
{
	$list = array(
				'Australia'   => 'aus_flag.png',
				'Asia'        => 'asia_flag.jpg',
				'Canada'      => 'canada_flag.png',
				'China'       => 'china.gif',
				'Europe'      => 'europe_flag.png',
				'France'      => 'Flag_of_France.png',
				'Ireland'     => 'Ireland_flag.png',
				'Medical'     => 'university_top_img.png',
				'New Zealand' => 'New_zealand_flag.png',
				'USA'         => 'usa_flag.png',
				'UK'          => 'uk_flag_thumb.png'
		);
	return $list[$country];
}

/* End of file admin_helper.php */
/* Location: ./system/application/helpers/admin_helper.php */