<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    public function index() {
        $data = array();
        $data['meta_title'] = 'Home';
        $data['details'] = $this->common_model->getSingleRecordById(STATIC_PAGE,array('page_no' => '1'));
        load_front_view('pages/home', $data);
    }

    public function universities() {
        $data = array();
        $data['meta_title'] = 'Universities';
        load_front_view('universities', $data);
    }

    public function pages($slug){
        if($slug == 'university' || $slug == 'search-programs'){
            checkUserSession(array('2','3','4','5','6'));
        }
        $data = array();
        $data['slug'] = $slug;
        $data['details'] = $this->common_model->getSingleRecordById(STATIC_PAGE,array('slug' => $slug));
        if(!empty($data['details'])){
            $data['meta_title'] = $data['details']['meta_title'];
            $data['meta_keywords'] = $data['details']['meta_keywords'];
            $data['meta_description'] = $data['details']['meta_description'];
            $page_name = strtolower(str_replace(' ', '-', getPageName($data['details']['page_no'])));
            if($page_name == 'university'){
                $country = (isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA';
                $data['universities'] = $this->getUniversities($country);
                $result  = $this->common_model->getTotalRecordsByCondition(UNIVERSITIES,array('country' => $country));
                $data['total_count'] = round($result/16);
            }
            if($page_name == 'search-programs'){
                $data['total_count'] = 0;
                if($this->input->get()){
                    $arr_data = $this->input->get();
                    //print_r($arr_data); die;
                    $data['programs'] = $this->common_model->searchPrograms($arr_data);
                }else{
                    $data['programs'] = $this->getPrograms((isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA',8);
                    $result  = $this->getPrograms((isset($_GET['country']) && !empty($_GET['country'])) ? $_GET['country'] : 'USA');
                    $data['total_count'] = round(count($result)/8);
                }
            }
            if($page_name == 'blogs'){
                $data['blogs'] = $this->common_model->getAllRecordsByOrder(BLOGS,'id','DESC');
            }
            if($page_name == 'city-events' || $page_name == 'indian-university'){
                $data['events'] = $this->common_model->getAllRecordsByOrder(CITY_EVENTS,'id','ASC');
            }
            load_front_view('pages/'.$page_name, $data);
        }else{
            redirect("/");
        }
    }

    public function getUniversities($country = '')
    {
        if(empty($country)){
            $country = 'USA';
        }
        $universities = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $country),16);
        return $universities;
    }

    public function getCountryUniversities()
    {
        $country = $this->input->post('country');
        $result  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $country));
        echo json_encode($result);
    }

    public function getNextUniversities()
    {
        $page    = $this->input->post('page');
        $country = $this->input->post('country');
        $offset  = (int) $page * 16 - 16;
        $query   = $this->db->query(" SELECT * FROM ".UNIVERSITIES." WHERE `country` LIKE '".$country."' LIMIT 16 OFFSET  ".$offset);
        $results = $query->result_array();
        $final_arr = array();
        foreach($results as $r){
            $row['detail'] = getUniversityUrl($r['id'],$r['name']);
            $row['country_flag'] = base_url().'assets/images/'.getCountryFlag($r['country']);
            $row['logo'] = (!empty($r['logo'])) ? $r['logo'] : base_url().'assets/images/not-available.jpg';
            $row['name'] = $r['name'];
            $row['location'] = $r['location'];
            $row['country'] = $r['country'];
            $row['estimated_cost'] = $r['estimated_cost'];
            array_push($final_arr, $row);
        }
        echo json_encode($final_arr);
    }

    public function getPrograms($country = '',$limit='',$offset='')
    {
        if(empty($country)){
            $country = 'USA';
        }
        $query   = $this->db->query(" SELECT `university_id` FROM ".PROGRAMS." WHERE `country` LIKE '".$country."' GROUP BY `university_id` ");
        $results = $query->result_array();
        $university_ids = array_column($results, 'university_id');
        if(!empty($university_ids)){
            $limit_cond = '';
            if(!empty($limit)){
                $limit_cond = 'LIMIT '.$limit;
            }
            $offset_cond = '';
            if(!empty($offset)){
                $offset_cond = 'OFFSET '.$offset;
            }
            $query1   = $this->db->query(" SELECT `name`,`logo`,`location`,`country`,`founded`,`application_fee`,`studymetro_scholarship`,`institution`,`estimated_cost`,`tution_fee`,`id` AS `univ_id` FROM ".UNIVERSITIES." WHERE `country` LIKE '".$country."' AND `id` IN (".implode(",", $university_ids).") ORDER BY `studymetro_scholarship` DESC ".$limit_cond." ".$offset_cond);
            $results1 = $query1->result_array();
            return $results1;
        }else{
            return array();
        }
    }

    public function getNextPrograms()
    {
        $page    = $this->input->post('page');
        $country = $this->input->post('country');
        $offset  = (int) $page * 8 - 8;
        $results = $this->getPrograms($country,8,$offset);
        $final_arr = array();
        if(!empty($results)){
            foreach($results as $r){
                $row['detail'] = getUniversityUrl($r['univ_id'],$r['name']);
                $row['logo'] = (!empty($r['logo'])) ? $r['logo'] : base_url().'assets/images/not-available.jpg';
                $row['name'] = $r['name'];
                $row['id'] = $r['univ_id'];
                $row['location'] = $r['location'];
                $row['country']  = $r['country'];
                $row['founded'] = $r['founded'];
                $row['institution'] = $r['institution'];
                $row['estimated_cost'] = $r['estimated_cost'];
                $row['tution_fee'] = $r['tution_fee'];
                $row['programs'] = getProgramsBy('university_id',$r['univ_id']);
                array_push($final_arr, $row);
            }
        }
        echo json_encode(array('universities' => $final_arr, 'courses' => getCourseTypes()));
    }

    public function faqs($country){
        $data = array();
        $data['faqs'] = $this->common_model->getAllRecordsById(FAQS,array('country' => str_replace("%20", " ", $country)));
        $data['meta_title'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_keywords'] = 'FAQS -'.str_replace("%20", " ", $country);
        $data['meta_description'] = 'FAQS -'.str_replace("%20", " ", $country);
        load_front_view('pages/faq_detail', $data);
    }

    public function contactus(){
        $data = array();
        $data['meta_title'] = 'Contact US';
        load_front_view('pages/contact-us', $data);
    }

    public function doEnquiry(){
        $data = $this->input->post();
        $email = $data['email'];
        $fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'mx_Country', 'Value' => $data['country']),
                    array('Attribute' => 'mx_City', 'Value' => $data['city']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                    array('Attribute' => 'SearchBy', 'Value' => 'EmailAddress'),
                );
        feedCRMDetails($fields);
        $this->session->set_flashdata('success', 'Thanks for enquiry !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }

    public function doSummerProgramEnquiry(){
        $data = $this->input->post();
        $fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'mx_City', 'Value' => $data['city']),
                    array('Attribute' => 'SkypeId', 'Value' => $data['SkypeId']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                    array('Attribute' => 'SearchBy', 'Value' => 'EmailAddress'),
                );
        feedCRMDetails($fields);
        $this->session->set_flashdata('success', 'Thanks for enquiry !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }

    public function docontactus(){
        $data = $this->input->post();
        $fields = array(
                    array('Attribute' => 'EmailAddress', 'Value' => $data['email']),
                    array('Attribute' => 'Phone', 'Value' => $data['phone']),
                    array('Attribute' => 'FirstName', 'Value' => $data['name']),
                    array('Attribute' => 'SearchBy', 'Value' => 'EmailAddress'),
                );
        feedCRMDetails($fields);
        $this->session->set_flashdata('success', 'Thanks for contact us !! we will contact you soon');
        if($this->session->userdata('user_id')){
            redirect('/home');
        }else{
            redirect('/');
        }
    }

    public function event_registration()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('institution','Institution','trim|required');
            $this->form_validation->set_rules('name','Name','trim|required');
            $this->form_validation->set_rules('phone','Phone','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            // $this->form_validation->set_rules('is_terms','Terms & Condotion','trim|required');
            if($this->form_validation->run()==TRUE){
               $post_data = $this->input->post();
               /* City events array */
               if(isset($post_data['events']) && !empty($post_data['events'])){ // FULLY REGISTRATION
                    $city_event_arr = $post_data['events'];
                    $is_only_enquiry = 1;
                    $event_details = array();
                    foreach($city_event_arr as $ce)
                    {
                        $event_arr = explode("@", $ce);
                        if(count($event_arr) == 2){
                            $event_period = $event_arr[0];
                            $event_id     = decode($event_arr[1]);

                            /* Fetch event details */
                            $details = $this->common_model->getSingleRecordById(CITY_EVENTS,array('id' => $event_id));
                            if(!empty($details)){
                                $prices_arr   = unserialize($details['price']);
                                $is_table_arr = unserialize($details['is_table']);

                                $row = array();
                                $row['event_name']    = $details['name'];
                                $row['event_venue']   = $details['venue'];
                                $row['event_city']    = $details['city'];
                                $row['event_date']    = $details['date'];
                                $row['event_is_free'] = ($details['is_free'] == 0) ? 'Yes' : 'No';
                                $row['event_price']   = $prices_arr[$event_period];
                                $row['event_is_table']= ($is_table_arr[$event_period] == 0) ? 'Yes' : 'No';
                                array_push($event_details, $row);
                            }else{
                                echo json_encode(array('type' => 'failed','msg' => GENERAL_ERROR));exit;
                            }
                        }else{
                            echo json_encode(array('type' => 'failed','msg' => GENERAL_ERROR));exit;
                        }
                    }
                    $total_paid_amount = 0;
                    /* Get total paid amount */
                    foreach($event_details as $ed){
                        $total_paid_amount += (int) $ed['event_price'];
                    }

                    $event_details = serialize($event_details);
               }else{ // ONLY ENQUIRY
                    $is_only_enquiry   = 0;
                    $total_paid_amount = 0;
                    $event_details     = NULL;
               }

               /* Insert city event registration data */
               $data_arr = array();
               $data_arr['institution']       = $post_data['institution'];
               $data_arr['name']              = $post_data['name'];
               $data_arr['phone']             = $post_data['phone'];
               $data_arr['email']             = $post_data['email'];
               $data_arr['event_details']     = $event_details;
               $data_arr['total_paid_amount'] = $total_paid_amount;
               $data_arr['is_only_enquiry']   = $is_only_enquiry;
               $data_arr['purchase_date']     = datetime();
               $lid = $this->common_model->addRecords(EVENT_REGISTRATION,$data_arr);
               if($lid){
                    if($is_only_enquiry == 0){
                        /* Send notifications */
                        $this->send_event_registration_notification($post_data['name'],$post_data['email']);
                    }
                    echo json_encode(array('type' => 'success','msg' => 'success', 'is_only_enquiry' => $is_only_enquiry, 'total_paid_amount' => $total_paid_amount, 'event' => encode($lid)));exit;
               }else{
                    echo json_encode(array('type' => 'failed','msg' => GENERAL_ERROR));exit;
               }
            }else{
                $error = array(
                    // 'is_terms'    => form_error('is_terms'),
                    'institution' => form_error('institution'),
                    'name'        => form_error('name'),
                    'phone'       => form_error('phone'),
                    'email'       => form_error('email')
                ); 
                echo json_encode(array('type' => 'validation_err','msg' => $error));exit;
            }
        }
    }

    public function offline_event_registration()
    {
        if($this->input->is_ajax_request())
        {
            $data = $this->input->post();
            $event_no = $data['event_no']; // EVENT ID
            $pay_type = $data['pay_type']; // OFFLINE PAYMENT ONLY
            if(!empty($event_no) && $pay_type == 1){
                $event_id = decode($event_no);

                /* Fetch event registration details */
                $details = $this->common_model->getSingleRecordById(EVENT_REGISTRATION,array('id' => $event_id));
                if(!empty($details)){
                    /* Update payment method */
                    $status = $this->common_model->updateRecords(EVENT_REGISTRATION,array('pay_type' => 1,'pay_status' => 3),array('id' => $event_id));
                    if($status){
                        /* Send notifications */
                        $this->send_event_registration_notification($details['name'],$details['email']);
                        echo json_encode(array('type' => 'success','msg' => 'Thanks for registration'));exit;
                    }else{
                        echo json_encode(array('type' => 'failed','msg' => GENERAL_ERROR));exit;
                    }
                }else{
                   echo json_encode(array('type' => 'failed','msg' => GENERAL_ERROR));exit;
                }
            }else{
                echo json_encode(array('type' => 'failed','msg' => GENERAL_ERROR));exit;
            }
        }
    }

    public function paypal_event_success()
    {
        if(!empty($_GET)){
            $event_id = decode($_GET['cm']);
            /* Fetch event registration details */
            $details = $this->common_model->getSingleRecordById(EVENT_REGISTRATION,array('id' => $event_id));
            if(!empty($details)){
                if($_GET['st'] == 'Completed' && $details['total_paid_amount'] == $_GET['amt']){

                    /* Update payment details */
                    $data                     = array();
                    $data['pay_type']         = 0;
                    $data['pay_txn_id']       = $_GET['tx'];
                    $data['pay_status']       = 1;
                    $data['payment_datetime'] = datetime();
                    $status = $this->common_model->updateRecords(EVENT_REGISTRATION,$data,array('id' => $event_id));
                    if($status){
                        /* Send notifications */
                        $this->send_event_registration_notification($details['name'],$details['email']);
                        $this->session->set_flashdata('success', 'Payment successfully done');
                    }else{
                        $this->session->set_flashdata('error', 'Payment failed please contact to our support team');
                    }
                }else{
                    /* Update payment details */
                    $data                     = array();
                    $data['pay_type']         = 0;
                    $data['pay_txn_id']       = $_GET['tx'];
                    $data['pay_status']       = 2;
                    $data['payment_datetime'] = datetime();
                    $status = $this->common_model->updateRecords(EVENT_REGISTRATION,$data,array('id' => $event_id));
                    $this->session->set_flashdata('error', GENERAL_ERROR);
                }
            }else{
                $this->session->set_flashdata('error', 'Payment failed please contact to our support team');
            }
        }else{
            $this->session->set_flashdata('error', 'Payment failed please contact to our support team');
        }
        redirect('city-events');
    }

    public function cancel_event_payment()
    {
        $this->session->set_flashdata('error','Paymnet cancelled !!');
        redirect('city-events');
    }

    public function send_event_registration_notification($user_name,$user_email)
    {
        /* Send email to user */
        $user_message = '';
        $user_message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
        $user_message .= "<br><br> Hello ".$user_name.", <br/><br/>";
        $user_message .= "Thanks for registering in International Student Edu Fair 2017 – Biggest International Students Recruitment & Workshops in india. <br/><br/>";
        $user_message .= "We look forward to see you in our event. If you have any questions feel free to reach our team at Michael@studymetro.com or Call +1-312-218-8883 and abhishek@studymetro.com or Call +91-88921-82127 <br/><br/>";
        $user_message .= "Regards, <br/>";
        $user_message .= CMS_NAME."-An AIRC Certified Company  <br/>";
        $user_message .= "www.studymetro.com <br/>";
        $user_message .= "8088-867-867, 7722-867-867 <br/>";
        $user_message .= "Skype:abbie.studymetro <br/>";
        send_mail($user_message, 'International Students Edu Fair 2017' , $user_email,SUPPORT_EMAIL);

        /* Send email to admin */
        $admin_message = '';
        $admin_message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
        $admin_message .= "<br><br> Hello, <br/><br/>";
        $admin_message .= $user_name." has registered for EDU Fair Event <br/><br/>";
        send_mail($admin_message, 'New EDU Fair Event Registration' ,SUPPORT_EMAIL,SUPPORT_EMAIL);

        /* Send website notification to admin */
        $static_content = $user_name.' has registered for EDU Fair Event';
        send_notification('CITY_EVENT_REGISTRATION',0,ADMIN_ID,ADMIN_NOTIFICATION,$static_content,EVENT_REGISTRATION_HISTORY);
    }


}
?>