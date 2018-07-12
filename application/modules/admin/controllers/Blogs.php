<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* blogs index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new blog
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Blog';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_blog');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('blogs/add-new-blog', $data);
    }

    public function addBlog()
    {
		$data = $_POST;
		$data = array(
					'title'  => $data['title'],
					'descprition' => $data['descprition'],
					'added_date' => date('Y-m-d H:i:s')
				);
		$lid = $this->common_model->addRecords(BLOGS, $data);
		if(!empty($lid)){
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Blog'));
		}else{
			$this->session->set_flashdata('invalid_item', GENERAL_ERROR);
		}
        redirect($this->url.'/view-all');
    }

    /**
	* Edit blog
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/edit');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Blog';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_blog');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(BLOGS, array('id' => $id));
			/* Load admin view */
			load_admin_view('blogs/edit-blog', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit');
		}
    }

    public function updateBlog()
    {
		$post_data = $_POST;
		$data = array(
					'title'  => $post_data['title'],
					'descprition' => $post_data['descprition'],
				);
		$this->common_model->updateRecords(BLOGS, $data,array('id' => $post_data['id']));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Blog'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all blogs
	* @return Array of all blogs
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Blogs';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_blogs');
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
	    $data['blogs'] = '';
	    $data['pagination'] = '';
	    $data['blogs'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(BLOGS, (isset($_GET['s'])) ? array('title','descprition') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['blogs']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(BLOGS, (isset($_GET['s'])) ? array('title','descprition') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('blogs/view-all-blogs', $data);
    }

    /**
    * Delete blogs
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(BLOGS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Blog'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}