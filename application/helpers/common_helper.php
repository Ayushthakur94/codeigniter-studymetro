<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Common Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Send mail
* @param Message, Subject, Email address
* @return true OR false
*/
if (!function_exists('send_mail')) {
	function send_mail($message, $subject, $email_address,$from="",$attach="") {
	    $ci =&get_instance();
		$ci->load->library('email');
		$config['mailtype'] = 'html';
		$ci->email->initialize($config);
		if(!empty($from)){
			$ci->email->from($from,CMS_NAME);
		}else{
			$ci->email->from(get_option('site_email'),CMS_NAME);
		}	
		$ci->email->to($email_address);
		$ci->email->subject($subject);
        $ci->email->message($message);
        if(!empty($attach)){
        	$ci->email->attach($attach);
        }
        $ci->email->set_mailtype("html");
		if($ci->email->send()) {	
			return true;
		} else {
			return false;
		}
	}
}

// for send website notification

if (!function_exists('send_notification')) {
	function send_notification($type,$sender_id,$receiver_id,$table,$static_content=NULL,$url=NULL) {
	    $ci =&get_instance();
		$notify = $ci->common_model->getSingleRecordById(NOTIFICATION,array('type'=>$type));
		if(!empty($notify)){
			$notifyData = array(
                            'notify_id'    => $notify['id'],
                            'sender_id'    => $sender_id,
                            'receiver_id'  => $receiver_id,
                            'static_content' => $static_content,
                            'noti_url'     => $url,
                            'sent_datetime'=> datetime(),
                            'is_read'      => 1
                            );
        	$lid = $ci->common_model->addRecords($table,$notifyData);
        	if($lid){
        		return TRUE;
        	}else{
        		return FALSE;
        	}
		}else{
			return FALSE;
		}
	}
}

if (!function_exists('getNotifyHistoryTable')) {
	function getNotifyHistoryTable($user_id) {
	    $ci =&get_instance();
		$userData = $ci->common_model->getSingleRecordById(USER,array('id'=>$user_id));
		$userType = $userData['user_type'];
		if($userType==1)
		{
			return ADMIN_NOTIFICATION;
		}
		if($userType==2)
		{
			return STUDENT_NOTIFICATION;
		}
		if($userType==3)
		{
			return AGENT_NOTIFICATION;
		}
		if($userType==5)
		{
			return UNIVERSITY_NOTIFICATION;
		}
		if($userType==6)
		{
			return FRAINCHSEE_NOTIFICATION;
		}
	}
}

if (!function_exists('notifyUnreadCount')) {
	function notifyUnreadCount($user_id) {
	    $ci =&get_instance();

	    $table_name = getNotifyHistoryTable($user_id);

		$notifyCountData = $ci->common_model->getAllRecordsById($table_name,array('receiver_id'=>$user_id,'is_read'=>0));
		//print_r($notifyCountData);
		$count = count($notifyCountData);
		if($count>0)
		{
			return $count;
		}
		else
		{
			return 0;
		}
		
	}
}

if (!function_exists('getUserName')) {
	function getUserName($user_id) {
	    $ci =&get_instance();
		$userData = $ci->common_model->getSingleRecordById(USER,array('id'=>$user_id));
		if(!empty($userData)){
			if(!empty($userData['first_name'])){
				return $userData['first_name'].' '.$userData['last_name'];
			}else{
				return $userData['username'];
			}
		}else{
			return '';			
		}
	}
}

if (!function_exists('getNotifyMessage')) {
	function getNotifyMessage($notify_id) {
	    $ci =&get_instance();
		$notifyData = $ci->common_model->getSingleRecordById(NOTIFICATION,array('id'=>$notify_id));
		if(!empty($notifyData)){
			return $notifyData['body'];
		}else{
			return array();
		}
	}
}

