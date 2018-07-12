<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_user_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/users/add-new'); ?>" method="post" enctype="multipart/form-data">
	            <div class="box-body">
	            	<!-- Validation error and flash data -->
		            <?php if(validation_errors() || $this->session->flashdata('general_error')) { ?>
		                <div class="alert alert-danger alert-dismissable">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  <?php echo validation_errors(); ?>
		                  <?php echo $this->session->flashdata('general_error'); ?>
		                </div>
		            <?php } ?>

	            	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="name">Email</label>
		                  <input type="text" name="email" class="form-control" id="name" placeholder="Enter Email" value="<?php echo set_value('email'); ?>"/>
		                </div>
		                <div class="form-group">
		                  <label for="name">Password</label>
		                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" value="<?php echo set_value('password'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="name">First Name</label>
		                  <input type="text" name="first_name" class="form-control" id="name" placeholder="Enter Firstname" value="<?php echo set_value('first_name'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="name">Last Name</label>
		                  <input type="text" name="last_name" class="form-control" id="name" placeholder="Enter Lastname" value="<?php echo set_value('last_name'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="phone_number">Phone Number</label>
		                  <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Enter Phone Number" value="<?php echo set_value('phone_number'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="header_picture">Profile Picture</label>
		                  <input type="file" name="profile_picture" class="form-control" id="profile_picture"/>
		                </div>
		                <div class="form-group">
		                  <label for="is_email_verified">Email Verified</label>
		                  <select name="is_email_verified" class="form-control" id="is_email_verified">
		                  	<option value="0" <?php set_select('is_email_verified', 0); ?>>No</option>
		                  	<option value="1" <?php set_select('is_email_verified', 1); ?>>Yes</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="is_phone_verified">Phone Verified</label>
		                  <select name="is_phone_verified" class="form-control" id="is_phone_verified">
		                  	<option value="0" <?php set_select('is_phone_verified', 0); ?>>No</option>
		                  	<option value="1" <?php set_select('is_phone_verified', 1); ?>>Yes</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="is_blocked">Block User</label>
		                  <select name="is_blocked" class="form-control" id="is_blocked">
		                  	<option value="0" <?php set_select('is_blocked', 0); ?>>No</option>
		                  	<option value="1" <?php set_select('is_blocked', 1); ?>>Yes</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="user_type">User Type</label>
		                  <select name="user_type" class="form-control" id="user_type">
		                  	<option value="1" <?php set_select('user_type', 1); ?>>As Super Admin</option>
		                  	<option value="2" <?php set_select('user_type', 2); ?>>As Student</option>
		                    <option value="3" <?php set_select('user_type', 3); ?>>As Agency</option>
		                    <option value="4" <?php set_select('user_type', 4); ?>>As Trainer</option>
		                    <option value="5" <?php set_select('user_type', 5); ?>>As University</option>
		                    <option value="6" <?php set_select('user_type', 6); ?>>As Frainchsee</option>
		                  </select>
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->	

	            <div class="box-footer">
	              <input type="submit" name="submit" value="Add" class="btn btn-primary"/>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->