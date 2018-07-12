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

<section class="video_sec">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="about_content">
                <?php echo $details['content']; ?>
            </div>
        </div>
    </div>
</div>
</section>

<section class="membership_plan explore_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                             <div class="explore_head">
                                    <h3>Explore our Undergraduate Programs in Abroad</h3>
                                    <a href="<?php echo base_url(); ?>search-programs"><i class="fa fa-search"></i> Advanced Search</a>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="explore_box">
                                <ul class="explore_list clearfix">
                                <?php 
                                    $i = 0;
                                    $courses = get_abroad_courses(0);
                                    if(!empty($courses)){
                                        foreach($courses as $c){ ?>
                                        <li class="colr<?php echo ($i+1); ?>"><a href="<?php echo base_url(); ?>search-programs?program=<?php echo $c['name']; ?>&country=USA&id=&course=Undergraduate+Course"><?php echo $c['name']; ?></a></li>
                                <?php $i++;
                                    if($i > 19){
                                        $i = 0;
                                    }
                                } } ?>
                                </ul>
                            </div>
                            <div class="explore_box">
                                <div class="explore_head">
                                    <h3>Explore our Graduate Programs in Abroad</h3>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="explore_list clearfix">
                                    <?php 
                                    $i = 0;
                                    $courses = get_abroad_courses(1);
                                    if(!empty($courses)){
                                        foreach($courses as $c){ ?>
                                        <li class="colr<?php echo ($i+1); ?>"><a href="<?php echo base_url(); ?>search-programs?program=<?php echo $c['name']; ?>&country=USA&id=&course=Graduate+Course"><?php echo $c['name']; ?></a></li>
                                <?php $i++;
                                    if($i > 19){
                                        $i = 0;
                                    }
                                } } ?>
                                </ul>
                            </div>
                            <div class="explore_box">
                                <div class="explore_head">
                                    <h3>Explore our Doctored Programs in Abroad</h3>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="explore_list clearfix">
                                    <?php 
                                    $i = 0;
                                    $courses = get_abroad_courses(2);
                                    if(!empty($courses)){
                                        foreach($courses as $c){ ?>
                                        <li class="colr<?php echo ($i+1); ?>"><a href="<?php echo base_url(); ?>search-programs?program=<?php echo $c['name']; ?>&country=USA&id=&course=Doctored"><?php echo $c['name']; ?></a></li>
                                <?php $i++;
                                    if($i > 19){
                                        $i = 0;
                                    }
                                } } ?>
                                </ul>
                            </div>
                            <div class="explore_box">
                                <div class="explore_head">
                                    <h3>Explore our Certificate/Diploma Programs in Abroad</h3>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="explore_list clearfix">
                                    <?php 
                                    $i = 0;
                                    $courses = get_abroad_courses(3);
                                    if(!empty($courses)){
                                        foreach($courses as $c){ ?>
                                        <li class="colr<?php echo ($i+1); ?>"><a href="<?php echo base_url(); ?>search-programs?program=<?php echo $c['name']; ?>&country=USA&id=&course=Certificate%2FDiploma"><?php echo $c['name']; ?></a></li>
                                <?php $i++;
                                    if($i > 19){
                                        $i = 0;
                                    }
                                } } ?>
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


