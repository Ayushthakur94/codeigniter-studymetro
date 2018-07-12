<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* payments index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new payment
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Payment';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_payment');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('payments/make-new-payment', $data);
    }

    public function cancel_payment()
    {
        $this->session->set_flashdata('general_error', 'Paymnet cancelled  !!');
        redirect($this->url.'/add-new');
    }

    public function paypal_success()
    {
    	$payment_arr = array();
    	$payment_arr['amount'] = $_GET['amt'];
    	$payment_arr['pay_type'] = 0;
    	$payment_arr['remark'] = $_GET['cm'];
    	$payment_arr['txn_id'] = $_GET['tx'];
    	$payment_arr['status'] = $_GET['st'];
    	$payment_arr['payment_date'] = datetime();
    	$this->common_model->addRecords(OFFLINE_PAYMENT, $payment_arr);
    	
    	if($_GET['st'] == 'Completed'){
    		$this->session->set_flashdata('item_success', 'Payment success');
            redirect($this->url.'/view-all');
    	}else{
    		$this->session->set_flashdata('general_error', 'Paymnet failed  !!');
        	redirect($this->url.'/add-new');
    	}
    }

    public function citrus_return()
    {
        if(!empty($_POST) && !empty($_GET['amount'])){
            $data               = array();
            $data['amount']     = $_POST['amount'];
            $data['pay_type']   = 1;
            $data['remark']     = $_GET['remark'];
            $data['txn_id']     = $_POST['TxId'];
            $data['status']     = $_POST['TxStatus'];
            $data['payment_date'] = datetime();
            $this->common_model->addRecords(OFFLINE_PAYMENT, $data);
            if($_POST['TxStatus'] == 'SUCCESS'){
                $this->session->set_flashdata('item_success', 'Payment success');
                redirect($this->url.'/view-all');
            }else{
                $this->session->set_flashdata('general_error', 'Paymnet failed  !!');
                redirect($this->url.'/add-new');
            }
        }else{
            $this->session->set_flashdata('general_error', 'Paymnet failed  !!');
            redirect($this->url.'/add-new');
        }
    }

    /**
	* View all payments
	* @return Array of all payments
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Payments';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_payments');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		/* Fetch Data */
        $offset = $this->uri->segment(4);
	    if(!$offset) {
		 	$offset = 0;
	    }
	    if(isset($_GET['s']) && !empty($_GET['s'])){
	    	if($this->input->get('per_page')){
	    		$offset = $this->input->get('per_page');
	    	}else{
	    		$offset = 0;
	    	}
	    }

	    $data['offset'] = $offset;
	    $data['payments'] = '';
	    $data['pagination'] = '';
	    $data['payments'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(OFFLINE_PAYMENT, (isset($_GET['s'])) ? array('amount','remark','txn_id','status') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['payments']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(OFFLINE_PAYMENT, (isset($_GET['s'])) ? array('amount','remark','txn_id','status') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('payments/view-payment-history', $data);
    }

    /**
    * Delete payments
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(OFFLINE_PAYMENT, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Payment'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}