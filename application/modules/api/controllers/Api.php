<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This Class used as REST API for user
 * @package   CodeIgniter
 * @category  Controller
 * @author    MobiwebTech Team
 */

class Api extends REST_Controller {

	function __construct() 
    {
        parent::__construct();
    }

    /**
     * Function Name: signup
     * Description:   To User Registration
     */
    function signup_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
        $return['response'] = new stdClass();
    	$this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('user_type','Register as','trim|required|in_list[2,3,4,5,6]');
        $this->form_validation->set_rules('email','Email Id','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[14]|callback_regex_check');
        $this->form_validation->set_rules('confm_pswd','Confirm Password','trim|required|min_length[6]|max_length[14]|callback_regex_check|matches[password]');
        $this->form_validation->set_rules('device_type', 'Device Type', 'trim|required|in_list[ANDROID,IOS]');
        $this->form_validation->set_rules('device_id', 'Device ID', 'trim|required');
        $this->form_validation->set_rules('device_key', 'Device Key', 'trim|required');
    	if($this->form_validation->run() == FALSE) 
        {
        	$error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $dataArr = array();
            $dataArr['first_name']  = extract_value($data,'first_name','');
            $dataArr['last_name']   = extract_value($data,'last_name','');
            $dataArr['user_type']   = extract_value($data,'user_type','');
            $dataArr['email']       = extract_value($data,'email','');
            $dataArr['password']    = md5(extract_value($data,'password',''));
            $dataArr['device_type'] = extract_value($data,'device_type','');
            $dataArr['device_id']   = extract_value($data,'device_id','');
            $dataArr['device_key']  = extract_value($data,'device_key','');
            $dataArr['is_blocked']  = 0;
            $dataArr['is_email_verified'] = 0;
            $dataArr['username']     = $dataArr['first_name'].$dataArr['last_name'];
            $dataArr['user_status'] = 0;
            $dataArr['date_created'] = datetime();

            /* Insert User Data Into Users Table */
            $lid = $this->common_model->addRecords(USER,$dataArr);
        	if($lid){
                /* Send verification mail to user */
                $email = $dataArr['email'];
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
                /* Return success response */
                $return['status']         =   1; 
	            $return['message']        =   'User registered successfully'; 
        	}else{
                $return['status']         =   0; 
	            $return['message']        =   GENERAL_ERROR;
        	}
        }
        $this->response($return);
    }

    /**
     * Function Name: regex_check
     * Description:   For Password Regular Expression
     */
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

    /**
     * Function Name: _validate_login_session_key
     * Description:   To validate user login session key
     */
    public function _validate_login_session_key($LoginSessionKey)
    {
        $result = $this->Common_model->getsingle(USER,array('login_session_key' => $LoginSessionKey));
        if(!empty($result)){
            return TRUE;
        }else{
            $this->form_validation->set_message('_validate_login_session_key', 'Invalid Login Session Key');
            return FALSE;
        }
    }

    /**
     * Function Name: login
     * Description:   To User Login
     */
    function login_post()
    {
        $return['code'] =   200;
        $return['response'] = new stdClass();
        $data = $this->input->post();
        $this->form_validation->set_rules('email','Email Id','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('device_type', 'Device Type', 'trim|required|in_list[ANDROID,IOS]');
        $this->form_validation->set_rules('device_id', 'Device ID', 'trim|required');
        $this->form_validation->set_rules('device_key', 'Device Key', 'trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $dataArr = array();
            $dataArr['email']    = extract_value($data,'email','');
            $dataArr['password'] = md5(extract_value($data,'password',''));

            /* Get User Data From Users Table */
            $Status = $this->common_model->getSingleRecordById(USER,$dataArr);
            if(empty($Status))
            {
                $return['status']         =   0; 
                $return['message']        =   'Invalid Email-id or Password'; 
            }
            else if(!empty($Status) && $Status['is_email_verified'] == 0){
                $return['status']         =   0; 
                $return['message']        =   'Currently your profile is  not verified'; 
            }
            else if(!empty($Status) && $Status['is_blocked'] == 1){
                $return['status']         =   0; 
                $return['message']        =   'Your profile has been blocked. Please contact to our support team'; 
            }
            else if($Status['is_email_verified'] == 1 && $Status['is_blocked'] == 0){
                /* Update User Data */
                $LoginSessionKey = get_guid();
                $UpdateData = array();
                $UpdateData['login_session_key'] = $LoginSessionKey;
                $UpdateData['device_type']       = extract_value($data,'device_type',NULL);
                $UpdateData['device_id']         = extract_value($data,'device_id',NULL);
                $UpdateData['device_key']        = extract_value($data,'device_key',NULL);
                $UpdateStatus = $this->common_model->updateRecords(USER,$UpdateData,array('id' => $Status['id']));
                if($UpdateStatus){
                    /* Return Response */
                    $response = array();
                    $response['first_name']        = null_checker($Status['first_name']);
                    $response['last_name']         = null_checker($Status['last_name']);
                    $response['email']             = null_checker($Status['email']);
                    $response['login_session_key'] = null_checker($LoginSessionKey);
                    $return['status']         =   1; 
                    $return['response']       =   $response; 
                    $return['message']        =   'User logged in successfully';
                }else{
                    $return['status']         =   0; 
                    $return['message']        =   GENERAL_ERROR; 
                }
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: notes_mgmt
     * Description:   To Add/Edit Notes
     */
    function notes_mgmt_post()
    {
        $return['code'] =   200;
        $return['response'] = new stdClass();
        $data = $this->input->post();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('notes','Note','trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $data_arr = array();
            $data_arr['notes']      = extract_value($data,'notes',"");
            $login_session_key      = extract_value($data,'login_session_key',"");
            $notes_id = extract_value($data,'note_id',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                if($notes_id){ // Update
                    $status = $this->common_model->updateRecords(NOTES,$data_arr,array('id' => $notes_id));
                    if($status){
                        $return['status']  =   1; 
                        $return['message'] =   'Notes updated successfully';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   NO_CHANGES;  
                    }
                }else{ // Insert
                    $data_arr['added_date'] = datetime();
                    $data_arr['user_id'] = $check_login_session_key['id'];
                    /* Insert Notes */ 
                    $lid = $this->common_model->addRecords(NOTES,$data_arr);
                    if($lid){
                        $return['status']  =   1; 
                        $return['message'] =   'Notes added successfully';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   GENERAL_ERROR;  
                    }
                }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: delete_notes
     * Description:   To Delete Notes
     */
    function delete_notes_post()
    {
        $return['code'] =   200;
        $return['response'] = new stdClass();
        $data = $this->input->post();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('note_id','Note ID','trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $login_session_key = extract_value($data,'login_session_key',"");
            $notes_id = extract_value($data,'note_id',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                $status = $this->common_model->deleteRecord(NOTES,array('id' => $notes_id));
                if($status){
                    $return['status']  =   1; 
                    $return['message'] =   'Notes deleted successfully'; 
                }else{
                    $return['status']  =   0; 
                    $return['message'] =   GENERAL_ERROR;  
                }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: get_notes
     * Description:   To Get User Notes
     */
    function get_notes_post()
    {
        $return['code'] =   200;
        $return['response'] = array();
        $data = $this->input->post();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('page_no', 'Page No', 'trim|numeric');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $login_session_key = extract_value($data,'login_session_key',"");
            $notes_id = extract_value($data,'note_id',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
               if($notes_id){ // Get single notes details
                    $result = $this->common_model->getSingleRecordById(NOTES,array('id' => $notes_id));
                    if($result){
                        /* Return Response */
                        $response = array();
                        $response['note_id']    = null_checker($result['id']);
                        $response['notes']      = null_checker($result['notes']);
                        $response['added_date'] = null_checker($result['added_date']);
                        $return['status']    =   1; 
                        $return['response']  =   $response; 
                        $return['message']   =   'success';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   'Invalid notes id';
                    }
               }else{ // Get user notes list
                    $page_no  = extract_value($data,'page_no',1);
                    $offset   = get_offsets($page_no);

                    $result = $this->common_model->getAllwhere(NOTES,array('user_id' => $check_login_session_key['id']),'id','DESC','all',10,$offset);
                    if($result){
                        /* Return Response */
                        $response = array();
                        /* Get total records */
                        $total_requested = (int) $page_no * 10;
                        $total_records   = getAllCount(NOTES,array('user_id' => $check_login_session_key['id']));
                        if($total_records > $total_requested){
                            $has_next = TRUE;
                        }else{
                            $has_next = FALSE;
                        }

                        foreach($result as $r)
                        {
                          $row['note_id']   = null_checker($r['id']);  
                          $row['notes']     = null_checker($r['notes']);  
                          $row['added_date']= null_checker($r['added_date']);  
                          array_push($response, $row);
                        }
                        $return['status']    =   1; 
                        $return['response']  =   $response; 
                        $return['has_next']  =   $has_next; 
                        $return['message']   =   'success';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   'Please Add Note';
                    }
               }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: change_password
     * Description:   To Change user password
     */
    function change_password_post()
    {
        $return['code'] =   200;
        $return['response'] = new stdClass();
        $data = $this->input->post();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('current_password','Current Password','trim|required');
        $this->form_validation->set_rules('new_password','New Password','trim|required|min_length[6]|max_length[14]|callback_regex_check');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[6]|max_length[14]|matches[new_password]|callback_regex_check');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $login_session_key = extract_value($data,'login_session_key',"");
            $current_password  = extract_value($data,'current_password',"");
            $new_password      = extract_value($data,'new_password',"");
            $confirm_password  = extract_value($data,'confirm_password',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                /* check current password is valid or not */
                $user_current_password = md5($current_password);
                if($user_current_password == $check_login_session_key['password']){
                    /* Update user password */
                    $status = $this->common_model->updateRecords(USER,array('password' => md5($new_password)),array('id' => $check_login_session_key['id']));
                    if($status){
                        $return['status']  =   1; 
                        $return['message'] =   'Password changed successfully';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   NO_CHANGES;
                    }
                }else{
                    $return['status']  =   0; 
                    $return['message'] =   'Invalid current password';
                }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: get_static_data
     * Description:   To Get Static Data
     */
    function get_static_data_post()
    {
        $return['code'] =   200;
        $return['response'] = array();
        $data = $this->input->post();
        $this->form_validation->set_rules('data_type', 'Type', 'trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $data_type = extract_value($data,'data_type',"");
            if(function_exists($data_type)) {
                $return['status']   =   1;
                $return['response'] =   $data_type();
                $return['message']  =   'Success';
            }else{
                $return['status']  =   0; 
                $return['message'] =   'Invalid data type';
            }
        }
        $this->response($return);
    }


}

/* End of file Api.php */
/* Location: ./application/modules/api/controllers/Api.php */

?>

