<?php

if(!function_exists('checkUserSession')) {
	function checkUserSession($types)
	{
		$ci =&get_instance();
	    if ($ci->session->userdata('user_id')==TRUE && in_array($ci->session->userdata('user_type'), $types))
	    {
	        $ci->session->set_userdata('user_activity',time());
	    }
	    else
	    {
	    	/*$PathInfo    = (isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['ORIG_PATH_INFO'];
	    	$QueryString = (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : '';*/
	    	$RequestURI  = @ltrim($_SERVER['REQUEST_URI'],"/");
	    	/*if(!empty($QueryString)){
	    		$RequestURI .= '?'.$QueryString;
	    	}*/
	    	$ci->session->set_flashdata('login_error','you need to login');
	    	if(!empty($RequestURI)){
	    		redirect('?return_uri='.urlencode(base_url().$RequestURI));
	    	}else{
	    	   redirect('/');
	    	}
	    }
	}
}

if(!function_exists('load_front_view')) {
	function load_front_view($view_path, $data = array(), $header = true, $footer = true) {
		if(!empty($view_path)) {
			$ci =&get_instance();

			/* Load Header */
			if($header) {
				$ci->load->view(FRONT_INCLUDES.'header', $data);
			}

			/* Load content section */
			$ci->load->view($view_path, $data);

			/* Load footer */
			if($footer) {
				$ci->load->view(FRONT_INCLUDES.'footer', $data);
			}
		} else {
			show_error('Unable to load content view, please check again.');
		}
	}
}

if(!function_exists('getmenus')) {
	function getmenus()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(STATIC_PAGE,'page_no','ASC',array('status' => 1, 'show_on_menu' => 1));
	    return $results;
	}
}

if(!function_exists('feedCRMDetails')) {
	function feedCRMDetails($fields)
	{
		$ci = &get_instance();
	    $fields_1 = json_encode($fields);
        $crmurl = "https://api.leadsquared.com/v2/LeadManagement.svc/Lead.CreateOrUpdate?postUpdatedLead=false&accessKey=".CRM_ACCESS_KEY."&secretKey=".CRM_SECRET_KEY;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $crmurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        curl_close($ch);
        /*$result = $ci->common_model->getSingleRecordById(ENQUIRIES,array('email' => $email));
        if(!empty($result)){
            $ci->common_model->updateRecords(ENQUIRIES, $data,array('email' => $email));
        }else{
            $data['added_date'] = datetime();
            $ci->common_model->addRecords(ENQUIRIES, $data);
        }*/
        $post_data = array();
        foreach ($fields as $key => $f) {
        	$row[$f['Attribute']] = $f['Value'];
        	array_push($post_data, $row);
        }
        $post_data = end($post_data);

        if($post_data['EmailAddress']){
        	$name = (isset($post_data['FirstName'])) ? $post_data['FirstName'] : 'Somebody';
	        /* Send email to admin */
	        $message  = "";
			$message .= "<img style='width:200px' src='".base_url()."assets/img/logo.png' class='img-responsive'></br></br>";
			$message .= "<br><br> Hello, <br/><br/>";
			$message .= $name." has made a request for enquiry, please follow below details. <br/><br/>";
			$message .= "<ul>";
				if(isset($post_data['FirstName'])){
					$message .= "<li><strong>Name:</strong> ".$post_data['FirstName']."</li>";
				}
				if(isset($post_data['EmailAddress'])){
					$message .= "<li><strong>Email ID:</strong> ".$post_data['EmailAddress']."</li>";
				}
				if(isset($post_data['mx_Country'])){
					$message .= "<li><strong>Country:</strong> ".$post_data['mx_Country']."</li>";
				}
				if(isset($post_data['mx_City'])){
					$message .= "<li><strong>City:</strong> ".$post_data['mx_City']."</li>";
				}
				if(isset($post_data['Phone'])){
					$message .= "<li><strong>Phone:</strong> ".$post_data['Phone']."</li>";
				}
				if(isset($post_data['SkypeId'])){
					$message .= "<li><strong>Skype ID:</strong> ".$post_data['SkypeId']."</li>";
				}
			$message .= "</ul>";
			$ci->email->to(SUPPORT_EMAIL);
		    $ci->email->from(SUPPORT_EMAIL,SITE_NAME);
		    $ci->email->subject('Enquiry Request');
		    $ci->email->message($message);
		    $ci->email->set_mailtype("html");
		    $ci->email->send();
		}
	}
}

