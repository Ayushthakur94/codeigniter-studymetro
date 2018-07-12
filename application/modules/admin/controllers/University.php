<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class University extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
        $data['session_data'] = admin_session_data();
    	$data['user_info'] = get_user($data['session_data']['user_id']);
    	$from_id = $data['user_info']['user_id'];
    }

	/**
	* University index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Add new university
	* @param $_POST
    */
    public function addNew() {
    	is_logged_in($this->url.'/add-new');
		$data = array();
		$data['meta_title'] = 'Add New';
		$data['small_text'] = 'University';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_university');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('universities/add-new-university', $data);
    }

    /**
	* Import universities
	* @param $_POST
    */
    public function import() {
    	is_logged_in($this->url.'/import');
		$data = array();
		$data['meta_title'] = 'Import';
		$data['small_text'] = 'Import';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'import_university');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('universities/import-universities', $data);
    }

    public function importData(){
    	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    	require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		try {
		    $objPHPExcel = PHPExcel_IOFactory::load($file_tmp_name);
		} catch(Exception $e) {
		    die('Error loading file :' . $e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		// p($sheetData);die;
		unset($sheetData[1]);
		foreach(array_values($sheetData) as $s)
		{
			if(!empty($s['A']))
			{
			$photosArr = array($s['AB'],$s['AC'],$s['AD'],$s['AE'],$s['AF'],$s['AG'],$s['AH'],$s['AI'],$s['AJ'],$s['AK']);
			$dataArr = array(
					'name'    => $s['A'],
					'founded' => $s['B'],
					'country' => $this->input->post('country'),
					'logo'    => $s['C'],
					'image'   => $s['D'],
					'location'=> $s['E'],
					'address' => $s['F'],
					'accreditation' => $s['G'],
					'requirement'    => $s['H'],
					'institution'    => $s['I'],
					'estimated_cost' => $s['J'],
					'programs'       => $s['K'],
					'president' 	 => $s['L'],
					'total_students' => $s['M'],
					'international_students' => $s['N'],
					'institution_number' => $s['O'],
					'accommodation' => $s['P'],
					'phone'         => $s['R'],
					'email' 		=> $s['S'],
					'tution_fee'    => @$s['AO'],
					'application_fee' => @$s['AP'],
					'admission_start_month' => @$s['AQ'],
					'website'         => $s['T'],
					'facebook_link'   => $s['U'],
					'twitter_link'    => $s['V'],
					'google_plus_link'=> $s['W'],
					'linkedin_link'   => $s['X'],
					'instagram_link'  => $s['Y'],
					'youtube_link'    => $s['Z'],
					'youtube_video'   => $s['AA'],
					'photos'          => json_encode($photosArr),
					'quotes_title'   => $s['AL'],
					'quotes_content' => $s['AM'],
					'content'        => $s['AN'],
				);
			$this->common_model->addRecords(UNIVERSITIES, $dataArr);
		  }
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'University'));
        redirect($this->url.'/view-all');
    }

    public function adduniversity()
    {
    	$data = $this->input->post();
    	$this->form_validation->set_rules('name', 'University Name', 'trim|required');
		$this->form_validation->set_rules('founded', 'University Founded Year', 'trim|required|numeric|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('location', 'University Location', 'trim|required');
		$this->form_validation->set_rules('address', 'University Address', 'trim|required');
		/*$this->form_validation->set_rules('requirement', 'University Requirement', 'trim|required');
		$this->form_validation->set_rules('institution', 'University Institution Type', 'trim|required');
		$this->form_validation->set_rules('estimated_cost', 'Estimated Cost of living', 'trim|required');
		$this->form_validation->set_rules('programs', 'University Programs', 'trim|required');
		$this->form_validation->set_rules('president', 'University President Name', 'trim|required');
		$this->form_validation->set_rules('total_students', 'Number Of Total Students', 'trim|required|numeric');
		$this->form_validation->set_rules('international_students', 'Number Of Total International Students', 'trim|required|numeric');
		$this->form_validation->set_rules('accommodation', 'Type of Accommodation', 'trim|required');
		$this->form_validation->set_rules('phone', 'University Phone No', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'University Email Id', 'trim|required|valid_email');
		$this->form_validation->set_rules('website', 'University Website Url', 'trim|required|valid_url');
		$this->form_validation->set_rules('youtube_video', 'Youtube Video Link', 'trim|required|valid_url');*/
		$this->form_validation->set_rules('content', 'University Content', 'trim|required');
		if($this->form_validation->run()==TRUE){
			if($data['founded'] > date('Y-m-d')){
				echo json_encode(array('type' => 'validation_err','msg' => array('Foundation year should be less than or equals to '.date('Y'))));die;
			}
			/*if(!empty($_FILES['logo']['name'])){
				$logo = imgUpload('logo','university','png');
				if(isset($logo['error'])){
					echo json_encode(array('type' => 'validation_err','msg' => array("University logo - ".strip_tags($logo['error'],'<br>'))));die;
				}else{
					$data['logo'] = $logo['upload_data']['file_name'];
				}
			}else{
				echo json_encode(array('type' => 'validation_err','msg' => array('University logo required')));die;
			}*/
			/*if(!empty($_FILES['image']['name'])){
				$image = imgUpload('image','university','jpg|jpeg|gif|png');
				if(isset($image['error'])){
					echo json_encode(array('type' => 'validation_err','msg' => array("University image - ".strip_tags($image['error'],'<br>'))));die;
				}else{
					$data['image'] = $image['upload_data']['file_name'];
				}
			}else{
				echo json_encode(array('type' => 'validation_err','msg' => array('University image required')));die;
			}*/
			/*if(!empty($_FILES['photos']['name'][0])){
				$config['upload_path']   = 'uploads/university/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
				$this->load->library('upload', $config);
				for ($i=0; $i < count($_FILES['photos']['name']); $i++) { 
					$_FILES['photos[]']['name']     = $_FILES['photos']['name'][$i];
			        $_FILES['photos[]']['type']     = $_FILES['photos']['type'][$i];
			        $_FILES['photos[]']['tmp_name'] = $_FILES['photos']['tmp_name'][$i];
			        $_FILES['photos[]']['error']    = $_FILES['photos']['error'][$i];
			        $_FILES['photos[]']['size']     = $_FILES['photos']['size'][$i]; 
			        if ($this->upload->do_upload('photos[]')) {
			        	$photos_files = array('upload_data' => $this->upload->data()); 
			        	$photos_arr[] = $photos_files['upload_data']['file_name'];
			        }else{
			        	$error[] = "Photos gallery - ". strip_tags($this->upload->display_errors(), '<br>');
			        }
				}
				if(isset($error) && !empty($error)){
					echo json_encode(array('type' => 'validation_err','msg' => $error));die;
				}else{
					$data['photos'] = json_encode($photos_arr);
				}
			}*/
			$data['quotes_title'] = json_encode($data['quotes_title']);
			$data['quotes_content'] = json_encode($data['quotes_content']);
			$lid = $this->common_model->addRecords(UNIVERSITIES, $data);
			if($lid) {
        		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'University'));
        		echo json_encode(array('type' => 'success'));
            } else {
                echo json_encode(array('type' => 'error','msg' => GENERAL_ERROR));die;
            }
		}else{
			$error = array(
					'name'  => form_error('name'),
					'founded'  => form_error('founded'),
					'location' => form_error('location'),
					'address' => form_error('address'),
					/*'requirement' => form_error('requirement'),
					'institution' => form_error('institution'),
					'estimated_cost' => form_error('estimated_cost'),
					'total_students' => form_error('total_students'),
					'international_students' => form_error('international_students'),
					'accommodation' => form_error('accommodation'),
					'phone' => form_error('phone'),
					'email' => form_error('email'),
					'website' => form_error('website'),
					'youtube_video' => form_error('youtube_video'),*/
					'content' => form_error('content')
				); 
			echo json_encode(array('type' => 'validation_err','msg' => $error));die;
		}
    }

    public function edituniversity($id)
    {
    	$data = $this->input->post();
    	$this->form_validation->set_rules('name', 'University Name', 'trim|required');
		$this->form_validation->set_rules('founded', 'University Founded Year', 'trim|required|numeric|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('location', 'University Location', 'trim|required');
		$this->form_validation->set_rules('address', 'University Address', 'trim|required');
		/*$this->form_validation->set_rules('requirement', 'University Requirement', 'trim|required');
		$this->form_validation->set_rules('institution', 'University Institution Type', 'trim|required');
		$this->form_validation->set_rules('estimated_cost', 'Estimated Cost of living', 'trim|required');
		$this->form_validation->set_rules('programs', 'University Programs', 'trim|required');
		$this->form_validation->set_rules('president', 'University President Name', 'trim|required');
		$this->form_validation->set_rules('total_students', 'Number Of Total Students', 'trim|required|numeric');
		$this->form_validation->set_rules('international_students', 'Number Of Total International Students', 'trim|required|numeric');
		$this->form_validation->set_rules('accommodation', 'Type of Accommodation', 'trim|required');
		$this->form_validation->set_rules('phone', 'University Phone No', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'University Email Id', 'trim|required|valid_email');
		$this->form_validation->set_rules('website', 'University Website Url', 'trim|required|valid_url');
		$this->form_validation->set_rules('youtube_video', 'Youtube Video Link', 'trim|required|valid_url');*/
		$this->form_validation->set_rules('content', 'University Content', 'trim|required');
		if($this->form_validation->run()==TRUE){
			if($data['founded'] > date('Y-m-d')){
				echo json_encode(array('type' => 'validation_err','msg' => array('Foundation year should be less than or equals to '.date('Y'))));die;
			}
			if(!empty($_FILES['logo']['name'])){
				$logo = imgUpload('logo','university','png');
				if(isset($logo['error'])){
					echo json_encode(array('type' => 'validation_err','msg' => array("University logo - ".strip_tags($logo['error'],'<br>'))));die;
				}else{
					$data['logo'] = $logo['upload_data']['file_name'];
				}
			}
			if(!empty($_FILES['image']['name'])){
				$image = imgUpload('image','university','jpg|jpeg|gif|png');
				if(isset($image['error'])){
					echo json_encode(array('type' => 'validation_err','msg' => array("University image - ".strip_tags($image['error'],'<br>'))));die;
				}else{
					$data['image'] = $image['upload_data']['file_name'];
				}
			}
			/*if(!empty($_FILES['photos']['name'][0])){
				$config['upload_path']   = 'uploads/university/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
				$this->load->library('upload', $config);
				for ($i=0; $i < count($_FILES['photos']['name']); $i++) { 
					$_FILES['photos[]']['name']     = $_FILES['photos']['name'][$i];
			        $_FILES['photos[]']['type']     = $_FILES['photos']['type'][$i];
			        $_FILES['photos[]']['tmp_name'] = $_FILES['photos']['tmp_name'][$i];
			        $_FILES['photos[]']['error']    = $_FILES['photos']['error'][$i];
			        $_FILES['photos[]']['size']     = $_FILES['photos']['size'][$i]; 
			        if ($this->upload->do_upload('photos[]')) {
			        	$photos_files = array('upload_data' => $this->upload->data()); 
			        	$photos_arr[] = $photos_files['upload_data']['file_name'];
			        }else{
			        	$error[] = "Photos gallery - ". strip_tags($this->upload->display_errors(), '<br>');
			        }
				}
				if(isset($error) && !empty($error)){
					echo json_encode(array('type' => 'validation_err','msg' => $error));die;
				}else{
					$data['photos'] = json_encode($photos_arr);
				}
			}*/
			$data['quotes_title'] = json_encode($data['quotes_title']);
			$data['quotes_content'] = json_encode($data['quotes_content']);
			if($this->common_model->updateRecords(UNIVERSITIES, $data, array('id' => $id))) {
        		$this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'University'));
        		echo json_encode(array('type' => 'success'));
            } else {
                echo json_encode(array('type' => 'error','msg' => GENERAL_ERROR));die;
            }
		}else{
			$error = array(
					'name'  => form_error('name'),
					'founded'  => form_error('founded'),
					'location' => form_error('location'),
					'address' => form_error('address'),
					/*'requirement' => form_error('requirement'),
					'institution' => form_error('institution'),
					'estimated_cost' => form_error('estimated_cost'),
					'total_students' => form_error('total_students'),
					'international_students' => form_error('international_students'),
					'accommodation' => form_error('accommodation'),
					'phone' => form_error('phone'),
					'email' => form_error('email'),
					'website' => form_error('website'),
					'youtube_video' => form_error('youtube_video'),*/
					'content' => form_error('content')
				); 
			echo json_encode(array('type' => 'validation_err','msg' => $error));die;
		}
    }

    /**
	* View all university
	* @return Array of all university
    */
    public function viewAll() {
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'University';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_university');
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
	    $data['university'] = '';
	    $data['pagination'] = '';
	    $data['university'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(UNIVERSITIES, (isset($_GET['s'])) ? array('name', 'location', 'country' ,'address', 'founded', 'president') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    // echo $this->db->last_query();die;
	    if(count($data['university']) > 0) {
	    	/* Pagination records */
	    	$query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(UNIVERSITIES, (isset($_GET['s'])) ? array('name', 'location', 'country','address', 'founded', 'president') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }

		/* Load admin view */
		load_admin_view('universities/view-all-universities', $data);
    }

    /**
    * Delete University
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(UNIVERSITIES, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'University'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
	* Edit University
	* @param $_POST
    */
    public function edit() {
    	is_logged_in($this->url.'/view-all');
    	$uId = $this->uri->segment(4);
    	if($uId) {
			$data = array();
			$data['meta_title'] = 'Edit';
			$data['small_text'] = 'University';
			$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'university_skin');
			$data['session_data'] = admin_session_data();
			$data['user_info'] = get_user($data['session_data']['user_id']);
			$data['details'] = $this->common_model->getSingleRecordById(UNIVERSITIES, array('id' => $uId));
			load_admin_view('universities/edit-university', $data);
		} else {
			$this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
		}
    }

    /**
	* University Invoices
	* @param $_POST
    */
    public function invoice() {
    	is_logged_in($this->url.'/invoice');
		$data = array();
		$data['meta_title'] = 'Invoice';
		$data['small_text'] = 'Invoice';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'university_invoice');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('universities/university_invoice', $data);
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function view_all_webinar()
    {
    	is_logged_in($this->url.'/view_all_webinar');
		$data = array();
		$data['meta_title'] = 'Webinar';
		$data['small_text'] = 'Webinar';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'schedule_webinar');
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
	    $data['university'] = '';
	    $data['pagination'] = '';
	    $data['university'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(WEBINARS, (isset($_GET['s'])) ? array('name', 'location', 'country' ,'address', 'founded', 'president') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    // echo $this->db->last_query();die;
	    if(count($data['university']) > 0) {
	    	/* Pagination records */
	    	$query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(WEBINARS, (isset($_GET['s'])) ? array('name', 'location', 'country','address', 'founded', 'president') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }


		
		$data['webinars'] = $this->common_model->getAllRecords(WEBINARS);
		load_admin_view('universities/schedule_webinar', $data);
    }

    public function activate_webinar($id)
    {
    	is_logged_in($this->url.'/view_all_webinar');
    	$data['session_data'] = admin_session_data();
    	$data['user_info'] = get_user($data['session_data']['user_id']);
    	$from_id = $data['user_info']['user_id'];

    	$req = $this->common_model->updateRecords(WEBINARS,array('status'=>1),array('id'=>$id));
    	if($req)
    	{ 
    		$userData = $this->common_model->getSingleRecordById(USER,array('id'=>$from_id));
            $user_email = $userData['email'];
            $user_name = $userData['username'];

            $this->sendEmailToAdmin('Admin approved your webinar','webinar approve',$user_email,SUPPORT_EMAIL);

    		$this->session->set_flashdata('item_success', 'Webinar is approved');
            redirect($this->url.'/view-all-webinar');
        } else {
            $this->session->set_flashdata('invalid_item', 'Unable to approve Webinar');
            redirect($this->url.'/view-all-webinar');
    	}
    }

    public function deactivate_webinar($id)
    {
    	is_logged_in($this->url.'/view_all_webinar');
    	$data['session_data'] = admin_session_data();
    	$data['user_info'] = get_user($data['session_data']['user_id']);
    	$from_id = $data['user_info']['user_id'];

    	$req = $this->common_model->updateRecords(WEBINARS,array('status'=>0),array('id'=>$id));
    	if($req)
    	{
    		$userData = $this->common_model->getSingleRecordById(USER,array('id'=>$from_id));
            $user_email = $userData['email'];
            $user_name = $userData['username'];

            $this->sendEmailToAdmin('Admin disapproved your webinar','webinar disapprove',$user_email,SUPPORT_EMAIL);

    		$this->session->set_flashdata('item_success', 'Webinar is disapproved');
            redirect($this->url.'/view-all-webinar');
        } else {
            $this->session->set_flashdata('invalid_item', 'Unable to disapprove Webinar');
            redirect($this->url.'/view-all-webinar');
    	}
    }

    public function view_all_appointment()
    {
    	is_logged_in($this->url.'/view_all_appointment');
		$data = array();
		$data['meta_title'] = 'Appointment';
		$data['small_text'] = 'Appointment';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'schedule_appointment');
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
	    $data['university'] = '';
	    $data['pagination'] = '';
	    $data['university'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(APPOINTMENT, (isset($_GET['s'])) ? array('name', 'location', 'country' ,'address', 'founded', 'president') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
	    // echo $this->db->last_query();die;
	    if(count($data['university']) > 0) {
	    	/* Pagination records */
	    	$query_string = '';
	        $url = get_cms_url().$this->url.'/view-all';
	        if(isset($_GET['s']) && !empty($_GET['s'])){
	        	$url .= '?s='.$_GET['s'];
	        	$query_string = 'yes';
	        }
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(APPOINTMENT, (isset($_GET['s'])) ? array('name', 'location', 'country','address', 'founded', 'president') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
	    }


		
		$data['appointments'] = $this->common_model->getAllRecords(APPOINTMENT);
		load_admin_view('universities/schedule_appointment', $data);
    }

    public function activate_appointment($id)
    {
    	is_logged_in($this->url.'/view_all_appointment');
    	$data['session_data'] = admin_session_data();
    	$data['user_info'] = get_user($data['session_data']['user_id']);
    	$from_id = $data['user_info']['user_id'];

    	$req = $this->common_model->updateRecords(APPOINTMENT,array('status'=>1),array('id'=>$id));
    	if($req)
    	{
    		$userData = $this->common_model->getSingleRecordById(USER,array('id'=>$from_id));
            $user_email = $userData['email'];
            $user_name = $userData['username'];

            $this->sendEmailToAdmin('Admin approved your appointment','appointment approve',$user_email,SUPPORT_EMAIL);

    		$this->session->set_flashdata('item_success', 'Appointment is approved');
            redirect($this->url.'/view-all-appointment');
        } else {
            $this->session->set_flashdata('invalid_item', 'Unable to approve Appointment');
            redirect($this->url.'/view-all-appointment');
    	}
    }

    public function deactivate_appointment($id)
    {
    	is_logged_in($this->url.'/view_all_appointment');
    	$data['session_data'] = admin_session_data();
    	$data['user_info'] = get_user($data['session_data']['user_id']);
    	$from_id = $data['user_info']['user_id'];

    	$req = $this->common_model->updateRecords(APPOINTMENT,array('status'=>0),array('id'=>$id));
    	if($req)
    	{
    		$userData = $this->common_model->getSingleRecordById(USER,array('id'=>$from_id));
            $user_email = $userData['email'];
            $user_name = $userData['username'];

            $this->sendEmailToAdmin('Admin disapproved your appointment','appointment disapprove',$user_email,SUPPORT_EMAIL);

    		$this->session->set_flashdata('item_success', 'Appointment is disapproved');
            redirect($this->url.'/view-all-appointment');
        } else {
            $this->session->set_flashdata('invalid_item', 'Unable to disapprove Appointment');
            redirect($this->url.'/view-all-appointment');
    	}
    }

    public function viewUniversity($user_id)
    { 
    	is_logged_in($this->url.'/viewUniversity');
        $data = array();
        $data['meta_title'] = 'View University';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        /* Fetch Data */

        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$user_id));
        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

        $data['assign_univ'] = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
        $data['universities']  = $this->common_model->getAllRecords(UNIVERSITIES);

        /* Load admin view */
        load_admin_view('universities/view-assign-university', $data);
    }

    public function assignUniversity($user_id)
    { //echo $user_id; die;
    	$this->form_validation->set_rules('univ_name[]','university','required');
        
        if($this->form_validation->run()==true)
        {
	        $univ_name = implode(',',$_POST['univ_name']);
	        $where = array('id'=>$user_id);
	        
	        $updateData = array('university_id'=>$univ_name);
	        $request = $this->common_model->updateRecords(USER,$updateData,$where);

	        $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
	        $user_email = $userEmail['email'];
	        
	        $this->sendEmailToAdmin('Admin has assigned you university. Please check on your dashboard','Assigned University',$user_email,SUPPORT_EMAIL);
	        
	        if($request)    
	        {
	            $this->session->set_flashdata('success','Universities assigned Successfully.');
	            redirect('admin/university/assignUniversity/'.$user_id);
	        }
	        else
	        {
	            $this->session->set_flashdata('error','Unable to assign Universities.');
	            redirect('admin/university/assignUniversity/'.$user_id);
	        }
	    }
	    else
	    {
	    	$data = array();
	        $data['meta_title'] = 'View University';
	        $data['small_text'] = 'User';
	        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
	        $data['session_data'] = admin_session_data();
	        $data['user_info'] = get_user($data['session_data']['user_id']);
	        /* Fetch Data */

	        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$user_id));
	        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

	        $data['assign_univ'] = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
	        $data['universities']  = $this->common_model->getAllRecords(UNIVERSITIES);

	        /* Load admin view */
	        load_admin_view('universities/view-assign-university', $data);
	    }
    }

}