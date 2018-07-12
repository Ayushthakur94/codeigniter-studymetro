<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    /**
	* Index of users controller
    */
    public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
    * Add new user
    * @param $_POST
    */
    public function addNew() {
        is_logged_in($this->url.'/add-new');
        $data = array();
        $data['meta_title'] = 'Add New';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_user');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);

        if($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__verify_user_email');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|integer');
            $this->form_validation->set_rules('profile_picture', 'Profile Picture', 'callback__verify_user_image');

            if($this->form_validation->run() == true){
                $addData = array(
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'phone_number' => $_POST['phone_number'],
                    'is_email_verified' => $_POST['is_email_verified'],
                    'is_phone_verified' => $_POST['is_phone_verified'],
                    'user_type' => $_POST['user_type'],
                    'user_status' => ($_POST['is_email_verified'] == 1 && $_POST['is_phone_verified'] == 1) ? 1 : 0,
                    'online_status' => 0,
                    'is_blocked' => $_POST['is_blocked'],
                    'date_created' => date('Y-m-d H:i:s')
                );

                /* Add record */
                $userId = $this->common_model->addRecords(USER, $addData);
                if($userId) {
                    /* Adding username on users entity */
                    $username = strtolower(str_replace(' ', '-', $_POST['first_name']).str_replace(' ', '-', $_POST['last_name']).$userId);
                    $this->common_model->updateRecords(USER, array('username' => $username), array('id' => $userId));

                    /* Upload profile picture */
                    if(!empty($_FILES['profile_picture']['name'])) {
                        $config['file_name']     = time().$_FILES['profile_picture']['name']; 
                        $config['upload_path']   = './uploads/users';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size']      = '2474898';
                        $config['max_width']     = '100024';
                        $config['max_height']    = '768000';
                        $config['remove_spaces'] = true;
                        $config['field_name']     = 'profile_picture';

                        $imageData = upload_file($_FILES['profile_picture'], $config);
                        if(isset($imageData) && $imageData['message'] == 'success') {
                            $profilePic = $imageData['file_path'];
                        }
                    } else {
                        $profilePic = '';
                    }

                    /* Add meta data */
                    $meta = array(
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'profile_picture' => $profilePic
                    );

                    /* Send Email */
                    send_mail(sprintf(ACCOUNT_CREATED_MESSAGE, ucfirst($_POST['first_name'].' '.$_POST['last_name']), $_POST['email'], $_POST['password'], get_option('public_website_url')), ACCOUNT_CREATED, $_POST['email']);

                    foreach($meta as $key => $val) {
                        update_user_meta($userId, $key, $val);
                    }

                    $this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'User'));
                    redirect($this->url.'/view-all');
                } else {
                    $this->session->set_flashdata('general_error', GENERAL_ERROR);
                    redirect($this->url.'/add-new');
                }
            }
        }
        /* Load admin view */
        load_admin_view('users/add-new-user', $data);
    }

    /**
    * View all users
    */
    public function viewAll() {
        is_logged_in($this->url.'/view-all');
        $data = array();
        $data['meta_title'] = 'View All';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        //print_r($data['user_info']); die;
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
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(USER, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(USER, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
        }

        

        $data['universities'] = $this->common_model->getAllRecords(UNIVERSITIES);

        //print_r($data['assign_univ']); die;
        /* Load admin view */
        load_admin_view('users/view-all-users', $data);
    }

    /**
    * View History
    * @param $_POST
    */
    public function viewHistory($id) {
        is_logged_in($this->url.'/viewHistory');
        $data = array();
        $data['meta_title'] = 'View Histoty';
        $data['small_text'] = 'User';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_users');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        // print_r($data['user_info']); die;
        /* Fetch Data */

        $data['to_id']=$id;
        
        $data['documents']  = $this->common_model->getAllRecordsOrderById(DOCUMENTS,'id','DESC',array('user_id' =>$id));

        $where = array('to_user_id' =>$id);
        $or_where = array('from_user_id' =>$id);
        $data['comments']  = $this->common_model->getComments(COMMENTS,'id','ASC',$where,$or_where);

        $data['applications']   = $this->common_model->getAllRecordsOrderById(APPLIED_PROGRAMS,'id','DESC',array('user_id' =>$id));

        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$id));
        //print_r($data['users']); die;

        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

        /* Load admin view */
        load_admin_view('users/view-history', $data);
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        //checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function assignUniversity()
    {
        is_logged_in($this->url.'/view-all');
        $user_id = $_POST['user_id'];
        $univ_name = implode(',',json_decode($_POST['univ_id']));
        $where = array('id'=>$user_id);
        
        $updateData = array('university_id'=>$univ_name);
        //print_r($addData); die;
        $request = $this->common_model->updateRecords(USER,$updateData,$where);

        $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
        $user_email = $userEmail['email'];
        
        $this->sendEmailToAdmin('Admin has assigned you university. Please check on your dashboard','Assigned University',$user_email,SUPPORT_EMAIL);

        if($request==1)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function getAssignUniversity()
    {
        $user_id = $_POST['user_id'];
        $assign_univ = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
        $university   = $this->common_model->getAllRecords(UNIVERSITIES);
        $html="";
        $html.="<select multiple='' name='univ_name' id='univ_name' class='chosen-select form-control'>";
        $univ = explode(',',$assign_univ['university_id']);
        $select = '';
        foreach($university as $u)
        {   
            for($j=0;$j<count($univ);$j++)
            {
                if($u['id']==$univ[$j])
                {
                    $select = 'selected';
                    $html.="<option value=".$u['id']." ".$select." >".$u['name']."</option>";
                }
                
            }

            $html.="<option value=".$u['id']." >".$u['name']."</option>";
        }
        $html.="</select>";
        echo $html;

    }

    public function change_app_status()
    {
        is_logged_in($this->url.'/view-all');
        
        $updateData = array('program_status'=>$_POST['prgrm_status']);
        $where = array('id'=>$_POST['prgrm_id']);
        $request = $this->common_model->updateRecords('applied_programs',$updateData,$where);
        $user_id = $_POST['user_id'];
        $prgrm_id = $_POST['prgrm_id'];

        $userEmail = $this->common_model->getUserEmail($user_id,$prgrm_id);
        $user_email = $userEmail['email'];
        $status = $_POST['prgrm_status'];
        
        $this->sendEmailToAdmin('Program status changed to"'.$status.'"','Application Program Status',$user_email,SUPPORT_EMAIL);

        echo $request;
    }

    

    /**
    * Edit User
    * @param $_POST
    */
    public function edit() {
        is_logged_in($this->url.'/view-histoty');
        $userId = $this->uri->segment(4);
        if($userId) {
            $data = array();
            $data['meta_title'] = 'Edit';
            $data['small_text'] = 'User';
            $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_user');
            $data['session_data'] = admin_session_data();
            $data['user_info'] = get_user($data['session_data']['user_id']);
            $data['user'] = $this->common_model->getSingleRecordById(USER, array('id' => $userId));

            if($this->input->post('submit')) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__verify_edit_email');
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('profile_picture', 'Profile Picture', 'callback__verify_user_image');

                /* Check for change password validation */
                if(!empty($_POST['password']) || !empty($_POST['confirm_password'])) {
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
                    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
                }

                if($this->form_validation->run() == true){
                    unset($_POST['submit']);
                    /* Updating user data */
                    $updateArr = array(
                        'email' => $_POST['email'],
                        'is_email_verified' => $_POST['is_email_verified'],
                        'is_phone_verified' => $_POST['is_phone_verified'],
                        'user_type' => $_POST['user_type'],
                        'user_status' => ($_POST['is_email_verified'] == 1 && $_POST['is_phone_verified'] == 1) ? 1 : 0,
                        'is_blocked' => $_POST['is_blocked']
                    );

                    /* Check for password */
                    if(!empty($_POST['password'])) {
                        $updateArr['password'] = md5($_POST['password']);

                        /* Send email to user for password change */
                        $message = sprintf(ADMIN_PASSWORD_CHANGE, ucfirst($_POST['first_name']), ucfirst($_POST['last_name']), $_POST['password']);
                        $subject = 'Password change by site admin';
                        send_mail($message, $subject, $_POST['email']);
                    }

                    $this->common_model->updateRecords(USER, $updateArr, array('id' => $userId));
                    
                    /* Upload profile picture */
                    if(!empty($_FILES['profile_picture']['name'])) {
                        $config['file_name']     = time().$_FILES['profile_picture']['name']; 
                        $config['upload_path']   = './uploads/users';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size']      = '2474898';
                        $config['max_width']     = '100024';
                        $config['max_height']    = '768000';
                        $config['remove_spaces'] = true;
                        $config['field_name']     = 'profile_picture';

                        $imageData = upload_file($_FILES['profile_picture'], $config);
                        if(isset($imageData) && $imageData['message'] == 'success') {
                            $profilePic = $imageData['file_path'];
                        }
                    } else {
                        $profilePic = $_POST['old_profile_picture'];
                    }

                    /* Updating usermeta */
                    $meta = array(
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'profile_picture' => $profilePic
                    );

                    foreach($meta as $key => $val) {
                        update_user_meta($userId, $key, $val);
                    }

                    $this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'User'));
                    redirect($this->url.'/view-all');
                } 
            }

            /* Load admin view */
            load_admin_view('users/edit-user', $data);
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * Delete user
    * @param $userId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $userId = $this->uri->segment(4);
        if($userId) {
            /* Delete Records */
            $this->common_model->deleteRecords(USER, 'id', $userId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'User'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * u=user profile image callback function
    */
    function _verify_user_image($data) {
        if(!empty($_FILES['profile_picture']['name'])) {
            $valid_extension = array('png', 'jpg', 'jpeg');
            $size = $_FILES['profile_picture']['size'];
            $type = $_FILES['profile_picture']['type'];
            $type = explode('/', $type);

            /* Check for file type */
            if(!in_array($type[1], $valid_extension)) {
                $this->form_validation->set_message('_verify_user_image', IMG_ERROR);
                return FALSE;
            }
            /* Check for file size */
            if($size > 2097152) {
                $this->form_validation->set_message('_verify_user_image', IMG_SIZE_ERROR_FOR_2);
                return FALSE;
            }
        }
    }

    /**
    * Check for user existing email address
    */
    function _verify_user_email($data) {
        $checkEmail = $this->common_model->getRecordCount(USER, array('email' => $_POST['email']));
        if($checkEmail > 0) {
            $this->form_validation->set_message('_verify_user_email', EMAIL_EXISTS);
            return FALSE;
        }
    }

    /**
    * Check for edit user existing email address
    */
    function _verify_edit_email($data) {
        $userId = $this->uri->segment(4);
        $checkEmail = $this->common_model->getCustomSqlCount('SELECT `email` FROM '.USER.' WHERE `id` != '.$userId.' AND `email` = "'.$_POST['email'].'"');
        if($checkEmail > 0) {
            $this->form_validation->set_message('_verify_edit_email', EMAIL_EXISTS);
            return FALSE;
        }
    }

    public function doUploadInvoices(){
        $data = $this->input->post();
        //print_r($data); die;
        
        //if(!empty($_FILES['file']['name'])){
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

              $addData = array('user_id'=>$_POST['invoice_user_id'],'file'=>$file,'status'=>1,'remark'=>$_POST['remark'],'added_date'=>datetime());
                $req = $this->common_model->addRecords(INVOICES, $addData);
                $this->session->set_flashdata('success', sprintf(ITEM_ADD_SUCCESS, 'Invoice'));
                
            if($req)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    
}