if(!function_exists('getQualifiedUniversity')) {
	function getQualifiedUniversity()
	{
		$ci = &get_instance();
		$results = $ci->common_model->getCustomSqlResult('SELECT `name`,`id` FROM `universities` ORDER BY rand() LIMIT 32');
	    return $results;
	}
}

if(!function_exists('getAllOffices')) {
	function getAllOffices()
	{
		$ci = &get_instance();
		$results = $ci->common_model->getAllRecordsByOrder(OFFICES,'id','ASC');
	    return $results;
	}
}

if(!function_exists('getAllSummerPrograms')) {
	function getAllSummerPrograms()
	{
		$ci = &get_instance();
		$results = $ci->common_model->getAllRecordsByOrder(SUMMER_PROGRAMS,'id','DESC');
	    return $results;
	}
}

if(!function_exists('getDetailsBy')) {
	function getDetailsBy($table,$column,$value,$get_column)
	{
		$ci = &get_instance();
		$conditions = array($column => $value);
		$results = $ci->common_model->getSingleRecordById($table,$conditions);
	    return $results[$get_column];
	}
}

if(!function_exists('getUserDetails')) {
	function getUserDetails()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsById(USER,array('id' => $ci->session->userdata('user_id')));
	    return $results;
	}
}

if(!function_exists('get_abroad_courses')) {
	function get_abroad_courses($type)
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(ABROAD_COURSES,'name','ASC',array('course_type' => $type));
	    return $results;
	}
}

if(!function_exists('getUserDetailsBy')) {
	function getUserDetailsBy($column,$value)
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsById(USER,array($column => $value));
	    return $results;
	}
}

if(!function_exists('getUniversity')) {
	function getUniversity($id="")
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsByOrder(UNIVERSITIES,'name','ASC');
	    if(empty($id)){
	    	return $results;
	    }else{
	    	$univesities = array();
	    	foreach($results as $r){
	    		$row[$r['id']] = $r['name'];
	    		array_push($univesities, $row);
	    	}
	    	$universities = end($univesities);
	    	return $universities[$id];
	    }
	}
}

if(!function_exists('getphotogallery')) {
	function getphotogallery()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(PHOTOS,'id','DESC',array('types' => 0));
	    return $results;
	}
}

if(!function_exists('getProgramsBy')) {
	function getProgramsBy($column, $value, $program = '')
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getFilteredPrograms(PROGRAMS,'program_name','ASC', array($column => $value), $program);
	    return $results;
	}
}

if(!function_exists('getvideogallery')) {
	function getvideogallery()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(PHOTOS,'id','DESC',array('types' => 1));
	    return $results;
	}
}

if(!function_exists('gettestimonials')) {
	function gettestimonials()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(TESTIMONIALS,'id','DESC',array('status' => 0));
	    return $results;
	}
}

if(!function_exists('getevents')) {
	function getevents()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(EVENTS,'id','DESC',array('status' => 0));
	    return $results;
	}
}

if(!function_exists('getCountries')) {
	function getCountries()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(COUNTRY,'nicename','ASC');
	    return $results;
	}
}

if(!function_exists('getEducationLevels')) {
	function getEducationLevels()
	{
		$education = array('Pre-High School','Secondary (in progress)','Secondary (completed)','Associates or Equivalent (in progress)','Associates or Equivalent (completed)','Bachelors or Equivalent (in progress)','Bachelors or Equivalent (completed)','Masters or Equivalent (in progress)','Masters or Equivalent (completed)','PhD (in progress)','PhD (completed)');
	    return $education;
	}
}

