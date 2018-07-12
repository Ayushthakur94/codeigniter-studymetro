<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* faqs index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new faqs
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'FAQ';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_faq');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('faqs/add-new-faq', $data);
    }

    public function addFaqs()
    {
		$data = $_POST;
		$data['added_date'] = date('Y-m-d H:i:s');
		$this->common_model->addRecords(FAQS, $data);
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'FAQ'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all faqs
	* @return Array of all faqs
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'FAQS';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_faqs');
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
	    $data['faqs'] = '';
	    $data['pagination'] = '';
	    $data['faqs'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(FAQS, (isset($_GET['s'])) ? array('country','question','answer') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['faqs']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(FAQS, (isset($_GET['s'])) ? array('country','question','answer') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('faqs/view-all-faqs', $data);
    }

    /**
    * Delete faqs
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(FAQS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Faqs'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}