<div class="login-box">
  <div class="login-logo">
    <?php
      $adminHeading = get_option('site_name');
      if(!empty($adminHeading)) {
        $title = $adminHeading;
        $churchLogo = get_option('site_logo');
        $logo = (!empty($churchLogo)) ? get_option('site_logo') : '';
      } else {
        $title = ADMIN_PANEL_HEADING;
      }
    ?>
    <a href="<?php echo get_option('public_website_url'); ?>" target="_blank" title="<?php echo $title; ?>">
      <?php if(!empty($logo)) { ?>
        <img src="<?php echo $logo; ?>" alt="<?php echo $title; ?>" class="adminLoginLogo"/>
      <?php } else { ?>
        <b><?php echo $title; ?></b>
      <?php } ?>
    </a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo ADMIN_LOGIN_HEADING; ?></p>
    
    <!-- .validation error -->
    <?php if(validation_errors() || $this->session->flashdata('login_error')) { ?>
      <div class="alert alert-danger">
        <?php 
          echo validation_errors();
          echo $this->session->flashdata('login_error'); 
        ?>
      </div>
    <?php } if($this->session->flashdata('logged_out') || $this->session->flashdata('change_password_success')) { ?>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('logged_out'); ?>
        <?php echo $this->session->flashdata('change_password_success'); ?>
      </div>
    <?php } ?>  

    <!-- get saved cookie -->
    <?php
      $cookieData = array();
      $cookie = get_cookie('cms_login_remember');
      if(!empty($cookie)) { 
        $cookieData = explode('|', get_cookie('cms_login_remember'));
      } 
    ?>
    <form action="<?php echo base_url(); ?>admin/login<?php if($this->input->get('return_uri')) { echo '?return_uri='.$this->input->get('return_uri'); } ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(!empty($cookieData)) { echo $cookieData[0]; } ?>" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(!empty($cookieData)) { echo $cookieData[1]; } ?>" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember_me"> Remember Me
            </label>
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Log In" />
        </div><!-- /.col -->
      </div>
    </form>

    <a href="<?php cms_url('admin/forgot-password'); ?>" title="Forgot Password">I forgot my password</a><br>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->