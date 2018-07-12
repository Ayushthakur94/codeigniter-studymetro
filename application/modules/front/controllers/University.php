<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class University extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->uid = $this->session->userdata("user_id");
        $this->first_name = $this->session->userdata("first_name");
        $this->last_name = $this->session->userdata("last_name");
        $this->user_name = $this->first_name." ".$this->last_name;
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function details($id)
    {
    	$uid = $id;
        $data = array();
        $data['details']    = $this->common_model->getSingleRecordById(UNIVERSITIES,array('id' => $uid));
    	$data['programs']   = getProgramsBy('university_id',$uid);
        $data['meta_title'] = $data['details']['meta_title'];
        $data['meta_description'] = $data['details']['meta_descprition'];
        $data['meta_keywords'] = $data['details']['meta_keywords'];
        load_front_view('pages/university_detail', $data);
    }

    public function profile_types()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'profile_types';
        load_front_view('university/profile_types', $data);
    }

    public function saveProfileTypes()
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

    public function post_grad()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'post_grad';
        load_front_view('university/post_grad', $data);
    }

    public function mba()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'mba';
        load_front_view('university/mba', $data);
    }

    public function short_term()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'short_term';
        load_front_view('university/short_term', $data);
    }

    public function online()
    {
        $data = array();
        $data['meta_title'] = 'Edit Profile Types';
        $data['parent']     = 'profile_types';
        $data['child']      = 'online';
        load_front_view('university/online', $data);
    }

    public function international_partnerships()
    {
        $data = array();
        $data['details'] = $this->common_model->getAllRecordsById(INTERNATIONAL,array('university_id' => $this->uid));
        $data['meta_title'] = 'International Partnerships';
        $data['parent']     = 'international_partnerships';
        load_front_view('university/international_partnerships', $data);
    }

    public function saveInternationalPartnership()
    {
        $result = $this->common_model->getSingleRecordById(INTERNATIONAL,array('university_id' => $this->uid));
        $data = $this->input->post();
        if(isset($data['country']) && !empty($data['country'])){
            $data['country'] = serialize($data['country']);
        }
        if(isset($data['programs']) && !empty($data['programs'])){
            $data['programs'] = serialize($data['programs']);
        }
        if(isset($data['top_programs']) && !empty($data['top_programs'])){
            $data['top_programs'] = serialize($data['top_programs']);
        }
        if(isset($data['top_degrees']) && !empty($data['top_degrees'])){
            $data['top_degrees'] = serialize($data['top_degrees']);
        }
        if(empty($result)){
            $data['university_id'] = $this->uid;
            $data['added_date']    = datetime();
            $lid = $this->common_model->addRecords(INTERNATIONAL,$data);
            if(!empty($lid)){
                $this->session->set_flashdata('success','Record saved successfully');
            }else{
                $this->session->set_flashdata('error','Failed please try again !!');
            }
        }else{
            $this->common_model->updateRecords(INTERNATIONAL,$data,array('university_id' => $this->uid));
            $this->session->set_flashdata('success','Record update successfully');
        }
        redirect('university/international_partnerships');
    }

    public function locations()
    {
        $data = array();
        $data['meta_title'] = 'Locations';
        $data['parent']     = 'locations';
        $data['locations']  = $this->common_model->getAllRecordsOrderById(LOCATIONS,'id','DESC',array('user_id' => $this->uid));
        load_front_view('university/locations', $data);
    }

    public function addlocations()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('profile_type','Profile Type','trim|required');
            $this->form_validation->set_rules('campus_name','Campus Name','trim|required');
            $this->form_validation->set_rules('address','Address','trim|required');
            $this->form_validation->set_rules('city_location','City/Location','trim|required');
            $this->form_validation->set_rules('website','Website','trim|required');
            if($this->form_validation->run()==TRUE){
                $data = $this->input->post();
                $data['user_id'] = $this->uid;
                $data['added_date'] = datetime();
                $lid = $this->common_model->addRecords(LOCATIONS,$data);
                if(!empty($lid)){
                    echo json_encode(array('type' => 'success', 'msg' => 'Location added successfully'));exit;
                }else{
                    echo json_encode(array('type' => 'failed', 'msg' => GENERAL_ERROR));exit;
                }
            }else{
                $error = array(
                    'profile_type'      => form_error('profile_type'),
                    'campus_name'       => form_error('campus_name'),
                    'address'           => form_error('address'),
                    'city_location'     => form_error('city_location'),
                    'website'           => form_error('website'),
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function deleteLocation($id)
    {
        $id = decode($id);
        if($this->common_model->deleteRecord(LOCATIONS,array('id' => $id))){
            $this->session->set_flashdata('success','Location deleted successfully');
        }else{
            $this->session->set_flashdata('error','Failed please try again !!');
        }
        redirect('university/locations');
    }

    public function sendEmailToAdmin($message,$subject,$from="")
    {
        checkUserSession(array('5'));
        $uid = $this->session->userdata("user_id");
        $email = $this->common_model->getSingleRecordById('users',array('id'=>$uid));
        $user_email = $email['email'];
        send_mail($message, $subject, $user_email,$from="");
    }

    public function university_dashboard()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'University Dashboard';
        $data['parent']         = 'university_dashboard';
        $uid = $this->uid;
        $data['university']   = $this->common_model->getAllRecords(UNIVERSITIES);
        $data['assign_univ']   = $this->common_model->getAllRecordsById(USER,array('id'=>$uid));
        
        load_front_view('university/university_dashboard', $data);
    }

    public function updateUniversityData($id)
    {
        $data = $this->input->post();

        $this->form_validation->set_rules('name', 'University Name', 'trim|required');
        $this->form_validation->set_rules('founded', 'University Founded Year', 'trim|required|numeric|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('location', 'University Location', 'trim|required');
        $this->form_validation->set_rules('address', 'University Address', 'trim|required');
        $this->form_validation->set_rules('content', 'University Content', 'trim|required');

        if($this->form_validation->run()==TRUE){
            //print_r($data); die;
            if($data['founded'] > date('Y-m-d')){
                echo json_encode(array('type' => 'validation_err','msg' => array('Foundation year should be less than or equals to '.date('Y'))));die;
            }
            if(!empty($_FILES['logo']['name'])){
                $logo = imgUpload('logo','university','png');
                if(isset($logo['error'])){
                    echo json_encode(array('type' => 'validation_err','msg' => array("University logo - ".strip_tags($logo['error'],'<br>'))));die;
                }else{
                    $data['logo'] = $logo['upload_data']['file_name'];
                }
            }
            if(!empty($_FILES['image']['name'])){
                $image = imgUpload('image','university','jpg|jpeg|gif|png');
                if(isset($image['error'])){
                    echo json_encode(array('type' => 'validation_err','msg' => array("University image - ".strip_tags($image['error'],'<br>'))));die;
                }else{
                    $data['image'] = $image['upload_data']['file_name'];
                }
            }
            
            $data['quotes_title'] = json_encode($data['quotes_title']);
            $data['quotes_content'] = json_encode($data['quotes_content']);
            if($this->common_model->updateRecords(UNIVERSITIES, $data, array('id' => $id))) {

                /* Send website notification to admin */
                $noti_url = 'admin/university/edit/'.$id;
                send_notification('UPDATE_UNIVERSITY',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',$noti_url);

                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];
                $this->sendEmailToAdmin($user_name.' updated university data','university updation',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "University updated successfully");
                redirect('university/university-dashboard');
            } else {
               $this->session->set_flashdata('error', "Unable to update University.");
                redirect('university/university-dashboard');
            }
        }
        else
        {
            $data = array();
            $data['meta_title']     = 'Edit University';
            $data['parent']         = 'university_dashboard';
            $uid = $this->uid;
            $data['details'] = $this->common_model->getSingleRecordById(UNIVERSITIES, array('id' => $id));
            load_front_view('university/edit_university', $data);
        }
    }

    public function my_invoices()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'My Invoices';
        $data['parent']         = 'my_invoices';
        $uid = $this->uid;
    
        $data['details']   = $this->common_model->getAllRecordsById(INVOICES,array('user_id'=>$uid));
        load_front_view('university/my_invoices', $data);
    }

    public function my_programs()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'My Programs';
        $data['parent']         = 'my_programs';
        $uid = $this->uid;
    
        $data['assign_univ']   = $this->common_model->getAllRecordsById(USER,array('id'=>$uid));

        foreach ($data['assign_univ'] as $a) { 
            $univ = explode(',',$a['university_id']);
            for($j=0;$j<count($univ);$j++){
                $univ[$j];
                $data['details'][] = $this->common_model->getAllRecordsById(PROGRAMS,array('university_id'=>$univ[$j]));
            } 

        }
        //echo "<pre>"; print_r($data['details']); die;
        load_front_view('university/my_programs', $data);
    }

    public function delete_program($id)
    {
        $request = $this->common_model->deleteRecord(PROGRAMS,array('id'=>$id));
        if($request)
        {
            $this->session->set_flashdata('success', "Program deleted successfully");
                redirect('university/my-programs');
        }
        else
        {
            $this->session->set_flashdata('error', "Unable to delete Program.");
                redirect('university/my-programs');
        }
    }

    public function add_new_program()
    {
        checkUserSession(array('5'));
        $this->form_validation->set_rules('program_name','Program Name','required');
        $this->form_validation->set_rules('location','Program Name','required');
        $this->form_validation->set_rules('country','Program Name','required');
        $this->form_validation->set_rules('university_id','Program Name','required');
        $this->form_validation->set_rules('course_type','Program Name','required');
        $this->form_validation->set_rules('application_fee','Program Name','required');
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Add Programs';
            $data['parent']         = 'my_programs';
            $uid = $this->uid;
            
            load_front_view('university/add_new_program', $data);
        }
        else
        {
            $addData = $this->input->post();
            $data['added_date'] = datetime();
            $request = $this->common_model->addRecords(PROGRAMS,$addData);
            if($request!='')
            {
                /* Send website notification to admin */
                $noti_url = 'admin/programs/edit/'.$request;
                send_notification('ADD_PROGRAM',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',$noti_url);

                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];
                $this->sendEmailToAdmin($user_name.' add new program','new program new program',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Program added successfully");
                    redirect('university/my-programs');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add Program.");
                    redirect('university/my-programs');
            }
        }
        
    }

    public function edit_program($id)
    {
        checkUserSession(array('5'));
        $this->form_validation->set_rules('program_name','Program Name','required');
        $this->form_validation->set_rules('location','Program Name','required');
        $this->form_validation->set_rules('country','Program Name','required');
        $this->form_validation->set_rules('university_id','Program Name','required');
        $this->form_validation->set_rules('course_type','Program Name','required');
        $this->form_validation->set_rules('application_fee','Program Name','required');
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Edit Programs';
            $data['parent']         = 'my_programs';
            $uid = $this->uid;
            $data['details'] = $this->common_model->getSingleRecordById(PROGRAMS,array('id'=>$id));
            $data['universities']  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $data['details']['country']));
            load_front_view('university/edit_program', $data);
        }
        else
        {
            $updateData = $this->input->post();
            $data['added_date'] = datetime();
            $request = $this->common_model->updateRecords(PROGRAMS,$updateData,array('id'=>$id));

            if($request)
            {
                /* Send website notification to admin */
                $noti_url = 'admin/programs/edit/'.$id;
                send_notification('UPDATE_PROGRAM',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',$noti_url);

                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];
                $this->sendEmailToAdmin($user_name.' edited program','program updation',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Program updated successfully");
                    redirect('university/my-programs');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to update Program.");
                    redirect('university/my-programs');
            }
        }
        
    }

    public function webinar()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'Schedule Webinar';
        $data['parent']         = 'webinar';
        $uid = $this->uid;
        
        $data['webinars'] = $this->common_model->getAllRecordsById(WEBINARS,array('user_id'=>$uid));
        load_front_view('university/schedule_webinar', $data);
    }

    public function add_webinar()
    {
        checkUserSession(array('5'));
        $uid = $this->uid;

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('skype_id','sSype','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('time','Time','required');
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Schedule Webinar';
            $data['parent']         = 'webinar';
            $uid = $this->uid;
            
            load_front_view('university/add_webinar', $data);
        }
        else
        {
            $data = $this->input->post();
            $data['user_id'] = $uid;
            $data['status'] = 0;
            $data['added_date'] = datetime();
            $request = $this->common_model->addRecords(WEBINARS,$data);
            if($request!='')
            {
                /* Send website notification to admin */
                send_notification('ADD_WEBINAR',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_WEBINAR);

                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];
                $this->sendEmailToAdmin($user_name.' added new webinar','new webinar',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Webinar added successfully");
                    redirect('university/webinar');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add Webinar.");
                    redirect('university/webinar');
            }
        }
    }

    public function edit_webinar($id)
    {
        checkUserSession(array('5'));
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('skype_id','sSype','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('time','Time','required');
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Schedule Webinar';
            $data['parent']         = 'webinar';
            $uid = $this->uid;
            
            $data['details'] = $this->common_model->getSingleRecordById(WEBINARS,array('id'=>$id));
            load_front_view('university/edit_webinar', $data);
        }
        else
        {
            $updateData = $this->input->post();
            $request = $this->common_model->updateRecords(WEBINARS,$updateData,array('id'=>$id));

            if($request)
            {
                /* Send website notification to admin */
                send_notification('EDIT_WEBINAR',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_WEBINAR);

                $userData   = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name  = $userData['username'];
                $this->sendEmailToAdmin($user_name.' updated webinar','webinar updation',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Webinar updated successfully");
                    redirect('university/webinar');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to update Webinar.");
                    redirect('university/webinar');
            }
        }
        
    }

    public function delete_webinar($id)
    {
        $request = $this->common_model->deleteRecord(WEBINARS,array('id'=>$id));
        if($request)
        {
            /* Send website notification to admin */
            send_notification('DELETE_WEBINAR',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_WEBINAR);

            $userData   = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
            $user_email = $userData['email'];
            $user_name  = $userData['username'];
            $this->sendEmailToAdmin($user_name.' Delete Webinar','webinar deleted',SUPPORT_EMAIL,$user_email);

            $this->session->set_flashdata('success', "Webinar deleted successfully");
            redirect('university/webinar');
        }
        else
        {
            $this->session->set_flashdata('error', "Unable to delete Webinar.");
                redirect('university/webinar');
        }
    }

    public function appointment()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'Schedule Appointment';
        $data['parent']         = 'appointment';
        $uid = $this->uid;
        
        $data['appointments'] = $this->common_model->getAllRecordsById(APPOINTMENT,array('user_id'=>$uid));
        load_front_view('university/schedule_appointment', $data);
    }

    public function add_appointment()
    {
        checkUserSession(array('5'));
        $uid = $this->uid;

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('skype_id','sSype','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('time','Time','required');
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Schedule Appointment';
            $data['parent']         = 'webinar';
            $uid = $this->uid;
            
            load_front_view('university/add_appointment', $data);
        }
        else
        {
            $data = $this->input->post();
            $data['user_id'] = $uid;
            $data['status'] = 0;
            $data['added_date'] = datetime();
            $request = $this->common_model->addRecords(APPOINTMENT,$data);
            if($request!='')
            {
                /* Send website notification to admin */
                send_notification('ADD_APPOINTMENT',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_APPOINTMENTS);

                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];
                $this->sendEmailToAdmin($user_name.' added new appoinrment','new appointment',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Appointment added successfully");
                    redirect('university/appointment');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add Appointment.");
                    redirect('university/appointment');
            }
        }
    }

    public function edit_appointment($id)
    {
        checkUserSession(array('5'));
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('skype_id','sSype','required');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_rules('time','Time','required');
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Schedule Appointment';
            $data['parent']         = 'appointment';
            $uid = $this->uid;
            
            $data['details'] = $this->common_model->getSingleRecordById(APPOINTMENT,array('id'=>$id));
            load_front_view('university/edit_appointment', $data);
        }
        else
        {
            $updateData = $this->input->post();
            $request = $this->common_model->updateRecords(APPOINTMENT,$updateData,array('id'=>$id));

            if($request)
            {
                /* Send website notification to admin */
                send_notification('EDIT_APPOINTMENT',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_APPOINTMENTS);

                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];
                $this->sendEmailToAdmin($user_name.' updated appoinrment','appointment updation',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Appointment updated successfully");
                    redirect('university/appointment');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to update Appointment.");
                    redirect('university/appointment');
            }
        }
        
    }

    public function delete_appointment($id)
    {
        $request = $this->common_model->deleteRecord(APPOINTMENT,array('id'=>$id));
        if($request)
        {
            /* Send website notification to admin */
            send_notification('DELETE_APPOINTMENT',$this->uid,ADMIN_ID,ADMIN_NOTIFICATION,'',VIEW_ALL_APPOINTMENTS);

            $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
            $user_email = $userData['email'];
            $user_name = $userData['username'];
            $this->sendEmailToAdmin($user_name.' Delete Appointment','Appointment Deleted',SUPPORT_EMAIL,$user_email);

            $this->session->set_flashdata('success', "Appointment deleted successfully");
            redirect('university/appointment');
        }
        else
        {
            $this->session->set_flashdata('error', "Unable to delete Appointment.");
                redirect('university/appointment');
        }
    }

    public function application()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'Application';
        $data['parent']         = 'application';
        $uid = $this->uid;
        $pid = array();
    
        $data['assign_univ']   = $this->common_model->getAllRecordsById(USER,array('id'=>$uid));

        foreach ($data['assign_univ'] as $a) { 
            $univ = explode(',',$a['university_id']);
            for($j=0;$j<count($univ);$j++){
                $univ[$j];
                $details[] = $this->common_model->getAllRecordsById(PROGRAMS,array('university_id'=>$univ[$j]));
            } 

        }
        foreach ($details as $key) {
            for($j=0;$j<count($key);$j++){
                $pid[] = $this->common_model->getAllRecordsById(APPLIED_PROGRAMS,array('program_id'=>$key[$j]['id']));
            }
        }
        $data['applications'] = $pid;
        load_front_view('university/application', $data);
    }

    public function postLandingForm()
    {
        checkUserSession(array('5'));
        $data = array();
        $data['meta_title']     = 'Post Landing Form';
        $data['parent']         = 'post-landing-form';
        $uid = $this->uid;
        
        $data['landing_form'] = $this->common_model->getAllRecordsById(POST_LANDING_FORM,array('user_id'=>$uid));
        load_front_view('university/post-landing-form', $data);
    }

    public function add_landing_form()
    {
        checkUserSession(array('5'));
        $uid = $this->uid;

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('type','Type','required');
        
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Post Landing Form';
            $data['parent']         = 'post-landing-form';
            $uid = $this->uid;
            
            load_front_view('university/add_landing_form', $data);
        }
        else
        {
            $data = $this->input->post();
            $data['user_id'] = $uid;
            $data['status'] = 1;
            $data['added_date'] = datetime();
            $request = $this->common_model->addRecords(POST_LANDING_FORM,$data);
            if($request!='')
            {
                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];

                $this->sendEmailToAdmin($user_name.' added new landing form','new appointment',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Landing form added successfully");
                    redirect('university/postLandingForm');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add Landing form.");
                    redirect('university/postLandingForm');
            }
        }
    }

    public function edit_landing_form($id)
    {
        checkUserSession(array('5'));
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('type','Type','required');
        
        if($this->form_validation->run()==false)
        {
            $data = array();
            $data['meta_title']     = 'Post Landing Form';
            $data['parent']         = 'post-landing-form';
            $uid = $this->uid;
            
            $data['details'] = $this->common_model->getSingleRecordById(POST_LANDING_FORM,array('id'=>$id));
            load_front_view('university/edit_landing_form', $data);
        }
        else
        {
            $updateData = $this->input->post();
            $request = $this->common_model->updateRecords(POST_LANDING_FORM,$updateData,array('id'=>$id));

            if($request)
            {
                $userData = $this->common_model->getSingleRecordById(USER,array('id'=>$this->uid));
                $user_email = $userData['email'];
                $user_name = $userData['username'];

                $this->sendEmailToAdmin($user_name.' updated new landing form','new appointment',SUPPORT_EMAIL,$user_email);

                $this->session->set_flashdata('success', "Landing form updated successfully");
                    redirect('university/postLandingForm');
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to update Landing form.");
                    redirect('university/postLandingForm');
            }
        }
        
    }

    public function delete_landing_form($id)
    {
        $request = $this->common_model->deleteRecord(POST_LANDING_FORM,array('id'=>$id));
        if($request)
        {
            $this->session->set_flashdata('success', "Landing form deleted successfully");
                redirect('university/postLandingForm');
        }
        else
        {
            $this->session->set_flashdata('error', "Unable to delete Landing form.");
                redirect('university/postLandingForm');
        }
    }

}

?>