<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Auth Helper
* Author: Siddharth Pandey
* Author Email: sid@mobiwebtech.com
* Description: This file is auto loaded in this application and we can use all these functions globally in the application.
* version: 1.0
*/

/**
* Crypto rand encryption
*/
function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 1) return $min;
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1;
    $bits = (int) $log + 1;
    $filter = (int) (1 << $bits) - 1;
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
    } while ($rnd >= $range);
    return $min + $rnd;
}

/**
* Generate encrypted token
* @param token length
* @return token
*/
function getToken($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet) - 1;
    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max)];
    }
    return $token;
}

/**
* Generate Access Token
* @param user_id
* @return Array access_token
*/
function generate_access_token($userId) {
    $ci =&get_instance();
	$accessData = $ci->common_model->getSingleRecordById(ACCESS_TOKEN, array('user_id' => $userId, 'status' => 1));
	if(!empty($accessData)) {
		$access_token = $accessData;
	} else {
		$token = getToken(API_TOKEN_LENGTH);
		/* Adding record */
		$postData = array(
			'user_id' => $userId,
			'access_token' => $token,
			'status' => 1,
			'ip' => $ci->input->ip_address(),
			'date_created' => date('Y-m-d H:i:s')
		);

		$tokenId = $ci->common_model->addRecords(ACCESS_TOKEN, $postData);
		if($tokenId) {
			$access_token = $postData;
		}
	}
	return $access_token;
}

/**
* Authenticate user token
* @return Array
*/
function authenticate_user_token($access_token, $user_id) {
	$ci =&get_instance();
	if(empty($access_token) || empty($user_id)) {
		$resp = array('code' => ERROR, 'message' => ERROR_MSG, 'auth_error' => 'AUTH_DETAILS_MISSING');
	 	echo json_encode($resp);
	 	exit();
	}

	$tokenData = $ci->common_model->getSingleRecordById(ACCESS_TOKEN, array('user_id' => $user_id, 'access_token' => $access_token, 'status' => 1));
	if(empty($tokenData)) {
	 	$resp = array('code' => ERROR, 'message' => ERROR_MSG, 'auth_error' => 'INVALID_TOKEN');
	 	echo json_encode($resp);
	 	exit();
	}
}
/* End of file auth_helper.php */
/* Location: ./system/application/helpers/auth_helper.php */