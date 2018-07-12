        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Feedback
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                        <div class="col-md-9 col-sm-9">
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/user/submitFeedback">
                       <div class="profile_sec">
                         <div class="top_row">
                             <h2>Give Your Feedback</h2>
                          </div> 
                          <?php
                            $detail = getUserDetails();
                          ?>
                          <div class="profile_content">
                              <div class="form-group">
                                  <label for="name" class="col-sm-3 control-label"> Name:</label>
                                  <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(set_value('name')) { echo set_value('name'); } else { echo$detail[0]['first_name']." ".$detail[0]['last_name']; } ?>">
                                  <div class="error_form"><?php echo form_error('name'); ?></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-3 control-label"> Email:</label>
                                  <div class="col-sm-9">
                                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(set_value('email')) { echo set_value('email'); } else { echo$detail[0]['email']; } ?>">
                                  <div class="error_form"><?php echo form_error('email'); ?></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-3 control-label"> Phone:</label>
                                  <div class="col-sm-9">
                                  <input type="text" class="form-control" name="phone" placeholder="Phone" onkeypress="return validateNumbers(event)" value="<?php if(set_value('phone')) { echo set_value('phone'); } else { echo$detail[0]['phone_number']; } ?>">
                                  <div class="error_form"><?php echo form_error('phone'); ?></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-3 control-label"> Your Suggestions:</label>
                                  <div class="col-sm-9">
                                  <textarea name="suggestion" rows="10" class="form-control" placeholder="Your Suggestions"><?php if(set_value('suggestion')) echo set_value('suggestion'); ?></textarea>
                                  <div class="error_form"><?php echo form_error('suggestion'); ?></div>
                                  </div>
                              </div>
                              <span ><button class="commn_btn">SUBMIT</button></span>
                              <span><a href="javascript:void(0);" class="commn_btn" onclick="cancelAction()">CANCEL</a></span>
                          </div>
                      </div>
                    
                     
                        </form>
                   </div> 
                   
                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
        <!--Main container sec end-->
