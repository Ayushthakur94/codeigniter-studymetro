<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_events extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* city events index method
	*/
	public function index() {
    	is_logged_in('admin/city-events/view-all');
    	redirect('admin/city-events/view-all');
    	exit();
    }

    /**
	* Add new event
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in('admin/city-events/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'City Event';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_city_event');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('city_events/add-new-event', $data);
    }

    public function addCityEvent()
    {
		$data = $_POST;
		if($data['is_free'] == 1){
			$data['is_table'] = serialize($data['is_table']);
			$data['is_table'] = serialize($data['is_table']);
			$data['inr_price']= serialize($data['inr_price']);
		}else{
			unset($data['is_table'],$data['price']);
		}
		$data['created_date'] = date('Y-m-d H:i:s');
		$lid = $this->common_model->addRecords(CITY_EVENTS, $data);
		if($lid){
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'City Event'));
        	redirect('admin/city-events/view-all');
		}else{
			$this->session->set_flashdata('general_error', GENERAL_ERROR);
            redirect('admin/city-events/add-new');
		}
    }

    /**
	* Edit city event
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/edit');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'City Event';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_city_event');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(CITY_EVENTS, array('id' => $id));
			/* Load admin view */
			load_admin_view('city_events/edit-event', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit');
		}
    }

    public function updateCityEvent()
    {
		$post_data = $_POST;
		if($post_data['is_free'] == 1){
			$post_data['is_table'] = serialize($post_data['is_table']);
			$post_data['price']    = serialize($post_data['price']);
			$post_data['inr_price']= serialize($post_data['inr_price']);
		}else{
			unset($post_data['is_table'],$post_data['price']);
		}
		$this->common_model->updateRecords(CITY_EVENTS, $post_data,array('id' => $post_data['id']));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'City Event'));
        redirect('admin/city-events/view-all');
    }

    /**
	* View all city events
	* @return Array of all city events
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'City Events';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_city_events');
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
	    $data['city_events'] = '';
	    $data['pagination'] = '';
	    $data['city_events'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(CITY_EVENTS, (isset($_GET['s'])) ? array('name','city','registartion_type','price') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['city_events']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(CITY_EVENTS, (isset($_GET['s'])) ? array('name','city','registartion_type','price') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('city_events/view-all-events', $data);
    }

    /**
    * Delete city event
    * @param $uId
    */
    public function delete() {
        is_logged_in('admin/city-events/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(CITY_EVENTS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'City Event'));
            redirect('admin/city-events/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect('admin/city-events/view-all');
        }
    }

    /**
	* View all city events registration history
	* @return Array of all city events registrations
    */
    public function registrationHistory() {
    	is_logged_in($this->url.'/events-registration-history');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Events Registration History';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_registration_history');
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
	    $data['registrations'] = '';
	    $data['pagination'] = '';
	    $data['registrations'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(EVENT_REGISTRATION, (isset($_GET['s'])) ? array('name','institution','phone','email','total_paid_amount') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['registrations']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(EVENT_REGISTRATION, (isset($_GET['s'])) ? array('name','institution','phone','email','total_paid_amount') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('city_events/events-registration-history', $data);
    }

    /**
    * Mark payment is completed
    * @param $uId
    */
    public function mark_payment_completed() {
        is_logged_in('admin/city-events/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
        	$data = array();
        	$data['pay_status'] = 1;
        	$data['payment_datetime'] = datetime();
        	$status = $this->common_model->updateRecords(EVENT_REGISTRATION, $data,array('id' => $uId));
        	if($status){
        		$details = $this->common_model->getSingleRecordById(EVENT_REGISTRATION,array('id' => $uId));
        		/* Send email to user */
		        $user_message = '';
		        $user_message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
		        $user_message .= "<br><br> Hello ".$details['name'].", <br/><br/>";
		        $user_message .= "We received your payment successfully for ".CMS_NAME." EDU Fair Event <br/><br/>";
		        $user_message .= "Thanks, <br/><br/>";
		        $user_message .= "The ".CMS_NAME." Team <br/>";
		        send_mail($user_message, '['.CMS_NAME.'] EDU Fair Event' , $details['email'],SUPPORT_EMAIL);

				$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Payment Status'));
        	}else{
				$this->session->set_flashdata('invalid_item', GENERAL_ERROR);       		
        	}
        	redirect('admin/city-events/events-registration-history');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect('admin/city-events/events-registration-history');
        }
    }

    /**
    * View event registration details
    * @param $uId
    */
    public function view_registration() {
    	is_logged_in('admin/city-events/view-all');
        $event_id = $this->uri->segment(4);
        $details = $this->common_model->getSingleRecordById(EVENT_REGISTRATION,array('id' => $event_id));
        if(!empty($details)){
        	$data = array();
			$data['meta_title'] = 'View Details';
			$data['small_text'] = 'Event Registration';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_city_event_details');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $details;
			load_admin_view('city_events/view-event-registration-details', $data);
        }else{
        	$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect('admin/city-events/events-registration-history');
        }
    }



	
}