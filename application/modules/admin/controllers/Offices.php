<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offices extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* offices index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new office
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Office';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_office');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('offices/add-new-office', $data);
    }

    public function addOffice()
    {
		$data = $_POST;
		$data['added_date'] = datetime();
		$lid = $this->common_model->addRecords(OFFICES, $data);
		if(!empty($lid)){
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Office'));
		}else{
			$this->session->set_flashdata('invalid_item', GENERAL_ERROR);
		}
        redirect($this->url.'/view-all');
    }

    /**
	* Edit office
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/edit');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Office';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_office');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(OFFICES, array('id' => $id));
			/* Load admin view */
			load_admin_view('offices/edit-office', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit');
		}
    }

    public function updateOffice()
    {
		$post_data = $_POST;
		$id = $post_data['id'];
		unset($post_data['id']);
		$this->common_model->updateRecords(OFFICES, $post_data,array('id' => $id));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Office'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all offices
	* @return Array of all offices
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Offices';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_offices');
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
	    $data['offices'] = '';
	    $data['pagination'] = '';
	    $data['offices'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(OFFICES, (isset($_GET['s'])) ? array('title','address','email','telephone','mobile') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'ASC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['offices']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(OFFICES, (isset($_GET['s'])) ? array('title','address','email','telephone','mobile') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('offices/view-all-offices', $data);
    }

    /**
    * Delete offices
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(OFFICES, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Office'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}