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

 <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="blog_box faq">
                                <h2>Frequently Asked Questions?</h2>
                                <div class=" blog_box_content">
                                    <div class="list_faq_main">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>faqs/General">General FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/UK"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/uk_flag_thumb.png"></span> UK FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Canada"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/canada_flag.png"></span> canada  FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/New Zealand"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/New_zealand_flag.png"></span> New Zealand FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Ireland"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/Ireland_flag.png"></span> Ireland FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/France"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/Flag_of_France.png"></span> France FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Germany"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/germony_flag.png"></span> Germany FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Australia"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/aus_flag.png"></span> Australia FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Europe"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/europe_flag.png"></span> Europe FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/USA"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/usa_flag.png"></span> USA FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Signapore"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/singapore.jpg"></span> Signapore FAQ</a></li>
                                            <li><a href="<?php echo base_url(); ?>faqs/Malaysia"><span><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/Malaysia_flag.png"></span> Malaysia FAQ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <div class="about_content">
                <?php echo $details['content']; ?>
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


