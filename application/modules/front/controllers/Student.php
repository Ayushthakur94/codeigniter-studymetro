<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct() {
        parent::__construct();
        checkUserSession(array('2'));
        $this->uid = $this->session->userdata("user_id");
        $this->first_name = $this->session->userdata("first_name");
        $this->last_name = $this->session->userdata("last_name");
        $this->user_name = $this->first_name." ".$this->last_name;
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function getquote()
    {
        $data = array();
        $data['meta_title'] = 'Get Quote';
        $data['parent'] = 'quote';
        load_front_view('student/getquote', $data);
    }

    public function submitQuote()
    {
        $from_id = $this->uid;
        $to_id = ADMIN_ID;
        $data = $this->input->post();
        $this->form_validation->set_rules('quote','Quotation','trim|required');
        if($this->form_validation->run()==TRUE){
        	$user = getUserDetails();
        	$data['name']  = $user[0]['first_name']." ".$user[0]['last_name'];
        	$data['email'] = $user[0]['email'];
        	$data['phone'] = $user[0]['phone_number'];
            $data['added_date'] = datetime();
            $lid = $this->common_model->addRecords(QUOTATIONS,$data);
            if(!empty($lid)){
                $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$from_id));
                $from_email = $fromEmail['email'];
                $this->sendEmailToAdmin('User add a new quote','Quote',SUPPORT_EMAIL,$from_email);

                /* Send website notification to admin */
                send_notification('QUOTES',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_QUOTES);
                $this->session->set_flashdata('success','Your message has been sent successfully');
                redirect('student/getquote');
            }else{
                $this->session->set_flashdata('error', 'Failed please try again !!');
                redirect('student/getquote');
            }
        }else{
            $data['meta_title'] = 'Get Quote';
	        $data['parent']     = 'quote';
	        load_front_view('student/getquote', $data);
        }
    }

    public function portfolio()
    {
        $data = array();
        $data['meta_title'] = 'E-portfolio';
        $data['parent'] = 'portfolio';
        $data['subunique']= base_url().'user/view-portfolio?id='.encode($this->session->userdata('user_id'));
        $data['certifications'] = $this->common_model->getAllRecordsOrderById(CERTIFICATIONS,'id','DESC',array('user_id' => $this->uid));
        $data['education']      = $this->common_model->getAllRecordsOrderById(EDUCATION,'id','DESC',array('user_id' => $this->uid));
        $data['interests']      = $this->common_model->getAllRecordsOrderById(INTERESTS,'id','DESC',array('user_id' => $this->uid));
        $data['volunteers']     = $this->common_model->getAllRecordsOrderById(VOLUNTEERS,'id','DESC',array('user_id' => $this->uid));
        $where = array('user_id' => $this->uid);

        $data['eduProfileData'] = $this->common_model->getSingleRecordById(PORTFOLIO,$where);
        load_front_view('student/portfolio', $data);
    }

    public function my_applications()
    {
        $data = array();
        $data['meta_title']     = 'My Applications';
        $data['parent']         = 'my_applications';
        $data['applications']   = $this->common_model->getAllRecordsOrderById(APPLIED_PROGRAMS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('student/my_applications', $data);
    }

    public function saveEducation()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('school','School','trim|required');
            $this->form_validation->set_rules('days_atteend_from','Dates Attended From','trim|required');
            $this->form_validation->set_rules('days_atteend_to','Dates Attended To','trim|required');
            $this->form_validation->set_rules('degree','Degree','trim|required');
            $this->form_validation->set_rules('field_of_study','Field Of Study','trim|required');
            $this->form_validation->set_rules('grade','Grade','trim|required');
            $this->form_validation->set_rules('activities','Activities and Societies','trim|required');
            $this->form_validation->set_rules('edu_description','Description','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(EDUCATION,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Education successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'school'            => form_error('school'),
                    'days_atteend_from' => form_error('days_atteend_from'),
                    'days_atteend_to'   => form_error('days_atteend_to'),
                    'degree'            => form_error('degree'),
                    'field_of_study'    => form_error('field_of_study'),
                    'grade'             => form_error('grade'),
                    'activities'        => form_error('activities'),
                    'edu_description'   => form_error('edu_description')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function saveVolunteer()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('organisation','Organisation','trim|required');
            $this->form_validation->set_rules('role','Role','trim|required');
            $this->form_validation->set_rules('cause','Cause','trim|required');
            $this->form_validation->set_rules('vo_month','Month','trim|required');
            $this->form_validation->set_rules('vo_year','Year','trim|required');
            $this->form_validation->set_rules('vo_description','Description','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(VOLUNTEERS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Volunteer successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'organisation'  => form_error('organisation'),
                    'role'          => form_error('role'),
                    'cause'         => form_error('cause'),
                    'vo_month'      => form_error('vo_month'),
                    'vo_year'       => form_error('vo_year'),
                    'vo_description'=> form_error('vo_description')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function saveInterest()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('interests','Interests','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(INTERESTS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Interests successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'interests'  => form_error('interests'),
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function saveCertificate()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('certificate_name','Certificate Name','trim|required');
            $this->form_validation->set_rules('authority','Authority','trim|required');
            $this->form_validation->set_rules('license','License','trim|required');
            $this->form_validation->set_rules('certification_url','Certification URL','trim|required');
            $this->form_validation->set_rules('month','Month','trim|required');
            $this->form_validation->set_rules('year','Year','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id']    = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(CERTIFICATIONS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Certificate successfully added'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'certificate_name'              => form_error('certificate_name'),
                    'authority'         => form_error('authority'),
                    'license'           => form_error('license'),
                    'certification_url' => form_error('certification_url'),
                    'month'             => form_error('month'),
                    'year'              => form_error('year')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function deletePortfolio($table,$id)
    {
        $id = decode($id);
        if($this->common_model->deleteRecord($table,array('id' => $id))){
            $this->session->set_flashdata('success',ucwords($table).' deleted successfully');
        }else{
            $this->session->set_flashdata('error',GENERAL_ERROR);
        }
        redirect('student/portfolio');
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        checkUserSession(array('2'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function set_interview_date()
    {
        $user_id = $_POST['user_id'];
        $prgrm_id = $_POST['prgrm_id'];
        $status = $_POST['interview_date'];

        $updateData = array('interview_date'=>$status);
        $where = array('id'=>$prgrm_id);
        $request = $this->common_model->updateRecords('applied_programs',$updateData,$where);

        $to_id = ADMIN_ID;
        $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$to_id));
        $user_email = $userEmail['email'];

        $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
        $from_email = $userEmail['email'];
        $from_user_name = $userEmail['first_name'].' '.$userEmail['last_name'];
        
        $this->sendEmailToAdmin('Program interview date set on"'.$status.'" by "'.$from_user_name.'"','Program Interview Date',$user_email,$from_email);

        if($request==1)
        {
            /* Send website notification to admin */
            // send_notification('SET_INTERVIEW_DATE',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION);
            echo json_encode(array('type' => 'success', 'msg' => 'Interview Date set successfully'));
        }
        else
        {
            echo json_encode(array('type' => 'error', 'msg' => 'Unable to set interview Date'));
        }
    }

    public function my_assignments()
    {
        $user_id = $this->uid;
        $to_id = ADMIN_ID;

        $count = count($_POST);
        for($i=1;$i<=$count;$i++)
        {
            $this->form_validation->set_rules('answer_'.$i.'','Answer','required'); 
        }
        
        if($this->form_validation->run()==false)
        {   
            //print_r($_POST); die;
            $data = array();
            $data['meta_title']     = 'My Assignments';
            $data['parent']         = 'my_assignments';
            
            $data['questions'] = $this->common_model->getAllRecords(QUESTIONS);
            load_front_view('student/my_assignments', $data);
        }
        else
        { 
            $answerData = array_filter($_POST); 
            //print_r($answerData); die;

            foreach ($answerData as $key => $value)
            {
               $ques_id = explode('_',$key);

               $insertData = array('user_id'=>$user_id,'question_id'=>$ques_id[1],'answer'=>$value,'added_date'=>date('Y-m-d'));

               $request=$this->common_model->addRecords(ANSWERS,$insertData);
            }

            // $userEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$to_id));
            // $user_email = $userEmail['email'];

            $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
            $from_email = $userEmail['email'];
            $from_user_name = $userEmail['first_name'].' '.$userEmail['last_name'];
            
            $this->sendEmailToAdmin('Answers submitted by "'.$from_user_name.'"','Assignments',VISA_EMAIL,$from_email);

            if($request!='')
            {
                // send_notification('ASSIGNMENT',$user_id,$to_id,ADMIN_NOTIFICATION);
                $fromEmail = $this->common_model->getSingleRecordById(USER,array('id'=>$user_id));
                $from_email = $userEmail['email'];
                $from_user_name = $userEmail['first_name'].' '.$userEmail['last_name'];
                $this->sendEmailToAdmin('Answers submitted by "'.$from_user_name.'"','Assignments',VISA_EMAIL,$from_email);
                $this->session->set_flashdata('success', "Answers submitted successfully.");
                redirect('student/my-assignments');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to submit answers.");
                redirect('student/my-assignments');
            }
        }
    }

    public function add_personal_education()
    {
        $uid= $this->uid;
        $where = array('user_id'=>$uid);

        $this->form_validation->set_rules('name','','required');
        $this->form_validation->set_rules('mobile','','required');
        $this->form_validation->set_rules('location','','required');
        //$this->form_validation->set_rules('outside_india','','required');
        //$this->form_validation->set_rules('resume','','required');
        $this->form_validation->set_rules('high_qualification','','required');
        $this->form_validation->set_rules('course','','required');
        $this->form_validation->set_rules('specialization','','required');
        $this->form_validation->set_rules('university','','required');
        //$this->form_validation->set_rules('course_type','','required');
        $this->form_validation->set_rules('passing_year','','required');
        $this->form_validation->set_rules('skills','','required');
        $this->form_validation->set_rules('birthdate','','required');
        //$this->form_validation->set_rules('gender','','required');
        $this->form_validation->set_rules('marital_status','','required');
        $this->form_validation->set_rules('address','','required');
        $this->form_validation->set_rules('city','','required');
        
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title'] = 'E-portfolio';
            $data['parent'] = 'portfolio';
            $data['subunique']= base_url().'user/view-portfolio?id='.encode($this->session->userdata('user_id'));
            $data['certifications'] = $this->common_model->getAllRecordsOrderById(CERTIFICATIONS,'id','DESC',array('user_id' => $this->uid));
            $data['education']      = $this->common_model->getAllRecordsOrderById(EDUCATION,'id','DESC',array('user_id' => $this->uid));
            $data['interests']      = $this->common_model->getAllRecordsOrderById(INTERESTS,'id','DESC',array('user_id' => $this->uid));
            $data['volunteers']     = $this->common_model->getAllRecordsOrderById(VOLUNTEERS,'id','DESC',array('user_id' => $this->uid));

            $data['eduProfileData'] = $this->common_model->getSingleRecordById(PORTFOLIO,$where);
            //print_r($data['eduProfileData']); die;
            load_front_view('student/portfolio', $data);
        }
        else
        {    //print_r($_FILES); die;
             $config['file_name'] = $_FILES['resume']['name']; 
             $config['upload_path'] ='uploads/resume/'; 
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
             $resume = '';
       
          if (!$this->upload->do_upload('resume'))
           {
               $upload_data = array('msg' => $this->upload->display_errors());
           } 
          else 
              { 
                $upload_data = array('msg' => "Upload success!");
                
                $upload_data['upload_data'] = $this->upload->data();
                //print_r($upload_data['upload_data']['file_name']); die;
                $resume = 'uploads/resume/'.$upload_data['upload_data']['file_name'];
                //echo $resume; die;
              }
              
              if($_FILES['resume']['name']!='')
              {
                $eduData['resume']=$resume;
              }

              if(isset($_POST['outside_india']))
              {
                $outside = $_POST['outside_india'];
              }
              else
              {
                $outside = 0;
              }

            $eduData = array(
                            'user_id'=>$uid,
                            'name'=>$_POST['name'],
                            'mobile'=>$_POST['mobile'],
                            'location'=>$_POST['location'],
                            'outside_india'=>$outside,
                            'high_qualification'=>$_POST['high_qualification'],
                            'course'=>$_POST['course'],
                            'specialization'=>$_POST['specialization'],
                            'university'=>$_POST['university'],
                            'course_type'=>$_POST['course_type'],
                            'passing_year'=>$_POST['passing_year'],
                            'skills'=>$_POST['skills'],
                            'birthdate'=>$_POST['birthdate'],
                            'gender'=>$_POST['gender'],
                            'marital_status'=>$_POST['marital_status'],
                            'address'=>$_POST['address'],
                            'city'=>$_POST['city'],
                            'status'=>1
                            );
            
           // echo "<pre>"; print_r($_POST); print_r($eduData); die;

            $getEduData = $this->common_model->getAllRecordsById(PORTFOLIO,$where);
            if(empty($getEduData))
            {
                $eduData['created_date']=date('Y-m-d');
                $request = $this->common_model->addRecords(PORTFOLIO,$eduData);
            }
            else
            {
                $eduData['modify_date']=date('Y-m-d');
                $request = $this->common_model->updateRecords(PORTFOLIO,$eduData,$where);
            }
            

            if($request)
            {
                $this->session->set_flashdata('success', "Education profile updated successfully.");
                redirect('student/Personal-Education');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to update Education Profile.");
                redirect('student/Personal-Education');
            }

        }
    }

    public function changeAppStatus()
    {
        
        $updateData = array('program_status'=>$_POST['prgrm_status']);
        $where = array('id'=>$_POST['prgrm_id']);
        $request = $this->common_model->updateRecords('applied_programs',$updateData,$where);
        $user_id = $_POST['user_id'];
        $prgrm_id = $_POST['prgrm_id'];

        $userEmail = $this->common_model->getUserEmail($user_id,$prgrm_id);
        $user_email = $userEmail['email'];
        $status = $_POST['prgrm_status'];
        
        $this->sendEmailToAdmin('Program status changed to"'.$status.'"','Application Program Status',$user_email,SUPPORT_EMAIL);

        if($request==1)
        {
            echo json_encode(array('type' => 'success', 'msg' => 'Program status changed successfully'));
        }
        else
        {
            echo json_encode(array('type' => 'error', 'msg' => 'Unable to change Program status'));
        }
    }
    
    
}

?>