<div class="main_container">

<section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
	<?php if($details['media'] == 1){ ?>
		<video controls autoplay muted loop id="bg_video">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
          <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
        </video>
	<?php } ?>
    <?php if($details['study_program'] == 0) { 
        echo getSeacrhStudyPrograms();
    } ?>
</section>

<section class="membership_plan">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="plan_main_box priceing">
                                <div class="plan_box">
                                    <ul>
                                        <li>
                                            <div class="plan_top"></div>
                                        </li>
                                        <li>
                                            <div class="plan_top_box">
                                                <div class="price_box">
                                                    <h3>Pricing</h3>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan_meta">
                                                Services
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Real time Admission Counselling
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Email+ Chat Support
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Essay
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               LOR's
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Scholarships
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Webinar
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Documents Evaulation
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Shortlisting Programs 
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               Shortlisting University 
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Following up with university 
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Acceptance Letter
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Admission Letter (I20's/LOA)
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Scholarships
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Courier I20's/Admisson Letter
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Partner university I20/ Admisison Letter
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Test Prep (IELTS/TOEFL/GRE/SAT/GMAT/PTE)
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Financing
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Assistance in Filling University Applications
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                One University Application Fee
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Education Loan
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Online Visa Training
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Embassy Visa Application
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Booking Visa Slot
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Mock Interview
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Phone Support
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Two University Application Fee
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Existing Students/ Delegates Talks
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Over 4000 Courses access till 1 year
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Communication and Personality Devlopment
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Ondemand Trainer
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                CA and Finance Report 
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Air Ticket Assistance
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Forex  Assistance
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Travel Insurance
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                One Time DS160 & SEVIS Payment
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               AirPort Pickup max 50 USD Refund
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                3 Days Accomdations in Host Country
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Job Assitance (Part time/Full time)
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Free Education in Europe*
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               Internships (Work and Study)
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Certificate Attestation & Apostille
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box odd_color">
                                               SM CashBack
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                Student Ambassador
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color blank_height">
                                              
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="plan_main_box">
                                <div class="plan_box basic">
                                    <ul>
                                        <li>
                                            <div class="plan_top"></div>
                                        </li>
                                        <li>
                                            <div class="plan_top_box plan_odd">
                                                <h4>Basic</h4>
                                                <div class="price_box basic_plan">
                                                    <h3>Application Fee only</h3>
                                                    <span></span>
                                                </div>
                                                <button class="btn_try" type="button">Apply Now</button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan_meta font_0">
                                                Services
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <button class="btn_try" type="button">Apply Now</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="plan_main_box  advanced">
                                <div class="plan_box basic">
                                    <ul>
                                        <li>
                                            <div class="plan_top"></div>
                                        </li>
                                        <li>
                                            <div class="plan_top_box">
                                                <h4>Standard</h4>
                                                <div class="price_box">
                                                    <h3>$500</h3>
                                                    <span></span>
                                                </div>
                                                <button class="btn_try" type="button">Apply Now</button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan_meta font_0">
                                                Services
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <button class="btn_try" type="button">Apply Now</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="plan_main_box">
                                <div class="plan_box basic Premium">
                                    <ul>
                                        <li>
                                            <div class="plan_top"></div>
                                        </li>
                                        <li>
                                            <div class="plan_top_box plan_odd">
                                                <h4>Professional </h4>
                                                <div class="price_box">
                                                    <h3>$1000</h3>
                                                    <span></span>
                                                </div>
                                                <button class="btn_try" type="button">Apply Now</button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan_meta font_0">
                                                Services
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                         <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                               <i class="fa fa-times-circle-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <button class="btn_try" type="button">Apply Now</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="plan_main_box Enterprise">
                                <div class="plan_box basic">
                                    <ul>
                                        <li>
                                            <div class="plan_top"></div>
                                        </li>
                                        <li>
                                            <div class="plan_top_box">
                                                <h4>Enterprise</h4>
                                                <div class="price_box">
                                                    <h3>$1500</h3>
                                                    <span></span>
                                                </div>
                                                <button class="btn_try" type="button">Sign Up</button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan_meta font_0">
                                                Services
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box odd_color">
                                                 <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tb_box even_color">
                                                <button class="btn_try" type="button">Contact us</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php if($details['is_services'] == 0) { 
    echo getOurServices();
} ?>

<?php if($details['photo_gallery'] == 0) { 
    echo getPhotosGallery();
} ?>

<?php if($details['scholar_form'] == 0) { 
    echo getScholarshipForm();
} ?>

<?php if($details['is_testimonails'] == 0) { 
    echo getTestimonails();
} ?>

<?php if($details['video_gallery'] == 0) { 
    echo getVideoGallerySection();
} ?>

</div>