if (!function_exists('exactNotfiyMessage')) {
	function exactNotfiyMessage($id,$array=array()) {
	    $ci = &get_instance();
	    $noti_details = $ci->common_model->getSingleRecordById(ADMIN_NOTIFICATION,array('id'=>$id));
	    if(!empty($noti_details)){
	    	if($noti_details['sender_id'] == 0){
    			return $noti_details['static_content'];
	    	}else{
	    		$noti_data_id = $noti_details['notify_id'];
	    		$sender_id    = $noti_details['sender_id'];
	    		$body 		  = getNotifyMessage($noti_details['notify_id']);
	    		if(!empty($body)){
	    			$msg = str_replace("{NAME}", getUserName($sender_id), $body);
	    			return $msg;
	    		}else{
	    			return array();
	    		}
	    	}
	    }else{
	    	return array();
	    }
	}
}

if (!function_exists('getUserType')) {
	function getUserType($user_id) {
	    $ci =&get_instance();
		$userData = $ci->common_model->getSingleRecordById(USER,array('id'=>$user_id));
		$userType = $userData['user_type'];
		if($userType==1)
		{
			return 'Admin';
		}
		if($userType==2)
		{
			return 'Student';
		}
		if($userType==3)
		{
			return 'Agency';
		}
		if($userType==4)
		{
			return 'Trainer';
		}
		if($userType==5)
		{
			return 'University';
		}
		if($userType==6)
		{
			return 'Frainchsee';
		}
	}
}

