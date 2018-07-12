<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

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

    public function viewComments($id) {
        is_logged_in($this->url.'/viewComments');
        $data = array();
        $data['meta_title'] = 'View Comments';
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
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(COMMENTS, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(COMMENTS, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
        }

        $where = array('to_user_id' =>$id);
        $or_where = array('from_user_id' =>$id);
        $data['comments']  = $this->common_model->getComments(COMMENTS,'id','ASC',$where,$or_where);

        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$id));
        //print_r($data['users']); die;

        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

        /* Load admin view */
        load_admin_view('comments/view-comments', $data);
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        //checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function addComment($id)
    {   error_reporting(0);
        $sess_data = $this->session->userdata('admin_session_data');
        $from_id = $sess_data['user_id'];
        if($id!=''){$to_id = $id;}else{$to_id = $_POST['to_id'];}
        

        $this->form_validation->set_rules('comment_text','Message','required');
        if($this->form_validation->run()==true)
        {
            $message = $_POST['comment_text'];
            
            $insertData = array('message'=>$message,'from_user_id'=>$from_id,'to_user_id'=>$to_id,'comment_date'=>date('Y-m-d'));

            

            $request=$this->common_model->addRecords(COMMENTS,$insertData);
            if($request)
            {
                $table_name = getNotifyHistoryTable($to_id);
                send_notification('COMMENT',$from_id,$to_id,$table_name);
                $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$to_id));
                $user_email = $userEmail['email'];

                $this->sendEmailToAdmin('Admin send a comment to you','Comment',$user_email,SUPPORT_EMAIL);
                $this->session->set_flashdata('success', "Comment added succefully");
                redirect(base_url().'admin/comments/viewComments/'.$to_id);
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add Comment.");
                redirect(base_url().'admin/comments/viewComments/'.$to_id);
            }
        }
        else
        {
            $where = array('to_user_id' =>$to_id);
            $or_where = array('from_user_id' =>$to_id);
            $data['comments']  = $this->common_model->getComments(COMMENTS,'id','ASC',$where,$or_where);
            
            $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$to_id));

            $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];
            load_admin_view('comments/view-comments', $data);
        }
    }

} ?>