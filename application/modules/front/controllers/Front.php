<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	public function index() {
		$data = array();
		$data['details'] = $this->common_model->getSingleRecordById(STATIC_PAGE,array('slug' => 'home'));
		if(!empty($data['details'])){
			$data['meta_title'] = $data['details']['meta_title'];
            $data['meta_keywords'] = $data['details']['meta_keywords'];
            $data['meta_description'] = $data['details']['meta_description'];
		}
		$user = $this->session->userdata("user_id");
		/*$cookie_data = $this->input->cookie('study_metro',true);
		if(isset($cookie_data) && !empty($cookie_data)){
			$cookie_val = explode("_", decode($cookie_data));
			if($cookie_val[1] == $this->session->userdata("user_id") && $cookie_val[0] == $this->session->userdata("email")){
				redirect("/home");
			}
		}*/
		if(!empty($user))
		{
			redirect('/home');
		}
		$data['details'] = $this->common_model->getSingleRecordById(STATIC_PAGE,array('page_no' => '1'));
		$this->load->view(FRONT_INCLUDES.'header', $data);
		load_admin_view('front', $data, false, false, false);
		$this->load->view(FRONT_INCLUDES.'footer', $data);
	}

	public function regex_check($str)
	{
	    if (1 !== preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $str))
	    {
	        $this->form_validation->set_message('regex_check', 'Password must contain at least 6 characters, including UPPER/lower case & numbers');
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	public function sendEmailToAdmin($message,$subject,$from="")
    {
        //checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

	public function signup()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->input->post();
			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('user_type','Register as','required');
			$this->form_validation->set_rules('email','Email Id','trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[14]|callback_regex_check');
			$this->form_validation->set_rules('confm_pswd','Confirm Password','trim|required|min_length[6]|max_length[14]|callback_regex_check|matches[password]');
			
			if($this->form_validation->run()==TRUE){
				unset($data['confm_pswd']);
				$data['password'] = md5($data['password']);
				$data['username'] = $data['first_name'].$data['last_name'];
				$data['user_status']=0;
				$data['user_type']  = $data['user_type'];
				$data['is_blocked'] = 0;
				$data['is_email_verified'] = 0;
				$data['date_created'] = datetime();
				$email = $data['email'];
				$lid = $this->common_model->addRecords(USER,$data);
				if(!empty($lid)){
					$token = encode($email."-".$lid);
					$tokenArr = array('verification_key' => $token);
					$this->common_model->updateRecords(USER,$tokenArr,array('id' => $lid));
					$link = base_url().'front/front/verifyuser?email='.$email.'&token='.$token;
					$message  = "";
					$message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
					$message .= "<br><br> Hello, <br/><br/>";
					$message .= "Your ".SITE_NAME." profile has been created. Please click on below link to verify your account. <br/><br/>";
					$message .= "Click here : <a href='".$link."'>Verify Your Email</a>";
					$this->email->to($email);
				    $this->email->from(FROM_EMAIL,SITE_NAME);
				    $this->email->subject('['.SITE_NAME.'] Thank you for registering with us');
				    $this->email->message($message);
				    $this->email->set_mailtype("html");
				    $this->email->send();
				    echo json_encode(array('type' => 'success','msg' => 'User registered successfully, please check your mail to verify account !'));
				}else{
					echo json_encode(array('type' => 'failed','msg' => 'Failed please try again !'));					
				}
			}else{
				$error = array(
					'first_name'=> form_error('first_name'),
					'last_name' => form_error('last_name'),
					'user_type' => form_error('user_type'),
					'email'     => form_error('email'),
					'password'  => form_error('password'),
					'confm_pswd'=> form_error('confm_pswd')
				); 
				echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
			}
		}
	}

	public function verifyuser()
	{
		if($this->input->get('email') && $this->input->get('token')){
			$email = $this->input->get('email');
			$token = $this->input->get('token');
			$where = array('email' => $email, 'verification_key' => $token);
			$result = $this->common_model->getSingleRecordById(USER,$where);
			if(!empty($result)){
				$status = $result['is_email_verified'];
				if($status == 1){
					$this->session->set_flashdata('error','Profile already verified !');
					redirect('/');
				}else{
					$updateData = array(
									'user_status' => 1,
									'is_email_verified' => 1,
									'is_blocked' => 0,
									'verification_key' => NULL
								);
					$this->common_model->updateRecords(USER,$updateData,array('id' => $result['id']));
					$this->session->set_userdata('user_id',$result['id']);
					$this->session->set_userdata('email',$result['email']);
					$this->session->set_userdata('first_name',$result['first_name']);
					$this->session->set_userdata('last_name',$result['last_name']);
					$this->session->set_userdata('user_type',$result['user_type']);
					$this->session->set_flashdata('success','Congratulation your account successfully verified !');
					redirect('/');
				}
			}else{
				$this->session->set_flashdata('error','Invalid Token !');
				redirect('/');
			}
		}
	}

	public function login()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->input->post();
			$query_string = $data['query_string'];
			$redirect_url = base_url().'user/dashboard';
			$password = md5($data['password']);
			$where  = array('password' => $password,'email' => $data['email']);
			$result = $this->common_model->getSingleRecordById(USER,$where);
			if(empty($result)){
				echo json_encode(array('type' => 'failed', 'msg' => 'Invalid email-id or password !'));exit;
			}else{
				if($result['is_email_verified'] == 0){
					$token = encode($result['email']."-".$result['id']);
					echo json_encode(array('type' => 'failed', 'msg' => 'Currently your profile is  not verified <br/> <a href="'.base_url().'front/front/resend_verification_link?token='.$token.'">Click here</a> to resend verification link !'));exit;
				}
				else if($result['is_blocked'] == 1){
					echo json_encode(array('type' => 'failed', 'msg' => 'Your profile has been blocked. Please contact to our support team !'));exit;
				}
				else if($result['is_email_verified'] == 1 && $result['is_blocked'] == 0){
					/*if(isset($data['remeber_me']) && $data['remeber_me'] == 1){
					$cookie= array(
					      'name'   => 'study_metro',
					      'value'  => encode($data['email']."_".$result['id']),
					      'expire' => '86500', // 3 days
					  );
				  	$this->input->set_cookie($cookie);
				  	}*/
				  	if(!empty($query_string)){
				  		$redirect_url = $query_string;
				  	}
					echo json_encode(array('type' => 'success', 'msg' => 'Login successfull please wait !','redirect_url' => $redirect_url));
					$this->session->set_userdata('user_id',$result['id']);
					$this->session->set_userdata('first_name',$result['first_name']);
					$this->session->set_userdata('last_name',$result['last_name']);
					$this->session->set_userdata('user_type',$result['user_type']);
					$this->session->set_userdata('email',$result['email']);die;
					$this->session->set_userdata('earning',$result['referral_earning']);die;
				}
			}
		}else{
			show_404();
		}
	}

	public function resend_verification_link()
	{
		if($this->input->get('token')){
			$token = $this->input->get('token');
			$decode_token = explode("-", decode($token));
			if(!empty($decode_token)){
				$user_email = $decode_token[0];
				$user_id    = $decode_token[1];

				/* Get User Details */
				$where = array('email' => $user_email, 'id' => $user_id);
				$result = $this->common_model->getSingleRecordById(USER,$where);
				if(!empty($result)){
					$token = encode($user_email."-".$user_id);
					$tokenArr = array('verification_key' => $token);
					$this->common_model->updateRecords(USER,$tokenArr,array('id' => $user_id));
					$link = base_url().'front/front/verifyuser?email='.$user_email.'&token='.$token;
					$message  = "";
					$message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
					$message .= "<br><br> Hello, <br/><br/>";
					$message .= "Your ".SITE_NAME." profile has been created. Please click on below link to verify your account. <br/><br/>";
					$message .= "Click here : <a href='".$link."'>Verify Your Email</a>";
					$this->email->to($user_email);
				    $this->email->from(FROM_EMAIL,SITE_NAME);
				    $this->email->subject('['.SITE_NAME.'] Thank you for registering with us');
				    $this->email->message($message);
				    $this->email->set_mailtype("html");
				    if($this->email->send()){
				    	$this->session->set_flashdata('success','A verification link sent successfully, please check your inbox');
						redirect('/');
				    }else{
				    	$this->session->set_flashdata('error','Failed to sending a email !');
						redirect('/');
				    }
				}else{
					$this->session->set_flashdata('error','Sorry we could not found any user !');
					redirect('/');
				}
			}else{
				$this->session->set_flashdata('error','Invalid Token !');
				redirect('/');
			}
		}else{
			$this->session->set_flashdata('error','Invalid Token !');
			redirect('/');
		}
	}

	public function forgot_pswd()
	{	
		if($this->input->is_ajax_request())
		{
			$email  = $this->input->post('email');
			$result = $this->common_model->getSingleRecordById(USER,array('email' => $email));
			if(!empty($result)){
				if($result['is_email_verified'] == 1){
					$token = encode($result['email']."-".$result['id']);
					$updateArr = array('verification_key' => $token);
					if($this->common_model->updateRecords(USER,$updateArr,array('id' => $result['id']))){
						$link = base_url().'front/front/resetpassword?email='.$email.'&token='.$token;
						$message  = "";
						$message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
						$message .= "<br><br> Hello, <br/><br/>";
						$message .= "Somebody (hopefully you) requested a new password for the ".SITE_NAME." account for ".$result['username'].". No changes have been made to your account yet.<br/><br/>";
						$message .= "You can reset your password by clicking this <a href='".$link."'>link</a>  <br/><br/>";
						$message .= "We'll be here to help you every step of the way. <br/><br/>";
						$message .= "If you did not request a new password, let us know immediately by forwarding this email to ".SUPPORT_EMAIL.". <br/><br/>";
						$message .= "Thanks, <br/>";
						$message .= "The ".SITE_NAME." Team";
						$this->email->to($email);
					    $this->email->from(SUPPORT_EMAIL,SITE_NAME);
					    $this->email->subject('Reset your '.SITE_NAME.' password');
					    $this->email->message($message);
					    $this->email->set_mailtype("html");
					    if($this->email->send()){
					    	echo json_encode(array('type' => 'success', 'msg' => 'An email has been sent Please check your inbox !'));
					    }else{
							echo json_encode(array('type' => 'failed', 'msg' => 'Failed to sending a mail !'));
					    }
					}else{
						echo json_encode(array('type' => 'failed', 'msg' => 'Failed please try again !'));
					}
				}else{
					echo json_encode(array('type' => 'failed', 'msg' => 'Currently your profile is not verified !'));
				}
			}else{
				echo json_encode(array('type' => 'failed', 'msg' => 'Email-id does not exists !'));
			}
		}else{
			show_404();
		}
	}

	public function resetpassword()
	{
		if($this->input->get('email') && $this->input->get('token')){
			$email = $this->input->get('email');
			$token = $this->input->get('token');
			$where = array('email' => $email, 'verification_key' => $token);
			$result = $this->common_model->getSingleRecordById(USER,$where);
			if(!empty($result)){
				$this->showResetPasswordPage($token);
			}else{
				$this->session->set_flashdata('error','Some error occured Or token mismatch !');
				redirect('/');
			}
		}else{
			$this->session->set_flashdata('error','Some error occured Or token mismatch !');
			redirect('/');
		}
	}

	public function showResetPasswordPage($token)
	{
		$this->session->set_flashdata('reset_pswd_token',$token);
		redirect('/');
	}

	public function do_reset_pswd()
	{
		if($this->input->is_ajax_request())
		{
			$this->form_validation->set_rules('new_password','New Password','trim|required|min_length[6]|max_length[14]|callback_regex_check');
			$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[6]|max_length[14]|matches[new_password]|callback_regex_check');
			if($this->form_validation->run()==TRUE){
				$data  = $this->input->post();
				$token = $data['reset_pswd_token'];
				$where = array('verification_key' => $token);
				$result = $this->common_model->getSingleRecordById(USER,$where);
				if(empty($result)){
					echo json_encode(array('type' => 'failed', 'msg' => 'Invalid Token !'));
				}else{
					$updateArr = array(
						'password'            => md5($data['new_password']),
						'verification_key'    => NULL
					);
					if($this->common_model->updateRecords(USER,$updateArr,array('verification_key' => $token))){
						echo json_encode(array('type' => 'success', 'msg' => 'Password reset successfully !'));
					}else{
						echo json_encode(array('type' => 'failed', 'msg' => 'Failed please try again !'));
					}
				}
			}
			else{
				$error = array(
					'new_password'     => form_error('new_password'),
					'confirm_password' => form_error('confirm_password')
				); 
				echo json_encode(array('type' => 'validation_err','msg' => $error));
			}
		}else{
			show_404();
		}
	}


}