if(!function_exists('getProfession')) {
	function getProfession()
	{
		$profession = array('Administration/Clerical','Agronomist','Computers/Technology','Customer Service','Dentist','Design','Education','Engineering/Architecture','Executive','Finance/Accounting/Banking','Fine Arts','Human Resources','Information Technology','Law and Law Enforcement','Manufacturing','Marketing','Medical/Pharmaceutical','Other','Psychologist','Public work','Retail','Sciences','Security','Social Work','Student','Transportation','Unemployed','Veterinarian');
	    return $profession;
	}
}

if(!function_exists('documents')) {
	function documents()
	{
		$documents = array('Passport/ID','Transcript','Certificate/Diploma','Resume/CV','Financial Support','GMAT/GRE/SAT Scores','Other');
	    return $documents;
	}
}

if(!function_exists('profile_types')) {
	function profile_types()
	{
		$profile_types = array('Language Courses','Undergraduate/Community College/Technical','Secondary','Extension / Certificate / Diploma','Graduate/Postgraduate','MBA Program','Online Distance Learning','Vocational/ Career / Technical');
	    return $profile_types;
	}
}

if(!function_exists('program_types')) {
	function program_types()
	{
		$program_types = array('Language','Secondary','Undergrad','Postgrad','MBA','Short-Term','Vocational','Online');
	    return $program_types;
	}
}

if(!function_exists('top_degrees')) {
	function top_degrees()
	{
		$top_degrees = array('Associates','Bachelors','Masters','Doctorals','Post Doctorals');
	    return $top_degrees;
	}
}

if(!function_exists('hear_about_us')) {
	function hear_about_us()
	{
		$hear_about_us = array('Education Fairs / Expo / Seminar','Online Webinar','Mail Marketing','SMS Marketing','Online Marketing','Walk In','Refer by Formal Student','Refer by Agent','Refer by School','Social Media','Website');
	    return $hear_about_us;
	}
}

if(!function_exists('getservices')) {
	function getservices()
	{
		$ci =&get_instance();
	    $results = $ci->common_model->getAllRecordsOrderById(SERVICES,'id','DESC',array('status' => 0));
	    return $results;
	}
}

if(!function_exists('getSeacrhStudyPrograms')) {
	function getSeacrhStudyPrograms()
	{
		$html = '<div class="banner_search_wrap about_page"> <div class="container"> <div class="row"> <div class="col-md-12 col-sm-12"> <form class="search_form" method="get" action="'.base_url().'search-programs"> <div class="head_search"> <div class="txt_search"> Find your ideal study program </div></div><div class="search_form_content about_content"> <div class="form-group"><input type="text" class="form-control" name="program" placeholder="What do you want to Study ?" value="'.@$_GET['program'].'"/></div><div class="form-group"> <div class="select_box"> <select class="form-control select_country" name="country" required> <option value="">Choose a country</option>';
		$selected = '';
		foreach(countries() as $c) {
			if($c == @$_GET['country']) {
				$selected = 'selected="selected"';
			}
			$html .= '<option value="'.$c.'" '.get_show_selected(@$_GET['country'], $c).'>'.$c.'</option>';
		}
		$html .= '</select> <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i> </div></div><div class="form-group"> <div class="select_box"> <select class="form-control select_university" name="id"> <option value="">Choose a university</option> </select> <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i> </div></div>';
		$html .= '<div class="form-group"> <div class="select_box"> <select class="form-control" name="course" required> <option value="">Choose a level</option>';
		foreach(getCourseTypes() as $ct) {
			$html .= '<option value="'.$ct.'" '.get_show_selected(@$_GET['course'], $ct).'>'.$ct.'</option>';
		}
		$html .= '</select> <i class="indicator glyphicon glyphicon-chevron-down pull-right"></i> </div></div><div class="form-group"> <div class="button_box"> <button type="submit">Search </button> </div></div></div></form> </div></div></div></div>';
		return $html;
	}
}

