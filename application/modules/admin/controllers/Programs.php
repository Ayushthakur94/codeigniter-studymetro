<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* programs index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new program
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Program';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_program');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('programs/add-new-program', $data);
    }

    /**
	* Add new summer program
	* @param $_POST
    */
    public function addNewSummerProgram() {
    	is_logged_in($this->url.'/add-new-summer-program');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'Summer Program';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_summer_program');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('programs/add-new-summer-program', $data);
    }

    public function insertProgram(){
    	$data = $this->input->post();
    	$data['added_date'] = datetime();
    	$lid = $this->common_model->addRecords(PROGRAMS, $data);
    	if(!empty($lid)){
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Program'));
		}else{
			$this->session->set_flashdata('invalid_item', GENERAL_ERROR);
		}
        redirect($this->url.'/view-all');
    }

    public function insertSummerProgram(){
    	$data = $this->input->post();
    	$data['added_date'] = datetime();
    	$lid = $this->common_model->addRecords(SUMMER_PROGRAMS, $data);
    	if(!empty($lid)){
			$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Summer Program'));
		}else{
			$this->session->set_flashdata('invalid_item', GENERAL_ERROR);
		}
        redirect($this->url.'/view-all-summer-programs');
    }

    /**
	* Edit program
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/edit');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Program';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_program');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(PROGRAMS, array('id' => $id));
			$data['universities']  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $data['details']['country']));
			/* Load admin view */
			load_admin_view('programs/edit-program', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit');
		}
    }

    /**
	* Edit summer program
	* @param $_POST
    */
    public function editSummerProgram() {
    	is_logged_in($this->url.'/edit-summer-program');
    	$id = $this->uri->segment(4);
    	if($id) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'Summer Program';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_summer_program');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(SUMMER_PROGRAMS, array('id' => $id));
			/* Load admin view */
			load_admin_view('programs/edit-summer-program', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/edit-summer-program');
		}
    }

    public function updateProgram()
    {
		$post_data = $this->input->post();
		$id = $post_data['id'];
		unset($post_data['id']);
		$this->common_model->updateRecords(PROGRAMS, $post_data,array('id' => $id));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Program'));
        redirect($this->url.'/view-all');
    }

    public function updateSummerProgram()
    {
		$post_data = $this->input->post();
		$id = $post_data['id'];
		unset($post_data['id']);
		$this->common_model->updateRecords(SUMMER_PROGRAMS, $post_data,array('id' => $id));
		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Summer Program'));
        redirect($this->url.'/view-all-summer-programs');
    }

    /**
	* Import programs
	* @param $_POST
    */
    public function import() {
    	is_logged_in($this->url.'/import');
		$data = array();
		$data['meta_title'] = 'Import';
		$data['small_text'] = 'Import';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'import_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('programs/import-programs', $data);
    }

    public function importData(){
    	$data = $this->input->post();
    	ini_set('memory_limit', '-1'); 
    	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    	require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
    	$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
	    $cacheSettings = array('memoryCacheSize' => '5000MB', 'cacheTime' => '1000'); 
	    PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		try {
		    $objPHPExcel = PHPExcel_IOFactory::load($file_tmp_name);
		} catch(Exception $e) {
		    die('Error loading file :' . $e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		unset($sheetData[1]);
		foreach(array_values($sheetData) as $s)
		{
			if(!empty($s['A'])){
				$condition = array();
				$condition['university_id'] = $data['university_id'];
				$condition['program_name']  = $s['A'];
				$condition['course_type']   = $s['C'];
				$result = $this->common_model->getSingleRecordById(PROGRAMS,$condition);
				if(empty($result))
				{
					$dataArr = array(
							'university_id' => $data['university_id'],
							'program_name'  => $s['A'],
							'location'      => $s['B'],
							'course_type'   => $s['C'],
							'ielts_toefl_pte' => $s['D'],
							'esl_program' => $s['E'],
							'gre_sat'    => $s['F'],
							'application_fee'    => $s['G'],
							'criteria' => $s['H'],
							'intake_date'  => $s['I'],
							'bank_statement' => $s['J'],
							'duration' 	 => $s['K'],
							'tution_fee' => $s['L'],
							'university_scholarship' => $s['M'],
							'website_lnik' => $s['N'],
							'study_metro_scholarship' => $s['O'],
							'country' 		=> $this->input->post('country'),
							'added_date'    => datetime()
						);
					$this->common_model->addRecords(PROGRAMS, $dataArr);
				}
		   }
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Programs'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all programs
	* @return Array of all programs
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Programs';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_programs');
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
	    $data['programs'] = '';
	    $data['pagination'] = '';
	    $data['programs'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(PROGRAMS, (isset($_GET['s'])) ? array('location', 'program_name', 'course_type', 'study_metro_scholarship','country') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'ASC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['programs']) > 0) {
	    	/* Pagination records */
	        $query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(PROGRAMS, (isset($_GET['s'])) ? array('location', 'program_name', 'course_type', 'study_metro_scholarship','country') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }
		/* Load admin view */
		load_admin_view('programs/view-all-programs', $data);
    }

    /**
	* Search programs
    */
    public function searchPrograms()
    {
    	is_logged_in($this->url.'/search-programs');
		$data = array();
		$data['meta_title'] = 'Search Programs';
		$data['small_text'] = 'Search Programs';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'search_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		$data['programs']  = array();
		$data['universities']  = array();
		$data['pagination'] = '';

		if(!empty($_GET['country']) && !empty($_GET['university_id'])){
			if($this->input->get('per_page')){
	    		$offset = $this->input->get('per_page');
	    	}else{
	    		$offset = 0;
	    	}

	    	$data['offset'] = $offset;

	    	/* Get programs data */
	    	$this->db->where('university_id',$_GET['university_id']);
	    	$this->db->where('country',$_GET['country']);
	    	$this->db->order_by('program_name','ASC');
	    	$this->db->limit(RESULT_PER_PAGE,$offset);
	    	$query = $this->db->get(PROGRAMS);
			$data['programs']  = $query->result_array();

			$data['universities']  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $_GET['country']));

			$this->db->where('university_id',$_GET['university_id']);
	    	$this->db->where('country',$_GET['country']);
	    	$this->db->order_by('program_name','ASC');
	    	$query = $this->db->get(PROGRAMS);
			$total_records = $query->num_rows();

			$query_string = '';
	        $url = get_cms_url().$this->url.'/search-programs';
	        if(!empty($_GET['country']) && !empty($_GET['university_id'])){
	        	$url .= '?country='.$_GET['country'];
	        	$url .= '&university_id='.$_GET['university_id'];
	        	$query_string = 'yes';
	        }
	    	$data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
		}
		/* Load admin view */
		load_admin_view('programs/search-programs', $data);
    }

    /**
    * Delete program
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(PROGRAMS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Program'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * Delete summer program
    * @param $uId
    */
    public function deleteSummerProgram() {
        is_logged_in($this->url.'/view-all-summer-programs');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(SUMMER_PROGRAMS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Summer Program'));
            redirect($this->url.'/view-all-summer-programs');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all-summer-programs');
        }
    }

    public function getUniversities()
    {
    	$country = $this->input->post('country');
    	$result  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $country));
    	echo json_encode($result);
    }

    /**
	* View all summer programs
	* @return Array of all summer programs
    */
    public function viewAllSummerPrograms() {
    	is_logged_in($this->url.'/view-all-summer-programs');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Summer Programs';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_summer_programs');
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
	    $data['programs'] = '';
	    $data['pagination'] = '';
	    $data['programs'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(SUMMER_PROGRAMS, (isset($_GET['s'])) ? array('location', 'country', 'courses', 'eligibility','period') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'ASC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['programs']) > 0) {
	    	/* Pagination records */
	    	$query_string = '';
	        $url = get_cms_url().$this->url.'/view-all-summer-programs';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(SUMMER_PROGRAMS, (isset($_GET['s'])) ? array('location', 'country', 'courses', 'eligibility','period') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }
		/* Load admin view */
		load_admin_view('programs/view-all-summer-programs', $data);
    }

    /**
	* Import summer programs
	* @param $_POST
    */
    public function importSummerPrograms() {
    	is_logged_in($this->url.'/import-summer-programs');
		$data = array();
		$data['meta_title'] = 'Import';
		$data['small_text'] = 'Import';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'import_summer_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('programs/import-summer-programs', $data);
    }

    public function importSummerProgramsData(){
    	$data = $this->input->post();
    	ini_set('memory_limit', '-1'); 
    	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    	require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
    	$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
	    $cacheSettings = array('memoryCacheSize' => '5000MB', 'cacheTime' => '1000'); 
	    PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		try {
		    $objPHPExcel = PHPExcel_IOFactory::load($file_tmp_name);
		} catch(Exception $e) {
		    die('Error loading file :' . $e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		unset($sheetData[1]);
		foreach(array_values($sheetData) as $s)
		{
			if(!empty($s['A'])){
			$dataArr = array(
					'university'         => $s['A'],
					'location'           => $s['B'],
					'country' 		     => $this->input->post('country'),
					'period'             => $s['D'],
					'dollar_fee'         => $s['E'],
					'inr_fee'            => $s['F'],
					'courses'    		 => $s['G'],
					'eligibility'    	 => $s['H'],
					'link' 				 => $s['I'],
					'customise_programs' => $s['J'],
					'application_fee'    => $s['K'],
					'added_date'         => datetime()
				);
			$this->common_model->addRecords(SUMMER_PROGRAMS, $dataArr);
		   }
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Summer Programs'));
        redirect($this->url.'/view-all-summer-programs');
    }

    public function viewPrograms($user_id)
    {
    	is_logged_in($this->url.'/viewPrograms');
        $data = array();
        $data['meta_title'] = 'View Programs';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        
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
        $data['users'] = '';
        $data['pagination'] = '';
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(APPLIED_PROGRAMS, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(APPLIED_PROGRAMS, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
        }     

        //print_r($data['pagination']); die;   
        
        $data['applications']   = $this->common_model->getAllRecordsOrderById(APPLIED_PROGRAMS,'id','DESC',array('user_id' =>$user_id));

        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$user_id));
        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

        /* Load admin view */
        load_admin_view('programs/view-programs', $data);
    }

	
}