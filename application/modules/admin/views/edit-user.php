<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'edit_user_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/users/edit/'.$user['id']); ?>" method="post" enctype="multipart/form-data">
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
		                  <label for="name">Username</label>
		                  <input type="text" name="username" disabled="disabled" class="form-control" id="name" placeholder="Enter Username" value="<?php echo $user['username']; ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="name">Email</label>
		                  <input type="text" name="email" class="form-control" id="name" placeholder="Enter Email" value="<?php echo $user['email']; ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="name">First Name</label>
		                  <input type="text" name="first_name" class="form-control" id="name" placeholder="Enter Firstname" value="<?php echo get_user_meta($user['id'], 'first_name'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="name">Last Name</label>
		                  <input type="text" name="last_name" class="form-control" id="name" placeholder="Enter Lastname" value="<?php echo get_user_meta($user['id'], 'last_name'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="header_picture">Profile Picture</label>
		                  <input type="file" name="profile_picture" class="form-control" id="profile_picture"/>
		                  <?php
		                  	$pic = get_user_meta($user['id'], 'profile_picture'); 
		                  	if(!empty($pic)) { ?>
		                  	<input type="hidden" name="old_profile_picture" value="<?php echo $pic; ?>"/>
		                  	<img src="<?php echo $pic; ?>" class="editGroupHeaderPic" />
		                  <?php } ?>
		                </div>
		                <div class="form-group">
		                  <label for="is_email_verified">Email Verified</label>
		                  <select name="is_email_verified" class="form-control" id="is_email_verified">
		                  	<option value="0" <?php show_selected($user['is_email_verified'], 0); ?>>No</option>
		                  	<option value="1" <?php show_selected($user['is_email_verified'], 1); ?>>Yes</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="is_phone_verified">Phone Verified</label>
		                  <select name="is_phone_verified" class="form-control" id="is_phone_verified">
		                  	<option value="0" <?php show_selected($user['is_phone_verified'], 0); ?>>No</option>
		                  	<option value="1" <?php show_selected($user['is_phone_verified'], 1); ?>>Yes</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="is_blocked">Block User</label>
		                  <select name="is_blocked" class="form-control" id="is_blocked">
		                  	<option value="0" <?php show_selected($user['is_blocked'], 0); ?>>No</option>
		                  	<option value="1" <?php show_selected($user['is_blocked'], 1); ?>>Yes</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="user_type">User Type</label>
		                  <select name="user_type" class="form-control" id="user_type">
		                  	<option value="1" <?php show_selected($user['user_type'], 1); ?>>As Super Admin</option>
		                  	<option value="2" <?php show_selected($user['user_type'], 2); ?>>As Student</option>
		                    <option value="3" <?php show_selected($user['user_type'], 3); ?>>As Agency</option>
		                    <option value="4" <?php show_selected($user['user_type'], 4); ?>>As Trainer</option>
		                    <option value="5" <?php show_selected($user['user_type'], 5); ?>>As University</option>
		                    <option value="6" <?php show_selected($user['user_type'], 6); ?>>As Frainchsee</option>
		                  </select>
		                </div>
		                <br/>
		                <h4>Change Password</h4>
		                <hr/>
		                <div class="form-group">
		                  <label for="password">Password</label>
		                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
		                </div>
		                <div class="form-group">
		                  <label for="confirm_password">Confirm Password</label>
		                  <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password" />
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->	

	            <div class="box-footer">
	              <input type="submit" name="submit" value="Save Changes" class="btn btn-primary"/>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->