if(!function_exists('getSideBarVideos')) {
	function getSideBarVideos()
	{	
		$ci =&get_instance();
	    $results = $ci->common_model->getPaginateRecordsByOrderByCondition(PHOTOS, 'id', 'DESC', 8, 0, array('types' => 1));

		$html = '';
		$html .= '<div class="left_video_bar">';
		$html .= '<div class="head_left_video "> Videos <a href="javascript:void(0);" class="pull-right"><i class="fa fa-video-camera" aria-hidden="true"></i></a> </div>';
		$html .= '<div class="head_left_video_content"><div id="video_slider" class="owl-carousel owl-theme">';
		if(!empty($results)) {
			foreach($results as $v){
				if(!empty($v['thumb'])) {
					$img = $v['thumb'];
				} else {
					$video = parseVideos($v['name']);
					$img   = $video[0]['fullsize'];
				}
				$html .= '<div class="item"><a class="videoOverlapper" href="'.$v['name'].'" data-featherlight="iframe"><i class="playIcon fa fa-play-circle-o"></i><img src="'.SUB_DOMAIN_BASE_URL.$img.'"/></a></div>'; 
				//$html .= '<div class="item"><iframe width="100%" height="200" frameborder="0" allowfullscreen="" src="'.$v['name'].'"></iframe></div>';
			}
		}
		$html .= '</div></div></div>';
		return $html;
	}
}

if(!function_exists('getSideBarEvents')) {
	function getSideBarEvents()
	{
		$html = '';
		$html .= '
		<div class="left_video_bar"><div class="head_left_video "> Event <a href="javascript:void(0);" class="pull-right"><i class="fa fa-flag" aria-hidden="true">
		</i></a> </div> <div id="events_slider" class="owl-carousel">';
		
		foreach(getevents() as $e)
		{
			$dateArr = explode("-", $e['date']);
			$html .= '<div class="item"><div class="head_left_video_content event" style="background-image:url('.SUB_DOMAIN_BASE_URL.'assets/images/event_bg.jpg);">';
			$html .= '<div class="event_left"><div class="date_box"><div class="date_box_top"> '.$dateArr[2].' </div><div class="date_box_bottom"> '.$dateArr[1].' <span>'.$dateArr[0].'</span> </div></div><span>Posted in: '.$e['posted_in'].'</span></div>';
			$html .= '<div class="event_right"><div class="head_event_right"> Upcoming Event </div><p title="'.$e['content'].'">'.substr($e['content'],0,80).'</p></div></div></div>';
		}
		$html .= '</div></div>';
		return $html;
	}
}

if(!function_exists('getOurServices')) {
	function getOurServices()
	{
		$html = '';
		$html .= '<section class="our_services"><div class="container"><div class="common_head footer_head"><h2>Our Services Includes:</h2><div class="head_border"><span><i aria-hidden="true" class="fa fa-ioxhost"></i></span></div></div> <div class="our_services_content"><div class="row"><div class=""><ul class="list_services">';
		foreach(getservices() as $s)
		{
			$html .= '<li><i class="fa fa-check" aria-hidden="true"></i>'.$s['title'].'</li>';
		}
		$html .= '</ul></div></div></div></div></section>';
		return $html;
	}
}

if(!function_exists('getPhotosGallery')) {
	function getPhotosGallery()
	{
		$html = '';
		$html .= '<section class="gallery_wrap"><div class="container"><div class="common_head footer_head"><h2>Photo Gallery</h2><div class="head_border"><span><i class="fa fa-ioxhost" aria-hidden="true"></i></span></div></div><div class="gallery_content clearfix"><div id="my-gallery-container" class="">';
		foreach(getphotogallery() as $p) {
			$html .= '<div class="item"><a href="'.$p['name'].'" class="gallery"> <img src="'.SUB_DOMAIN_BASE_URL.$p['name'].'" width="228" height="150"></a></div>';
		}
		$html .= '</div></div></div></section>';
		return $html;
	}
}

