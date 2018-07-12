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
                            <div class="blog_box">
                                <h2>Study Abroad Article</h2>
                                <div class="blog_box_content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php if(!empty($blogs)) { $i = 1; foreach($blogs as $b) { ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne<?php echo $b['id']; ?>">
                                            <h4 class="panel-title">
                                                <a role="button"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $b['id']; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $b['id']; ?>">
                                                <?php echo $b['title']; ?>
                                               <i class="indicator glyphicon glyphicon-<?php echo ($i == 1) ? 'minus' : 'plus'; ?> pull-right"></i>
                                                </a>
                                            </h4>
                                            </div>
                                            <div id="collapseOne<?php echo $b['id']; ?>" class="panel-collapse collapse <?php echo ($i == 1) ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="headingOne<?php echo $b['id']; ?>">
                                            <div class="panel-body">
                                                <?php echo $b['descprition']; ?>
                                            </div>
                                            </div>
                                        </div>
                                    <?php $i++; } } ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-3 hidden">
                            
                            <div class="search_form_box">
                                <div class="search_head">
                                    Contact Form
                                </div>
                                <div class="search_content">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="name">
                                        </div>
                                       <div class="form-group">
                                            <input type="email" class="form-control" placeholder="email">
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control" placeholder="phone">
                                        </div>
                                         <div class="form-group">
                                           <textarea class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="select_box">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>

                                                <select class="form-control" id="sel1">
                                                 <option>--Select Level--</option>
                                                  <option>Certificate</option>
                                                  <option>Language</option>
                                                  <option>Under Graduate</option>
                                                  <option>Post Graduate</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="submit" class="submit_btn sub_btn">
                                        </div>

                                </div>
                                </form>
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


