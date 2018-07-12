
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Post Landing Form
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
                        <form role="form" method="post" action="<?php echo base_url(); ?>university/add-landing-form" >

            <!-- Validation error and flash data -->
                <div class="alert alert-danger alert-dismissable errors-msgs hidden">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>

            <div class="box-header with-border">
              <h3 class="box-title">General Information</h3>
              </div>
              <div class="box-body">
                
                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control <?php if(form_error('name')) { echo 'valid_error'; } ?>" id="name" placeholder="Enter Name" />
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="founded">Email</label>
                        <input type="email" name="email" class="form-control <?php if(form_error('email')) { echo 'valid_error'; } ?>" id="email" placeholder="Enter Email"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" name="phone" class="form-control <?php if(form_error('phone')) { echo 'valid_error'; } ?>" id="phone" placeholder="Enter Phone" />
                      </div>
                  </div>
                  
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="date">Type</label>
                        <select class="form-control <?php if(form_error('type')) { echo 'valid_error'; } ?>" name="type">
                          <option value="">Select</option>
                          <option value="1">Housing</option>
                          <option value="2">Airport pick</option>
                          <option value="3">CPT</option>
                          <option value="4">OPT</option>
                        </select>
                      </div>
                  </div>
                </div>

              </div><!-- .box-body -->  

              <div class="box-footer">
              <button type="submit" class="btn btn-primary" title="Add Landing Form" id="add-university-btn">ADD</button>
              <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
              </div>
            </form>
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