if(!function_exists('getScholarshipForm')) {
	function getScholarshipForm()
	{
		$html = '';
		$html .= '<section class="apply_sec"><div class="apply_bg" style="background-image:url('.SUB_DOMAIN_BASE_URL.'assets/images/apply_bg.jpg);"><div class="container"><div class="row"><div class="col-md-12 col-sm-12"><div class="apply_form"><div class="row"><div class="col-md-6 col-sm-6"><div class="our_program"><div class="head_program">Top Programs in <span>Abroad!</span></div><div class="content_program"><ul>';
		$html .= '<li><a href="http://page.studymetro.com/Work-full-time-in-USA-similar-like-H1b-Visa"><i class="fa fa-check"> </i> Work and Study program in USA</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Canada-No-Processing-Fee"><i class="fa fa-check"> </i>Co-Op Program in Canada with Paid Internship</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Germany-No-Tution-Fee"><i class="fa fa-check"> </i>Free Education in Germany </a></li><li><a href="http://page.studymetro.com/Study-Work-in-France"><i class="fa fa-check"> </i> Paid Internship in France</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Australia-No-Processing-Fee"><i class="fa fa-check"> </i> SVP Visa process in Australia</a></li><li><a href="http://page.studymetro.com/Study-Work-in-New-Zealand-No-Processing-Fee"><i class="fa fa-check"> </i> Study in New Zealand With Paid Internship</a></li><li><a href="http://page.studymetro.com/Study-Abroad"><i class="fa fa-check"> </i> Study Abroad Program</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Ireland-No-Tution-Fee"><i class="fa fa-check"> </i>Study in Ireland with Internship</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Europe-No-Tution-Fee"><i class="fa fa-check"> </i>Study in Europe at Indian Cost</a></li><li><a href="http://page.studymetro.com/Study-Abroad-Programs"><i class="fa fa-check"> </i> Unique Programs Available</a></li><li><a href="http://page.studymetro.com/Study-Work-in-UK-No-Processing-Fee"><i class="fa fa-check"> </i> Study in UK- Worlds Best Education System</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Ireland-No-Tution-Fee"><i class="fa fa-check"> </i> Study-Work-Settle in Ireland</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Malaysia-No-Processing-Fee"><i class="fa fa-check"> </i> Study in Malaysia at Indian Cost</a></li><li><a href="http://page.studymetro.com/Study-Work-in-Singapore-No-Tution-Fee"><i class="fa fa-check"> </i> Study and Work Singapore </a></li>';
		$html .= '</ul></div></div></div><div class="col-md-6 col-sm-6"><form class="form_apply" method="post" action="'.base_url().'front/home/doEnquiry"> <div class="head_program "> <span>Apply for Scholarship Today</span> </div><div class="form-apply_content"> <div class="form-group"> <input type="text" class="form-control" id="Name" placeholder="Name" name="name" required> </div><div class="form-group"> <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required> </div><div class="form-group"> <input type="text" class="form-control" id="PhoneNumber" placeholder="Phone Number" name="phone" required> </div><div class="form-group"> <input type="text" class="form-control" id="City" placeholder="City" name="city" required> </div><div class="form-group"> <input type="text" class="form-control" id="InterestedCountry" placeholder="Interested Country" name="country" required> </div><div class="form-group"> <button type="submit" class="apply_btn">Apply Now</button> </div></div></form></div></div></div></div></div></div></div><div class="apply_row"><a href="javascript:void(0);"> Apply today and Talk to Advisor at 8088-867-867</a></div></section>';
		return $html;
	}
}

