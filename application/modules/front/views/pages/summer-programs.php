<div class="main_container">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="top_summer_bg">
                            <a href="#"> <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/top_bg_summer.jpg"></a>
                            <span>Call 8088-867-867 , 7722-867-867 Email: admission@studymetro.com</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="apply_form form_summer">
                            <div class="apply_head">
                                Apply For Summer Programs in Abroad
                            </div>
                            <div class="apply_content">
                                <form method="post" action="<?php echo base_url(); ?>front/home/doSummerProgramEnquiry">
                                    <div class="form-group">
                                        <label for="name"> Name * </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email *</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" required placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone Number *</label>
                                        <input type="text" class="form-control" id="name" name="phone" required placeholder="Phone Number">
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Skype Id </label>
                                        <input type="text" class="form-control" id="name" name="SkypeId" placeholder="Skype Id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" id="name" name="city" placeholder="City">
                                    </div>
                                    <button type="submit" class="btn btn-default">Register me</button>
                                </form>
                            </div>
                        </div>
                    </div><br/>
                    <iframe src="https://player.vimeo.com/video/150655800" width="1200" height="700" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="summer_prg">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12">
                            <div class="summer_prg_data">
                                <h2>Exchange Programs:</h2>
                                <p>An exchange program offers students an amazing opportunity to study at a foreign university during a semester, year or summer abroad</p>
                              <p>Exchange programs are a great match for many students because:</p>
                              <ul class="list_summer_prg">
                                  <li>You can take courses in English or develop your advanced foreign language skills</li>
                                  <li> You can enroll in courses abroad that will count towards your major, minor or other degree requirements</li>
                                  <li>You can afford it!  Exchange students pay regular tuition plus the cost of living abroad</li>
                                  <li>You can choose an exchange in a small town or buzzing metropolis.</li>
                              </ul>
                            </div>
                            <div class="summer_prg_data">
                                <h2>Internship Abroad</h2>
                                <p>International internships offer a range of academic, professional and personal learning outcomes for students. Increasingly employers are interested in hiring individuals with demonstrated cross-cultural skills and a proven record of professional experience in their field.
                                    <p>Through international internship programs you can:</p>

                                </p>
                              <ul class="list_summer_prg">
                                  <li>Explore your career path and understand business practices in another country</li>
                                  <li> Develop valuable competiencies through hands-on work experience</li>
                                  <li>Boost your resume and gain a competitive edge in the job market</li>
                                  <li>Work in an English-speaking company or perfect your foreign language skills</li>
                                   <li>Connect with and develop an international network of professional contacts in your field</li>
                                   <li>Earn academic credit that counts towards your major, minor or other degree requirements (through credit-bearing programs)</li>
                                  
                              </ul>
                            </div>
                            <div class="summer_prg_data">
                                <h2>Who Should Intern Abroad?</h2>
                                <p>Internships are valuable for all students and majors, and we encourage you to explore the range of internship opportunities available. Students that are a good fit for an internship program are those who:
                                  
                                </p>
                              <ul class="list_summer_prg">
                                  <li>Are flexible, adaptable, proactive and adventurous</li>
                                  <li>Want to actively engage in meaningful professional development abroad</li>
                                  <li>Are interested in learning about different cultures and work environments</li>
                              </ul>
                            </div>
                            <div class="summer_prg_data">
                                <h2>We are here to introduce our international summer program 2016 to students.</h2>
                                <p>Study Metro avails the opportunity for students who have the courage not only to dream but
                                    to turn dream into reality. We will provide you in hands experience of attending an array
                                    of summer programs offered by renowned universities globally.</p>
                                <p>By benefiting our Summer Program you have an opportunity to live the time you dream of but
                                    also make friends and get experience on how life is in top universities in various countries
                                    like USA, EUROPE,CHINA , MALAYSIA, SINGAPORE and many more.</p>
                                <p>Dial +91-78030887476 now to avail the free counselling from our expert career advisors.</p>
                                <h4>Join Universities in World</h4>
                                <ul class="top_univ">
                                <?php 
                                $summerPrograms = getAllSummerPrograms();
                                if(!empty($summerPrograms)) { foreach($summerPrograms as $sp) { ?>
                                    <li> 
                                        <span><?php echo ucwords($sp['university']); ?>,</span>
                                        <div class="data_wrap">
                                        <?php echo $sp['period']; ?>
                                        (<?php echo $sp['location']; ?>, <?php echo $sp['country']; ?>) cost:$<?php echo $sp['dollar_fee']; ?> : Rs <?php echo $sp['inr_fee']; ?>
                                        <?php
                                            $uid = $this->session->userdata("user_id");
                                            if(empty($uid)){ ?>
                                                </div>
                                                <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static" class="appy_btn appy_summer">apply to this program</a> -->
                                                <a href="<?php echo base_url(); ?><?php echo $sp['id']; ?>/apply-to-program?type=1" class="appy_btn appy_summer">apply to this program</a>
                                        <?php  }else{ ?>
                                                <a href="<?php echo base_url(); ?><?php echo $sp['id']; ?>/apply-to-program?type=1" class="appy_btn appy_summer">apply to this program</a>
                                        <?php } ?>
                                    </li>
                                <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="summer_video">
                <div class="container">
                    <div class="iframe_box">
                        <iframe width="83%" height="600" frameborder="0" class="embed-responsive-item" allowfullscreen="" src="https://www.youtube.com/embed/I8Bxf7RoE90"></iframe>
                    </div>

                    <ul class="list_summer_video">
                        <li><a href="#">usa</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">success stories</a></li>
                        <li><a href="#">student testimonial</a></li>
                        <li><a href="#">universities webinar</a></li>
                        <li><a href="#">snapshots</a></li>
                        <li><a href="#">animated-video</a></li>
                        <li><a href="#">student-talk-about-study-metro</a></li>
                        <li><a href="#">university-talk-about-study-metro</a></li>
                        <li><a href="#">Meet with study metro counsellor</a></li>
                        <li><a href="#">F1 E-learning visa training</a></li>
                        <li><a href="#">apply for franchaisee </a></li>
                    </ul>
                    <div class="bg_join">
                        <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/FlyerFront.jpg" style="width:100%">
                        <div class="bg_join_data">
                            <p>As part of STUDY METRO International Summer Programs, you'll have the unique opportunity to relish
                                your desire, while you gain experience with Global Education Leaders.The STUDY METRO international
                                summer program is designed for students,recent university graduates and young professionals
                                and any one who has the courage to live their dreams.if you are among those handful who would
                                like to broaden their international outlook, experience international University first hand
                                and enjoy international, then this is just what you needed. so what are you waiting for "
                                Pack your bags and let your Dreams turn into Reality</p>
                            <h2>AND REMEMBER WE ARE JUST A MISSED CALL AWAY:</h2>
                            <h2>Call Us 8088-867-867, 7722-867-867  Email: admission@studymetro.com</h2>
                        </div>
                    </div>
                    <div class="internation_summer_bg">
                        <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/FlyerBack.jpg">
                        <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/internationa_summer_bg.jpg">
                        <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/STUDY METRO_Advertorial.jpg">
                    </div>
                </div>
            </div>
        </div>