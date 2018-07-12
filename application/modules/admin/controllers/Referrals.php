<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referrals extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* referrals index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Set Earning Amount
	* @param $_POST
    */
    public function setEarning() {
    	is_logged_in($this->url.'/set-earning');
		$data = array();
		$data['meta_title'] = 'Set Earning';
		$data['small_text'] = 'Earning';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'set_earning_amount');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('referrals/set-earning', $data);
    }

    public function manageEarningAmount()
    {
		$data = $this->input->post();
		foreach($_POST as $key => $val) {
			update_option($key, $val);
		}
		$this->session->set_flashdata('item_success', 'Earning amount successfully updated');
        redirect($this->url.'/set-earning');
    }





	
}