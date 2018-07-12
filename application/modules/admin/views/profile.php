<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'admin_profile'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo EDIT_PROFILE_TEXT; ?></h3>
          </div><!-- /.box-header -->

          <!-- form start -->
          <form role="form" action="<?php cms_url('admin/settings/profile'); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Validation error and flash data -->
              <?php if(validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo validation_errors(); ?>
                </div>
              <?php } if($this->session->flashdata('admin_profile_update_success')) { ?>
                <div class="alert alert-success lert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('admin_profile_update_success'); ?>
                </div>
              <?php } ?>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter First Name" value="<?php echo get_user_meta($session_data['user_id'], 'first_name'); ?>" />
                </div>
                <div class="form-group">
                  <label for="lastname">Email address</label>
                  <input type="text" name="last_name" class="form-control" id="lastname" placeholder="Enter Last Name" value="<?php echo get_user_meta($session_data['user_id'], 'last_name'); ?>" />
                </div>
                <div class="form-group">
                  <label for="emailAddress">Email</label>
                  <input type="email" name="email" class="form-control" id="emailAddress" placeholder="Enter email" value="<?php echo $user_info['email']; ?>" />
                </div>
                <div class="form-group">
                  <h5>Change Password</h5>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                  <label for="repeatPassword">Repeat Password</label>
                  <input type="password" name="repeat_password" class="form-control" id="repeatPassword" placeholder="Repeat Password"/>
                </div>
                <div class="form-group">
                  <label for="profilePicture">Profile Picture</label>
                  <input type="file" name="profile_picture" class="form-control" id="profilePicture" />
                  <?php $profilePic = get_user_meta($session_data['user_id'], 'profile_picture'); if(!empty($profilePic)) { ?>
                    <input type="hidden" name="current_profile_pic" value="<?php echo get_user_meta($session_data['user_id'], 'profile_picture'); ?>"/>
                    <img src="<?php echo get_user_meta($session_data['user_id'], 'profile_picture'); ?>" class="viewAdminLogo"/>
                  <?php } ?>
                </div>
              </div><!-- .col-md-6 -->
            </div><!-- /.box-body -->

            <div class="box-footer">
              <input type="submit" name="submit" value="Save Changes" class="btn btn-primary"/>
            </div>
          </form>

        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->