function time_elapsed_string($datetime, $full = false)
{
    $now     = new DateTime;
    $ago     = new DateTime($datetime);
    $diff    = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second'
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    
    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/**
* print_r formatting
* @param Array $array
* @return formatted array including <pre> tag.
*/
if(!function_exists('p')) {
	function p($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
		die;
	}
}

function datetime()
{
  $datetime = date('Y-m-d H:i:s');
  return $datetime;
}

function convertDateTime($datetime)
{
  $convertedDateTime = date('d F Y, h:i A', strtotime($datetime));
  return $convertedDateTime;
}

function encode($str){
    $one = serialize($str);
    $two = @gzcompress($one,9);
    $three = addslashes($two);
    $four = base64_encode($three);
    $five = strtr($four, '+/=', '-_.');
    return $five;
}

function decode($str){
  $one = strtr($str, '-_.', '+/=');
    $two = base64_decode($one);
    $three = stripslashes($two);
    $four = @gzuncompress($three);
    if ($four == '') {
        return "z1"; //Please use the correct code / data string which you get.
    } else {
        $five = unserialize($four);
        return $five;
    }
}

/**
* check for required value in rest api
* @param Array $chk_params, $converted_array
* @return missed params
*/
if(!function_exists('check_required_value')) {
	function check_required_value($chk_params, $converted_array) {
        foreach ($chk_params as $param) {
            if (array_key_exists($param, $converted_array) && ($converted_array[$param] != '')) {
                $check_error = 0;
            } else {
                $check_error = array('check_error' => 1, 'param' => $param);
                break;
            }
        }
        return $check_error;
	}
}

/**
* Admin assets url for all the resources Eg: css, images, js, font files
* @param NULL
* @return Application url with assets folder
*/
if(!function_exists('admin_assets')) {
	function admin_assets() {
		echo SUB_DOMAIN_BASE_URL.'assets/admin/';
	}
}

/**
* Admin assets url for all the resources Eg: css, images, js, font files
* @param NULL
* @return Application url with assets folder
*/
if(!function_exists('get_admin_assets')) {
	function get_admin_assets() {
		return base_url().'assets/admin/';
	}
}

/**
* Load admin view dynamically
* @param Content view path = $view_path
* @param Array $data for extra meta info
* @param $header = TRUE
* @param $sidebar = TRUE
* @param $footer = TRUE
*/
if(!function_exists('load_admin_view')) {
	function load_admin_view($view_path, $data = array(), $header = true, $sidebar = true, $footer = true) {
		if(!empty($view_path)) {
			$ci =&get_instance();

			/* Load Header */
			if($header) {
				$ci->load->view(INCLUDES.'header', $data);
			}

			/* Leaft Sidebar */
			if($sidebar) {
				$ci->load->view(INCLUDES.'left-sidebar', $data);
			}

			/* Load content section */
			$ci->load->view($view_path, $data);

			/* Load footer */
			if($footer) {
				$ci->load->view(INCLUDES.'footer', $data);
			}
		} else {
			show_error('Unable to load content view, please check again.');
		}
	}
}

/**
* Add active class on the menu
* @param CI router class by $this->router->fetch_class()
* @return active class based on the router condition
*/
if(!function_exists('add_active_class')) {
	function add_active_class($ccl = '', $class = '') {
		$ci =&get_instance();
		$currentMethod = $ci->router->fetch_method();
		$currentClass = $ci->router->fetch_class();
		if($ccl == $currentClass && $currentMethod == $class) {
			echo 'active';
		}
	}
}

/**
* Add active class on the menu tree
* @param Array of CI router class by $this->router->fetch_class()
* @return active class based on the router condition
*/
if(!function_exists('tree_active_class')) {
	function tree_active_class($ccl = '', $class = array()) {
		$ci =&get_instance();
		$currentMethod = $ci->router->fetch_method();
		$currentClass = $ci->router->fetch_class();
		
		if($ccl == $currentClass && in_array($currentMethod, $class)) {
			echo 'active';
		}
	}
}

/**
* Get pref_value based on pref_key from system_preferences entity
* @param $key = pref_key
* @return pref_value
*/
if(!function_exists('get_option')) {
	function get_option($key = '') {
		$ci =&get_instance();
		$keyArr = array('preference_key' => $key);
	    $settings = $ci->common_model->getSingleRecordById(SYSTEM_PREFERENCE, $keyArr);
	    if(!empty($settings)) {
			return $settings['preference_value'];
		}
	}
}

/**
* Add or update pref_value based on pref_key from system_preferences entity
* @param $key = pref_key
* @return pref_value
*/
if(!function_exists('update_option')) {
	function update_option($key, $val) {
		$ci =&get_instance();
		$keyArr = array('preference_key' => $key);
	    $settings = $ci->common_model->getSingleRecordById(SYSTEM_PREFERENCE, $keyArr);
	    if(!empty($settings)) {
			/* Update key value */
			$data = array('preference_value' => $val);
			$where = array('preference_key' => $key);
			$ci->common_model->updateRecords(SYSTEM_PREFERENCE, $data, $where);
		} else {
			/* Add key value */
			$postData = array('preference_key' => $key, 'preference_value' => $val);
			$ci->common_model->addRecords(SYSTEM_PREFERENCE, $postData);
		}
	}
}

/**
* Admin Meta title
* @param Meta Title dynamically from methods
* @return $title, meta title of the application
*/
if(!function_exists('admin_meta_title')) {
	function admin_meta_title($str = '') {
		$siteName = get_option('site_name');
		
		if(empty($siteName)) {
			$siteName = CMS_NAME;
		}

		if(!empty($str)) {
			$title = $str.' | '.$siteName;
		} else {
			$title = 'Admin Panel | '.$siteName;
		}
		echo $title;
	}
}

/**
* Meta title
* @param Meta Title dynamically from methods
* @return $title, meta title of the application
*/
if(!function_exists('meta_title')) {
	function meta_title($str = '') {
		$churchOption = get_option('site_name');
		if(!empty($str)) {
			$churchName = $str;
		} elseif(empty($churchOption)) {
			$churchName = get_option('site_name');
		} else {
			$churchName = 'Welcome';
		}

		$separator = get_option('meta_separator');
		if(empty($separator)) {
			$separator = '|';
		}

		$curchDescription = get_option('site_description');
		if(empty($curchDescription)) {
			$curchDescription = CMS_NAME;
		}
		$title = $churchName . ' ' . $separator . ' ' . $curchDescription;
		return $title;
	}
}

/**
* Add dymanic class to the body based on the body_class key in any methods.
* @param $class
* @return $class, which has to be added ont the body
*/
if(!function_exists('body_class')) {
	function body_class($class = '') {
		if(is_array($class)) {
			$classRet = implode(' ', $class);
		} else {
			$classRet = $class;
		}
		echo $classRet;
	}
}

/**
* Return cms url
* @param $url = 'controller/method'
* @param if browser have return_url then it's also return return_uri
*/
if(!function_exists('cms_url')) {
	function cms_url($url = '') {
		$ci =&get_instance();
		if(empty($url)) {
			echo base_url();
		} else {
			if($ci->input->get('return_uri')) {
				echo base_url().$url.'?return_uri='.urlencode($ci->input->get('return_uri'));
			} else {
				echo base_url().$url;
			}
		}
	}
}

/**
* Return cms url
* @param $url = 'controller/method'
* @param if browser have return_url then it's also return return_uri
*/
if(!function_exists('get_cms_url')) {
	function get_cms_url($url = '') {
		$ci =&get_instance();
		if(empty($url)) {
			return base_url();
		} else {
			if($ci->input->get('return_uri')) {
				return base_url().$url.'?return_uri='.urlencode($ci->input->get('return_uri'));
			} else {
				return base_url().$url;
			}
		}
	}
}

/**
* File upload
* @param Array $_FILES, $config 
*/
if(!function_exists('upload_file')) {
	function upload_file($file, $config) {
		$ci =&get_instance();
		$ci->load->library('upload', $config);
		$resp = array();
        if (!$ci->upload->do_upload($config['field_name'])) {
            $error = array('error' => $ci->upload->display_errors());
            $resp = array('message' => 'failed', 'error' => $error);
        } else {
        	$uploadPath = explode('/', $config['upload_path']);
        	$uploadPath = $uploadPath[1].'/'.$uploadPath[2].'/';
            $uploadData = array('upload_data' => $ci->upload->data());
            $filename = $uploadData['upload_data']['file_name'];
            $resp = array('message' => 'success', 'upload_data' => $uploadData, 'file_name' => $filename, 'file_path' => get_cms_url('').$uploadPath.$filename);
        }
        return $resp;
	}
}

/**
* Show selected in select tag
* @param $currentValue, $desiredValue
*/
if(!function_exists('show_selected')) {
	function show_selected($currentValue, $desiredValue) {
		if($currentValue == $desiredValue) {
			echo 'selected="selected"';
		}
	}
}

/**
* Show selected in select tag
* @param $currentValue, $desiredValue
*/
if(!function_exists('get_show_selected')) {
	function get_show_selected($currentValue, $desiredValue) {
		if($currentValue == $desiredValue) {
			return 'selected="selected"';
		}
	}
}

/**
* Error log level
* @return Array of error log level
*/
if(!function_exists('error_log_level')) {
	function error_log_level() {
		return array(
			'1' => 'Critical Errors',
			'2' => 'Warnings and Errors',
			'3' => 'Debug Level'
		);
	}
}

/**
* Admin Favicon
* @return favicon HTML
*/
if(!function_exists('admin_favicon')) {
	function admin_favicon() {
		$favicon = get_option('site_favicon');
		if(empty($favicon)) {
			$favicon = get_admin_assets().'dist/img/favicon.png';
		}
		echo '<link rel="icon" href="'.$favicon.'"/>';
	}
}

/**
* Custom Pagination
* @param 
*/
if(!function_exists('custom_pagination')) {
	function custom_pagination($url, $total_records, $results, $pull = 'right', $uri_segment = '',$query_string = '') {
		$ci =&get_instance();
		$config['full_tag_open'] 	= '<ul class="pagination pagination-sm no-margin pull-'.$pull.'">';
		$config['full_tag_close'] 	= '</ul>';				
		$config['cur_tag_open'] 	= '<li class="activePaginationNum paginationNums">';
		$config['cur_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&raquo;';
		$config['next_tag_open'] 	= '<li class="paginationNums">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&laquo;';		
		$config['prev_tag_open'] 	= '<li class="paginationNums">';
		$config['prev_tag_close'] 	= '</li>';	
		$config['first_tag_open'] 	= '<li class="paginationNums">';
		$config['first_tag_close'] 	= '</li>';
		$config['first_link']		= '&laquo; First';	
		$config['last_tag_open'] 	= '<li class="paginationNums">';
		$config['last_tag_close'] 	= '</li>';
		$config['last_link']		= 'Last &raquo;';			
		$config['num_tag_open'] 	= '<li class="paginationNums">';
		$config['num_tag_close'] 	= '</li>';
		$config['base_url'] 		= $url;
		if(!empty($query_string)){
			$config['page_query_string'] = TRUE;
		}
		if(!empty($uri_segment)) {
			$config['uri_segment'] 	= $uri_segment;
		}
		$config['total_rows'] 		= $total_records;
		$config['per_page'] 		= $results;
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}
}

/**
* Decode rest api request
* @param json
* @return array of json
*/
if(!function_exists('decode_request')) {
	function decode_request() {
		$reqArr = json_decode(file_get_contents('php://input'), TRUE);
		if(array_key_exists('reqObj', $reqArr)) {
			return $reqArr['reqObj'];
		} else {
			echo json_encode(array('error' => 'Invalid json request'));
			exit();
		}
	}
}

function getMonths(){
  $monthArr = array('January','February','March','April','May','June','July','August','September','October','November','December');
  return $monthArr ;
}


function strReplaceAttr() {
	return array(" ", '_', '.', '`', ':', ';', '+', '@', '(', ')', '{', '}', '*',',');
}

function getUniversityUrl($id,$name = '') {
	$ci =&get_instance();
	if(empty($name)){
		$universityData = $ci->common_model->getSingleRecordById(UNIVERSITIES, array('id' => $id));
		$univ_name = $universityData['name'];
	}else{
		$univ_name = $name;
	}
	$slug = strtolower(str_replace(strReplaceAttr(), '-', $univ_name));
	$slug = @rtrim(str_replace('--', '-', $slug),'-');
	return base_url().'university/details/'.$id.'/'.$slug;
}

function parseVideos($videoString = null){
    // return data
    $videos = array();
    if (!empty($videoString)) {
        // split on line breaks
        $videoString = stripslashes(trim($videoString));
        $videoString = explode("\n", $videoString);
        $videoString = array_filter($videoString, 'trim');
        // check each video for proper formatting
        foreach ($videoString as $video) {
            // check for iframe to get the video url
            if (strpos($video, 'iframe') !== FALSE) {
                // retrieve the video url
                $anchorRegex = '/src="(.*)?"/isU';
                $results = array();
                if (preg_match($anchorRegex, $video, $results)) {
                    $link = trim($results[1]);
                }
            } else {
                // we already have a url
                $link = $video;
            }
            // if we have a URL, parse it down
            if (!empty($link)) {
                // initial values
                $video_id = NULL;
                $videoIdRegex = NULL;
                $results = array();
                // check for type of youtube link
                if (strpos($link, 'youtu') !== FALSE) {
                    if (strpos($link, 'youtube.com') !== FALSE) {
                        // works on:
                        // http://www.youtube.com/embed/VIDEOID
                        // http://www.youtube.com/embed/VIDEOID?modestbranding=1&amp;rel=0
                        // http://www.youtube.com/v/VIDEO-ID?fs=1&amp;hl=en_US
                        $videoIdRegex = '/youtube.com\/(?:embed|v){1}\/([a-zA-Z0-9_]+)\??/i';
                    } else if (strpos($link, 'youtu.be') !== FALSE) {
                        // works on:
                        // http://youtu.be/daro6K6mym8
                        $videoIdRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                    }
                    if ($videoIdRegex !== NULL) {
                        if (preg_match($videoIdRegex, $link, $results)) {
                            $video_str = 'http://www.youtube.com/v/%s?fs=1&amp;autoplay=1';
                            $thumbnail_str = 'http://img.youtube.com/vi/%s/2.jpg';
                            $fullsize_str = 'http://img.youtube.com/vi/%s/0.jpg';
                            $video_id = $results[1];
                        }
                    }
                }
                // handle vimeo videos
                else if (strpos($video, 'vimeo') !== FALSE) {
                    if (strpos($video, 'player.vimeo.com') !== FALSE) {
                        // works on:
                        // http://player.vimeo.com/video/37985580?title=0&amp;byline=0&amp;portrait=0
                        $videoIdRegex = '/player.vimeo.com\/video\/([0-9]+)\??/i';
                    } else {
                        // works on:
                        // http://vimeo.com/37985580
                        $videoIdRegex = '/vimeo.com\/([0-9]+)\??/i';
                    }
                    if ($videoIdRegex !== NULL) {
                        if (preg_match($videoIdRegex, $link, $results)) {
                            $video_id = $results[1];
                            // get the thumbnail
                            try {
                                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
                                if (!empty($hash) && is_array($hash)) {
                                    $video_str = 'http://vimeo.com/moogaloop.swf?clip_id=%s';
                                    $thumbnail_str = $hash[0]['thumbnail_small'];
                                    $fullsize_str = $hash[0]['thumbnail_large'];
                                } else {
                                    // don't use, couldn't find what we need
                                    unset($video_id);
                                }
                            } catch (Exception $e) {
                                unset($video_id);
                            }
                        }
                    }
                }
                // check if we have a video id, if so, add the video metadata
                if (!empty($video_id)) {
                    // add to return
                    $videos[] = array(
                        'url' => sprintf($video_str, $video_id),
                        'thumbnail' => sprintf($thumbnail_str, $video_id),
                        'fullsize' => sprintf($fullsize_str, $video_id)
                    );
                }
            }
        }
    }
    // return array of parsed videos
    return $videos;
}

function getVimeoVideoIdFromUrl($url = '') {
    $regs = array();
    $id = '';
    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
        $id = $regs[3];
    }
    return $id;
}

function addZero($no)
{
  if($no >= 10){
    return $no;
  }else{
    return "0".$no;
  }
}

function getAllCount($table,$where="")
{
  $CI = & get_instance();
  if(!empty($where)){
    $CI->db->where($where);
  }
  $q = $CI->db->count_all_results($table);
  return (int) $q;
}

function get_offsets($page_no = 0)
{
   $offset = ($page_no == 0) ? 0 : (int) $page_no * 10 - 10;
   return $offset;
}


function get_seo_str($str){
	if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
	$str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
	$str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
	$str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
	$str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
	$str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
	$str = strtolower( trim($str, '-') );
	return $str;
}

function tinify_compress_img($filename,$subfolder){
	$tmp_name = $_FILES[$filename]['tmp_name'];
	$compressed_file_name = 'min-sm-'.time().$_FILES[$filename]['name'];
    $compressed_file_path = UPLOAD_PREFIX.$subfolder.'/'.$compressed_file_name;

	/* Load Tinify Library */
    require_once("vendor/autoload.php");
	Tinify\setKey(TINIFY_KEY);
    Tinify\fromFile($tmp_name)->toFile($compressed_file_path);
    chmod($compressed_file_path, 0777);
    return $compressed_file_name;
}

function is_404($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    /* Get the HTML or whatever is linked in $url. */
    $response = curl_exec($handle);

    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);

    /* If the document has loaded successfully without any redirection or error */
    if ($httpCode >= 200 && $httpCode < 300) {
        return false;
    } else {
        return true;
    }
}

function save_file_from_server($file,$subfolder){
	$explode_file = explode(".", $file);
	if(!empty($explode_file) && !is_404($file)){
		$ext      = end($explode_file);
		$pic      = file_get_contents($file);
	    $filename = time().uniqid().'.'.$ext;
	    $path     = UPLOAD_PREFIX.$subfolder."/".$filename;
	    file_put_contents($path, $pic);
	    chmod($path, 0777);
	    return $filename;
	}else{
		return "";
	}
}
    
/* End of file common_helper.php */
/* Location: ./system/application/helpers/common_helper.php */