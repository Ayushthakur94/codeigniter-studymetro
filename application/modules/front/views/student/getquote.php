        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Get Quote
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                        <div class="col-md-9 col-sm-9">
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/student/submitQuote">
                       <div class="profile_sec">
                         <div class="top_row">
                            <h2>Online Adviser</h2>
                          </div> 
                          <h4>Get courses and package quote and advice from our experts!</h4>
                          <p>Welcome to the online advisor system at studymetro.com. Let our team of experienced advisors help you navigate the search process and all your options.<br>We will forward your request to our members who will get back to you shortly with the information you have requested.</p><br><br>
                          <div class="profile_content">
                              <div class="form-group">
                                  <label for="name" class="col-sm-3 control-label"> Enter your enquiry below:</label>
                                  <div class="col-sm-9">
                                  <textarea name="quote" rows="10" class="form-control" placeholder="Quote"><?php if(set_value('quote')) echo set_value('quote'); ?></textarea>
                                  <div class="error_form"><?php echo form_error('quote'); ?></div>
                                  </div>
                              </div>
                              <span ><button class="commn_btn">SEND</button></span>
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
