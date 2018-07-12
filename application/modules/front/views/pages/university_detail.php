<!--Main container sec start-->
<div class="main_container">
<section class="banner univ_banner" style="background-image:url(<?php echo (!empty($details['image'])) ? $details['image'] : base_url().'assets/images/banner.jpg'; ?>);">
    <div class="university_logo">
        <img width="100" height="50" src="<?php echo (!empty($details['logo'])) ? $details['logo'] : base_url().'assets/images/not-available.jpg'; ?>">
    </div>
</section>
<section class="university_details_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="details_uviver">
                    <h2>About <?php echo $details['name']; ?></h2>
                    <?php echo $details['content']; ?>
                </div>
                <ul class="nav nav-tabs course-types-tabs-university">
                    <?php $i = 1; foreach(getCourseTypes() as $ct) { ?>
                        <li <?php if($i == 1) echo 'class="active"'; ?>><a data-toggle="tab" href="#<?php echo strtolower(str_replace(array('/', ' '), array('-', '-'), $ct)); ?>"><?php echo $ct; ?></a></li>
                    <?php $i++; } ?>
                </ul>
                <div class="tab-content">
                <?php 
                $j = 1; foreach(getCourseTypes() as $ct) { ?>
                    <div id="<?php echo strtolower(str_replace(array('/', ' '), array('-', '-'), $ct)); ?>" class="tab-pane fade <?php if($j == 1) echo 'in active'; ?>">
                        <?php 
                            if(!empty($programs)){ foreach($programs as $pl){
                                $types = filter_course_types($ct);
                                if(in_array($pl['course_type'], $types)){ 
                                //if($pl['course_type'] == $ct) { 
                        ?>
                            <div class="univer_box course_detail">
                                <div class="univ_logo">
                                    <div class="univ_meta">
                                        <a href="javascript:void(0)" title="<?php echo $pl['program_name']; ?>"> 
                                        <?php echo substr($pl['program_name'], 0,40); ?>
                                         <span class="course_meta"> <?php echo $pl['location']; ?></span>       
                                        </a>
                                         <i class="fa fa-star star"></i>
                                    </div>
                                </div>
                                <ul class="univ_info">
                                    <li>$<?php echo $pl['application_fee']; ?> USD/year</li>
                                </ul>
                                <div class="apply_now_wrap pull-right">
                                   <a href="<?php echo base_url(); ?><?php echo $pl['id']; ?>/apply-to-program?type=0" class="appy_btn">apply to this program</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        <?php } } } ?>
                    </div>
                <?php $j++; } ?>
            </div>
            </div>
            <div class="col-md-4 col-sm-5">

                <div class="university_info">
                    <div class="info_univ_box">
                        <p> Designated Learning Institution Number: <?php echo $details['institution_number']; ?></p>
                        <div class="content_info">

                            <table class="table">
                                <thead>

                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-map-marker"></i>  Founded in : </span></td>
                                        <td><?php echo $details['founded']; ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-map-marker"></i>  Location:  </span></td>
                                        <td> <?php echo $details['location']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-university"></i> Address:  </span></td>
                                        <td> <?php echo $details['address']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-university"></i> Institution Type :</span></td>
                                        <td> <?php echo ucwords($details['institution']); ?>  </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-money"></i> Estimated Cost of living :</span></td>
                                        <td><?php echo (!empty($details['estimated_cost'])) ? $details['estimated_cost'].' USD per year' : ''; ?>  </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-money"></i> Tuition Fee : </span></td>
                                        <td><?php echo (!empty($details['tution_fee'])) ? $details['tution_fee'].' USD per year' : ''; ?>  </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-money"></i>  	Application Fee: </span></td>
                                        <td><?php echo (!empty($details['application_fee'])) ? $details['application_fee'].' USD per year' : ''; ?>  </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i class="fa fa-users" aria-hidden="true"></i>  Total Number of Students:  </span></td>
                                        <td> <?php echo $details['total_students']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-users"></i>  	Number of International Students:   </span></td>
                                        <td> <?php echo $details['international_students']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><span> <i aria-hidden="true" class="fa fa-home"></i> Type of Accommodation  </span></td>
                                        <td> <?php echo $details['accommodation']; ?> </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="info_univ_box">
                        <div class="head_univ_info">
                            contact
                        </div>
                        <div class="content_info">
                            <div class="con_info">
                                <div class="info_con_wrap"><span class="icon_info"><i class="fa fa-phone"></i> </span> <?php echo $details['phone']; ?></div>
                                <div class="info_con_wrap"><span class="icon_info"><i class="fa fa-envelope-o" aria-hidden="true"></i> </span><?php echo $details['email']; ?></div>
                                <div class="info_con_wrap"> <span class="icon_info"><i class="fa fa-globe" aria-hidden="true"></i> </span><?php echo $details['website']; ?></div>
                            </div>
                            <div class="social_icon">
                                <ul>
                                    <?php if(!empty($details['facebook_link'])) { ?>
                                        <li><a href="<?php echo $details['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <?php } ?>
                                    <?php if(!empty($details['twitter_link'])) { ?>
                                        <li><a href="<?php echo $details['twitter_link']; ?>" target="_blank" class="twitter_bg"><i class="fa fa-twitter"></i></a></li>
                                    <?php } ?>
                                    <?php if(!empty($details['google_plus_link'])) { ?>
                                        <li><a href="<?php echo $details['google_plus_link']; ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <?php } ?>
                                    <?php if(!empty($details['linkedin_link'])) { ?>
                                        <li><a href="<?php echo $details['linkedin_link']; ?>" target="_blank" class="twitter_bg1"><i class="fa fa-linkedin"></i></a></li>
                                    <?php } ?>
                                    <?php if(!empty($details['instagram_link'])) { ?>
                                        <li><a href="<?php echo $details['instagram_link']; ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php } ?>
                                    <?php if(!empty($details['youtube_link'])) { ?>
                                        <li><a href="<?php echo $details['youtube_link']; ?>" target="_blank" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="info_univ_box">
                        <div class="head_univ_info">
                            Photos of <?php echo $details['name']; ?>
                        </div>
                        <div class="content_info">
                        <?php $photoarr =  json_decode($details['photos']); if(!empty($photoarr)) { ?>
                            <ul class="list_gallery">
                            <?php foreach($photoarr as $p) { if(!empty($p)) {?>
                                <li>
                                    <a href="javascript:void(0);"><img src="<?php echo $p; ?>"></a>
                                </li>
                            <?php } } ?>
                            </ul>
                        <?php } ?>
                        </div>

                    </div>
                    <div class="info_univ_box">
                        <div class="head_univ_info">
                            Why Study in <?php echo $details['country']; ?>?
                        </div>
                        <div class="content_info">
                            <h2><?php echo $details['quotes_title']; ?></h2>
                            <p><?php echo $details['quotes_content']; ?></p>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<?php
    $social_buttons = get_option('social_buttons');
    if(!empty($social_buttons)){
        echo $social_buttons;
    }

    echo getPhotosGallery();
    echo getScholarshipForm();
    echo getTestimonails();
    echo getVideoGallerySection();
?>

</div>
<!--Main container sec end-->

<script>
$(document).ready(function(){
    $('.star').click(function(){
        $(this).toggleClass('clicked');
    });
});
</script>