<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
    }

	/**
	* Admin index method
	*/
	public function index() {
		/* Check for already logged in */
		is_logged_in($this->router->fetch_class().'/dashboard');

		/* Redirect to the dashboard if user is already logged in */
		redirect($this->router->fetch_class().'/dashboard');
		exit();
	}

	/**
	* Admin login
	* @param Obj $_POST
	*/
	public function login() {
		$adminData = admin_session_data();
		if(isset($adminData['is_logged_in'])) {
			redirect($this->router->fetch_class().'/dashboard');
		} else {
			$data = array();
			$data['meta_title'] = 'Login';
			$data['body_class'] = 'admin_login';

			/* Process admin login */
			if($this->input->post('submit')) 
			{	
				/* From Validations */
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');    
                $this->form_validation->set_rules('password', 'Password', 'trim|required');

                if($this->form_validation->run() == true){
                	/* Check for valid admin user */
                	$wherreArr = array('email' => $_POST['email'], 'password' => md5($_POST['password']), 'user_status' => 1, 'user_type' => SUPER_ADMIN_USER_TYPE);
					$checkUser = $this->common_model->getSingleRecordById(USER, $wherreArr);
                	
                	if(isset($checkUser)) {
                		/* Saving session data for loggedin user */
                		$sessionArr = array(
                			'is_logged_in' => true,
                			'user_id' => $checkUser['id'],
                			'email' => $checkUser['email'],
                			'user_type' => 1
            			);
            			$this->session->set_userdata(array('admin_session_data' => $sessionArr));
                		
                		/* Add remember me cookie */
                		if($this->input->post('remember_me')) {
	            			$cookie = array(
						        'name'   => 'login_remember',
						        'value'  => $_POST['email'].'|'.$_POST['password'],
						        'expire' => time()+86500,
						        'domain' => $this->input->ip_address(),
						        'path'   => '/',
						        'prefix' => CMS_ABR.'_',
					        );
							set_cookie($cookie);
                		}

                		/* Redirect to loggedin user */
                		if($this->input->get('return_uri')) {
                            redirect($this->input->get('return_uri'));
                        } else {
                            redirect($this->router->fetch_class().'/dashboard');
                        }
                	} else {
                		$this->session->set_flashdata('login_error', LOGIN_ERROR);
                		if($this->input->get('return_uri')) {
                            redirect($this->router->fetch_class().'/login?return_uri='.urlencode($this->input->get('return_uri')));
                        } else {
                            redirect($this->router->fetch_class().'/login');
                        }
                	}
                }
			}
			/* Load admin view */
			$this->load->view(LOGIN_INCLUDES.'login-header', $data);
			load_admin_view('login', $data, false, false, false);
			$this->load->view(LOGIN_INCLUDES.'login-footer', $data);
		}
	}

	/**
	* Forgot Password
	* @param Obj $_POST
	*/
	public function forgotPassword() {
		$adminData = admin_session_data();
		if(isset($adminData['is_logged_in'])) {
			redirect($this->router->fetch_class().'/dashboard');
		} else {
			$data = array();
			$data['meta_title'] = 'Forgot Password';
			$data['body_class'] = 'admin_forgot_password';

			if($this->input->post('submit')) {
				/* From Validations */
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

                if($this->form_validation->run() == true){
                	/* Check for valid admin user */
                	$wherreArr = array('email' => $_POST['email'], 'user_type' => SUPER_ADMIN_USER_TYPE);
					$checkUser = $this->common_model->getSingleRecordById(USER, $wherreArr);
					
					if(isset($checkUser)) {
						/* Generating and Insering random passord reset sring for reference */
						$password_reset_key = substr(md5(time()),rand(7,9),rand(15,25));

						/* Updating user record */
						$post_data = array('password_reset_key' => $password_reset_key);
						$where_condition = array('email' => $_POST['email']);
						$this->common_model->updateRecords(USER, $post_data, $where_condition);

						/* Send Email to user */
						$adminData = get_user($checkUser['id']);
						if(isset($adminData)) {
							$adminMetaData = $adminData['meta_data'];
						}

						$link = get_cms_url('admin/change-password?reset_key='.$password_reset_key);
						$subject = FORGOT_PASSWORD_SUBJECT;
					    $message = sprintf(FORGOT_PASSWORD_MESSAGE, ucfirst($adminMetaData['first_name']), ucfirst($adminMetaData['last_name']), $link);
						send_mail($message, $subject, $checkUser['email']);

						/* Set flashdata and redirect */
						$this->session->set_flashdata('forgot_password_success', FORGOT_PASSWORD_SUCCESS);
						redirect($this->router->fetch_class().'/forgot-password');
					} else {
						$this->session->set_flashdata('forgot_password_error', FORGOT_PASSWORD_ERROR);
						redirect($this->router->fetch_class().'/forgot-password');
					}
				}
			}
			/* Load admin view */
			$this->load->view(LOGIN_INCLUDES.'login-header', $data);
			load_admin_view('forgot-password', $data, false, false, false);
			$this->load->view(LOGIN_INCLUDES.'login-footer', $data);
		}
	}

	/**
	* change Password
	* @param $_POST
	*/
	public function changePassword() {
		$adminData = admin_session_data();
		if(isset($adminData['is_logged_in'])) {
			redirect($this->router->fetch_class().'/dashboard');
		} else {
			$resetkey = $this->input->get('reset_key');
			if(isset($resetkey)) {
				$data = array();
				$data['meta_title'] = 'Change Password';
				$data['body_class'] = 'change_password';

				if($this->input->post('submit')) {
					$this->form_validation->set_rules('password', 'Password', 'trim|required');
					$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
					
					if($this->form_validation->run() == true) {
						/* Check for reset key */
						$checkKey = $this->common_model->getSingleRecordById(USER, array('password_reset_key' => $resetkey));
						if(isset($checkKey)) {
							/* Updating user password */
							$post_data = array('password' => md5($_POST['password']));
							$where_condition = array('id' => $checkKey['id'], 'password_reset_key' => $resetkey);
							$this->common_model->updateRecords(USER, $post_data, $where_condition);

							/* Set reset_key = NULL */
							$this->common_model->updateRecords(USER, array('password_reset_key' => NULL), array('id' => $checkKey['id']));
							
							/* redirect to the login page */
							$this->session->set_flashdata('change_password_success', CHANGE_PASSWORD_SUCCESS);
							redirect($this->router->fetch_class().'/login');
						} else {
							$this->session->set_flashdata('invalid_reset_key', INVALID_RESET_KEY);
							redirect($this->router->fetch_class().'/change-password?reset_key='.$resetkey);
						}
					}
				}

				/* Load admin view */
				$this->load->view(LOGIN_INCLUDES.'login-header', $data);
				load_admin_view('change-password', $data, false, false, false);
				$this->load->view(LOGIN_INCLUDES.'login-footer', $data);
			} else {
				redirect($this->router->fetch_class().'/forgot-password');
			}
		}
	}

	/**
	* Admin sign out
	*/
	public function logout() {
		$this->session->unset_userdata('admin_session_data');
		$this->session->set_flashdata('logged_out', LOGGED_OUT);
		redirect($this->router->fetch_class().'/login?logged_out=true');
		exit();
	}

	/**
	* Download Database Backup
	*/
	public function databse_backup() {
		$this->load->dbutil();
		$prefs = array(     
                'format'      => 'sql',             
                'filename'    => 'study_metro.sql'
            );
		$backup = $this->dbutil->backup($prefs); 
		$db_name = 'STUDY-METRO-BACKUP-'. date("Y-m-d") .'.sql';
        $this->load->helper('download');
        force_download($db_name, $backup); 
		exit();
	}

	/**
	* Admin Dashboard
	*/
	public function dashboard() {
		is_logged_in($this->router->fetch_class().'/dashboard');
		$data = array();
		$data['meta_title'] = 'Dashboard';
		$data['small_text'] = 'Control panel';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in');

		/* Load admin view */
		load_admin_view('dashboard', $data);
	}

	public function update_notifications()
	{
		$this->common_model->updateRecords(ADMIN_NOTIFICATION,array('is_read' => 0),array('receiver_id' => ADMIN_ID));
		echo "success";
	}
}