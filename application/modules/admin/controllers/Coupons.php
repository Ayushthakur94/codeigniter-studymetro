<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* coupons index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new discount
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Coupons';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_coupon');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('coupons/add-new-coupon', $data);
    }

    public function addCoupon()
    {
		$data = $_POST;
		$data['added_date'] = datetime();
		$lid = $this->common_model->addRecords(COUPONS, $data);
		if(!empty($lid)){
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Coupon'));
		}else{
			$this->session->set_flashdata('invalid_item', GENERAL_ERROR);
		}
        redirect($this->url.'/view-all');
    }

    /**
	* Edit Coupon
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/edit');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Coupon';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_coupon');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(COUPONS, array('id' => $id));
			/* Load admin view */
			load_admin_view('coupons/edit-coupon', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit');
		}
    }

    public function updateCoupon()
    {
		$post_data = $_POST;
		$id = $post_data['id'];
		unset($post_data['id']);
		$this->common_model->updateRecords(COUPONS, $post_data,array('id' => $id));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Coupon'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all coupons
	* @return Array of all coupons
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Coupons';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_coupons');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		/* Fetch Data */
        $offset = $this->uri->segment(4);
	    if(!$offset) {
		 	$offset = 0;
	    }

	    $data['offset'] = $offset;
	    $data['coupons'] = '';
	    $data['pagination'] = '';
	    $data['coupons'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(COUPONS, (isset($_GET['s'])) ? array('CouponCode','NoOfDays','CouponAmount','CoupunStartDate','CoupunEndDate') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['coupons']) > 0) {
	    	/* Pagination records */
	        $url = get_cms_url().$this->url.'/view-all';
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(COUPONS, (isset($_GET['s'])) ? array('CouponCode','NoOfDays','CouponAmount','CoupunStartDate','CoupunEndDate') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
	    }

		/* Load admin view */
		load_admin_view('coupons/view-all-coupons', $data);
    }

    /**
    * Delete coupons
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(COUPONS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Coupon'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}