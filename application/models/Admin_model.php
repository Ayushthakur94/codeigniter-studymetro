<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
	/**
	* Get filtered contact us request
	* @param $data
	*/
	public function getFilterContactUsRequest($data) {
		/*if(isset($data['is_handled']) && $data['is_handled'] != 1) {
			$sql = 'SELECT * 
					FROM '.GROUP_CONTACT.'
					WHERE `user_id` = '.$data['user_id'];
		}*/
	}
}