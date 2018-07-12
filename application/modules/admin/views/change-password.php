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
    <a href="<?php echo get_option('public_website_url') ?>" target="_blank" title="<?php echo $title; ?>">
      <?php if(!empty($logo)) { ?>
        <img src="<?php echo $logo; ?>" alt="<?php echo $title; ?>" class="adminLoginLogo"/>
      <?php } else {?>
        <b><?php echo $title; ?></b>
      <?php } ?>
    </a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo ADMIN_CHANGE_PASSWORD_HEADING; ?></p>
    
    <!-- .validation error -->
    <?php if(validation_errors() || $this->session->flashdata('invalid_reset_key')) { ?>
      <div class="alert alert-danger">
        <?php 
          echo validation_errors();
          echo $this->session->flashdata('invalid_reset_key'); 
        ?>
      </div>
    <?php } ?>
    
    <form action="<?php echo base_url(); ?>admin/change-password<?php if($this->input->get('reset_key')) { echo '?reset_key='.$this->input->get('reset_key'); } ?>" method="post">
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div><!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Submit" />
        </div><!-- /.col -->
      </div>
    </form>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->