if(!function_exists('getTestimonails')) {
	function getTestimonails()
	{
		$html = '';
		$html .= '<section class="testimonial_bg" style="background-image:url('.SUB_DOMAIN_BASE_URL.'assets/images/testimoni_bg.jpg);"><div class="white_overlay"></div><div class="testimonial_sec"><div class="container"><div class="row"><div class="col-md-12 col-sm-12"><div class="common_head"><h2>Students Testimonial</h2><div class="head_border"><span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span></div></div><div class="testimonial_slider_sec"> <div id="testimonial_slider" class="owl-carousel owl-theme">';
		foreach(gettestimonials() as $t) {
			$html .= '<div class="item"><div class="item_img"><img src="'.SUB_DOMAIN_BASE_URL.$t['image'].'" alt="'.$t['given_by'].'"></div><div class="item_data"><p>'.$t['content'].'</p><span class="meta_slider">'.$t['given_by'].'</span></div></div>';
		}
		$html .= '</div></div></div></div></div></div><div class="newsletter"> <div class="container"> <form method="post" action="'.base_url().'front/home/doEnquiry"> <label>Newsletter Signup</label> <div class="form-group"> <input type="email" placeholder="email" class="form-control" required name="email"> <i class="fa fa-envelope"></i> </div><div class="form-group"> <input type="text" placeholder="mobile" class="form-control" required name="phone"> <i class="fa fa-mobile" aria-hidden="true"></i> </div><div class="form-group"> <button type="submit" class="submit_btn">Submit</button> </div></form> </div></div></section>';
		return $html;
	}
}

if(!function_exists('getVideoGallerySection')) {
	function getVideoGallerySection()
	{
		$html = '';
		$html .= '<section class="home_video_sec"><div class="container"><div id="home_video">';
		foreach(getvideogallery() as $v) {
			if(!empty($v['video_thumb'])) {
				$img = $v['video_thumb'];
			} else {
				$video = parseVideos($v['name']);
				$img = $video[0]['fullsize'];
			}
			$html .= '<div class="item"><div class="video_box"><a class="videoOverlapper" href="'.$v['name'].'" data-featherlight="iframe"><i class="playIcon fa fa-play-circle-o"></i><img width="224" height="226" src="'.display_timuthumb($img,224,226).'"/></a><div class="more_video_box"><a class="more_photo more_video" href="'.$v['name'].'" data-featherlight="iframe">Watch Now </a></div></div></div>';
			//$html .= '<div class="item"><div class="video_box"><iframe width="100%" height="200" frameborder="0" allowfullscreen="" id="video'.$v['id'].'" src="'.$v['name'].'"></iframe><div class="more_video_box"><a class="more_photo more_video" href="javascript:void(0);" data-featherlight="#video'.$v['id'].'">Watch Now </a></div></div></div>';
		}
		$html .= '</div></div></section>';
		return $html;
	}
}

if(!function_exists('getPageName')) {
	function getPageName($key)
	{
		$pages = array(
					'1' => 'Home',
					'2' => 'About Us',
					'3' => 'University',
					'4' => 'Search Programs',
					'5' => 'Study Work Abroad',
					'6' => 'Forum',
					'7' => 'Visa',
					'8' => 'Summer Programs',
					'9' => 'Online Training',
					'10' => 'Blogs',
					'11' => 'FAQS',
					'12' => 'Contact US',
					'13' => 'Default Template',
					'14' => 'Apply Now',
					'15' => 'College Campus Office',
					'16' => 'Terms Conditions',
					'17' => 'Internship',
					'18' => 'Work As Agent',
					'19' => 'Pricing',
					'20' => 'Abroad Courses',
					'21' => 'Privacy Policy',
					'22' => 'City Events',
					'23' => 'Indian University'
				);
		return $pages[$key];
	}
}

if(!function_exists('getCourseTypes')) {
	function getCourseTypes()
	{
		//$courses = array('Associate Degree','Bachelor','Certificates / DIPLOMA','Doctoral','Graduate Courses','Masters','Post Graduate Diploma','Pathway','Post Bacculerate Diploma','Language Course','Undergraduate courses');
		$courses = array('Graduate Course', 'Undergraduate Course', 'Doctored', 'Certificate/Diploma', 'Pathway');
		return $courses;
	}
}

