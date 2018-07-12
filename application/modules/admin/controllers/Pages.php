<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    /**
	* Index of page controller
    */
    public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* View all pages
	* @return Array of all pages
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Pages';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_pages');
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
	    $data['pages'] = '';
	    $data['pagination'] = '';
	    $data['pages'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, (isset($_GET['s'])) ? array('title', 'content', 'meta_title', 'meta_description', 'meta_keywords') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['pages']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, (isset($_GET['s'])) ? array('title', 'content', 'meta_title', 'meta_description', 'meta_keywords') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('pages/view-all-pages', $data);
    }

    /**
	* Add new page
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Page';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_page');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
        $added_pages = $this->common_model->getAllRecords(STATIC_PAGE);
        $pages_arr = array();
        if(!empty($added_pages)){
            foreach($added_pages as $ap){
                $pageno = $ap['page_no'];
                array_push($pages_arr, $pageno);
            }
        }
        $data['added_pages'] = $pages_arr;
		if($this->input->post('submit')) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            //$this->form_validation->set_rules('content', 'Content', 'trim|required');
            $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
            $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
            $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|required');
            $this->form_validation->set_rules('media', 'Background Photo/Video', 'trim|required');
            $this->form_validation->set_rules('status', 'Page Status', 'trim|required');
            $this->form_validation->set_rules('photo_gallery', 'Need Photos Gallery', 'trim|required');
            $this->form_validation->set_rules('video_gallery', 'Need Videos Gallery', 'trim|required');
            $this->form_validation->set_rules('is_testimonails', 'Need Testimonials', 'trim|required');
            $this->form_validation->set_rules('how_it_works', 'Need How It Works', 'trim|required');
            $this->form_validation->set_rules('is_services', 'Need Our Services', 'trim|required');
            $this->form_validation->set_rules('scholar_form', 'Need Scholarship Form', 'trim|required');
			$this->form_validation->set_rules('study_program', 'Need Search Study Program', 'trim|required');

            if($this->form_validation->run() == true){
            	unset($_POST['submit']);

                /* Page slug */
                $slug = strtolower(str_replace(' ', '-', $_POST['title']));

                /* Check for slug */
                $checkSlug = $this->common_model->getTotalRecordsByCondition(STATIC_PAGE, array('slug' => $slug));
            	if($checkSlug > 0) {
                    $lastRecord = $this->common_model->getLatestRecords(STATIC_PAGE, 'id', 1);
                    $slug = strtolower(str_replace(' ', '-', $_POST['title'])).'-'.($lastRecord[0]['id']+1);
                }

                $_POST['slug'] = $slug;

                if(!empty($_FILES['media_file']['name'])){
                    if($_POST['media'] == 0){
                        // $logo = imgUpload('media_file','pages','jpg|jpeg|png|gif');
                        try{
                            /* Compress image */
                            $logo = tinify_compress_img('media_file','pages');
                        }catch (Exception $e) {
                            $Msg = $e->getMessage();
                            $this->session->set_flashdata('general_error', $Msg);
                            redirect($this->url.'/add-new');
                        }
                    }else{
                        $logo = imgUpload('media_file','pages','mp4');
                    }
                    if(isset($logo['error'])){
                        $this->session->set_flashdata('general_error', $logo['error']);
                        redirect($this->url.'/add-new');
                    }else{
                        if($_POST['media'] == 0){
                            $_POST['media_file'] = $logo;
                        }else{
                            $_POST['media_file'] = $logo['upload_data']['file_name'];
                        }
                    }
                }else{
                    $this->session->set_flashdata('general_error', 'Please select file !!');
                    redirect($this->url.'/add-new');
                }

                /* Adding data to DB */
            	$_POST['date_created'] = date('Y-m-d H:i:s');
            	$pageId = $this->common_model->addRecords(STATIC_PAGE, $_POST);
            	if($pageId) {
            		/* Set flash session data and redirect */
            		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Page'));
                    redirect($this->url.'/view-all');
                } else {
                    $this->session->set_flashdata('general_error', GENERAL_ERROR);
                    redirect($this->url.'/add-new');
                }
            } 
		}

		/* Load admin view */
		load_admin_view('pages/add-new-page', $data);
    }

    /**
	* Edit Page
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/view-all');
    	$pageId = $this->uri->segment(4);
    	if($pageId) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Page';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'page_skin');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['page'] = $this->common_model->getSingleRecordById(STATIC_PAGE, array('id' => $pageId));

			if($this->input->post('submit')) {
				$this->form_validation->set_rules('title', 'Page Title', 'trim|required');

	            if($this->form_validation->run() == true){
	            	unset($_POST['submit']);

	            	/* Updating data to DB */
	            	/* Page slug */
                    $slug = strtolower(str_replace(' ', '-', $_POST['title']));

                    /* Check for slug */
                    $checkSlug = $this->common_model->getSingleRecordById(STATIC_PAGE, array('id' => $pageId));
                    if($slug == $checkSlug['slug']) {
                        $slug = $checkSlug['slug'];
                    } elseif($checkSlug > 0) {
                        $lastRecord = $this->common_model->getLatestRecords(STATIC_PAGE, 'id', 1);
                        $slug = strtolower(str_replace(' ', '-', $_POST['title'])).'-'.($lastRecord[0]['id']+1);
                    }

                    if(!empty($_FILES['media_file']['name'])){
                        if($_POST['media'] == 0){
                            // $logo = imgUpload('media_file','pages','jpg|jpeg|png|gif');
                            try{
                            /* Compress image */
                                $logo = tinify_compress_img('media_file','pages');
                            }catch (Exception $e) {
                                $Msg = $e->getMessage();
                                $this->session->set_flashdata('general_error', $Msg);
                                redirect($this->url.'/add-new');
                            }
                        }else{
                            $logo = imgUpload('media_file','pages','mp4');
                        }
                        if(isset($logo['error'])){
                            $this->session->set_flashdata('general_error', $logo['error']);
                            redirect($this->url.'/add-new');
                        }else{
                             if($_POST['media'] == 0){
                                $_POST['media_file'] = $logo;
                            }else{
                                $_POST['media_file'] = $logo['upload_data']['file_name'];
                            }
                        }
                    }
                    
                    $_POST['slug'] = $slug;

	            	$this->common_model->updateRecords(STATIC_PAGE, $_POST, array('id' => $pageId));
	            	
	            	$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Page'));
                    redirect($this->url.'/view-all');
	            } 
			}

			/* Load admin view */
			load_admin_view('pages/edit-page', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
		}
    }

    /**
    * Delete Page
    * @param $pageId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $pageId = $this->uri->segment(4);
        if($pageId) {
            /* Delete Records */
            $this->common_model->deleteRecords(STATIC_PAGE, 'id', $pageId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Page'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }
}