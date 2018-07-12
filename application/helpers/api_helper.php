<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Admin Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

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

if(!function_exists('check_request_type')) {
    function check_request_type($req) {
        if ($_SERVER['REQUEST_METHOD'] === $req) {
            return true;
        }else{
            echo json_encode(array('status' => false, 'error' => 'Invalid request type'));exit;
        }
    }
}

/**
 * extract_value
 * @return string
 */
if (!function_exists('extract_value'))
{

    function extract_value($array, $key, $default = "")
    {
        $CI = & get_instance();
        if(isset($array[$key])){
          $string = $CI->db->escape_str($array[$key]);
          return strip_tags($string);
        }else{
          return $default;
        }
    }

}

/**
 * [Create GUID]
 * @return string
 */
if (!function_exists('get_guid'))
{
    function get_guid()
    {
        if (function_exists('com_create_guid'))
        {
            return strtolower(com_create_guid());
        }
        else
        {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = substr($charid, 0, 8) . $hyphen
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12);
            return strtolower($uuid);
        }
    }
}

/**
 * [To check null value]
 * @param string $value
*/
if ( ! function_exists('null_checker')) {
  function null_checker($value,$custom="")
  {
    $return = "";
    if(!empty($value)){
      $return = ($value == NULL) ? $custom : $value;
      return $return;
    }else{
      return $return;
    }
  }
}

/**
 * [To validate login session key]
 * @param string $LoginSessionKey
*/
if ( ! function_exists('validate_login_session_key')) {
    function validate_login_session_key($LoginSessionKey)
    {
        $ci =&get_instance();
        $result = $ci->common_model->getSingleRecordById(USER,array('login_session_key' => $LoginSessionKey));
        if(!empty($result)){
           return $result;
        }else{
           return FALSE;
        }
    }
}


if(!function_exists('get_user_type_name')) {
    function get_user_type_name($type) {
        switch ($type) {
            case '2':
                return 'student';
                break;
            case '3':
                return 'agent';
                break;
            case '4':
                return 'trainer';
                break;
            case '5':
                return 'university';
                break;
            case '6':
                return 'frainchsee';
                break;                    
            default:
                return 'unknown';
                break;
        }
    }
}


?>