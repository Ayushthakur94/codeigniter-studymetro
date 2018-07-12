<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* User Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Admin content Pages Header
* @param Array $data
* @return HTML of content header
*/
if(!function_exists('admin_content_header')) {
	function admin_content_header($title = '', $text = '', $class = '') {
		$html = '<section class="content-header '.$class.'">
	    	<h1>'.ucfirst($title).'
	    		<small>'.ucfirst($text).'</small>
	    	</h1>
	    	'.admin_breadcrumb().'
	  	</section>';
		echo $html;
	}
}

/**
* Admin Breadcrumb
* @param Current Router Class & Router Method
* @return HTML of breadcrumb
*/
if(!function_exists('admin_breadcrumb')) {
	function admin_breadcrumb() {
		/* CI instance */
		$ci =&get_instance();

		/* Router Class and Methods */
		$currentClass  = $ci->router->fetch_class();
		$currentMethod = $ci->router->fetch_method();

		$html = '';
		if($currentClass == 'admin') {
			$html .= '<ol class="breadcrumb">
		      <li><a href="'.get_cms_url('admin/dashboard').'" title="Home"><i class="fa fa-dashboard"></i> Home</a></li>
		      <li class="active">'.ucwords(str_replace("_", " ", $currentMethod)).'</li>
		    </ol>';
		} else {
			$html .= '<ol class="breadcrumb">
		      <li><a href="'.get_cms_url('admin/dashboard').'" title="Home"><i class="fa fa-dashboard"></i> Home</a></li>
		      <li class="active"><a href="'.get_cms_url('admin/'.$currentClass).'" title="'.ucwords(str_replace("_", " ", $currentClass)).'">'.ucwords(str_replace("_", " ", $currentClass)).'</a></li>
		      <li class="active">'.ucwords(str_replace("_", " ", $currentMethod)).'</li>
		    </ol>';
		}
		return $html;
	}
}

/**
* Check login for admin
* @param Optional url $return_uri
*/
if(!function_exists('is_logged_in')) {
	function is_logged_in($return_uri = '') {
	    $ci =&get_instance();
		$admin_login = $ci->session->userdata('admin_session_data');
		if(!isset($admin_login['is_logged_in']) || $admin_login['is_logged_in'] != true) {
			if($return_uri) {
				redirect('admin/login?return_uri='.urlencode(base_url().$return_uri));	
			} else {
				redirect("admin/login");	
			}		
		}		
	}
}

/**
* Get admin session information
* @param NULL
* @return Array of admin_session_data from ci_userdata
*/
if(!function_exists('admin_session_data')) {
	function admin_session_data() {
		$ci =&get_instance();
		$session_data = $ci->session->userdata('admin_session_data');
		return $session_data;
	}
}

/**
* Get user info
* @param user_id
* @return Array of user and user_meta information
*/
if(!function_exists('get_user')) {
	function get_user($userId) {
		if($userId) {
			$ci =&get_instance();
			$userData = $ci->common_model->getSingleRecordById(USER, array('id' => $userId));
			$userMetaData = $ci->common_model->getAllRecordsById(USER_META, array('user_id' => $userId));

			$metaData = array();
			if(isset($userMetaData)) {
				foreach($userMetaData as $val) {
					$metaData[$val['meta_key']] = $val['meta_value'];
				}
			}

			$returnData = array(
				'user_id' => $userData['id'],
				'email' => $userData['email'],
				'user_type' => $userData['user_type'],
				'user_status' => $userData['user_status'],
				'date_created' => $userData['date_created'],
				'meta_data' => $metaData
			);
			return $returnData;
		}
	}
}

/**
* Get meta_value of users_meta based on meta_key
* @param $key = meta_key
* @return meta_value
*/
if(!function_exists('get_user_meta')) {
	function get_user_meta($userId, $key) {
		$ci =&get_instance();
		$keyArr = array('user_id' => $userId, 'meta_key' => $key);
	    $data = $ci->common_model->getSingleRecordById(USER_META, $keyArr);
	    if(!empty($data)) {
			return $data['meta_value'];
		}
	}
}

/**
* Add or update meta_value based on meta_key from users_meta entity
* @param $userId, $key = meta_key
* @return meta_value
*/
if(!function_exists('update_user_meta')) {
	function update_user_meta($userId, $key, $val) {
		$ci =&get_instance();
		$keyArr = array('user_id' => $userId, 'meta_key' => $key);
	    $settings = $ci->common_model->getSingleRecordById(USER_META, $keyArr);
	    if(!empty($settings)) {
			/* Update key value */
			$data = array('meta_value' => $val);
			$where = array('user_id' => $userId, 'meta_key' => $key);
			$ci->common_model->updateRecords(USER_META, $data, $where);
		} else {
			/* Add key value */
			$postData = array('user_id' => $userId, 'meta_key' => $key, 'meta_value' => $val);
			$ci->common_model->addRecords(USER_META, $postData);
		}
	}
}

/**
* Get admin name
* @param $adminId
* @return first name, last name
*/
if(!function_exists('get_admin_name')) {
	function get_admin_name($adminId) {
		$firstName = get_user_meta($adminId, 'first_name');
		$lastName = get_user_meta($adminId, 'last_name');

      	if(!empty($firstName)) {
        	$firstName = ucfirst(get_user_meta($adminId, 'first_name'));
      	} else {
        	$firstName = ADMIN_FIRST_NAME;
      	}

      	if(!empty($lastName)) {
        	$lastName = get_user_meta($adminId, 'last_name');
      	} else {
        	$lastName = ADMIN_LAST_NAME;
      	}
      	$adminName = $firstName.' '.$lastName;
      	return $adminName;
	}
}

/**
* Get Admin Avatar
* @param $userId
*/
if(!function_exists('get_admin_avatar')) {
	function get_admin_avatar($userId) {
		$avatar = get_user_meta($userId, 'profile_picture');
		if(empty($avatar)) {
			$avatar = admin_assets() . ADMIN_AVATAR_IMAGE;
		}
		echo $avatar;
	}
}

/**
* Users meta field
* @return $metaArr
*/
if(!function_exists('users_meta_field')) {
	function users_meta_field() {
		$metaArr = array('first_name', 'last_name', 'title', 'display_name', 'website', 'home_phone', 'work_phone', 'address', 'address_line2', 'city', 'state', 'zip', 'cell_phone', 'cell_company', 'bio_text', 'bio_interest', 'core_lead_notes', 'hide_contact_info', 'send_reminder_email', 'send_reminder_text', 'send_remainer_at', 'profile_picture', 'bio_pic1', 'bio_pic2', 'bio_pic3');
		return $metaArr;
	}
}
/* End of file user_helper.php */
/* Location: ./system/application/helpers/user_helper.php */