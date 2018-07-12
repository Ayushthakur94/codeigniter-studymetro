<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This Class used as REST API for user
 * @package   CodeIgniter
 * @category  Controller
 * @author    MobiwebTech Team
 */

class Email extends REST_Controller {

	function __construct() 
    {
        parent::__construct();
    }

    /**
     * Function Name: send
     * Description:   To Send Email
     */
    function send_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
        $return['response'] = new stdClass();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('to_email','To Email','trim|required|valid_emails');
        $this->form_validation->set_rules('subject','Subject','trim|required');
        $this->form_validation->set_rules('message','Message','trim|required');
    	if($this->form_validation->run() == FALSE) 
        {
        	$error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
        	/* To check user login session key */
        	$login_session_key       = extract_value($data,'login_session_key',"");
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
            	/* Get authorized user email */
            	$user_email = $check_login_session_key['email'];

            	$data_arr = array();
            	$data_arr['message']    = extract_value($data,'message',"");
            	$data_arr['to_email']   = extract_value($data,'to_email',"");
            	$data_arr['from_email'] = $user_email;
            	$data_arr['subject']    = extract_value($data,'subject',"");
            	$data_arr['added_date'] = datetime();
            	$attachement = "";

                if (!empty($_FILES['attachment']['name']))
                {
                    /* Upload attachment */
                    $attachement = fileUploading('attachment','email_attachments');
                    if(!empty($attachement)){
                        $data_arr['attachment'] = $attachement;
                    }else{
                        $return['status']  =   0; 
                		$return['message'] =   'Attachement failed';
                    }
                }
                /* Send email */
                $status = send_mail($data_arr['message'],$data_arr['subject'],$data_arr['to_email'],$data_arr['from_email'],$attachement);
                if(!empty($status)){
                    $this->common_model->addRecords(EMAILS,$data_arr);
                    $return['status']  =   1; 
                    $return['message'] =   'Email send successfully';
                }else{
                	$return['status']  =   0; 
                    $return['message'] =   EMAIL_SEND_FAILED;  
                }
	        }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: inbox_mails
     * Description:   To Get Inbox Emails
     */
    function inbox_mails_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
        $return['response'] = array();
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
            /* To check user login session key */
            $login_session_key       = extract_value($data,'login_session_key',"");
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                $page_no  = extract_value($data,'page_no',1);
                $offset   = get_offsets($page_no);

                /* Get authorized user email */
                $user_email = $check_login_session_key['email'];
                $result = $this->common_model->getAllwhere(EMAILS,array('to_email' => $user_email),'id','DESC','all',10,$offset);
                if($result){
                    /* Return Response */
                    $response = array();

                    /* Get total records */
                    $total_requested = (int) $page_no * 10;
                    $total_records   = getAllCount(EMAILS,array('to_email' => $user_email));
                    if($total_records > $total_requested){
                        $has_next = TRUE;
                    }else{
                        $has_next = FALSE;
                    }

                    foreach($result as $r)
                    {
                      $row['email_id']       = null_checker($r['id']);  
                      $row['message']        = null_checker($r['message']);  
                      $row['from_email']     = null_checker($r['from_email']);  
                      $row['subject']        = null_checker($r['subject']);
                      $row['attachment']     = (!empty($r['attachment'])) ? base_url().$r['attachment'] : '';  
                      $row['recieved_time']  = null_checker($r['added_date']);  
                      array_push($response, $row);
                    }
                    $return['status']    =   1; 
                    $return['response']  =   $response; 
                    $return['has_next']  =   $has_next; 
                    $return['message']   =   'success';
                }else{
                    $return['status']  =   0; 
                    $return['message'] =   'Emails not found';
                }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: sent_mails
     * Description:   To Get Sent Emails
     */
    function sent_mails_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
        $return['response'] = array();
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
            /* To check user login session key */
            $login_session_key       = extract_value($data,'login_session_key',"");
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                $page_no  = extract_value($data,'page_no',1);
                $offset   = get_offsets($page_no);

                /* Get authorized user email */
                $user_email = $check_login_session_key['email'];
                $result = $this->common_model->getAllwhere(EMAILS,array('from_email' => $user_email),'id','DESC','all',10,$offset);
                if($result){
                    /* Return Response */
                    $response = array();

                    /* Get total records */
                    $total_requested = (int) $page_no * 10;
                    $total_records   = getAllCount(EMAILS,array('from_email' => $user_email));
                    if($total_records > $total_requested){
                        $has_next = TRUE;
                    }else{
                        $has_next = FALSE;
                    }

                    foreach($result as $r)
                    {
                      $row['email_id']       = null_checker($r['id']);  
                      $row['message']        = null_checker($r['message']);  
                      $row['to_email']       = null_checker($r['to_email']);  
                      $row['subject']        = null_checker($r['subject']);
                      $row['attachment']     = (!empty($r['attachment'])) ? base_url().$r['attachment'] : '';  
                      $row['sent_time']      = null_checker($r['added_date']);  
                      array_push($response, $row);
                    }
                    $return['status']    =   1; 
                    $return['response']  =   $response; 
                    $return['has_next']  =   $has_next; 
                    $return['message']   =   'success';
                }else{
                    $return['status']  =   0; 
                    $return['message'] =   'Emails not found';
                }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: get_email_details
     * Description:   To Get Sent Emails
     */
    function get_email_details_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
        $return['response'] = new stdClass();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|numeric');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            /* To check user login session key */
            $login_session_key  = extract_value($data,'login_session_key',"");
            $email_id           = extract_value($data,'email_id',"");
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                $result = $this->common_model->getSingleRecordById(EMAILS,array('id' => $email_id));
                if($result){
                    /* Return Response */
                    $response = array();
                    $response['message']       = null_checker($result['message']);
                    $response['to_email']      = null_checker($result['to_email']);
                    $response['from_email']    = null_checker($result['from_email']);
                    $response['attachment']    = (!empty($result['attachment'])) ? base_url().$result['attachment'] : '';  
                    $response['added_date']    = null_checker($result['added_date']);
                    $return['status']          =   1; 
                    $return['response']        =   $response; 
                    $return['message']         =   'success';
                }else{
                    $return['status']  =   0; 
                    $return['message'] =   'Invalid Email Id';
                }
            }else{
                $return['status']  =   0; 
                $return['message'] =   INVALID_LOGIN_SESSION_KEY;
            }
        }
        $this->response($return);
    }

    /**
     * Function Name: delete_email
     * Description:   To Delete Email
     */
    function delete_email_post()
    {
        $return['code'] =   200;
        $return['response'] = new stdClass();
        $data = $this->input->post();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('email_id','Email ID','trim|required|integer');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $login_session_key = extract_value($data,'login_session_key',"");
            $email_id = extract_value($data,'email_id',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                $status = $this->common_model->deleteRecord(EMAILS,array('id' => $email_id));
                if($status){
                    $return['status']  =   1; 
                    $return['message'] =   'Email deleted successfully'; 
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


}


?>