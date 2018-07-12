<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

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
	* Add new video
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Video';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_video');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('videos/add-new-video', $data);
    }

    public function addVideos()
    {
		foreach($_POST['videos'] as $v){
			$youtube = strpos($v, 'youtube.com'); // for youtube
			$vimeo   = strpos($v, 'vimeo.com'); // for vimeo
			if($youtube !== FALSE){
				$name = str_replace('watch?v=', 'embed/', $v);
			}
			if($vimeo !== FALSE){
				$vid  = getVimeoVideoIdFromUrl($v);
				$name = 'https://player.vimeo.com/video/'.$vid;
			}
			if($vimeo !== FALSE || $youtube !== FALSE){
				$data = array(
						'name' => $name,
						'types'=> 1,
						'added_date' => date('Y-m-d H:i:s')
					);
				$thumb = parseVideos($data['name']);
				if(!empty($thumb)) {
					$thumb = save_file_from_server($thumb[0]['fullsize'],'videos');
					if(!empty($thumb)){
						$data['thumb'] = 'uploads/videos/'.$thumb;
					}else{
						$data['thumb'] = 'assets/images/no_img_video.jpg';
					}
				}
				$this->common_model->addRecords(PHOTOS, $data);
			}
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Videos'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all videos
	* @return Array of all videos
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Videos';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_videos');
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
	    $data['video'] = '';
	    $data['pagination'] = '';
	    $data['video'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(PHOTOS, (isset($_GET['s'])) ? array('name') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, array('types' => 1));
	    if(count($data['video']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(PHOTOS, (isset($_GET['s'])) ? array('name') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', array('types' => 1));
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('videos/view-all-video', $data);
    }

    /**
    * Delete videos
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            /*$get_data = $this->common_model->getSingleRecordById(PHOTOS,array('id' => $uId));
            @unlink(SUB_DIR.$get_data['thumb']);*/
            $this->common_model->deleteRecords(PHOTOS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Video'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }



	
}