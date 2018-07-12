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

            <section class="online_program_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="list_program">
                                <ul>
                                    <li>
                                        <a href="http://elearning.studymetro.com/lms/course/GRE-TRAINING-FOR-EXCELLENT-SCORES?learner=1#">
                                            <h2>GRE TRAINING FOR EXCELLENT SCORES </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/gre.jpg">
                                        </a>
                                        <span class="info_program">
                                            GRE exam aims to measure verbal reasoning, quantitative reasoning, analytical writing, and critical thinking skills that have been acquired over a long period of time and that are not related to any specific field of study.<a href="http://elearning.studymetro.com/lms/course/GRE-TRAINING-FOR-EXCELLENT-SCORES?learner=1#" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="http://elearning.studymetro.com/lms/course/IELTS-2143?learner=1">
                                            <h2>IELTS (International English Language Testing System) </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/ielts.png">
                                        </a>
                                        <span class="info_program">
                                           IELTS is a course designed to assess the English language ability of people who intend to study or work where English is the language of communication. Candidates are tested in LISTENING, READING, WRITING and SPEAKING. . <a href="http://elearning.studymetro.com/lms/course/IELTS-2143?learner=1" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://elearning.studymetro.com/lms/course/COMPLETE-TOEFL-COACHING-AND-GUIDANCE?learner=1">
                                            <h2>TOEFL CLASSES FOR BEST SCORES </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/toffel.png">
                                        </a>
                                        <span class="info_program">
                                          ITest of English as a Foreign Language (TOEFL, /ˈtoʊfəl/, toh-fəl) is a standardized test to measure the English language ability of non-native speakers wishing to enroll in American universities. . <a href="http://elearning.studymetro.com/lms/course/COMPLETE-TOEFL-COACHING-AND-GUIDANCE?learner=1" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="http://elearning.studymetro.com/lms/course/SAT-COMPLETE-PREPARATION-GUIDE?learner=1">
                                            <h2>SAT COMPLETE PREPARATION GUIDE </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/SAT.png">
                                        </a>
                                        <span class="info_program">
                                    The SAT is a standardized test widely used for college admissions in the United States. It was first introduced in 1926, and its name and scoring have changed several times, being originally called the Scholastic Aptitude Test, then the Scholastic Assessment Test, then the SAT I: Reasoning Test, then the SAT Reasoning Test, and now simply the SAT. <a href="http://elearning.studymetro.com/lms/course/SAT-COMPLETE-PREPARATION-GUIDE?learner=1" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://elearning.studymetro.com/lms/course/GMAT-COMPLETE-COACHING-AND-PRACTICE">
                                            <h2>GMAT Complete Course</h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/GMAT.jpg">
                                        </a>
                                        <span class="info_program">
                                   GMAT is a registered trademark of the Graduate Management Admission Council. More than 5,900 programs offered by more than 2,100 universities and institutions use the GMAT exam as part of the selection criteria for their programs. Business schools use the test as a criterion for admission into a wide range of graduate management programs, including MBA, Master of Accountancy..<a href="http://elearning.studymetro.com/lms/course/GMAT-COMPLETE-COACHING-AND-PRACTICE" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                      <li>
                                        <a href="http://elearning.studymetro.com/lms/course/PTE-COMPLETE-ONLINE-TRAINING-AND-COACHING">
                                            <h2>PTE Complete Course</h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/pte.jpg">
                                        </a>
                                        <span class="info_program">
                                  The Pearson Test of English Academic (PTE Academic) is an English language test designed to assess the readiness of non-native English speakers to participate in a university-level English language instruction program. Pearson created PTE Academic in response to demand from institutions, government and other organizations for a more accurate way of testing non - native English language students who enter the English-speaking academia world<a href="http://elearning.studymetro.com/lms/course/PTE-COMPLETE-ONLINE-TRAINING-AND-COACHING" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                       <li>
                                        <a href="http://elearning.studymetro.com/lms/course/LANGUAGE-AND-SOFT-SKILLS-TRAINING?learner=1">
                                            <h2>LANGUAGE AND SOFT SKILLS TRAINING</h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/soft.jpg">
                                        </a>
                                        <span class="info_program">
                                  Soft skills is a term often associated with a person's "EQ" (Emotional Intelligence Quotient), the cluster of personality traits, social graces, communication, language, personal habits, interpersonal skills, managing people, leadership, etc. that characterize relationships with other people. Soft skills contrast to hard skills, which are generally easily quantifiable and measurable (e.g. software knowledge, basic plumbing skills). .<a href="http://elearning.studymetro.com/lms/course/LANGUAGE-AND-SOFT-SKILLS-TRAINING?learner=1" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                </ul>
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


