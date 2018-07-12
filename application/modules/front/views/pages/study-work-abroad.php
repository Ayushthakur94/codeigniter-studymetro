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
                                        <a href="http://page.studymetro.com/No-Processing-Fee">
                                            <h2>Study in Top USA Universities </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/top_univ.jpg">
                                        </a>
                                        <span class="info_program">
                                          Study Metro is Offering No Processing Fee to study in TOP University.<a href="http://page.studymetro.com/No-Processing-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-USA-at-Indian-Cost">
                                            <h2>Study-Work in USA @ Indian Cost</h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/usa_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                          Study-Work in USA @ Indian Cost. Study Metro is a Exclusive Representative for USA Universities in India Offering Bachelor /Master/Doctored Programs. Apply Today!. <a href="http://page.studymetro.com/Study-Work-in-USA-at-Indian-Cost" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Australia-No-Processing-Fee">
                                            <h2>SVP Visa process in Australia</h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/aus_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                          Study in Top University in Australia.. <a href="http://page.studymetro.com/Study-Work-in-Australia-No-Processing-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Canada-No-Processing-Fee">
                                            <h2>Co-Op Program in Canada with Paid Internship </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/canada_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                   The Co-op Program offer International students opportunities to obtain relevant paid work experience in Canada.. <a href="http://page.studymetro.com/Study-Work-in-Canada-No-Processing-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Singapore-No-Tution-Fee">
                                            <h2>Study and Work in Singapore </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/singapore_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                 6 month Study and 6 months paid internship . <a href="http://page.studymetro.com/Study-Work-in-Singapore-No-Tution-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                      <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Ireland-No-Tution-Fee">
                                            <h2>Study in Ireland with Internship </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/ireland_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                               Study Work and Settle in Ireland . <a href="http://page.studymetro.com/Study-Work-in-Ireland-No-Tution-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                       <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Germany-No-Tution-Fee">
                                            <h2>Free Education in Germany </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/germony_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                  Study in State university in Germany.<a href="http://page.studymetro.com/Study-Work-in-Germany-No-Tution-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Work-and-Study-in-USA-Work-upto-40-hours-per-week">
                                            <h2>Employment Opportunities in America </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/america_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                  Study and Work in USA 40 hours per week while studying higher degree .    <a href="http://page.studymetro.com/Work-and-Study-in-USA-Work-upto-40-hours-per-week" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Dubai">
                                            <h2>Study in Dubai - No Processing Fee  </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/dubai_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                  Study and Work in Dubai .  <a href="http://page.studymetro.com/Study-Work-in-Dubai" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Europe-No-Tution-Fee">
                                            <h2>Education in Europe @ Indian Cost   </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/europe_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                  Study in Europe without IELTS/TOEFL .  <a href="http://page.studymetro.com/Study-Work-in-Europe-No-Tution-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-France">
                                            <h2>Study in France university with paid internship  </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/france_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                  Study in France without IELTS/TOEFL, World Third Leading Host country for higher education .     <a href="http://page.studymetro.com/Study-Work-in-France" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-Malaysia-No-Processing-Fee">
                                            <h2>Study in Malaysia - No Processing Fee </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/malaysia_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                 Study in Malysia at Indian Cost.  <a href="http://page.studymetro.com/Study-Work-in-Malaysia-No-Processing-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-New-Zealand-No-Processing-Fee">
                                            <h2>Study in New Zealand With Paid Internship  </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/new_zealand_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                 Explore option for Study and Work in New Zealand .   <a href="http://page.studymetro.com/Study-Work-in-New-Zealand-No-Processing-Fee" class="pull-right read_more">Read more</a>
                                        </span>
                                    </li>
                                     <li>
                                        <a href="http://page.studymetro.com/Study-Work-in-UK-No-Processing-Fee">
                                            <h2>Study in UK   </h2>
                                            <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/uk_abroad.jpg">
                                        </a>
                                        <span class="info_program">
                                 UK Universities and college offer thousands of excellent courses, leading to qualifications .  <a href="http://page.studymetro.com/Study-Work-in-UK-No-Processing-Fee" class="pull-right read_more">Read more</a>
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


