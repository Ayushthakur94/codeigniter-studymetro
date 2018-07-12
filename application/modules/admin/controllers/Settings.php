<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    /**
	* Index of setting controller
    */
    public function index() {
    	is_logged_in($this->url.'/general');
    	redirect($this->url.'/general');
    	exit();
    }

    /**
	* General Settings of CMS
    */
    public function general() {
    	is_logged_in($this->url.'/general');
		$data = array();
		$data['meta_title'] = 'General Settings';
		$data['small_text'] = '';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'general_settings');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		if($this->input->post('submit')) {
			$this->form_validation->set_rules('site_email', 'Site Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('site_logo', 'Site Logo', 'callback__verify_logo');
			$this->form_validation->set_rules('site_favicon', 'Site Favicon', 'callback__verify_favicon');

            if($this->form_validation->run() == true){
				/* Upload logo and favicon */
				if(!empty($_FILES['site_logo']['name'])) {
					$config1['file_name']     = time().$_FILES['site_logo']['name']; 
	                $config1['upload_path']   = './uploads/site';
	                $config1['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	                $config1['max_size']      = '2474898';
	                $config1['max_width']     = '100024';
	                $config1['max_height']    = '768000';
	                $config1['remove_spaces'] = true;
	                $config1['field_name']	  = 'site_logo';

	                $logoData = upload_file($_FILES['site_logo'], $config1);
	                if(isset($logoData) && $logoData['message'] == 'success') {
	                	$_POST['site_logo'] = $logoData['file_path'];
	                }
				} else {
					$_POST['site_logo'] = $_POST['old_site_logo'];
				}

				if(!empty($_FILES['site_favicon']['name'])) {
					$config2['file_name']     = time().$_FILES['site_favicon']['name']; 
	                $config2['upload_path']   = './uploads/site';
	                $config2['allowed_types'] = 'ico|png|jpg|jpeg|vnd.microsoft.icon';
	                $config2['max_size']      = '2474898';
	                $config2['max_width']     = '100024';
	                $config2['max_height']    = '768000';
	                $config2['remove_spaces'] = true;
	                $config2['field_name']	  = 'site_favicon';

	                $faviconData = upload_file($_FILES['site_favicon'], $config2);
	                if(isset($faviconData) && $faviconData['message'] == 'success') {
	                	$_POST['site_favicon'] = $faviconData['file_path'];
	                }
				} else {
					$_POST['site_favicon'] = $_POST['old_site_favicon'];
				}

				$_POST['copyright_text'] = str_replace(PHP_EOL, '<br/>', $_POST['copyright_text']);
				$_POST['footer_name_address'] = str_replace(PHP_EOL, '<br/>', $_POST['footer_name_address']);
				
				/* Updating setting options */
				unset($_POST['old_site_logo'], $_POST['old_site_favicon'], $_POST['submit']);
				foreach($_POST as $key => $val) {
					update_option($key, $val);
				}

				/* Set session flashdata and redirect */
				$this->session->set_flashdata('setting_success', SETTING_SUCCESS);
				redirect(redirect($this->url.'/general'));
			}
		}

		/* Load admin view */
		load_admin_view('settings/general-settings', $data);
    }

    /**
	* Admin Profile
	*/
	public function profile() {
		is_logged_in($this->url.'/profile');
		$data = array();
		$data['meta_title'] = 'Profile';
		$data['small_text'] = 'Edit Profile';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_admin_profile');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		$userId = $data['session_data']['user_id'];

		if($this->input->post('submit')) {
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__verify_email_address');
			$this->form_validation->set_rules('profile_picture', 'Profile Picture', 'callback__verify_profile_picture');

			$changePassword = 0;
			if(!empty($_POST['password']) && !empty($_POST['repeat_password'])) {
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('repeat_password', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
				$changePassword = 1;
			}

			if($this->form_validation->run() == true) {
				/* Upload profile picture */
				if(!empty($_FILES['profile_picture']['name'])) {
					$config['file_name']     = time().$_FILES['profile_picture']['name']; 
	                $config['upload_path']   = './uploads/site';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	                $config['max_size']      = '2474898';
	                $config['max_width']     = '100024';
	                $config['max_height']    = '768000';
	                $config['remove_spaces'] = true;
	                $config['field_name']	  = 'profile_picture';

	                $picData = upload_file($_FILES['profile_picture'], $config);
	                if(isset($picData) && $picData['message'] == 'success') {
	                	$_POST['profile_picture'] = $picData['file_path'];
	                }
				} else {
					$_POST['profile_picture'] = (isset($_POST['current_profile_pic'])) ? $_POST['current_profile_pic'] : '';
				}

				/* Update user profile data */
				$wherreArr = array('id' => $userId);
				$username = strtolower($_POST['first_name'].$_POST['last_name'].$userId);
				if(!empty($_POST['password']) && !empty($_POST['repeat_password'])) {
					$userData = array('username' => $username, 'email' => $_POST['email'], 'password' => md5($_POST['password']));
				} else {
					$userData = array('username' => $username, 'email' => $_POST['email']);
				}
				$this->common_model->updateRecords(USER, $userData, $wherreArr);

				/* Update user_meta information */
				unset($_POST['email'], $_POST['password'], $_POST['repeat_password'], $_POST['submit'], $_POST['current_profile_pic']);
				foreach($_POST as $key => $val) {
					update_user_meta($userId, $key, $val);
				}

				/* Redirect to login if password has been changed */
				if($changePassword == 1) {
					$this->session->unset_userdata('admin_session_data');
					$this->session->set_flashdata('change_password_success', LOGIN_TO_CONTINUE);
					redirect(get_cms_url('admin/login?logged_out=true'));
					exit();
				}

				/* Set flash data and redirect to the profile page */
				$this->session->set_flashdata('admin_profile_update_success', ADMIN_PROFILE_UPDATE_SUCCESS);
				redirect($this->url.'/profile');
			}
		}

		/* Load admin view */
		load_admin_view('settings/profile', $data);
	}

	/**
	* Callback function to check email in users entity
	* @param Array $data
	*/
	function _verify_email_address($data){
        $email_address = $this->input->post('email');
	    $conditions = array('email' => $email_address);	
		$user_email_exists = $this->common_model->getRecordCount(USER, $conditions);

		if($user_email_exists > 1) {
			$this->form_validation->set_message('_verify_signup_email_address', EMAIL_EXISTS);
			return FALSE;
		}
	}

	/**
	* SEO Settings
    */
    public function seo() {
    	is_logged_in($this->url.'/seo');
		$data = array();
		$data['meta_title'] = 'SEO Settings';
		$data['small_text'] = 'Search Engine Optimization';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'seo_settings');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		if($this->input->post('submit')) {
			unset($_POST['submit']);
			foreach($_POST as $key => $val) {
				update_option($key, $val);
			}

			$this->session->set_flashdata('setting_success', SETTING_SUCCESS);
			redirect(redirect($this->url.'/seo'));
		}

		/* Load admin view */
		load_admin_view('settings/seo-settings', $data);
    }

    /**
	* System Preferences
	* @param $_POST
    */
    public function systemPreferences() {
    	is_logged_in($this->url.'/system-preferences');
		$data = array();
		$data['meta_title'] = 'System Preferences Settings';
		$data['small_text'] = 'System Preferences';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'system_preferences_settings');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		$data['pages'] = $this->common_model->getAllRecordsById(STATIC_PAGE, array('status' => 1));
		
		if($this->input->post('submit')) {
			unset($_POST['submit']);

			foreach($_POST as $key => $val) {
				update_option($key, $val);
			}

			$this->session->set_flashdata('setting_success', SETTING_SUCCESS);
			redirect(redirect($this->url.'/system-preferences'));
		}

		/* Load admin view */
		load_admin_view('settings/system-preferences', $data);
    }

    /**
	* File uploading call back to check for cvalid files
	* @param Array $_FILES
    */
    function _verify_logo($data)
	{	
		if(!empty($_FILES['site_logo']['name'])) {
			$valid_extension = array('png', 'jpg', 'jpeg', 'bmp', 'gif');
			$type = $_FILES['site_logo']['type'];
			$type = explode('/', $type);
			if(!in_array($type[1], $valid_extension)) {
				$this->form_validation->set_message('_verify_logo', LOGO_ERROR);
				return FALSE;
			}
		}
	}

	/**
	* File uploading call back to check for cvalid files
	* @param Array $_FILES
    */
    function _verify_profile_picture($data)
	{	
		if(!empty($_FILES['profile_picture']['name'])) {
			$valid_extension = array('png', 'jpg', 'jpeg', 'bmp', 'gif');
			$type = $_FILES['profile_picture']['type'];
			$type = explode('/', $type);
			if(!in_array($type[1], $valid_extension)) {
				$this->form_validation->set_message('_verify_profile_picture', IMG_ERROR);
				return FALSE;
			}
		}
	}

	/**
	* File uploading call back to check for cvalid files
	* @param Array $_FILES
    */
    function _verify_favicon($data)
	{	
		if(!empty($_FILES['site_favicon']['name'])) {
			$valid_extension = array('ico', 'png', 'jpg', 'jpeg', 'vnd.microsoft.icon');
			$type = $_FILES['site_favicon']['type'];
			$type = explode('/', $type);
			if(!in_array($type[1], $valid_extension)) {
				$this->form_validation->set_message('_verify_favicon', FAVICON_ERROR);
				return FALSE;
			}
		}
	}
}
