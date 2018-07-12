<link href="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/css/mdb.min.css" rel="stylesheet">
<link href="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/css/flipclock.css" rel="stylesheet">
<link href="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/css/city-events.css" rel="stylesheet">

<!--Main container sec start-->
        <div class="main_container">
            <section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
                <?php if($details['media'] == 1){ ?>
                    <video controls autoplay muted loop id="bg_video">
                      <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
                      <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
                    </video>
                <?php } ?>
            </section>

            <section class="registration_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="common_head footer_head wow fadeInDown" data-wow-delay="0.2s">
                                <div class="regis_logo">
                                    <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/logo.png" class="img-responsive">
                                    <p>India, April 2nd - April 10th 2017</p>
                                    <h1>Join us for International Edu Fair 2017 in India </h1>
                                    <p> Prices will increase After</p>
                                </div>
                                <div class="timer_c">
                                    <div class="clock"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="register_main">
                                <form class="form-horizontal" method="post" id="event-form">
                                    <div class="R_sec">
                                        <div class="R_content card-block wow animated fadeInLeft" data-wow-duration="2s">
                                            <div class="top_row">
                                                <h3>Promotional Campaign Request Form</h3>
                                            </div>
                                            <div class="md-form">
                                                <i class="fa fa-university prefix"></i>
                                                <input type="text" id="form1" class="form-control" name="institution">
                                                <label for="form1">Institution:</label>
                                            </div>
                                            <div class="md-form">
                                                <i class="fa fa-user prefix"></i>
                                                <input type="text" id="form2" class="form-control" name="name">
                                                <label for="form2"> Contact Name:</label>
                                            </div>
                                            <div class="md-form">
                                                <i class="fa fa-phone prefix"></i>
                                                <input type="text" id="form3" class="form-control" name="phone">
                                                <label for="form3">Phone:</label>
                                            </div>
                                            <div class="md-form">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="form4" class="form-control" name="email">
                                                <label for="form4">Your Email</label>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-sm-9">
                                                    <span><button type="button" class="commn_btn sub_btn register-event"> Register</button></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="fair_box wow animated fadeInRight" data-wow-duration="2s">
                                            <div class="head_fair">
                                                <h3>We would like to participate, give a presentation at any of the following
                                                    Fairs and / or send our information to registered candidates: </h3>
                                                <p>(Please tick selected cities and options of your choice) </p>
                                            </div>
                                            <div class="fair_content">
                                                <div class="fair_head">
                                                    <h2>City Events & Registration Details</h2>
                                                    <h3 class="animated bounce infinite">Great Offers: Pay for 3 cities and explore 2 more Cities for free. Thus,
                                                        visit overall 5 Cities </h3>
                                                    <p> Contact <a href="mailto:support@studymetro.com">support@studymetro.com </a></p>
                                                </div>
                                                <div class="table_main_box">
                                                    <div class="table_in_box">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>CITY/DATE</th>
                                                                    <th>Venue</th>
                                                                    <th>Early Registration Rates (by January 31st, 2017)</th>
                                                                    <th>Regular Registration Rates (by February 24th, 2017)</th>
                                                                    <th>Late Registration Rates(After February 24th, 2017) </th>
                                                                    <th>Presentation</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php  if(!empty($events)) { foreach($events as $e) { 
                                                                $prices_arr   = unserialize($e['price']);
                                                                $is_table_arr = unserialize($e['is_table']);
                                                              ?>
                                                                <tr>
                                                                    <td><?php echo $e['name']; ?>, <?php echo $e['city']; ?>, <?php echo date('F, dS',strtotime($e['date'])); ?></td>
                                                                    <td><a href="<?php echo (!empty($e['hotel_url'])) ? $e['hotel_url'] : 'javascript:void(0)'; ?>" target="_blank"><?php echo $e['venue']; ?></a></td>
                                                                <?php if($e['is_free'] == 1) { ?>
                                                                    <td><input name="events[]" class="city-events" type="checkbox" id="checkbox_1_<?php echo $e['id']; ?>" value="0@<?php echo encode($e['id']); ?>">
                                                                        <label for="checkbox_1_<?php echo $e['id']; ?>"></label> $<?php echo $prices_arr[0]; ?><?php echo ($is_table_arr[0] == 0) ? ', Table': '' ?></td>
                                                                    <td><input name="events[]" class="city-events" type="checkbox" id="checkbox33_1_<?php echo $e['id']; ?>" value="1@<?php echo encode($e['id']); ?>">
                                                                        <label for="checkbox33_1_<?php echo $e['id']; ?>"></label> $<?php echo $prices_arr[1]; ?><?php echo ($is_table_arr[1] == 0) ? ', Table': '' ?></td>
                                                                    <td><input name="events[]" class="city-events" type="checkbox" id="checkbox44_1_<?php echo $e['id']; ?>" value="2@<?php echo encode($e['id']); ?>">
                                                                        <label for="checkbox44_1_<?php echo $e['id']; ?>"></label> $<?php echo $prices_arr[2]; ?><?php echo ($is_table_arr[2] == 0) ? ', Table': '' ?></td>
                                                                    <td><input name="events[]" class="city-events" type="checkbox" id="checkbox55_1_<?php echo $e['id']; ?>" value="3@<?php echo encode($e['id']); ?>">
                                                                        <label for="checkbox55_1_<?php echo $e['id']; ?>"></label> $<?php echo $prices_arr[3]; ?><?php echo ($is_table_arr[3] == 0) ? ', Table': '' ?></td>
                                                                <?php } else { ?>
                                                                    <td>Free</td>
                                                                    <td>Free</td>
                                                                    <td>Free</td>
                                                                    <td>Free</td>
                                                                <?php } ?>
                                                                    
                                                                </tr>
                                                              <?php } } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="hidden"><button type="button" class="commn_btn"> Submit</button></span>
                                        <span class="hidden"><button type="reset" class="commn_btn">Reset</button></span>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                     <div class="container">
                    <div class="mid_r_sec" id="pinBoot">
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>About Study Metro</h1>
                                <ul>
                                    <li>Study Metro is a professional education consultancy firm, extending excellent support
                                        and service to students all over India and gives unlimited study opportunities across
                                        the Globe.
                                    </li>
                                    <li>Study Metro is an AIRC, NAFSA, ICEF, EAIE, AIEA and QISAN Certified and Members. A Leading
                                        Overseas Education Industry with the “Vision is to transform student’s life by making
                                        Study Abroad Applicable to all”. </li>
                                    <li>Present in student communities in South India, Central India and Western India with 8 offices in Bangalore, Indore, Mumbai, Ahmedabad, Anand, Surat, Coimbatore and Hyderabad.
                                    </li>
                                    <li>Established in 2011</li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="right_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Welcome to Study Metro EDU Fair!</h1>
                                <h5>We invite you to participate in the 2017 student fair across our cities where Study Metro has a strong presence and reputation.  The fair is a great opportunity for universities to:</h5>
                                <ul>
                                    <li>Encourage Indian students and their parents to consider the Study Abroad as their first choice premium study destination. </li>
                                    <li>Target students in all the stages of education, allowing them time to gather information and prepare for the next intake. </li>
                                    <li>Showcase pathways to all educational sectors: English language, foundation, undergraduate, postgraduate and doctorate. </li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>EDU Fair Benefits</h1>
                                <div class="left_content">
                                    <div class="list_benefit">
                                        <h4><span>1)</span> Improved conversion  </h4>
                                        <p>Promote the benefits of your institution directly to the student, and the opportunity of providing pre-admission letters of offer on the day to counseled students who have submitted an application. </p>
                                    </div>

                                    <div class="list_benefit">
                                        <h4><span>2)</span> Effective use of university officials time  </h4>
                                        <p>Meeting pre-counseled students in an allocated time session will allow for more individual and tailored counseling by the representatives leading to better use of their time in-country on event day.  </p>
                                    </div>
                                    <div class="list_benefit">
                                        <h4><span>3)</span> Qualified leads </h4>
                                        <p>Generate new qualified leads for the 2017 / 2018 intakes. Develop a pipeline of students who will work to meet your academic requirements to get admissions. </p>
                                    </div>
                                    <div class="list_benefit">
                                        <h4><span>4)</span> Showcase for the United States Education </h4>
                                        <p>Continue to build your institution’s presence in a mature market to recruit across the entire educational spectrum, from pre-university to postgraduate. The event will also emphasize the reputation of the institutions in the United States as high quality teaching and research destinations to both public and private employers, as well as to professional bodies. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Travel & Accommodations</h1>
                                <ul>
                                    <li>We take care of you from the moment you arrive in the first city on the tour! </li>
                                    <li>Remove the stress and hassle of travel planning by selecting one of our popular Travel Packages throughout our regional recruiting tours. This gives you the benefit of our group rates with hotels, airlines, and affordable airport transfers by traveling with the rest of the group on safe and air-conditioned buses. You can rely on our experienced staff to make all of your travel arrangements so you can focus your time connecting with candidates and develop peer relationships with other school admissions officers
                                    </li>
                                </ul>
                                <h5>Travel Packages Include:</h5>
                                <ul>
                                    <li>Airfare from the first city to the last city within the travel package</li>
                                    <li>Single room accommodations in 4-5 star hotels with full breakfast and Internet</li>
                                    <li>Airport transfers during group travel, including airport taxes where applicable</li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Why Participate?</h1>
                                <ul>
                                  <li>To recruit  Grad, Undergrad and other short term international students from India.</li>
                                  <li>To increase branding and visibility among Indian students and families.</li>
                                  <li>To create relationships with students with one on one interaction and class presentations.</li>
                                  <li>To develop partnerships with local high school and colleges. </li>
                                  <li>Cost effective recruitment solution to reach a larger audience and build your partnership with StudyMetro.</li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Partnership Development</h1>
                                <p> Special Bonus to the fair - ESTABLISH PARTNERSHIPS WITH INDIAN UNIVERSITIES AND INSTITUTIONS FOR STUDENT EXCHANGE</p>
                                <ul>
                                  <li>Under the new provision, Indian students are now finally allowed to go for an Exchange or Semester/ Year Abroad Program. Meet relevant institutions, exchange proposal in advance before the meeting so meetings can convert in to real business.</li>
                                  <li>Indian School Principals will have the opportunity to meet the International High schools for exchange of students and other forms of mutual collaborations in fields of academics, culture, sports and resources.</li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="right_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Fair Details:</h1>
                                <ul>
                                    <li>April 2nd to April 10th, 2017</li>
                                    <li>6 Cities in India, Bangalore, Mumbai, Vadodara, Ahmedabad, Indore.</li>
                                    <li>High School/Universities Visits (optional) </li>
                                    <li>Dinners with local university officials (optional)</li>
                                    <li>Education Fairs arranged in international hotels </li>
                                    <li>Live Workshop Presentations </li>
                                    <li>Travel/ Hotel Arrangement  </li>
                                </ul>
                            </div>
                        </article>
                         <article class=" white-panel">
                            <div class="right_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Night Summit</h1>
                                <ul>
                                    <li>The Magic Began Basically after the conference was over in the evening. </li>
                                    <li>Meeting with One to One with Indian School/ College Representative </li>
                                    <li>Drink and Networking with Attendees. </li>
                                    <li>Discussion on Student Exchange/ Faculty exchange and Summer Programs. </li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="right_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Digital Marketing (2.5 M +Students):</h1>
                                <ul class="">
                                    <li>Facebook Target Ads</li>
                                    <li>Post on Study Abroad Facebook Pages & Groups </li>
                                    <li>LinkedIn and Twitter Ads </li>
                                    <li>Google AdWords & Bing Ads </li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="right_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>Deliverables to Participants:</h1>
                                <h5>Accommodations & Food Details:</h5>
                                <ul class="">
                                    <li>Reservation in 5/7 Starts Leading Hotels.</li>
                                    <li>Possibilities are (Vivanta By Taj, Oberoi, Grand Hyatt)</li>
                                    <li>Incudes Free Breakfast</li>
                                    <li>Lunch will be served during Events and School Visit</li>
                                    <li>Dinner with Indian universities/School Representative will be Organized by Study Metro
                                    </li>
                                    <li>Banner/Poster/Bulk Email/SMS through out events. </li>
                                </ul>
                                <h5>Event Details:</h5>
                                <ul>
                                    <li>Study Metro will be responsible for providing utilities necessary for successful completion
                                        of Event
                                    </li>
                                    <li>Student Registration information will be shared.)</li>
                                    <li>Fully-Integrated Online Student Lead Management will be Provided</li>
                                    <li>Meeting rooms for Private Sessions with Students for one-to-one Interactions</li>
                                    <li>Included 360-Degree promotional Plan & Digital Marketing</li>
                                </ul>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>TARGET AUDIENCE</h1>
                                <ul>
                                    <li>School students (Pursuing 12th & Pass out)</li>
                                    <li>College Students (UG/PG & Pass out)</li>
                                    <li>Students doing technical Courses</li>
                                    <li>Parents accompanying students </li>
                                    <li>Working IT/ Other Professionals </li>
                                </ul>
                                <strong><h5>Note: Expecting 700+ Students to participate in each city.</h5></strong>
                            </div>
                        </article>
                        <article class=" white-panel">
                            <div class="left_sec wow fadeInDown" data-wow-delay="0.3s">
                                <h1>A 360-Degree Marketing Plan</h1>
                                <h5>The Study Metro Edu fair is backed by a huge Media Plan, which includes Print, Internet,
                                    Radio, Television, Mobile hoarding, Bill board, Road shows, SMS etc. </h5>
                                <p><label>Print-Print Ads would be released 7 to 10 days before the event dates in publications like:</label></p>
                                <ul class="">
                                    <li>Times of India </li>
                                    <li>The Hindu </li>
                                    <li>Regional Paper</li>
                                    <li>Pre event and Post Event Coverage in the editorial columns of News Papers</li>
                                    <li>Radio - 100 slots each on Radio for 1week before the date of the fair. </li>
                                    <li>Online- An online banner of India Edu fair will be there on home page of Prominent website
                                        a week before the event </li>
                                    <li>E-mailers will be sent to target groups, specified by the participants in Edu fair
                                    </li>
                                    <li>  SMS blasts will be send to prospective candidates from the Indian Students database</li>
                                    <li>BTL Marketing  </li>
                                    <li>A Handbook with all the details on Education Abroad and all the participate to be given away to every student at the venue.   </li>
                                </ul>
                                <p>Promotion drive through in-campus promotion in schools/universities</p>
                            </div>
                        </article>
                    </div>
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="left_sec agenda_sec wow fadeInDown text-center">
                                <a href="<?php echo base_url(); ?>assets/images/International-Student-EDU-Fair-2017.pdf" download class="down_pd">International Student EDU Fair 2017</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="common_head footer_head include_head">
                                <h2>Agenda</h2>
                                <div class="head_border">
                                    <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="left_sec agenda_sec wow fadeInDown" data-wow-delay="0.2s">
                                <div class="agenda_view ">
                                    <div class="date_box">
                                        <div class="date">April 1st  2017 <span>(Saturday)</span></div>
                                    </div>
                                    <div class="agenda_right">
                                        <h4>Universities Registration and Welcome Dinner <span>@ Vivanta by Taj, Bangalore</span></h4>
                                        <ul>
                                            <li>Universities Registration from 18:00 hours to 21:00 Hours. </li>
                                            <li>Welcome Dinner at 20:00 Hours &nbsp; </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="agenda_view">
                                    <div class="date_box">
                                        <div class="date">April 2nd 2017 <span>(Sunday)</span></div>
                                    </div>
                                    <div class="agenda_right">
                                        <h4> Education Fair <span> @ Vivanta by Taj, Bangalore</span></h4>
                                        <ul>
                                            <li>Student Registration from 09:00 hours to 10:00 Hours </li>
                                            <li>Welcome Speech from Director, Study Metro (10:00 Hours to 10:30 Hours) </li>
                                            <li>Beginning of Event from 10:30 Hours to 13:00 Hours</li>
                                            <li>Lunch from 13:00 Hours to 14:00 Hours</li>
                                            <li>Event Continuation from 14:00 Hours to 17:00 Hours</li>
                                            <li>5 Concurrent Session by University Officials and Industrial Experts, each of
                                                30 Minutes Closure Speech </li>
                                            <li>Networking Dinner with Indian Universities/Schools Director and Principle from
                                                20:00 Hours to 23:00 Hours.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="agenda_view">
                                    <div class="date_box">
                                        <div class="date">April 3rd 2016 <span>(Monday)</span></div>
                                    </div>
                                    <div class="agenda_right">
                                        <!--<h4>Universities Registration and Welcome Dinner <span>@ Vivanta by Taj, Bangalore</span></h4>-->
                                        <ul>
                                            <li>School Visit from 10:00 hours to 16:00 Hours </li>
                                            <li>Lunch will be Served @ 13:00 hours</li>
                                            <li>Evening Flight from Bangalore to Mumbai at 18:00 Hours </li>
                                            <li>Check-in &amp; Registration @ Mumbai </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="common_head footer_head include_head">
                                <h2>include</h2>
                                <div class="head_border">
                                    <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="include_sec">
                                <ul class="block_list clearfix">
                                    <li>
                                        <div class="getstart_bock">
                                            <div class="circle_icon"><span class=""><img class="wow zoomIn" width="42" height="42" data-wow-delay="0.3s" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/hotel-1.png"></span></div>
                                            <p class="wow fadeInDown" data-wow-delay="0.3s">Reservation in 5/7 Star Leading Hotels.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="getstart_bock">

                                            <div class="circle_icon"><span class=""><img class="wow zoomIn" width="42" height="42" data-wow-delay="0.4s"  src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/hotel-2.png"></span></div>
                                            <p class="wow fadeInDown" data-wow-delay="0.4s">Possibilities are (Vivanta By Taj, Oberoi, Grand Hyatt)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="getstart_bock">
                                            <div class="circle_icon"><span class=""><img class="wow zoomIn" width="42" height="42" data-wow-delay="0.5s" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/dessert.png"></span></div>
                                            <p class="wow fadeInDown" data-wow-delay="0.5s">Includes international Breakfast</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="getstart_bock">
                                            <div class="circle_icon"><span class=""><img class="wow zoomIn" width="42" height="42" data-wow-delay="0.6s" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/dinner-1.png"></span></div>
                                            <p class="wow fadeInDown" data-wow-delay="0.6s">Lunch served during Events and School Visits</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="getstart_bock">
                                            <div class="circle_icon"><span class=""><img class="wow zoomIn" width="42" height="42" data-wow-delay="0.7s" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/table.png"></span></div>
                                            <p class="wow fadeInDown" data-wow-delay="0.7s">Dinners with Indian universities/School Representatives</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="getstart_bock">
                                            <div class="circle_icon"><span class=""><img class="wow zoomIn" width="42" height="42" data-wow-delay="0.8s" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/calendar.png"></span></div>
                                            <p class="wow fadeInDown" data-wow-delay="0.8s">Banner/Poster/Bulk Email/SMS through out events</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                           
                            <?php if($details['photo_gallery'] == 0) { 
                                echo getPhotosGallery();
                            } ?>
                   
                    <section class="in_video_sec wow zoomIn" data-wow-duration="2s">
                        <div class="common_head footer_head include_head">
                            <h2>Video gallery</h2>
                            <div class="head_border">
                                <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <?php if($details['video_gallery'] == 0) { 
                            echo getVideoGallerySection();
                        } ?>   
                    </section>
                  <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="sponser_box wow zoomIn" data-wow-duration="2s">
                                <div class="common_head footer_head">
                                    <h2>Sponsorship Opportunities</h2>
                                    <div class="head_border">
                                        <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="blog_box_content1 ">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                                        class="">
                                                Platinum Sponsors
                                                <span class="accor_price">10,000 USD</span>
                                               <i class="indicator glyphicon pull-right glyphicon-minus"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true"
                                                style="">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li>Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as "Principal Sponsor"</li>
                                                        <li>4 Dedicated Workshop Presentations to max. for 30 minutes</li>
                                                        <li>Name and logo will be prominently displayed in all Promotional Advertisements (newspaper, digital campaign, social media) as "Principal Sponsor"</li>
                                                        <li>Name and logo will be prominently displayed on Delegates Badges and Lanyards</li>
                                                        <li>Marketing and Promotion materials in Delegates Kit (Brochure and Flyer)</li>
                                                        <li>One 8 x10 Ft Promotional Banner Wall at the Registration Area</li>
                                                        <li>Special Reserved Access to VIP seating Area based on Sponsorship Type with delegates from International college/schools during the Gala Dinner</li>
                                                        <li>Access to VIP Lounge for Networking Meetings</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                Gold Sponsors <span class="accor_price">8,000 USD</span>
                                                <i class="indicator glyphicon pull-right glyphicon-plus"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false"
                                                style="height: 0px;">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Special Pavilion/Booth with a dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as "Gold Sponsor"</li>
                                                        <li> Name and logo will be prominently displayed in all Promotional Advertisements (newspaper, digital campaign, social media) as "Gold Sponsor"</li>
                                                        <li> Name and logo will be prominently displayed on Delegates Badges</li>
                                                        <li> Marketing and Promotion materials in Delegates Kit (Brochure and Flyer)</li>
                                                        <li> 2 Dedicated Workshop Presentations to max. for 30 minutes </li>
                                                        <li> Special Reserved Access to VIP seating Area based on Sponsorship Type with delegates from International college/schools during the Gala Dinner</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree">
                                                Silver Sponsors <span class="accor_price">6,000 USD</span>
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Special Pavilion/Booth with a dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as "Silver Sponsor"</li>
                                                        <li> Name and logo will be prominently displayed in all Promotional Advertisements (newspaper, digital campaign, social media) as "Silver Sponsor"</li>
                                                        <li> Name and logo will be prominently displayed on Delegates Badges</li>
                                                        <li> Marketing and Promotion materials in Delegates Kit (Brochure and Flyer)</li>
                                                        <li> One 7 x7 Ft Promotional Banner at the Registration Area</li>
                                                        <li> Special Reserved Access to VIP seating Area based on Sponsorship Type with delegates from International college/schools during the Gala Dinner</li>
                                                        <li> Access to VIP Lounge for Networking Meetings</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree1">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree1" aria-expanded="false"
                                                        aria-controls="collapseThree1">
                                                Student Kit Sponsor <span class="accor_price">3,000 USD</span>
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree1" aria-expanded="false">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as “Students Kit Sponsor”</li>
                                                        <li> Name and logo will be prominently displayed on all 5000+ Students Kit as “Students Kit Sponsor”</li>
                                                        <li> One 7 x7 Ft Promotional Banner at the Registration Area</li>
                                                        <li> Special Reserved Access to VIP seating Area based on Sponsorship Type with delegates from International college/schools during the Gala Dinner</li>
                                                        <li>Name Displayed in Bags, Pens and Diary </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog1">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse1" aria-expanded="false"
                                                        aria-controls="blog1">
                                                Promotional/Marketing Material Sponsors <span class="accor_price">3,000 USD</span>
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="blogcollapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blog1" aria-expanded="false">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as “Promotional Marketing Material Sponsor”</li>
                                                        <li> Name and logo will be prominently displayed in all Promotional Marketing Materials given to delegates (High Quality and Branded Pens, Diaries and Business Cards Holders)</li>
                                                        <li> One 7 x7 Ft Promotional Banner at the Registration Area</li>
                                                        <li> Special Reserved Access to VIP seating Area based on Sponsorship Type with delegates from International college/schools during the Gala Dinner</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog2">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse2" aria-expanded="false"
                                                        aria-controls="blog2">
                                                Gala Dinner Sponsors <span class="accor_price">2,500 USD</span>
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="blogcollapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blog2" aria-expanded="false">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as “Gala Dinner Sponsor”</li>
                                                        <li> Theme and Branding of Gala Dinner Area will be designed as per “Gala Dinner Sponsor”</li>
                                                        <li> Special Promotion as the Launch of Global Access is during Gala Dinner and high level dignitaries from academic industry</li>
                                                        <li> One 7 x7 Ft Promotional Banner at the Registration Area</li>
                                                        <li> Access to VIP Lounge for Networking Meetings</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog3">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse3" aria-expanded="false"
                                                        aria-controls="blog3">
                                                Lunch Sponsors <span class="accor_price">2,000 USD</span>
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="blogcollapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blog3" aria-expanded="false">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as “Lunch Sponsor”</li>
                                                        <li> Theme and Branding of Lunch Area will be designed as per “Lunch Sponsor”</li>
                                                        <li> One 7 x7 Ft Promotional Banner at the Registration Area</li>
                                                        <li> Access to VIP Area for Lunch.</li>
                                                        <li> B2B Meetings with Participating Institutions for Partnerships</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="blog4">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#blogcollapse4" aria-expanded="false"
                                                        aria-controls="blog4">
                                                Tea/Coffee Sponsors <span class="accor_price">1,000 USD</span>
                                                <i class="indicator glyphicon glyphicon-plus pull-right"></i>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="blogcollapse4" class="panel-collapse collapse" role="tabpane" aria-labelledby="blog4" aria-expanded="false">
                                                <div class="panel-body">
                                                    <ul class="list_faq">
                                                        <li> Dedicated Table and Chair with Special Branding & High Visibility</li>
                                                        <li> Name and Logo will be prominently displayed on Summit Website and Conference Venue on the Main Backdrop, Banners, Hoardings, and Promotional Materials as “Tea/Coffee Sponsor”</li>
                                                        <li> Theme and Branding of Hi-Tea/Coffee Area will be designed as per “Tea/Coffee Sponsor”</li>
                                                        <li> One 7 x7 Ft Promotional Banner at the Registration Area</li>
                                                        <li> Special Reserved Access to VIP seating Area based on Sponsorship Type with delegates</li>
                                                        <li> B2B Meetings with Participating Institutions  for Partnerships</li>
                                                        <li> Access to VIP Lounge for Networking Meetings</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="terms">
                            <div class="common_head footer_head include_head">
                                <h2>Terms and Conditions for Participation:</h2>
                                <div class="head_border">
                                    <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="right_sec terms  wow fadeInDown" data-wow-delay="0.2s">
                                
                                <ul class=" terms ">
                                    <li>An educational institution may choose to send multiple travelers on a tour. Additional
                                        travelers will pay Travel and Accommodations Charges. </li>
                                    <li>The Institution must give written notice and if this notice is given prior to 60 days
                                        of the commencement of the event, a 30% cancellation fee will be applied. b) the
                                        Institution must give written notice and if this notice is given prior to 30 days
                                        of the commencement of the event, a 50% cancellation fee will be applied. c) if the
                                        Institution gives notice of cancellation within 30 days of commencement of the event,
                                        no cancellation will be permitted and the full amount will remain either payable
                                        or no refund will be offered on monies previously paid.
                                    </li>
                                    <li>Institution acknowledges and agrees that Study Metro shall not be liable for any loss,
                                        injury, delay or damage from any cause beyond its control.</li>
                                    <li>Study Metro is not responsible for personal or travel and health insurance and recommends
                                        that travelers purchase appropriate insurance and plan for contingencies.
                                    </li>
                                    <li>In case a university changes the individual(s) traveling, cancellation and rebooking
                                        charges will be billed to the participating University.
                                    </li>
                                </ul>
                            </div>
                            <form class="form-horizontal" method="post" id="event-form-bottom">
                            <div class="R_content card-block wow animated fadeInLeft" data-wow-duration="2s">
                                <div class="top_row">
                                    <h3>Promotional Campaign Request Form</h3>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-university prefix"></i>
                                    <input type="text" id="form11" class="form-control" name="institution">
                                    <label for="form1">Institution:</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="form22" class="form-control" name="name">
                                    <label for="form2"> Contact Name:</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-phone prefix"></i>
                                    <input type="text" id="form33" class="form-control" name="phone">
                                    <label for="form3">Phone:</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="email" id="form44" class="form-control" name="email">
                                    <label for="form4">Your Email</label>
                                </div>
                            </div>
                            <div class="accept_main">
                                <div class="accept_terms wow fadeInDown" data-wow-delay="0.2s">
                                    <input id="accept_terms" type="checkbox">
                                    <label for="accept_terms"></label>I confirm that I have read and understood the event
                                    Terms and Conditions. I hereby agree to abide by these Terms and Conditions, which are
                                    stipulated in this contract. I confirm that my organization wishes to participate in the events for
                                    which I have registered above.
                                </div>
                                <button type="button" class="commn_btn register-event-bottom"> Register</button>
                            </div>
                             </div>
                            </form>
                             </div>
                              </div>
                            
            </div>
            <div class="contct_main">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contct_sec">
                                <h2>Looking forward to See you in India. Contact us our below team for any Assistance </h2>
                                <ul class="clearfix teammember_list">
                                    <li class="wow fadeInLeft" data-wow-duration="1s">
                                        <div class="member_img_hover">
                                            <div class="member_img">
                                                <img width="100" height="100" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/michel_img.jpg" class="img-responsive">
                                            </div>
                                        </div>
                                        <h5 class="member_name">Michael Iacovazzi-Pau </h5>
                                        <p class="member_post">Director of University Relations,
                                            <span><i class="fa fa-phone"></i> +1-312-218-8883 (also on what’s app), </span>
                                            <span><i class="fa fa-skype" aria-hidden="true"></i>
                                                    skype: miacovazzipau_sus</span></p>
                                        <!-- <a href="mailto:michael@studymetro.com "><i class="fa fa-envelope"></i> michael@studymetro.com </a> -->
                                    </li>
                                    <li class="wow fadeInDown" data-wow-duration="1s">
                                        <div class="member_img_hover">
                                            <div class="member_img">
                                                <img width="100" height="100" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/michel_img2.jpg" class="img-responsive">
                                            </div>
                                        </div>
                                        <h5 class="member_name">Abhishek Bajaj</h5>
                                        <p class="member_post">Managing Director,
                                            <span><i class="fa fa-phone"></i> 91-8892182127  (also on what’s app), </span>
                                            <span><i class="fa fa-skype" aria-hidden="true"></i>
                                                      Skype: htir.wsp </span></p>
                                        <!-- <a href="mailto:abbieb@studymetro.com "><i class="fa fa-envelope"></i> abbieb@studymetro.com </a> -->


                                    </li>
                                    <li class="wow fadeInRight" data-wow-duration="1s">
                                        <div class="member_img_hover">
                                            <div class="member_img">
                                                <img width="100" height="100" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/michel_img1.jpg" class="img-responsive">
                                            </div>
                                        </div>
                                        <h5 class="member_name">Abhinav Bajaj </h5>
                                        <p class="member_post">VP of International Operations,
                                            <span><i class="fa fa-phone"></i>  91-8962253248 (also on what’s app) </span>
                                            <span><i class="fa fa-skype" aria-hidden="true"></i>
                                                Skype: abbie.studymetro </span></p>
                                        <!-- <a href="mailto:abhishek@studymetro.com "><i class="fa fa-envelope"></i> abhishek@studymetro.com </a> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <!--Main container sec end-->

            <form action="<?php echo PAYPAL_FORM_URL; ?>" method="post" id="paypal-form">
                <input type="hidden" name="cmd" value="_xclick" />
                <input type="hidden" name="charset" value="utf-8" />
                <input type="hidden" name="business" value="<?php echo PAYPAL_BUSINESS_ID; ?>" />
                <input type="hidden" name="item_name" value="City Events" />
                <input type="hidden" name="custom" value="" class="custom-field" /> 
                <input type="hidden" name="amount" value="" class="paypal-amount" />
                <input type="hidden" name="currency_code" value="USD" />
                <input type="hidden" name="return" value="<?php echo base_url(); ?>front/home/paypal_event_success" />
                <input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>front/home/cancel_event_payment" />
                <input type="hidden" name="bn" value="Business_BuyNow_WPS_SE" />
            </form>

            <div id="payment_model" class="modal fade" role="dialog" style="display: none;">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Make Payment</h4>
                        </div>
                        <div class="modal-body">
                            <p class="total-paid-amount">Total Paid Amount - $0</p>
                            <div class="form-group">
                                <label for="pwd">Pay By</label>
                                 <select class="form-control payment-method" name="pay_type">
                                     <option value="0">PayPal</option>
                                     <option value="1">Offline</option>
                                 </select>
                                 <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </div>
                            <input type="hidden" name="event-no" value="">
                            <div class="bank_details hidden">
                                    <p><b>Bank Name :</b>   Axis Bank</p> 
                                    <p><b>Account Name :</b> Study Metro Edu Consultant Pvt Ltd.</p> 
                                    <p><b>Account No. :</b> 914020044524928</p>
                                    <p><b>IFSC Code :</b> UTIB0001680</p>
                                    <p><b>Swift Code :</b> AXISINBB043</p>
                                    <p><b>Bank Telephone Number:</b> 91-8878805032</p>
                                    <p><b>MICR Code:</b> 452211012</p>
                                    <p><b>Bank Address:</b> 139, AB Road, Phadnis Colony, Indore, Madhya Pradesh 452001</p>
                                    <p><b>Our Phone number:</b> 91-8892182127</p>
                            </div>
                                 <button class="commn_btn pay-now"> Pay Now</button>
                        </div>
                    </div>

                </div>
            </div>

  <script src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/js/flipclock.min.js"></script>
  <script src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/js/mdb.min.js"></script>
  <script src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/js/wow.min.js"></script>
                <script>

      $(document).ready(function(){
    $(document).ready(function() {
        new WOW().init();
        $('#pinBoot').pinterest_grid({
        no_columns: 2,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 700
        });
        });


;(function ($, window, document, undefined) {
    var pluginName = 'pinterest_grid',
        defaults = {
            padding_x: 10,
            padding_y: 10,
            no_columns: 4,
            margin_bottom: 50,
            single_column_breakpoint: 700
        },
        columns,
        $article,
        article_width;

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype.init = function () {
        var self = this,
            resize_finish;

        $(window).resize(function() {
            clearTimeout(resize_finish);
            resize_finish = setTimeout( function () {
                self.make_layout_change(self);
            }, 11);
        });

        self.make_layout_change(self);

        setTimeout(function() {
            $(window).resize();
        }, 500);
    };

    Plugin.prototype.calculate = function (single_column_mode) {
        var self = this,
            tallest = 0,
            row = 0,
            $container = $(this.element),
            container_width = $container.width();
            $article = $(this.element).children();

        if(single_column_mode === true) {
            article_width = $container.width() - self.options.padding_x;
        } else {
            article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
        }

        $article.each(function() {
            $(this).css('width', article_width);
        });

        columns = self.options.no_columns;

        $article.each(function(index) {
            var current_column,
                left_out = 0,
                top = 0,
                $this = $(this),
                prevAll = $this.prevAll(),
                tallest = 0;

            if(single_column_mode === false) {
                current_column = (index % columns);
            } else {
                current_column = 0;
            }

            for(var t = 0; t < columns; t++) {
                $this.removeClass('c'+t);
            }

            if(index % columns === 0) {
                row++;
            }

            $this.addClass('c' + current_column);
            $this.addClass('r' + row);

            prevAll.each(function(index) {
                if($(this).hasClass('c' + current_column)) {
                    top += $(this).outerHeight() + self.options.padding_y;
                }
            });

            if(single_column_mode === true) {
                left_out = 0;
            } else {
                left_out = (index % columns) * (article_width + self.options.padding_x);
            }

            $this.css({
                'left': left_out,
                'top' : top
            });
        });

        this.tallest($container);
        $(window).resize();
    };

    Plugin.prototype.tallest = function (_container) {
        var column_heights = [],
            largest = 0;

        for(var z = 0; z < columns; z++) {
            var temp_height = 0;
            _container.find('.c'+z).each(function() {
                temp_height += $(this).outerHeight();
            });
            column_heights[z] = temp_height;
        }

        largest = Math.max.apply(Math, column_heights);
        _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
    };

    Plugin.prototype.make_layout_change = function (_self) {
        if($(window).width() < _self.options.single_column_breakpoint) {
            _self.calculate(true);
        } else {
            _self.calculate(false);
        }
    };

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                new Plugin(this, options));
            }
        });
    }

})(jQuery, window, document);
});



    jQuery(document).ready(function ( $ ) {
        // 3600 - 1 hour
        var current_date     = parseInt("<?php echo strtotime(date('Y-m-d H:i:s')); ?>");
        var thirty_first_jan = parseInt("<?php echo strtotime('2017-01-31 23:59:59'); ?>");
        var tweenty_four_feb = parseInt("<?php echo strtotime('2017-02-24 23:59:59'); ?>");
        var ten_april        = parseInt("<?php echo strtotime('2017-04-10 23:59:59'); ?>");

        var countdown = thirty_first_jan - ((new Date().getTime())/1000);
        countdown = Math.max(1, countdown);

        if(current_date > thirty_first_jan){
            // 24 days (31 Jan- 24 Feb)
            var countdown = tweenty_four_feb - ((new Date().getTime())/1000);
            countdown = Math.max(1, countdown);
        }
        if(current_date > tweenty_four_feb){
            // 38 days (24 Feb - 10 April)
            var countdown = ten_april - ((new Date().getTime())/1000);
            countdown = Math.max(1, countdown);
        }

        var opts =  {
                      clockFace: 'DailyCounter',
                      countdown: true
                    };  

        $('.clock').FlipClock(countdown, opts);

        $('.home_video_sec').removeClass('home_video_sec');

        $("#my-gallery-container").owlCarousel({
            autoPlay: 3000,
            navigation: true,
            items: 4,
            dots: true,
            loop: true,
            autoplay: true,
             responsive:{
                0:{
                    items:1
                },
                 480:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            },
            navigationText: [
                "<i class='icon-chevron-left icon-white'></i>",
                "<i class='icon-chevron-right icon-white'></i>"
            ]
        });

        $('body').on('change','.payment-method',function(){
          var type = $('.payment-method').val();
          if(type == 0){ // PAYPAL
            $('.bank_details').addClass('hidden');
          }else{ // OFFLINE
            $('.bank_details').removeClass('hidden');
          }
        });

        $("body").on('click','.register-event-bottom',function() {
          var form_data = new FormData($('#event-form-bottom')[0]);
          event_registration(form_data,'register-event-bottom');
        });

        $("body").on('click','.register-event',function() {
            var form_data = new FormData($('#event-form')[0]);
            event_registration(form_data,'register-event');
        });   

        $("body").on('click','.pay-now',function() {
          var event_no = $('input[name="event-no"]').val();
          var pay_type = $('select.payment-method').val();
          if(pay_type == 0){ // PAYPAL
            $('.pay-now').attr('disabled',true).text('Loading....');
            $('#paypal-form').submit();
          }else{ // OFFLINE
            $.ajax({
                  url  : "<?php echo base_url(); ?>front/home/offline_event_registration",
                  type : "POST",
                  data : {event_no:event_no,pay_type:pay_type},   
                  dataType : "JSON",   
                  beforeSend:function(){
                    $('.pay-now').attr('disabled',true).text('Loading....');
                    ajaxindicatorstart();
                  },       
                  success: function(resp){
                    if(resp.type == "success"){
                      showToaster('success',resp.msg);  
                      $('#event-form-bottom')[0].reset();
                      $('#event-form')[0].reset();
                      $("#payment_model").modal('hide');
                      $('input').val('');
                      $('#accept_terms').attr('checked',false);
                    }else{
                      showToaster('error',resp.msg);  
                    }
                    $('.pay-now').attr('disabled',false).text('Pay Now');
                    ajaxindicatorstop();
                  },
                  error:function(error)
                  {
                      $('.pay-now').attr('disabled',false).text('Pay Now');
                      ajaxindicatorstop();
                  }
            });
          }
        });

        });

        function event_registration(form_data,button)
        {
          var checkValues = $('input.city-events:checked').map(function()
          {
              return $(this).val();
          }).get();

          /*if(document.getElementById('accept_terms').checked) {
            var is_terms = 'Yes';
          } else {
            var is_terms = '';
          }
          form_data.append('is_terms',is_terms);*/
          form_data.append('city_events',checkValues);
          $.ajax({
                url  : "<?php echo base_url(); ?>front/home/event_registration",
                type : "POST",
                data : form_data,   
                dataType : "JSON",   
                cache: false,
                contentType: false,
                processData: false,   
                beforeSend:function(){
                  $('.'+button).attr('disabled',true).text('Loading....');
                  ajaxindicatorstart();
                },       
                success: function(resp){
                   $('.error_form').html("");
                   if(resp.type == "validation_err"){
                     var errObj = resp.msg;
                     var keys   = Object.keys(errObj);
                     var count  = keys.length;
                     var error_html = '';
                     for (var i = 0; i < count; i++) {
                        if(errObj[keys[i]] != "")
                        {
                          error_html += errObj[keys[i]]+'<br/>';
                        }
                     };
                     showToaster('error',error_html);
                   }
                   else if(resp.type == "success"){
                      if(resp.is_only_enquiry == 0){ //YES
                        showToaster('success','Thanks for enquiry our support team will contact you soon'); 
                        $('#event-form-bottom')[0].reset();
                        $('#event-form')[0].reset();
                        $('#accept_terms').attr('checked',false);
                      }else{ // NO
                        var paid_amount = parseInt(resp.total_paid_amount);
                        $('.total-paid-amount').html('Total Paid Amount - $'+paid_amount);
                        $('input[name="event-no"]').val(resp.event);
                        $('input.custom-field').val(resp.event);
                        $('input.paypal-amount').val(paid_amount);
                        $("#payment_model").modal({
                              backdrop: 'static',
                              keyboard: false
                        });
                      }
                   }
                   else{
                    showToaster('error',resp.msg);  
                   }
                   $('.'+button).attr('disabled',false).text('Register');
                   ajaxindicatorstop();
                },
                error:function(error)
                {
                    $('.'+button).attr('disabled',false).text('Register');
                    ajaxindicatorstop();
                }
            });
        }
    </script>