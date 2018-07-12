        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   E-portfolio
                   </div>
                 </div>
              </div>
            </div>
            <h3 align="center"><?php echo $username['username']; ?></h3>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php //$this->load->view('sidebar'); ?>
                    <div class="col-md-12 col-sm-12">
                      <!-- personal info  -->
                        <div class="subhead_dash">
                          <div class="container">
                             <div class="row">
                             <div class="col-md-12 col-sm-12">
                               Personal Education
                               </div>
                             </div>
                          </div>
                        </div>

                    <div class="right_dashboard">

                        <div class="personal_edu">
                           <!--  <form method="post" action="<?php echo base_url('student/Personal-Education'); ?>" enctype="multipart/form-data"> -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $eduProfileData['name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" value="<?php echo $eduProfileData['mobile']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Current Location</label>
                                        <input type="text" class="form-control" name="location" value="<?php echo $eduProfileData['location']; ?>" readonly>
                                    </div>
                                </div>
                                <?php if($eduProfileData['outside_india']==1){?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Outside India </label>
                                        <div class="checkbox_align">
                                        <input type="checkbox" class="<?php if(form_error('outside_india')){ echo 'valid_error'; } ?>" name="outside_india" value="1"  checked> 
                                        <div class="error_name"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($eduProfileData['resume']!=''){ ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Download Resume</label>
                                        <div class="form-control"><a download class="download_btn" href="<?php echo base_url().$eduProfileData['resume']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>High Qualification</label>
                                        <input type="text" class="form-control" name="high_qualification" value="<?php echo $eduProfileData['high_qualification']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <input type="text" class="form-control" name="course" value="<?php echo $eduProfileData['course']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <input type="text" class="form-control" name="specialization" value="<?php echo $eduProfileData['specialization']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>University</label>
                                        <input type="text" class="form-control" name="university" value="<?php echo $eduProfileData['university']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="display: block;">Course Type</label>
                                        <?php if($eduProfileData['course_type']=='Graduation'){ ?>
                                        <label class="radio-inline">
                                        <input type="radio" class="" name="course_type" value="Graduation" checked>Graduation
                                        </label>
                                        <?php } elseif($eduProfileData['course_type']=='Post Graduation'){ ?>
                                        <label class="radio-inline">
                                        <input type="radio" class="" name="course_type" value="Post Graduation" <?php if($eduProfileData['course_type']=='Post Graduation'){ echo 'checked'; } ?>>Post Graduation
                                        </label>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Passing Year</label>
                                        <input type="text" class="form-control" name="passing_year" value="<?php echo $eduProfileData['passing_year']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Skills</label>
                                        <input type="text" class="form-control" name="skills" value="<?php echo $eduProfileData['skills']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control" name="birthdate" id="birthdate" value="<?php echo $eduProfileData['birthdate']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="display: block"> Gender</label>
                                        <?php if($eduProfileData['gender']=='Male'){ ?>
                                        <label class="radio-inline">
                                        <input type="radio" class="" name="gender" value="Male"  checked >Male
                                        </label>
                                        <?php } elseif($eduProfileData['gender']=='Female'){ ?>
                                        <label class="radio-inline">
                                        <input type="radio" class="" name="gender" value="Female" <?php if($eduProfileData['gender']=='Female'){ echo 'checked'; } ?>>Female
                                        </label>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Marital Status</label>
                                        <input type="text" class="form-control" name="marital_status" value="<?php echo $eduProfileData['marital_status']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>city</label>
                                        <input type="text" class="form-control" name="city" value="<?php echo $eduProfileData['city']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" readonly><?php echo $eduProfileData['address']; ?></textarea>
                                    </div>
                                </div>
                                
                            <!-- </form> -->
                        </div>
                        <div class="clearfix"></div>
                            <div class="describ_box">
                                <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h1>
                                <?php if(!empty($education)) { foreach($education as $e) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $e['school']; ?></h3>
                                        
                                        <div class="descrip"><?php echo $e['degree']; ?>,<a href="javascript:void(0);"> <?php echo $e['field_of_study']; ?></a>, <?php echo $e['grade']; ?>
                                            <span><?php echo $e['days_atteend_from']; ?> – <?php echo $e['days_atteend_to']; ?></span>
                                        </div>
                                        <p><?php echo $e['activities']; ?></p>
                                        <p><?php echo $e['edu_description']; ?></p>
                                    </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Education Not Added !!</p></center>
                                </div>
                                <?php } ?>                                        
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-life-ring" aria-hidden="true"></i> Volunteers</h1>
                                <?php if(!empty($volunteers)) { foreach($volunteers as $v) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $v['organisation']; ?></h3>
                                        <div class="descrip"><?php echo $v['role']; ?>
                                            <span><?php echo $v['vo_month']; ?> <?php echo $v['vo_year']; ?></span>
                                        </div>
                                        <p><?php echo $v['cause']; ?></p>
                                        <p><?php echo $v['vo_description']; ?></p>

                                    </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Volunteers Not Added !!</p></center>
                                </div>
                                <?php } ?>  
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-plus" aria-hidden="true"></i> Interests</h1>
                                <?php if(!empty($interests)) { foreach($interests as $i) { ?>
                                <div class="content_edu">
                                    
                                    <p><?php echo $i['interests']; ?></p>
                                </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Interests Not Added !!</p></center>
                                </div>
                                <?php } ?>  
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-certificate" aria-hidden="true"></i> Certificate</h1>
                                <?php if(!empty($certifications)) { foreach($certifications as $c) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $c['certificate_name']; ?></h3>
                                        <div class="descrip"><?php echo $c['authority']; ?>
                                            <span><?php echo $c['month']; ?> <?php echo $c['year']; ?></span>
                                        </div>
                                        <p><?php echo $c['license']; ?></p>
                                        <a href="<?php echo $c['certification_url']; ?>" target="_blank"><?php echo $c['certification_url']; ?></a>

                                    </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Certificates Not Added !!</p></center>
                                </div>
                                <?php } ?> 
                            </div>

                        </div>
                   </div> 
                   
                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
        <!--Main container sec end-->
