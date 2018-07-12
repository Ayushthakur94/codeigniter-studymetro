<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This Class used as REST API for user
 * @package   CodeIgniter
 * @category  Controller
 * @author    MobiwebTech Team
 */

class User extends REST_Controller {

	function __construct() 
    {
        parent::__construct();
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
     * Function Name: upload_documents
     * Description:   To Upload User Documents
     */
    function upload_documents_post()
    {
        $data = $this->input->post();
        $return['code'] = 200;
        $return['response'] = new stdClass();
        /* Allowed document types */
        $documents_types = implode(",", documents());
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
    	$this->form_validation->set_rules('document','Document','trim|required|in_list['.$documents_types.']');
    	if (empty($_FILES['file']['name']))
        {
            $this->form_validation->set_rules('file', 'Document File', 'required');
        }
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
	            $document = imgUpload('file','documents','png|jpg|tif|gif|pdf');
	            if(isset($document['error'])){
	            	$return['status']         =   0; 
		            $return['message']        =   strip_tags($document['error']);
	            }else{
	            	$data_arr = array();
	            	$data_arr['document']   = extract_value($data,'document',"");
	            	$data_arr['file']       = base_url().'uploads/documents/'.$document['upload_data']['file_name'];
	            	$data_arr['user_id']    = $check_login_session_key['id'];
                	$data_arr['added_date'] = datetime();
                	$lid = $this->common_model->addRecords(DOCUMENTS, $data_arr);
                	if($lid){

                	   /* Send email to admin */
	                    $admin_message = '';
	                    $admin_message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
	                    $admin_message .= "<br><br> Hello, <br/><br/>";
	                    $admin_message .=  $check_login_session_key['username']." has uploaded documents <br/><br/>";
	                    send_mail($admin_message, 'Student Uploaded Documents' ,SUPPORT_EMAIL,SUPPORT_EMAIL);

	                    /* Send website notification to admin */
	                    $notify_url = 'admin/documents/viewDocuments/'.$check_login_session_key['id'];
	                    send_notification('UPLOAD_DOCUMENT',$check_login_session_key['id'],ADMIN_ID,ADMIN_NOTIFICATION,'',$notify_url);

                        $return['status']  =   1; 
                        $return['message'] =   'Document uploaded successfully';
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
     * Function Name: get_documents
     * Description:   To Get User Documents
     */
    function get_documents_post()
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
            $document_id = extract_value($data,'document_id',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
               if($document_id){ // Get single document details
                    $result = $this->common_model->getSingleRecordById(DOCUMENTS,array('id' => $document_id));
                    if($result){
                        /* Return Response */
                        $response = array();
                        $response['document_id'] = null_checker($result['id']);
                        $response['type']        = null_checker($result['document']);
                        $response['uploaded_date']  = null_checker($result['added_date']);
                        $response['document_url']= null_checker($result['file']);
                        $return['status']        =   1; 
                        $return['response']      =   $response; 
                        $return['message']       =   'success';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   'Invalid document id';
                    }
               }else{ // Get user documents list
                    $page_no  = extract_value($data,'page_no',1);
                    $offset   = get_offsets($page_no);
                    $result = $this->common_model->getAllwhere(DOCUMENTS,array('user_id' => $check_login_session_key['id']),'id','DESC','all',10,$offset);
                    if($result){
                        /* Return Response */
                        $response = array();

                        /* Get total records */
                        $total_requested = (int) $page_no * 10;
                        $total_records   = getAllCount(DOCUMENTS,array('user_id' => $check_login_session_key['id']));
                        if($total_records > $total_requested){
                            $has_next = TRUE;
                        }else{
                            $has_next = FALSE;
                        }
                        
                        foreach($result as $r)
                        {
                          $row['document_id'] = null_checker($r['id']);  
                          $row['type']        = null_checker($r['document']);  
                          $row['uploaded_date']  = null_checker($r['added_date']);
                          $row['document_url']= null_checker($r['file']);  
                          array_push($response, $row);
                        }
                        $return['status']    =   1; 
                        $return['response']  =   $response; 
                        $return['has_next']  =   $has_next; 
                        $return['message']   =   'success';
                    }else{
                        $return['status']  =   0; 
                        $return['message'] =   'Please Add Document';
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
     * Function Name: delete_document
     * Description:   To Delete User Document
     */
    function delete_document_post()
    {
        $return['code'] =   200;
        $return['response'] = new stdClass();
        $data = $this->input->post();
        $this->form_validation->set_rules('login_session_key', 'Login Session Key', 'trim|required');
        $this->form_validation->set_rules('document_id','Document ID','trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $error = $this->form_validation->rest_first_error_string(); 
            $return['status']         =   0; 
            $return['message']        =   $error; 
        }
        else
        {   
            $login_session_key = extract_value($data,'login_session_key',"");
            $document_id = extract_value($data,'document_id',"");

            /* To check user login session key */
            $check_login_session_key = validate_login_session_key($login_session_key);
            if($check_login_session_key){
                $status = $this->common_model->deleteRecord(DOCUMENTS,array('id' => $document_id));
                if($status){
                    $return['status']  =   1; 
                    $return['message'] =   'Document deleted successfully'; 
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

/* End of file User.php */
/* Location: ./application/modules/api/controllers/User.php */

?>