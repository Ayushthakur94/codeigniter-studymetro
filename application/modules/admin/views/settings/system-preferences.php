<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'system_preferences_settings_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/settings/system-preferences'); ?>" method="post">
	            <div class="box-body">
	            	<!-- Validation error and flash data -->
		            <?php if(validation_errors()) { ?>
		                <div class="alert alert-danger alert-dismissable">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  <?php echo validation_errors(); ?>
		                </div>
		            <?php } if($this->session->flashdata('setting_success')) { ?>
		                <div class="alert alert-success lert-dismissable">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  <?php echo $this->session->flashdata('setting_success'); ?>
		                </div>
		            <?php } ?>

	            	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="public_website_url">Public Website Url</label>
		                  <input type="text" name="public_website_url" class="form-control" id="public_website_url" placeholder="Enter public website url" value="<?php echo get_option('public_website_url'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="public_header_title">Public Header Title</label>
		                  <input type="text" name="public_header_title" class="form-control" id="public_homepage_content" placeholder="Enter public header title" value="<?php echo get_option('public_header_title'); ?>" />
		                </div>
	                    <div class="form-group">
		                  <label for="cms_homepage">Select Homepage</label>
		                  <select name="cms_homepage" class="form-control" id="cms_homepage">
		                  	<?php if(!empty($pages)) { ?>
			                  	<?php foreach($pages as $key => $val) { ?>
			                  		<option value="<?php echo $val['id']; ?>" <?php show_selected(get_option('cms_homepage'), $val['id']); ?>><?php echo $val['title']; ?></option>
			                  	<?php } ?>
			                <?php } else { ?>
			                	<option value=""><?php echo sprintf(NO_RECORDS_FOUND, 'Pages'); ?></option>
			                <?php } ?>
		                  </select>
		                </div>
		                <div class="checkbox">
	                      <label>
	                      	<input type="hidden" name="is_show_homepage_alert" value="0" />
	                        <input type="checkbox" name="is_show_homepage_alert" value="1" <?php if(get_option('is_show_homepage_alert') == 1) { echo 'checked="checked"'; } ?>> Show homepage alert
	                      </label>
	                    </div>
	                </div><!-- .col-md-6 -->
	                <div class="col-md-9 homePageAlertContent" <?php if(get_option('is_show_homepage_alert') != 1) { ?>style="display: none;"<?php } ?>>
	                    <div class="form-group">
		                  	<label for="homepage_alert_content">Homepage Alert Content</label>
		                	<textarea name="homepage_alert_content" class="form-control" id="homepage_alert_content" placeholder="Enter homepage alert content"><?php echo get_option('homepage_alert_content'); ?></textarea>
		                </div>
		            </div><!-- .col-md-9 -->
		            <div class="col-md-9">
		                <div class="form-group">
		                  <label for="homepage_content">Homepage Content</label>
		                  <textarea name="homepage_content" class="form-control" id="homepage_content" placeholder="Enter homepage content"><?php echo get_option('homepage_content'); ?></textarea>
		                </div>
		            </div><!-- .col-md-9 -->
		            <div class="col-md-6">
		            	<div class="form-group">
		                  <label for="homepage_content_title">Homepage Content Title</label>
		                  <input type="text" name="homepage_content_title" class="form-control" id="homepage_content_title" placeholder="Enter homepage content title" value="<?php echo get_option('homepage_content_title'); ?>" />
		                </div>
		                <div class="checkbox">
	                      <label>
	                      	<input type="hidden" name="user_validated_by_email" value="0" />
	                        <input type="checkbox" name="user_validated_by_email" value="1" <?php if(get_option('user_validated_by_email') == 1) { echo 'checked="checked"'; } ?>> User may validated by email
	                      </label>
	                    </div>
	                    <div class="checkbox">
	                      <label>
	                      	<input type="hidden" name="user_validated_by_phone_text" value="0" />
	                        <input type="checkbox" value="1" name="user_validated_by_phone_text" <?php if(get_option('user_validated_by_phone_text') == 1) { echo 'checked="checked"'; } ?>> User may validated by phone text
	                      </label>
	                    </div>
	                    <div class="checkbox">
	                      <label>
	                      	<input type="hidden" name="human_validation" value="0" />
	                        <input type="checkbox" name="human_validation" value="1" <?php if(get_option('human_validation') == 1) { echo 'checked="checked"'; } ?>> Human validation mandatory
	                      </label>
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
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('homepage_content');
    CKEDITOR.replace('homepage_alert_content');

    $(document).ready(function(){
    	$('input[name="is_show_homepage_alert"]').click(function(){
    		if($(this).is(':checked')) {
	    		$('.homePageAlertContent').fadeIn();
	    	} else {
	    		$('.homePageAlertContent').fadeOut();
	    	}
    	});
    });
</script>