if(!function_exists('filter_course_types')) {
	function filter_course_types($ct) {
		$types = array(
			'Graduate Course' => array('Graduate Course','Graduate Courses', 'Post Graduate Diploma', 'Bachelor & Master', 'Bachelor & Masters', 'Diploma & Masters', 'Diploma.Bachelors & Masters', 'Master', 'Masters', 'master/bachelor'), 
			'Undergraduate Course' => array('Associate Degree', 'Associate & Certificate', 'Associate', 'Undergraduate', 'Undergraduate courses', 'UnderGraduate/Certificate'), 
			'Doctored' => array('Doctor', 'Doctoral', 'doctorate'), 
			'Certificate/Diploma' => array('Certificates / DIPLOMA', 'Post Baccalaureat Diploma', 'Post Bacculerate Diploma', 'Post Baccalaureate diploma', 'Diploma', 'Diplomas', '2 Year Advanced Diploma Courses', 'Digital Design Advanced Diploma', 'Creative Communications Advanced Diploma', 'Motion Graphics & Film Advanced Diploma', 'Advance Diploma', 'Advanced diploma', 'Certificate & Diploma', 'Certificates / Diploma', 'Diploma & Certificate', 'Diploma & Masters', 'Diploma course', 'Graduate diploma', ''), 
			'Pathway' => array('Language', 'Language course', 'Language program')
		);
		return $types[$ct];
	}
}

if(!function_exists('get_university_detail')) {
	function get_university_detail($pid,$column)
	{
		$ci =&get_instance();
		$query = "SELECT `u`.".$column." FROM `programs` AS `p` INNER JOIN `universities` AS `u` ON `p`.`university_id` = `u`.`id` WHERE `p`.`id` = ".$pid;
		$result = $ci->common_model->getCustomSqlRow($query);
		if(!empty($result)){
	    	return $result[$column];
		}else{
			return "";
		}
	}
}

if(!function_exists('minimized_redirects')) {
	function minimized_redirects($url)
	{
		if(HTTP_HOST == 'localhost' || HTTP_HOST == 'studymetro.sid.mwdemoserver.com'){
			return $url;
		}else{
			$www   = strpos($url, 'www.');
			if($www !== FALSE){
				return $url;
			}else{
				return str_replace("http://", "http://www.", $url);
			}
			
		}
	}
}

if(!function_exists('display_timuthumb')) {
	function display_timuthumb($path,$width,$height)
	{
		return minimized_redirects(base_url().'timthumb/timthumb.php?src='.urlencode($path).'&zc=1&a=t&w='.$width.'&h='.$height.'&time='.time());
	}
}

if(!function_exists('get_image_thumb')) {
	function get_image_thumb($filepath,$subfolder,$width,$height)
	{
		$ci   = &get_instance();
		/* Get file info using file path */
		$file_info = pathinfo($filepath);
		if(!empty($file_info)){
			$filename = $file_info['basename'];
			$ext      = $file_info['extension'];
			$dirname  = $file_info['dirname'].'/';
			$path     = $dirname.$filename;
			$file_status = @file_exists($path);
			if($file_status){
				$config['image_library']  = 'gd2';
			    $config['source_image']   = $path;
			    $config['create_thumb']   = TRUE;
			    $config['maintain_ratio'] = TRUE;
			    $config['width']          = $width;
			    $config['height']         = $height;
			    $ci->load->library('image_lib', $config);
			    if(!$ci->image_lib->resize()) {
			        return $path;
			    } else {
			    	@chmod($path, 0777);
			    	$thumbnail = preg_replace('/(\.\w+)$/im', '', $filename) . '_thumb.' . $ext;
			        return 'uploads/'.$subfolder.'/'.$thumbnail;
			    }
			}else{
				return 'assets/img/no-img.png';
			}
		}else{
			return 'assets/img/no-img.png';
		}
	}
}



?>