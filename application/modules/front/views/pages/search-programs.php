<div class="main_container">

    <section class="banner" <?php if($details[ 'media']==0 ) echo "style='background-image:url(uploads/pages/".$details[
    'media_file']. ");'" ?>>
        <?php if($details['media'] == 1){ ?>
            <video controls autoplay muted loop id="bg_video">
                <source src="<?php echo base_url(); ?>uploads/pages/<?php echo $details['media_file']; ?>" type="video/mp4">
                <source src="<?php echo base_url(); ?>uploads/pages/<?php echo str_replace(" mp4 ", "ogg ", $details['media_file']); ?>"
                type="video/ogg"> Your browser does not support HTML5 video.
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
                    <div class="search_box">

                        <div class="head_university">
                            <label>Filter By Country:</label>
                            <div class="form-group">
                                <?php foreach(countries() as $c) { ?>
                                    <input id="<?php echo $c; ?>" name="country" value="<?php echo $c; ?>" class="BSswitch select_country" type="radio" data-off-text="False"
                                    data-on-text="True" <?php if(isset($_GET[ 'country']) && $_GET[ 'country']==$c) { echo
                                    "checked"; } else if(!isset($_GET[ 'country']) && $c=='USA' ) { echo "checked"; } ?>>
                                    <label for="<?php echo $c; ?>">
                                        <?php echo $c; ?>
                                    </label>
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                        <div class="switch_main">
                          <div class="question">
                           Study Metro Scholarship
                          </div>
                          <div class="switch">
                            <input id="StudyMetroScholarship" main="study_metro_scholarship" <?php if(!isset($_GET['attribute']) && empty($_GET['attribute'])) echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="StudyMetroScholarship" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          <div class="switch_main">
                          <div class="question">
                           Tuition Fees
                          </div>
                          <div class="switch">
                            <input id="TuitionFees" main="tution_fee" <?php if(isset($_GET['attribute']) && $_GET['attribute'] == 'tution_fee' && $_GET['type'] == 'ASC') echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="TuitionFees" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          <div class="switch_main">
                          <div class="question">
                           Application Fee
                          </div>
                          <div class="switch">
                            <input id="ApplicationFee" main="application_fee" <?php if(isset($_GET['attribute']) && $_GET['attribute'] == 'application_fee' && $_GET['type'] == 'ASC') echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="ApplicationFee" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          <div class="switch_main">
                          <div class="question">
                           Location
                          </div>
                          <div class="switch">
                            <input id="Location" main="location" <?php if(isset($_GET['attribute']) && $_GET['attribute'] == 'location' && $_GET['type'] == 'ASC') echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="Location" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          <div class="switch_main">
                          <div class="question">
                           Program Name
                          </div>
                          <div class="switch">
                            <input id="ProgramName" main="program_name" <?php if(isset($_GET['attribute']) && $_GET['attribute'] == 'program_name' && $_GET['type'] == 'ASC') echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="ProgramName" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          <div class="switch_main">
                          <div class="question">
                           University Name
                          </div>
                          <div class="switch">
                            <input id="UniversityName" main="university_name" <?php if(isset($_GET['attribute']) && $_GET['attribute'] == 'university_name' && $_GET['type'] == 'ASC') echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="UniversityName" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          <div class="switch_main">
                          <div class="question">
                           Intake Date
                          </div>
                          <div class="switch">
                            <input id="IntakeDate" main="intake_date" <?php if(isset($_GET['attribute']) && $_GET['attribute'] == 'intake_date' && $_GET['type'] == 'ASC') echo "checked"; ?> class="cmn-toggle cmn-toggle-yes-no flip-my" type="checkbox">
                            <label for="IntakeDate" data-on="ASC" data-off="DESC"></label>
                          </div>
                          </div>
                          </div>
                        </div><!-- /row -->

                        <div class="programs-data">
                            <?php if(!empty($programs)) { $i = 1; foreach($programs as $p){ ?>
                                <?php $url = getUniversityUrl($p['univ_id'],$p['name']); ?>
                                <div class="search_box_content" <?php if($i==1 ) echo "style='margin-top:0px;'"; ?>>
                                    <div class="univer_box">
                                        <div class="univ_logo">
                                            <a href="<?php echo $url; ?>"> <img src="<?php echo $p['logo']; ?>" class="img-responsive"></a>
                                            <div class="univ_meta">
                                                <span class="univ_name"><a href="<?php echo $url; ?>"><?php echo $p['name']; ?></a></span>
                                                <p><i class="fa fa-map-marker"></i>
                                                    <?php echo $p['location']; ?>,
                                                        <?php echo $p['country']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <ul class="univ_info">
                                            <li><span> <i class="fa fa-university" aria-hidden="true"></i>  Founded in : </span>
                                                <?php echo $p['founded']; ?>
                                            </li>
                                            <li> <span> <i class="fa fa-university" aria-hidden="true"></i> Institution Type :</span>
                                                <?php echo $p['institution']; ?>
                                            </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Estimated Cost of living :</span>
                                                <?php echo $p['estimated_cost']; ?>
                                            </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Tuition Fee : </span>
                                                <?php echo $p['tution_fee']; ?>
                                            </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i> Application Fee : </span>
                                                <?php echo $p['application_fee']; ?>
                                            </li>
                                            <li> <span> <i class="fa fa-money" aria-hidden="true"></i>Cashback : </span>
                                                $<?php echo $p['studymetro_scholarship']; ?>
                                            </li>
                                        </ul>
                                        <br/>
                                        <br/>
                                        <ul class="nav nav-tabs course-types-tabs">
                                            <?php $i = 1; foreach(getCourseTypes() as $ct) { ?>
                                                <li <?php if(!empty($_GET['course']) && $ct == $_GET['course']) { echo 'class="active"'; } elseif(empty($_GET['course']) && $i==1) { echo 'class="active"'; }  ?>>
                                                    <a data-toggle="tab" href="#<?php echo 'program-'.$p['univ_id'].'-'.strtolower(str_replace(array('/', ' '), array('-', '-'), $ct)); ?>">
                                                        <?php echo $ct; ?>
                                                    </a>
                                                </li>
                                                <?php $i++; } ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <?php 
                                            $programs_list = getProgramsBy('university_id', $p['univ_id'], (isset($_GET['program'])) ? $_GET['program'] : '');
                                            $j = 1; 
                                            foreach(getCourseTypes() as $ct) { 
                                        ?>
                                            <div id="<?php echo 'program-'.$p['univ_id'].'-'.strtolower(str_replace(array('/', ' '), array('-', '-'), $ct)); ?>" class="tab-pane fade <?php if(!empty($_GET['course']) && $ct == $_GET['course']) { echo 'in active'; } elseif(empty($_GET['course']) && $j==1) { echo 'in active'; }  ?>">
                                                <?php 
                                                    if(!empty($programs_list)){ 
                                                        foreach($programs_list as $pl){
                                                            $types = filter_course_types($ct);
                                                            if(in_array($pl['course_type'], $types)){
                                                ?>
                                                    <div class="univer_box course_detail">
                                                        <div class="univ_logo">
                                                            <div class="univ_meta">
                                                                <a href="javascript:void(0)" title="<?php echo $pl['program_name']; ?>">
                                                                    <?php echo substr($pl['program_name'], 0,40); ?>
                                                                        <span class="course_meta"> <?php echo $pl['location']; ?></span>
                                                                </a>
                                                                
                                                                <i class="fa fa-star star fvrt_prgrm" program_id="<?php echo $pl['id']; ?>" title="Favorite"></i>
                                                            </div>
                                                        </div>
                                                        <ul class="univ_info">
                                                            <li>$
                                                                <?php echo $pl['application_fee']; ?> USD/year</li>
                                                        </ul>
                                                        <div class="unive_data">
                                                            <?php echo $pl['course_type']; ?>
                                                        </div>
                                                        <div class="apply_now_wrap pull-right">
                                                        <?php
                                                            $uid = $this->session->userdata("user_id");
                                                            if(empty($uid)){ ?>
                                                                <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static" class="appy_btn">apply to this program</a> -->
                                                                <a href="<?php echo base_url(); ?><?php echo $pl['id']; ?>/apply-to-program?type=0" class="appy_btn">apply to this program</a>
                                                        <?php  }else{ ?>
                                                                <a href="<?php echo base_url(); ?><?php echo $pl['id']; ?>/apply-to-program?type=0" class="appy_btn">apply to this program</a>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <?php } } } ?>
                                            </div>
                                            <?php $j++; } ?>
                                    </div>
                                </div>
                                <?php $i++; } } ?>
                        </div>
                        <br/>
                    </div>
                    <?php if(!$this->input->post()){ ?>
                        <div class="search_box_top">
                            <ul id="pagination-demo" class="pagination-sm"></ul>
                        </div>
                    <?php } ?>
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

<script>
    $(document).ready(function(){
        $('.select_country').on('switchChange.bootstrapSwitch', function (event, state) {
            var country = $(this).val();
            var attr = $('input.flip-my:checked').attr('main');
            var sort_filter = '';
            if(attr != ''){
              sort_filter = '&attribute='+attr+'&type=ASC';
            }
            window.location.href = "<?php echo base_url(); ?>search-programs?country="+country+sort_filter;
        })
         $('body').on('change','.flip-my', function () {
            var attr = $(this).attr('main');
            if($(this).is(':checked')){
              var order_type = 'ASC';
            }else{
              var order_type = 'DESC';
            }
            var country = $('input.select_country:checked').val();
            window.location.href = "<?php echo base_url(); ?>search-programs?country="+country+"&attribute="+attr+"&type="+order_type;
        })
        $('.star').click(function(){
            $(this).toggleClass('clicked');
        });
        var total_count = parseInt(<?php echo $total_count; ?>);
        if(total_count > 0){
            $('.pagination-sm').twbsPagination({
                totalPages: total_count,
                visiblePages: 5,
                onPageClick: function (event, page) {
                    if(page != 1){
                        var country = $('input[name="country"]:checked').val();
                        var appendHTML = '';
                        $.ajax({
                            url  : "<?php echo base_url(); ?>front/home/getNextPrograms",
                            type : "POST",
                            data : {page:page,country:country},   
                            dataType : "JSON",   
                            beforeSend:function(){
                              ajaxindicatorstart();
                            },       
                            success: function(resp){
                               var universities = resp.universities;
                               var courses      = resp.courses;
                               if(universities != ''){
                                    for (var i = 0; i < universities.length; i++) {
                                        var first_program = '';
                                        if(i == 0){
                                            first_program = "style='margin-top:0px;'";
                                        }
                                        appendHTML += '<div class="search_box_content" '+first_program+'><div class="univer_box"><div class="univ_logo">';
                                        appendHTML += '<a href="'+universities[i]['detail']+'"> <img src="'+universities[i]['logo']+'" class="img-responsive"></a>';
                                        appendHTML += '<div class="univ_meta"><span class="univ_name"><a href="'+universities[i]['detail']+'">'+universities[i]['name']+'</a></span>';
                                        appendHTML += '<p><i class="fa fa-map-marker"></i> '+universities[i]['location']+', '+universities[i]['country']+' </p></div></div>';
                                        appendHTML += '<ul class="univ_info"><li><span> <i class="fa fa-university" aria-hidden="true"></i>  Founded in : </span>'+universities[i]['founded']+'</li>';
                                        appendHTML += '<li> <span> <i class="fa fa-university" aria-hidden="true"></i> Institution Type :</span>'+universities[i]['institution']+'</li>';
                                        appendHTML += '<li> <span> <i class="fa fa-money" aria-hidden="true"></i> Estimated Cost of living :</span>'+universities[i]['estimated_cost']+'</li>';
                                        appendHTML += '<li> <span> <i class="fa fa-money" aria-hidden="true"></i> Tuition Fee : </span>'+universities[i]['tution_fee']+'</li></ul><br/><br/>';
                                        appendHTML += '<ul class="nav nav-tabs course-types-tabs">';
                                        for (var j = 0; j < courses.length; j++) {
                                            var first_course = '';
                                            if(j == 0){
                                                first_course = "class='active'";
                                            }
                                            var outputString = courses[j].replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-').replace(/^(-)+|(-)+$/g,'');
                                            var tab_id = 'program-'+universities[i]['id']+'-'+outputString.toLowerCase();
                                            appendHTML += '<li '+first_course+'><a data-toggle="tab" href="#'+tab_id+'">'+courses[j]+'</a></li>';
                                        }
                                        appendHTML += '</ul></div><div class="tab-content">';
                                        var programs = universities[i]['programs'];
                                        for (var k = 0; k < courses.length; k++) {
                                            var outputString = courses[k].replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-').replace(/^(-)+|(-)+$/g,'');
                                            var tab_id = 'program-'+universities[i]['id']+'-'+outputString.toLowerCase();
                                            var first_course_in = '';
                                            if(j == 0){
                                                first_course_in = "in active";
                                            }
                                            appendHTML += ' <div id="'+tab_id+'" class="tab-pane fade '+first_course_in+'">';
                                            if(programs != ''){
                                                for (var l = 0; l < programs.length; l++) {
                                                    if(programs[l]['course_type'] != null && programs[l]['course_type'] != ''){
                                                        if(programs[l]['course_type'].trim() == courses[k].trim()){
                                                           appendHTML += '<div class="univer_box course_detail"><div class="univ_logo"><div class="univ_meta">';
                                                           appendHTML += '<a href="javascript:void(0)" title="'+programs[l]['program_name']+'"> '+programs[l]['program_name'].substr(0, 40);
                                                           appendHTML += '<span class="course_meta">'+programs[l]['location']+'</span></a><i class="fa fa-star star"></i></div></div>';
                                                           appendHTML += '<ul class="univ_info"><li>$'+programs[l]['application_fee']+' USD/year</li></ul><div class="unive_data">'+programs[l]['course_type']+'</div>';
                                                           appendHTML += '<div class="apply_now_wrap pull-right"><a href="javascript:void(0);" class="appy_btn">apply to this program</a></div></div><div class="clearfix"></div>'; 
                                                        }
                                                    }
                                                };
                                            }
                                        appendHTML += '</div>';
                                        }
                                        appendHTML += '</div></div>';
                                    };
                                    $('.programs-data').html(appendHTML);
                               }
                               ajaxindicatorstop();
                               $('html, body').animate({
                                    scrollTop: $(".video_sec").offset().top
                                }, 1500);
                            },
                            error:function(err)
                            {
                                ajaxindicatorstop();
                            }
                        });
                    }
                }
            });
        }
    });

</script>
<?php if(isset($_GET['country'])) { ?>
    <script>
        $(document).ready(function(){
            var country = "<?php echo $_GET['country']; ?>";
            var id = "<?php if(!empty($_GET['id'])) { echo $_GET['id']; } ?>";
            getUniversities(country, false, id);
        });
    </script>
<?php } ?>

<?php if(isset($_GET['id'])) { ?>
    <script>
        
    </script>
<?php } ?>

<script type="text/javascript">
  $('body').on('click','.fvrt_prgrm',function(){
    var program_id = $(this).attr('program_id');

    $.ajax({
            url:"<?php echo base_url('user/addFavoritePrograms'); ?>",
            type:"POST",
            data:{program_id:program_id},
            success:function(result)
            {
              var obj = JSON.parse(result);
              if(obj.type=="success")
              {
                showToaster('success',obj.msg);
              }
              else if(obj.type=="error")
              {
                showToaster('error',obj.msg);
              }
            }
    });
  });
</script>