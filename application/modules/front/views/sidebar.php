 <div class="col-md-3 col-sm-3">
            <?php
              $detail = getUserDetails();
              $user_type = $this->session->userdata('user_type');
              $uid = $this->session->userdata("user_id");
            ?>
                        <div class="left_dashboard">
                        <form class="form-horizontal" id="img-form" enctype="multipart/form-data" method="post">
                            <div class="profile_content">
                                <div class="file_btn file_btn_logo">
                                 <input type="file" class="input_img1" id="edit_pic" name="userfile" style="display: inline-block;">
                                 <span class="glyphicon input_img1 logo_btn" style="display: block;">
                                 <span class="posi_logo">
                                  <?php 
                                    if(empty($detail[0]['photo'])){
                                      $file_name = 'default.jpg';
                                    }else{
                                      $file_name = $detail[0]['photo'];
                                    }
                                  ?>
                                    <img class="show_img1" src="<?php echo base_url(); ?>uploads/users/<?php echo $file_name; ?>">
                                  </span><i class="fa fa-camera"></i></span></span>
                                </div>
                                <div class="profile_name"><a href="<?php echo base_url(); ?>user/profile"><?php echo ucwords($detail[0]['first_name']); ?></a></div>
                            </div>
                            </form>
                            <ul class="list_dash">
                                <!-- <li <?php if(isset($parent) && $parent == 'dashboard') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/dashboard">Global Wall <i class="fa fa-chevron-right pull-right"></i></a></li> -->
                                <!-- <li><a href="<?php echo base_url(); ?>university">Find Schools <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <li><a href="<?php echo base_url(); ?>contact-us">Find Offices <i class="fa fa-chevron-right pull-right"></i></a></li> -->
                                <li <?php if(isset($parent) && $parent == 'profile') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/profile">My Profile <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php if(in_array($user_type, array('5'))) { ?>
                                    <li <?php if(isset($parent) && $parent == 'international_partnerships') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/international_partnerships">International Partnerships <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('5'))) { ?>
                                <!-- <li class="dropdown <?php if(isset($parent) && $parent == 'profile_types') echo "open"; ?>"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edit Profile Types <i class="fa fa-chevron-right pull-right"></i></a>
                                    <ul class="dropdown-menu">
                                      <li <?php if(isset($child) && $child == 'profile_types') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/profile_types">Edit Profile Types</a></li>
                                      <li <?php if(isset($child) && $child == 'post_grad') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/post_grad">Postgrad</a></li>
                                      <li <?php if(isset($child) && $child == 'mba') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/mba">MBA</a></li>
                                      <li <?php if(isset($child) && $child == 'short_term') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/short_term">Short-Term</a></li>
                                      <li <?php if(isset($child) && $child == 'online') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/online">Online</a></li>
                                    </ul>
                                </li>  -->
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'upload_documents') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/upload_documents">Upload Documents <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3','5'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'online_scheduling_meeting') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/online-scheduling-meeting" target="_blank">Online Schedule Meeting <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','5'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'feedback') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/feedback">Feedback <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                  <li><a href="<?php echo base_url(); ?>visa">Visa Guidance <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'quote') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>student/getquote">Get Quote <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'notes') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/notes">Notes <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                 <?php if(in_array($user_type, array('2','3','4','5','6'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'emails') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/emails">Emails <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('2'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'portfolio') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>student/portfolio">E-portfolio <i class="fa fa-chevron-right pull-right"></i></a></li>
                                  <li <?php if(isset($parent) && $parent == 'my_applications') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>student/my-applications">My Applications <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>

                                <?php if(in_array($user_type, array('2','4','5','6'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'my_comments') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/my-comments">Comments <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>

                                <?php if(in_array($user_type, array('2','4','5','6'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'my_notification') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/my-notification">Notification (<?php echo notifyUnreadCount($uid); ?>)<i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>

                                <?php if(in_array($user_type, array('2'))) { ?>
                                <li <?php if(isset($parent) && $parent == 'my_assignments') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>student/my-assignments">Assignments <i class="fa fa-chevron-right pull-right"></i></a></li>

                                <li <?php if(isset($parent) && $parent == 'online_programs') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>online-training">Online Programs <i class="fa fa-chevron-right pull-right"></i></a></li>

                                <?php } ?>

                                <li <?php if(isset($parent) && $parent == 'my_events') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/my-events">My Events <i class="fa fa-chevron-right pull-right"></i></a></li>

                                <li <?php if(isset($parent) && $parent == 'favorite_programs') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/favorite-programs">Favorite Programs <i class="fa fa-chevron-right pull-right"></i></a></li>

                                <!-- <li <?php if(isset($parent) && $parent == 'favorite_programs') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university">Find University <i class="fa fa-chevron-right pull-right"></i></a></li> -->

                                <!-- <li <?php if(isset($parent) && $parent == 'favorite_programs') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>abroad-courses"">Find Abroad Courses <i class="fa fa-chevron-right pull-right"></i></a></li> -->

                                <?php if(in_array($user_type, array('5'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'university_dashboard') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/university-dashboard">My University <i class="fa fa-chevron-right pull-right"></i></a></li>
                                
                                  <li <?php if(isset($parent) && $parent == 'my_programs') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/my-programs">My Programs <i class="fa fa-chevron-right pull-right"></i></a></li>
                                
                                  <li <?php if(isset($parent) && $parent == 'my_invoices') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/my-invoices">My Invoices <i class="fa fa-chevron-right pull-right"></i></a></li>
                                
                                  <li <?php if(isset($parent) && $parent == 'webinar') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/webinar">Schedule Webinar <i class="fa fa-chevron-right pull-right"></i></a></li>
                                
                                  <li <?php if(isset($parent) && $parent == 'appointment') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/appointment">Schedule Appointment <i class="fa fa-chevron-right pull-right"></i></a></li>

                                  <li <?php if(isset($parent) && $parent == 'application') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/application">Applications <i class="fa fa-chevron-right pull-right"></i></a></li>

                                  <li <?php if(isset($parent) && $parent == 'post-landing-form') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/postLandingForm">Post Landing Forms <i class="fa fa-chevron-right pull-right"></i></a></li>

                                <?php } ?>

                                <?php if(in_array($user_type, array('2','3'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'searchProgram') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>search-programs">Search Programs <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('5','6'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'myvideos') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>user/my-videos">My Videos <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                                <?php if(in_array($user_type, array('5'))) { ?>
                                  <li <?php if(isset($parent) && $parent == 'locations') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>university/locations">Locations <i class="fa fa-chevron-right pull-right"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('body').on('change','#edit_pic',function(){
        var file_name = $(this).val();
        var fileObj = this.files[0];
        var calculatedSize = fileObj.size/(1024*1024);
        var split_extension = file_name.split(".").pop();
        var ext = [ "jpg", "gif", "png", "jpeg" ];
        if($.inArray(split_extension.toLowerCase(), ext ) == -1)
        {
          $('#edit_pic').val(fileObj.value = null);
          showToaster('error','You Can Upload Only .jpg, gif, jpeg, png files !');
          return false;
        }
        else if(calculatedSize > 5)
        {
          $('#edit_pic').val(fileObj.value = null);
          showToaster('error','File size should be less than 5 MB !');
          return false;
        }
        if($.inArray(split_extension.toLowerCase(), ext ) != -1 && calculatedSize < 5)
        {
          var data = new FormData($('#img-form')[0]);
          $.ajax({
                type: "POST",
                url : "<?php echo base_url(); ?>front/user/updateProfileImage",
                data: data,
                dataType : "JSON",
                contentType: false,
                processData: false,
                success: function(resp){
                  if(resp.type == 'error'){
                    showToaster('error',resp.msg);
                  }else{
                    $('.show_img1').attr('src',resp.path);
                    showToaster('success',resp.msg);
                  }
                },
                error:function(error)
                {
                  showToaster('error','Internal server error !');  
                }
            });
          
        }
      });
      });
    </script>                    