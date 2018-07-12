    <!--Main container sec start-->
    <div class="main_container">
    
      <section class="banner" <?php if($details['media'] == 0) echo"style='background-image:url(uploads/pages/".$details['media_file'].");'" ?>>
      
        <?php if($details['media'] == 1){ ?>
          <video controls autoplay muted loop id="bg_video">
                <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
                <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace("mp4", "ogg", $details['media_file']); ?>" type="video/ogg"> Your browser does not support HTML5 video.
              </video>
        <?php } ?>
        
        <?php echo getSeacrhStudyPrograms(); ?>
      </section>

      <section class="why_us">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="head_why_us">
                Welcome to Study Metro
              </div>
              <div class="content_why_us">
                <?php echo $details['content']; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="quick_link">
                <label>Quick Links</label>
                <ul>
                  <li><a href="<?php cms_url('study-abroad'); ?>">Study Abroad</a></li>
                  <li><a href="<?php cms_url('selection-of-university'); ?>">Selection of University</a></li>
                  <li><a href="<?php cms_url('career-counseling'); ?>">Career Counseling</a></li>
                  <li><a href="<?php cms_url('admission-guidance'); ?>">Admission Guidance</a></li>
                  <li><a href="<?php cms_url('admission-documentation'); ?>">Admission Documentation</a></li>
                  <li><a href="<?php cms_url('pre-requisite-tests'); ?>">Pre-Requisite Tests</a></li>
                  <li><a href="<?php cms_url('mission-vision-and-values'); ?>">Mission, Vision and Values</a></li>
                </ul>
              </div>
            </div>
          </div><!-- .row -->
        </div>
      </section>
      <section class="video_sec">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-3">
              <?php 
                echo getSideBarVideos();
                echo getSideBarEvents();
              ?>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="video_box">
                <div class="video_head">
                  Watch our Company Video
                </div>
                <div class="video_content">
                  <iframe width="100%" height="500" src="https://www.youtube.com/embed/SMGc8rWrjl0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php if($details['photo_gallery'] == 0) { 
    echo getPhotosGallery();
} ?>

<section class="how_works_wrap">
  <div class="container">
    <div class="common_head footer_head">
      <h2>How it works</h2>
      <div class="head_border">
        <span><i aria-hidden="true" class="fa fa-ioxhost"></i></span>
      </div>
    </div>
    <div class="how_works_content">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="work_block">
            <div class="work_block_head">
              <div class="wbh_number pull-left">
                01
              </div>
              <div class="wbh_icon pull-right">
                <i class="flaticon-the-white-house-in-eeuu"></i>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="work_block_content">
              <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/img1.jpg" class="img-responsive">
              <span class="meta_work_img">Call us   8088-867-867</span>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="work_block">
            <div class="work_block_head">
              <div class="wbh_number pull-left">
                02
              </div>
              <div class="wbh_icon pull-right">
                <i class="flaticon-the-white-house"></i>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="work_block_content">
              <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/img2.jpg" class="img-responsive">
              <span class="meta_work_img">Get Advice for Work and Study in Abroad </span>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="work_block">
            <div class="work_block_head">
              <div class="wbh_number pull-left">
                03
              </div>
              <div class="wbh_icon pull-right">
                <i class="flaticon-sydney-opera-house"></i>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="work_block_content">
              <img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/img3.jpg" class="img-responsive">
              <span class="meta_work_img">Apply for Visa and Study at your Preferred University</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="hms icnt clearfix" id="infoPod" style="">
<div class="wrapper">
<ul class="icntu">
<li>
<i class="fa fa-university icruv" aria-hidden="true"></i>
<span class="icntn no-counter"><?php echo getAllCount(UNIVERSITIES); ?></span>
<span class="icntc">Universities</span>
</li>
<li class="icrs">
<i class="fa fa-graduation-cap icruv" aria-hidden="true"></i>
<span class="icntn no-counter"><?php echo getAllCount(PROGRAMS); ?></span>
<span class="icntc">Programs</span>
</li>
<li>
<i class="fa fa-flag icruv" aria-hidden="true"></i>
<span class="icntn no-counter"><?php echo count(countries()); ?></span>
<span class="icntc">Countries</span>
</li>
<li>
<i class="fa fa-users icruv" aria-hidden="true"></i>
<span class="icntn no-counter"><?php echo 2500 + getAllCount(USER,array('user_type' => 2)); ?></span>
<span class="icntc">Students</span>
</li>
</ul>
</div>
</section>

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

<!--Main container sec end-->

