<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
        $data['session_data'] = admin_session_data();
    	$data['user_info'] = get_user($data['session_data']['user_id']);
    	$user_id = $data['user_info']['user_id'];
    }

	/**
	* Documents index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    public function viewInvoices($id) {
        is_logged_in($this->url.'/viewInvoices');
        $data = array();
        $data['meta_title'] = 'View Invoices';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        // print_r($data['user_info']); die;
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
        $data['users'] = '';
        $data['pagination'] = '';
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(INVOICES, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(INVOICES, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
        }

        $data['details']  = $this->common_model->getAllRecordsOrderById(INVOICES,'id','DESC',array('user_id' =>$id));

        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$id));
        //print_r($data['users']); die;

        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

        /* Load admin view */
        load_admin_view('invoices/view-invoices', $data);
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        //checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function doUploadInvoices($id)
    {   error_reporting(0);
        $this->form_validation->set_rules('remark','Remark','required');
        if($_FILES['file']['name']=='')
        {
            $this->form_validation->set_rules('file','File','required');
        }
        if($this->form_validation->run()==true)
        {
        
             $config['file_name'] = $_FILES['file']['name']; 
             $config['upload_path'] ='uploads/invoices/'; 
             //$config['allowed_types'] = 'png|jpeg|jpg';
             $config['max_size']      = '10000000';
             $config['max_width']     = '100024';
             $config['max_height']    = '768000';
             $config['remove_spaces'] = true;
             $config['encrypt_name'] = TRUE;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
             $this->upload->set_allowed_types('*');
             $upload_data['upload_data'] = '';
             $file = '';
       
          if (!$this->upload->do_upload('file'))
           {
               $upload_data = array('msg' => $this->upload->display_errors());
           } 
          else 
              { 
                $upload_data = array('msg' => "Upload success!");
                
                $upload_data['upload_data'] = $this->upload->data();
                //print_r($data['upload_data']['file_name']); die;
                $file = 'uploads/invoices/'.$upload_data['upload_data']['file_name'];
                //echo $file; die;
                $data['file'] = $file;
              }

            $addData = array('user_id'=>$id,'file'=>$file,'status'=>1,'remark'=>$_POST['remark'],'added_date'=>datetime());
            $req = $this->common_model->addRecords(INVOICES, $addData);
            if($req!='')    
            {
                $this->session->set_flashdata('success','Invoice Uploaded Successfully.');
                redirect('admin/invoices/doUploadInvoices/'.$id);
            }
            else
            {
                $this->session->set_flashdata('error','Unable to upload invoice.');
                redirect('admin/invoices/doUploadInvoices/'.$id);
            }
        }
        else
        {
            $data = array();
            $data['meta_title'] = 'View Invoices';
            $data['small_text'] = 'User';
            $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
            $data['session_data'] = admin_session_data();
            $data['user_info'] = get_user($data['session_data']['user_id']);
            // print_r($data['user_info']); die;
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
            $data['users'] = '';
            $data['pagination'] = '';
            $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(INVOICES, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
            if(count($data['users']) > 0) {
                /* Pagination records */
                $query_string = '';
                $url = get_cms_url().$this->url.'/view-all';
                if(isset($_GET['s']) && !empty($_GET['s'])){
                    $url .= '?s='.$_GET['s'];
                    $query_string = 'yes';
                }
                $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(INVOICES, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
                $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
            }

            $data['details']  = $this->common_model->getAllRecordsOrderById(INVOICES,'id','DESC',array('user_id' =>$id));

            $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$id));
            //print_r($data['users']); die;

            $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

            /* Load admin view */
            load_admin_view('invoices/view-invoices', $data);
        }
                
    }
        

} ?>