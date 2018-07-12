       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Schedule Webinar
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
                        <form role="form" method="post" action="<?php echo base_url('university/edit-webinar/'.$details['id']); ?>" id="program_form">

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
                        <input type="text" name="name" class="form-control <?php if(form_error('name')) { echo 'valid_error'; } ?>" id="name" placeholder="Enter Name" value="<?php echo $details['name']; ?>"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="founded">Email</label>
                        <input type="email" name="email" class="form-control <?php if(form_error('email')) { echo 'valid_error'; } ?>" id="email" placeholder="Enter Email" value="<?php echo $details['email']; ?>"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" name="phone" class="form-control <?php if(form_error('phone')) { echo 'valid_error'; } ?>" id="phone" placeholder="Enter Phone" value="<?php echo $details['phone']; ?>"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="founded">Skype ID</label>
                        <input type="text" name="skype_id" class="form-control <?php if(form_error('skype_id')) { echo 'valid_error'; } ?>" id="skype_id" placeholder="Enter Skype ID" value="<?php echo $details['skype_id']; ?>"/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" name="date" class="form-control <?php if(form_error('date')) { echo 'valid_error'; } ?>" id="date" placeholder="Enter Date" value="<?php echo $details['date']; ?>"/>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" class="form-control <?php if(form_error('time')) { echo 'valid_error'; } ?>" id="time" placeholder="Enter Time" value="<?php echo $details['time']; ?>"/>
                      </div>
                  </div>
                </div>

              </div><!-- .box-body -->  

              <div class="box-footer">
              <button type="submit" class="btn btn-primary" title="Edit Webinar" id="add-university-btn">EDIT</button>
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

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.timepicker.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.timepicker.css') ?>">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#date" ).datepicker({
        minDate: 0,
        format: "yyyy-m-dd",
        autoclose: true
    });
  });

  $('#time').timepicker({ 'step': 5 });

</script>