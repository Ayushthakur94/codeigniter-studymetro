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

 <section class="video_sec contact_us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="blog_box contact_wrap">
                                <h2>Contact Us</h2>
                                <div class="contact_wrap_content">
                                    <div class="frame_address">
                                        <div style="overflow:hidden;width:750px;height:450px;resize:none;max-width:100%;">
                                            <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Study+Metro+&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU">
                                            </iframe>
                                            </div>
                                            <a class="google-maps-code" href="http://www.interserver-coupons.com" id="authorize-maps-data">interserver coupons</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <?php $i = 0;
                                    $offices = getAllOffices();
                                    if(!empty($offices)) { foreach($offices as $o) { if($i >= 4) { ?>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="address_box">
                                            <h2><?php echo $o['title']; ?></h2>
                                            <div class="address_box_describe">
                                                <p><?php echo $o['address']; ?></p>
                                                <span><a href="mailto:<?php echo $o['email']; ?>"><?php echo $o['email']; ?></a></span>
                                                <p>Tel: <?php echo $o['telephone']; ?>, </p>
                                                <p>Mob: <?php echo $o['mobile']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } $i++; } } ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="blog_box contact_wrap">
                                            <h2>Contact Us</h2>
                                            <div class="contact_wrap_content">
                                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/home/docontactus">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">Name:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" required name="name" class="form-control" id="Name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" required name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="col-sm-2 control-label">Phone:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" required name="phone" class="form-control" id="phone" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="col-sm-2 control-label">Message:</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="message" required placeholder="Message"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10 text-right">
                                                            <button type="submit" class="btn btn-default submit_btn sub_btn">submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                        <?php 
                            $offices = getAllOffices();
                            if(!empty($offices)) { $i = 0; foreach($offices as $o) { ?>
                            <div class="address_box">
                                <h2><?php echo $o['title']; ?></h2>
                                <div class="address_box_describe">
                                    <p><?php echo $o['address']; ?></p>
                                    <span><a href="mailto:<?php echo $o['email']; ?>"><?php echo $o['email']; ?></a></span>
                                    <p>Tel: <?php echo $o['telephone']; ?>, </p>
                                    <p>Mob: <?php echo $o['mobile']; ?></p>
                                </div>
                            </div>
                        <?php $i++; if($i == 4) break; } } ?>
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


