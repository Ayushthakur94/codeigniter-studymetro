        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Comments
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                      <div class="right_dashboard">
                      <div class="success"></div>
                      <div class="box-body table-responsive no-padding">
                        <!-- view comments -->
                        <h5>Click the “add comment” button below to submit your comments to College Study US.</h5><br/>
                          <div class="cmnt_box">
                              <?php if(!empty($comments)) { foreach($comments as $c) { ?>
                              <table cellspacing="2" cellpadding="4" border="1" class="cmnt_table">
                                <tbody>
                                  <tr>
                                  <?php if($this->session->userdata('user_id') == $c['from_user_id']) { $color = '#014e99'; } else {
                                    $color = '#434b4e';
                                    } ?>
                                    <td align="right" style="width:60px; padding-right:8px; border-right:1px solid #dcdcdc; font-size:7pt; color:<?php echo $color; ?>;">
                                        <?php echo $c['comment_date']; ?>
                                        <br>
                                        <?php $from = $this->common_model->getRecordBySingleJoin(USER,'id',COMMENTS,'from_user_id',$c['from_user_id']); 
                                        if($from['user_type']==1){ echo 'Admin'; }
                                        if($from['user_type']==2){ echo 'Student'; }
                                        if($from['user_type']==5){ echo 'University'; } ?>
                                    </td>
                                    <td style="padding-left:8px; color:<?php echo $color; ?>"><?php echo $c['message']; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                              <?php } ?>
                            </div><?php } else { ?>
                        <div class="well text-center">Conversation not found</div>
                        <?php } ?>
                        <form method="post" action="<?php echo base_url('user/addComment'); ?>">
                          <table cellspacing="0" cellpadding="0" border="0" style="">
                            <tbody>
                              <tr>
                                <td style="">
                                  <input type="text" class="cmnt_text_box <?php if(form_error('comment_text')) { echo 'valid_error' ;} ?>" name="comment_text">
                                </td>
                                <td>
                                  <input type="submit" class="btn btn-primary" value="Add comment" name="submit">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
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
