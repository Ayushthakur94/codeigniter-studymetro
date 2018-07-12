<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* photos index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new testimonial
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Testimonial';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_testimonial');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('testimonials/add-new-testimonial', $data);
    }

    public function addTestimonial()
    {
		$data = $_POST;
		$data = array(
					'content'  => $data['content'],
					'given_by' => $data['given_by'],
					'added_date' => date('Y-m-d H:i:s')
				);
		if(!empty($_FILES['image']['name'])){
			// $logo = imgUpload('image','testimonials','jpg|jpeg|png|gif');
			try{
                /* Compress image */
                $logo = tinify_compress_img('image','testimonials');
            }catch (Exception $e) {
                $Msg = $e->getMessage();
                $this->session->set_flashdata('general_error', $Msg);
                redirect($this->url.'/add-new');
            }
		if(isset($logo['error'])){
				$this->session->set_flashdata('general_error', $logo['error']);
            	redirect($this->url.'/add-new');
			}else{
				// $data['image'] = base_url().'uploads/testimonials/'.$logo['upload_data']['file_name'];
				$file  = UPLOAD_PREFIX.'testimonials/'.$logo;
				$thumb = get_image_thumb($file,'testimonials',170,170);
				$data['image'] = 'uploads/testimonials/'.$logo;
				$data['thumb'] = $thumb;
				$this->common_model->addRecords(TESTIMONIALS, $data);
				$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Testimonials'));
		        redirect($this->url.'/view-all');
			}
		}else{
			$this->session->set_flashdata('general_error', 'Please select image file !!');
            redirect($this->url.'/add-new');
		}
    }

    /**
	* Edit testimonial
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/edit');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Testimonial';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_testimonial');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(TESTIMONIALS, array('id' => $id));
			/* Load admin view */
			load_admin_view('testimonials/edit-testimonial', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit');
		}
    }

    public function updateTestimonial()
    {
		$post_data = $_POST;
		$data = array(
					'content'  => $post_data['content'],
					'given_by' => $post_data['given_by'],
				);
		if(!empty($_FILES['image']['name'])){
			// $logo = imgUpload('image','testimonials','jpg|jpeg|png|gif');
			try{
                /* Compress image */
                $logo = tinify_compress_img('image','testimonials');
            }catch (Exception $e) {
                $Msg = $e->getMessage();
                $this->session->set_flashdata('general_error', $Msg);
                redirect($this->url.'/add-new');
            }
			if(isset($logo['error'])){
				$this->session->set_flashdata('general_error', $logo['error']);
            	redirect($this->url.'/add-new');
			}else{
				// $data['image'] = base_url().'uploads/testimonials/'.$logo['upload_data']['file_name'];
				$file  = UPLOAD_PREFIX.'testimonials/'.$logo;
				$thumb = get_image_thumb($file,'testimonials',170,170);
				$data['image'] = 'uploads/testimonials/'.$logo;
				$data['thumb'] = $thumb;
			}
		}
		$this->common_model->updateRecords(TESTIMONIALS, $data,array('id' => $post_data['id']));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Testimonials'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all testimonials
	* @return Array of all testimonials
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Testimonials';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_testimonials');
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
	    $data['testimonial'] = '';
	    $data['pagination'] = '';
	    $data['testimonial'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(TESTIMONIALS, (isset($_GET['s'])) ? array('image','content','given_by') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['testimonial']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(TESTIMONIALS, (isset($_GET['s'])) ? array('image','content','given_by') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR','');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('testimonials/view-all-testimonial', $data);
    }

    /**
    * Delete testimonials
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(TESTIMONIALS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Testimonial'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}