<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Controller {

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

    public function viewDocuments($id) {
        is_logged_in($this->url.'/viewDocuments');
        $data = array();
        $data['meta_title'] = 'View Documents';
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
        $data['users'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(DOCUMENTS, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['users']) > 0) {
            /* Pagination records */
            $query_string = '';
            $url = get_cms_url().$this->url.'/view-all';
            if(isset($_GET['s']) && !empty($_GET['s'])){
                $url .= '?s='.$_GET['s'];
                $query_string = 'yes';
            }
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(DOCUMENTS, (isset($_GET['s'])) ? array('username', 'email') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right','',$query_string);
        }

        $data['documents']  = $this->common_model->getAllRecordsOrderById(DOCUMENTS,'id','DESC',array('user_id' =>$id));

        $data['users'] = $this->common_model->getAllRecordsOrderById(USER,'id','DESC',array('id' =>$id));
        //print_r($data['users']); die;

        $data['user_name'] = $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'];

        /* Load admin view */
        load_admin_view('documents/view-documents', $data);
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        //checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

} ?>