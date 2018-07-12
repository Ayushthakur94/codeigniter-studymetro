<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'general_settings_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/settings/general'); ?>" method="post" enctype="multipart/form-data">
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
		                  <label for="site_name">Site Name</label>
		                  <input type="text" name="site_name" class="form-control" id="site_name" placeholder="Enter Site Name" value="<?php echo get_option('site_name'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="site_description">Site Description</label>
		                  <input type="text" name="site_description" class="form-control" id="site_description" placeholder="Enter Site Description" value="<?php echo get_option('site_description'); ?>" />
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->	

	            <div class="box-header with-border">
		            <h3 class="box-title"><?php echo LOGO_FAVICON_SETTING_TEXT; ?></h3>
	          	</div><!-- /.box-header -->

	          	<div class="box-body">
	            	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="site_logo">Site Logo</label>
		                  <input type="file" name="site_logo" class="form-control" id="site_logo"/>
		                  <?php $logo = get_option('site_logo'); if(!empty($logo)) { ?>
		                  	<input type="hidden" name="old_site_logo" value="<?php echo get_option('site_logo'); ?>"/>
		                  	<img src="<?php echo get_option('site_logo'); ?>" class="viewAdminLogo"/>
		                  <?php } ?>
		                </div>
		                <div class="form-group">
		                  <label for="site_favicon">Site Favicon</label>
		                  <input type="file" name="site_favicon" class="form-control" id="site_favicon" />
		                  <?php $favicon = get_option('site_favicon'); if(!empty($favicon)) { ?>
		                  	<input type="hidden" name="old_site_favicon" value="<?php echo get_option('site_favicon'); ?>"/>
		                  	<img src="<?php echo get_option('site_favicon'); ?>" class="viewAdminfavicon"/>
		                  <?php } ?>
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->

	            <div class="box-header with-border">
		            <h3 class="box-title"><?php echo EMAIL_SETTING_TEXT; ?></h3>
	          	</div><!-- /.box-header -->

	            <div class="box-body">
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label for="SiteEmail">Site Email</label>
	                  <input type="text" name="site_email" class="form-control" id="SiteEmail" placeholder="Enter Site Email" value="<?php echo get_option('site_email'); ?>" />
	                </div>
	              </div><!-- .col-md-6 -->
	            </div><!-- /.box-body -->

	            <div class="box-header with-border">
		            <h3 class="box-title"><?php echo SOCIAL_MEDIA_SETTINGS_TEXT; ?></h3>
	          	</div><!-- /.box-header -->

	            <div class="box-body">
	            	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="facebook">Facebook</label>
		                  <input type="text" name="facebook_link" class="form-control" id="facebook" placeholder="Enter Facebook Link" value="<?php echo get_option('facebook_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="twitter">Twitter</label>
		                  <input type="text" name="twitter_link" class="form-control" id="twitter" placeholder="Enter Twitter Link" value="<?php echo get_option('twitter_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="googlePlus">Google+</label>
		                  <input type="text" name="google_plus_link" class="form-control" id="googlePlus" placeholder="Enter Google+ Link" value="<?php echo get_option('google_plus_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="google_map_link">Google Map</label>
		                  <input type="text" name="google_map_link" class="form-control" id="google_map_link" placeholder="Enter Google map Link" value="<?php echo get_option('google_map_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="linkedin">Linkedin</label>
		                  <input type="text" name="linkedin_link" class="form-control" id="linkedin" placeholder="Enter Linkedin Link" value="<?php echo get_option('linkedin_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="instagram">Instagram</label>
		                  <input type="text" name="instagram_link" class="form-control" id="instagram" placeholder="Enter Instagram Link" value="<?php echo get_option('instagram_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="pinterest">Pinterest</label>
		                  <input type="text" name="pinterest_link" class="form-control" id="pinterest" placeholder="Enter Pinterest Link" value="<?php echo get_option('pinterest_link'); ?>" />
		                </div>
		                <div class="form-group">
		                  <label for="youtube">Youtube</label>
		                  <input type="text" name="youtube_link" class="form-control" id="youtube" placeholder="Enter Youtube Link" value="<?php echo get_option('youtube_link'); ?>" />
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->

	            <div class="box-header with-border">
		            <h3 class="box-title"><?php echo FOOTER_CONTENT_SETTINGS_TEXT; ?></h3>
	          	</div><!-- /.box-header -->

	            <div class="box-body">
	            	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="copyright_text">Copyright Text</label>
		                  <textarea style="height:150px; resize: none;" name="copyright_text" class="form-control" id="copyright_text" placeholder="Enter Copyright Text"><?php echo str_replace('<br/>', PHP_EOL, get_option('copyright_text')); ?></textarea>
		                </div>
		                <div class="form-group">
		                  <label for="footer_name_address">Name & Address</label>
		                  <textarea style="height:150px; resize: none;" name="footer_name_address" class="form-control" id="footer_name_address" placeholder="Enter Address"><?php echo str_replace('<br/>', PHP_EOL, get_option('footer_name_address')); ?></textarea>
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