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
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                    <div class="social_icon">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)" link="<?php echo $subunique; ?>" class="copy_icon" id="copy_link"><span class="fa fa-clipboard"></span></a>
                                    <input type="hidden" id="link" value="<?php echo $subunique; ?>"></a>
                                </li>
                                <li>
                                    <a href="http://www.facebook.com/sharer.php?u=<?php echo $subunique; ?>" class="facebook_icon" target="_blank"><span class="fa fa-facebook"></span></a>
                                </li>
                                <li>
                                    <a href="http://twitter.com/home?status=<?php echo $subunique; ?>" target="_blank" class="twitter_icon" title="Share Portfolio On Twitter"><span class="fa fa-twitter"></span></a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url=<?php echo $subunique; ?>" target="_blank" class="google_plus_icon" title="Share Portfolio On Google"><span class="fa fa-google-plus"></span></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/cws/share?url=<?php echo $subunique; ?>" class="linkedin_icon" target="_blank" title="Share Portfolio On Linkdin"><span class="fa fa-linkedin"></span></a>
                                </li>
                            </ul>
                        </div>

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

                        <div class="personal_edu">
                            <form method="post" action="<?php echo base_url('student/Personal-Education'); ?>" enctype="multipart/form-data">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control <?php if(form_error('name')){ echo 'valid_error'; } ?>" name="name" value="<?php echo $eduProfileData['name']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control <?php if(form_error('mobile')){ echo 'valid_error'; } ?>" name="mobile" value="<?php echo $eduProfileData['mobile']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Current Location</label>
                                        <input type="text" class="form-control <?php if(form_error('location')){ echo 'valid_error'; } ?>" name="location" value="<?php echo $eduProfileData['location']; ?>" >
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Outside India </label>
                                        <div class="checkbox_align">
                                        <input type="checkbox" class="<?php if(form_error('outside_india')){ echo 'valid_error'; } ?>" name="outside_india" value="1" <?php if($eduProfileData['outside_india']==1){ echo 'checked'; } ?>> 
                                        <div class="error_name"></div>
                                    </div>
                                    </div>
                                </div>
                                <?php if($eduProfileData['resume']!=''){ ?>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Upload Resume</label>
                                        <input type="file" class="form-control" name="resume" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Download Resume</label>
                                        <div class="form-control"><a download class="download_btn" href="<?php echo base_url().$eduProfileData['resume']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php } else{ ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Upload Resume</label>
                                        <input type="file" class="form-control" name="resume" >
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>High Qualification</label>
                                        <input type="text" class="form-control <?php if(form_error('high_qualification')){ echo 'valid_error'; } ?>" name="high_qualification" value="<?php echo $eduProfileData['high_qualification']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <input type="text" class="form-control <?php if(form_error('course')){ echo 'valid_error'; } ?>" name="course" value="<?php echo $eduProfileData['course']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <input type="text" class="form-control <?php if(form_error('specialization')){ echo 'valid_error'; } ?>" name="specialization" value="<?php echo $eduProfileData['specialization']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>University</label>
                                        <input type="text" class="form-control <?php if(form_error('university')){ echo 'valid_error'; } ?>" name="university" value="<?php echo $eduProfileData['university']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="display: block;">Course Type</label>
                                        <label class="radio-inline">
                                        <input type="radio" class="" name="course_type" value="Graduation" <?php if($eduProfileData['course_type']=='Graduation'){ echo 'checked'; } ?>>Graduation
                                        </label>
                                        <label class="radio-inline">
                                        
                                        <input type="radio" class="" name="course_type" value="Post Graduation" <?php if($eduProfileData['course_type']=='Post Graduation'){ echo 'checked'; } ?>>Post Graduation
                                        </label>
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Passing Year</label>
                                        <input type="text" class="form-control <?php if(form_error('passing_year')){ echo 'valid_error'; } ?>" name="passing_year" value="<?php echo $eduProfileData['passing_year']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Skills</label>
                                        <input type="text" class="form-control <?php if(form_error('skills')){ echo 'valid_error'; } ?>" name="skills" value="<?php echo $eduProfileData['skills']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control <?php if(form_error('birthdate')){ echo 'valid_error'; } ?>" name="birthdate" id="birthdate" value="<?php echo $eduProfileData['birthdate']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label style="display: block"> Gender</label>
                                        <label class="radio-inline">
                                        <input type="radio" class="" name="gender" value="Male" <?php if($eduProfileData['gender']=='Male'){ echo 'checked'; } ?>>Male
                                        </label>
                                        <label class="radio-inline">
                                        
                                        <input type="radio" class="" name="gender" value="Female" <?php if($eduProfileData['gender']=='Female'){ echo 'checked'; } ?>>Female
                                        </label>
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Marital Status</label>
                                        <input type="text" class="form-control <?php if(form_error('marital_status')){ echo 'valid_error'; } ?>" name="marital_status" value="<?php echo $eduProfileData['marital_status']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>city</label>
                                        <input type="text" class="form-control <?php if(form_error('city')){ echo 'valid_error'; } ?>" name="city" value="<?php echo $eduProfileData['city']; ?>">
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control <?php if(form_error('address')){ echo 'valid_error'; } ?>" name="address"><?php echo $eduProfileData['address']; ?></textarea>
                                        <div class="error_name"></div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <input type="submit" class="commn_btn" name="update_info" value="Submit">
                                </div>
                            </form>
                        </div>

                        <div class="clearfix"></div>
                        <div class="right_dashboard">
                            <div class="describ_box">
                                <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education <a href="javascript:void(0)"
                                        data-toggle="modal" title="Add New Education" data-target="#education" class="pull-right"><i class="fa fa-plus"></i></a></h1>
                                <?php if(!empty($education)) { foreach($education as $e) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $e['school']; ?></h3>
                                        <a href="<?php echo base_url(); ?>front/student/deletePortfolio/education/<?php echo encode($e['id']); ?>" onclick="return confirm('Are you sure ?')" class="pull-right" titl="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <h1><i class="fa fa-life-ring" aria-hidden="true"></i> Volunteers <a href="javascript:void(0)"
                                        data-toggle="modal" title="Add New Volunteer" data-target="#Volunteers" class="pull-right"><i class="fa fa-plus"></i></a></h1>
                                <?php if(!empty($volunteers)) { foreach($volunteers as $v) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $v['organisation']; ?> <a href="<?php echo base_url(); ?>front/student/deletePortfolio/volunteers/<?php echo encode($v['id']); ?>" onclick="return confirm('Are you sure ?')" class="pull-right" titl="Delete"><i class="fa fa-trash-o"></i></a></h3>
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
                                <h1><i class="fa fa-plus" aria-hidden="true"></i> Interests <a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#interest" title="Add New Interest" class="pull-right"><i class="fa fa-plus"></i></a></h1>
                                <?php if(!empty($interests)) { foreach($interests as $i) { ?>
                                <div class="content_edu">
                                    <a href="<?php echo base_url(); ?>front/student/deletePortfolio/interests/<?php echo encode($i['id']); ?>" onclick="return confirm('Are you sure ?')" class="pull-right" titl="Delete"><i class="fa fa-trash-o"></i></a>
                                    <p><?php echo $i['interests']; ?></p>
                                </div>
                                <?php } } else { ?>
                                <div class="content_edu">
                                    <center><p>Interests Not Added !!</p></center>
                                </div>
                                <?php } ?>  
                            </div>
                            <div class="describ_box">
                                <h1><i class="fa fa-certificate" aria-hidden="true"></i> Certificate <a href="javascript:void(0)"
                                        data-toggle="modal" title="Add New Certificate" data-target="#Certificate" class="pull-right"><i class="fa fa-plus"></i></a></h1>
                                <?php if(!empty($certifications)) { foreach($certifications as $c) { ?>
                                    <div class="content_edu">
                                        <h3><?php echo $c['certificate_name']; ?> <a href="<?php echo base_url(); ?>front/student/deletePortfolio/certifications/<?php echo encode($c['id']); ?>" onclick="return confirm('Are you sure ?')" class="pull-right" titl="Delete"><i class="fa fa-trash-o"></i></a></h3>
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

        <!-- Modal  for #education-->
        <div class="modal fade custom_model" id="education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="education-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Education

                            </h4>

                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>School</label>
                                <input type="text" class="form-control" name="school" placeholder="School" aria-describedby="basic-addon1">
                                <div class="error_form school"></div>
                            </div>
                            <div class="form-group dates">
                                <label>Dates Attended</label>
                                <select class="form-control" name="days_atteend_from">
                                    <option value="">Select</option>
                                    <?php for ($i=2016; $i > 1900; $i--) { 
                                        echo " <option value=".$i.">".$i."</option>";
                                    } ?>
                                </select>
                                <select class="form-control" name="days_atteend_to">
                                    <option value="">Select</option>
                                    <?php for ($i=2023; $i > 1900; $i--) { 
                                        echo " <option value=".$i.">".$i."</option>";
                                    } ?>
                                </select>
                                <div class="error_form days_atteend_from"></div>
                                <div class="error_form days_atteend_to"></div>
                            </div>
                            <div class="form-group">
                                <label>Degree</label>
                                <input type="text" class="form-control" placeholder="Degree" name="degree">
                                <div class="error_form degree"></div>
                            </div>
                            <div class="form-group">

                                <label>Field Of Study</label>
                                <input type="text" class="form-control" placeholder="Field Of Study" name="field_of_study">
                                <div class="error_form field_of_study"></div>
                            </div>

                            <div class="form-group">

                                <label>Grade</label>
                                <input type="text" class="form-control" placeholder="Grade" name="grade">
                                <div class="error_form grade"></div>
                            </div>

                            <div class="form-group">
                                <label>Activities and Societies</label>
                                <textarea class="form-control" name="activities" placeholder="Activities and Societies"></textarea>
                                <p>Examples: Alpha Phi Omega, Chamber Chorale, Debate Team</p>
                                <div class="error_form activities"></div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="edu_description"></textarea>
                                <div class="error_form edu_description"></div>
                            </div>
                            <div class="form-group">
                                <button data-dismiss="modal" aria-label="Close" type="button" class="btn send_btn">Cancel</button>
                                <button type="button" class="send_btn education-save-btn">Save</button>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal  for #education end-->
        <!-- Modal  for #Volunteers-->
        <div class="modal fade custom_model" id="Volunteers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="volunteer-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Volunteers
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Organisation</label>
                                <input type="text" class="form-control" name="organisation" placeholder="Organisation" aria-describedby="basic-addon1">
                                <div class="error_form organisation"></div>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" placeholder="Role" name="role" aria-describedby="basic-addon1">
                                <div class="error_form role"></div>
                            </div>

                            <div class="form-group">
                                <label>Cause</label>
                                <select class="form-control" name="cause">
                                    <option value="">Select</option>
                                    <option value="Animal Welfare">Animal Welfare</option>
                                    <option value="Arts and Culture">Arts and Culture</option>
                                    <option value="Children">Children</option>
                                    <option value="Civil Rights and Social Action">Civil Rights and Social Action</option>
                                    <option value="Disaster and Humanitarian Relief">Disaster and Humanitarian Relief</option>
                                    <option value="Economic Empowerment">Economic Empowerment</option>
                                    <option value="Education">Education</option>
                                    <option value="Environment">Environment</option>
                                    <option value="Human Rights">Human Rights</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Poverty Alleviation">Poverty Alleviation</option>
                                    <option value="Science and Technology">Science and Technology</option>
                                    <option value="Social Services">Social Services</option>
                                </select>
                                <div class="error_form cause"></div>

                            </div>
                            <div class="form-group dates">
                                <label>Date</label>
                                <select class="form-control" name="vo_month">
                                    <option value="">Month</option>
                                    <?php foreach(getMonths() as $m) { 
                                        echo "<option value=".$m.">".$m."</option>";
                                    } ?>
                                </select>
                                <select class="form-control" name="vo_year">
                                     <option value="">Year</option>
                                     <?php for ($i=2016; $i > 1916; $i--) { 
                                        echo " <option value=".$i.">".$i."</option>";
                                    } ?>
                                </select>
                                <div class="error_form vo_month"></div>
                                <div class="error_form vo_year"></div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="vo_description"></textarea>
                                <div class="error_form vo_description"></div>
                            </div>
                            <div class="form-group">
                               <button data-dismiss="modal" aria-label="Close" type="button" class="btn send_btn">Cancel</button>
                                <button class="send_btn volunteers-save-btn">Save</button>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal  for #Volunteers end-->
        <!-- Modal  for #interest-->
        <div class="modal fade custom_model" id="interest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="interest-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Interest
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Interests</label>
                                <textarea class="form-control" placeholder="Interests" name="interests"></textarea>
                                <p>Examples: Management Training, new technologies, investing, fishing, digital photography</p>
                                <div class="error_form interests"></div>
                            </div>
                            <div class="form-group">
                                <button data-dismiss="modal" aria-label="Close" type="button" class="btn send_btn">Cancel</button>
                                <button class="send_btn interest-save-btn">Save</button>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal  for #interest end-->
        <!-- Modal  for #certificate-->
        <div class="modal fade custom_model" id="Certificate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="certificate-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Certification
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Certification Name</label>
                                 <input type="text" class="form-control" name="certificate_name" placeholder="Certification Name">
                                 <div class="error_form certificate_name"></div>
                            </div>
                             <div class="form-group">
                                <label>Certification Authority</label>
                                 <input type="text" class="form-control" name="authority" placeholder="Certification Authority">
                                 <div class="error_form authority"></div>
                            </div>
                             <div class="form-group">
                                <label>License Number</label>
                                <input type="text" class="form-control" name="license" placeholder="License Number">
                                <div class="error_form license"></div>
                            </div>
                             <div class="form-group">
                                <label>Certification URL</label>
                                <input type="text" class="form-control" name="certification_url" placeholder="Certification URL">
                                <div class="error_form certification_url"></div>
                            </div>
                            
                            <div class="form-group dates">
                                <label>Date</label>
                                <select class="form-control" name="month">
                                    <option value="">Month</option>
                                    <?php foreach(getMonths() as $m) { 
                                        echo "<option value=".$m.">".$m."</option>";
                                    } ?>
                                </select>
                                <select class="form-control" name="year">
                                     <option value="">Year</option>
                                     <?php for ($i=2016; $i > 1916; $i--) { 
                                        echo " <option value=".$i.">".$i."</option>";
                                    } ?>
                                </select>
                                <div class="error_form month"></div>
                                <div class="error_form year"></div>
                            </div>
                            <div class="form-group">
                                <button data-dismiss="modal" aria-label="Close" type="button" class="btn send_btn">Cancel</button>
                                <button class="send_btn certificate-save-btn">Save</button>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal  for #certificate end-->

<script>

$(document).ready(function(){

$("body").on('click','.education-save-btn',function() {
    var form_data = new FormData($('#education-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/student/saveEducation",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.education-save-btn').attr('disabled',true).text('Loading....');
          ajaxindicatorstart();
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#education-form')[0].reset();
            $('#education').modal('hide');
            showToaster('success',resp.msg);
            window.location.reload();
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.education-save-btn').attr('disabled',false).text('Save');
           ajaxindicatorstop();
        },
        error:function(error)
        {
            $('.education-save-btn').attr('disabled',false).text('Save');
            ajaxindicatorstop();
        }
    });
});

$("body").on('click','.volunteers-save-btn',function() {
    var form_data = new FormData($('#volunteer-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/student/saveVolunteer",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.volunteers-save-btn').attr('disabled',true).text('Loading....');
          ajaxindicatorstart();
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#volunteer-form')[0].reset();
            $('#Volunteers').modal('hide');
            showToaster('success',resp.msg);
            window.location.reload();
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.volunteers-save-btn').attr('disabled',false).text('Save');
           ajaxindicatorstop();
        },
        error:function(error)
        {
            $('.volunteers-save-btn').attr('disabled',false).text('Save');
            ajaxindicatorstop();
        }
    });
});

$("body").on('click','.interest-save-btn',function() {
    var form_data = new FormData($('#interest-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/student/saveInterest",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.interest-save-btn').attr('disabled',true).text('Loading....');
          ajaxindicatorstart();
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#interest-form')[0].reset();
            $('#interest').modal('hide');
            showToaster('success',resp.msg);
            window.location.reload();
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.interest-save-btn').attr('disabled',false).text('Save');
           ajaxindicatorstop();
        },
        error:function(error)
        {
            $('.interest-save-btn').attr('disabled',false).text('Save');
            ajaxindicatorstop();
        }
    });
}); 

$("body").on('click','.certificate-save-btn',function() {
    var form_data = new FormData($('#certificate-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/student/saveCertificate",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.certificate-save-btn').attr('disabled',true).text('Loading....');
          ajaxindicatorstart();
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#certificate-form')[0].reset();
            $('#Certificate').modal('hide');
            showToaster('success',resp.msg);
            window.location.reload();
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.certificate-save-btn').attr('disabled',false).text('Save');
           ajaxindicatorstop();
        },
        error:function(error)
        {
            $('.certificate-save-btn').attr('disabled',false).text('Save');
            ajaxindicatorstop();
        }
    });
});

// for copy to link
$("a#copy_link").zclip({
   path:"<?php echo base_url('ZeroClipboard.swf'); ?>",
   copy:function()
   {
     return $("input#link").val();
   }
});

});

</script>  

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#birthdate" ).datepicker({
        minDate: 0,
        format: "yyyy-m-dd",
        autoclose: true
    });
  });
</script>
