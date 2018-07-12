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

	            	<div class="col-md-12">
		                <div class="form-group col-md-6">
		                  <label for="site_name">Site Name</label>
		                  <input type="text" name="site_name" class="form-control" id="site_name" placeholder="Enter Site Name" value="<?php echo get_option('site_name'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="site_description">Site Description</label>
		                  <input type="text" name="site_description" class="form-control" id="site_description" placeholder="Enter Site Description" value="<?php echo get_option('site_description'); ?>" />
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->	

	            <div class="box-header with-border">
		            <h3 class="box-title"><?php echo LOGO_FAVICON_SETTING_TEXT; ?></h3>
	          	</div><!-- /.box-header -->

	          	<div class="box-body">
	            	<div class="col-md-12">
		                <div class="form-group col-md-6">
		                  <label for="site_logo">Site Logo</label>
		                  <input type="file" name="site_logo" class="form-control" id="site_logo"/>
		                  <?php $logo = get_option('site_logo'); if(!empty($logo)) { ?>
		                  	<input type="hidden" name="old_site_logo" value="<?php echo get_option('site_logo'); ?>"/>
		                  	<img src="<?php echo get_option('site_logo'); ?>" class="viewAdminLogo"/>
		                  <?php } ?>
		                </div>
		                <div class="form-group col-md-6">
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
	            	<div class="col-md-12">
		                <div class="form-group col-md-6">
		                  <label for="facebook">Facebook</label>
		                  <input type="text" name="facebook_link" class="form-control" id="facebook" placeholder="Enter Facebook Link" value="<?php echo get_option('facebook_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="twitter">Twitter</label>
		                  <input type="text" name="twitter_link" class="form-control" id="twitter" placeholder="Enter Twitter Link" value="<?php echo get_option('twitter_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="googlePlus">Google+</label>
		                  <input type="text" name="google_plus_link" class="form-control" id="googlePlus" placeholder="Enter Google+ Link" value="<?php echo get_option('google_plus_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="google_map_link">Google Map</label>
		                  <input type="text" name="google_map_link" class="form-control" id="google_map_link" placeholder="Enter Google map Link" value="<?php echo get_option('google_map_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="linkedin">Linkedin</label>
		                  <input type="text" name="linkedin_link" class="form-control" id="linkedin" placeholder="Enter Linkedin Link" value="<?php echo get_option('linkedin_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="instagram">Instagram</label>
		                  <input type="text" name="instagram_link" class="form-control" id="instagram" placeholder="Enter Instagram Link" value="<?php echo get_option('instagram_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="pinterest">Pinterest</label>
		                  <input type="text" name="pinterest_link" class="form-control" id="pinterest" placeholder="Enter Pinterest Link" value="<?php echo get_option('pinterest_link'); ?>" />
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="youtube">Youtube</label>
		                  <input type="text" name="youtube_link" class="form-control" id="youtube" placeholder="Enter Youtube Link" value="<?php echo get_option('youtube_link'); ?>" />
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->

	            <div class="box-header with-border">
		            <h3 class="box-title">Third Party Plugins</h3>
	          	</div><!-- /.box-header -->

	          	<div class="box-body">
	            	<div class="col-md-12">
		                <div class="form-group col-md-6">
		                  <label for="google_remarking_code">Google Remarketing Tag</label>
		                  <textarea style="height:150px; resize: none;" name="google_remarking_code" class="form-control" id="google_remarking_code" placeholder="Enter Google Remarketing Tag"><?php echo str_replace('<br/>', PHP_EOL, get_option('google_remarking_code')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="facebook_plugin">Facebook</label>
		                  <textarea style="height:150px; resize: none;" name="facebook_plugin" class="form-control" id="facebook_plugin" placeholder="Enter Facebook"><?php echo str_replace('<br/>', PHP_EOL, get_option('facebook_plugin')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="twitter_plugin">Twitter</label>
		                  <textarea style="height:150px; resize: none;" name="twitter_plugin" class="form-control" id="twitter_plugin" placeholder="Enter Twitter"><?php echo str_replace('<br/>', PHP_EOL, get_option('twitter_plugin')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="vcita_plugin">Vcita</label>
		                  <textarea style="height:150px; resize: none;" name="vcita_plugin" class="form-control" id="vcita_plugin" placeholder="Enter Vcita"><?php echo str_replace('<br/>', PHP_EOL, get_option('vcita_plugin')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="olark_plugin">Olark</label>
		                  <textarea style="height:150px; resize: none;" name="olark_plugin" class="form-control" id="olark_plugin" placeholder="Enter Olark"><?php echo str_replace('<br/>', PHP_EOL, get_option('olark_plugin')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="google_analytics">Google Analytics </label>
		                  <textarea style="height:150px; resize: none;" name="google_analytics" class="form-control" id="google_analytics" placeholder="Enter Google Analytics"><?php echo str_replace('<br/>', PHP_EOL, get_option('google_analytics')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="google_webmaster">Google Webmaster</label>
		                  <textarea style="height:150px; resize: none;" name="google_webmaster" class="form-control" id="google_webmaster" placeholder="Enter Google Webmaster"><?php echo str_replace('<br/>', PHP_EOL, get_option('google_webmaster')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="bing_webmaster">Bing Webmaster</label>
		                  <textarea style="height:150px; resize: none;" name="bing_webmaster" class="form-control" id="bing_webmaster" placeholder="Enter Bing Webmaster"><?php echo str_replace('<br/>', PHP_EOL, get_option('bing_webmaster')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="linkedin_plugin">Linkedin</label>
		                  <textarea style="height:150px; resize: none;" name="linkedin_plugin" class="form-control" id="linkedin_plugin" placeholder="Enter Linkedin"><?php echo str_replace('<br/>', PHP_EOL, get_option('linkedin_plugin')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="lead_squared">Lead Squared</label>
		                  <textarea style="height:150px; resize: none;" name="lead_squared" class="form-control" id="lead_squared" placeholder="Enter Lead Squared"><?php echo str_replace('<br/>', PHP_EOL, get_option('lead_squared')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="hubspot_plugin">HubSpot</label>
		                  <textarea style="height:150px; resize: none;" name="hubspot_plugin" class="form-control" id="hubspot_plugin" placeholder="Enter HubSpot"><?php echo str_replace('<br/>', PHP_EOL, get_option('hubspot_plugin')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="social_buttons">Social Buttons</label>
		                  <textarea style="height:150px; resize: none;" name="social_buttons" class="form-control" id="social_buttons" placeholder="Enter Social Buttons"><?php echo str_replace('<br/>', PHP_EOL, get_option('social_buttons')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="pop_up_function">Pop Up Function</label>
		                  <textarea style="height:150px; resize: none;" name="pop_up_function" class="form-control" id="pop_up_function" placeholder="Enter Pop Up Function"><?php echo str_replace('<br/>', PHP_EOL, get_option('pop_up_function')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
		                  <label for="other_plugin">Others</label>
		                  <textarea style="height:150px; resize: none;" name="other_plugin" class="form-control" id="other_plugin" placeholder="Enter Others"><?php echo str_replace('<br/>', PHP_EOL, get_option('other_plugin')); ?></textarea>
		                </div>
		            </div><!-- .col-md-6 -->
		        </div><!-- .box-body -->


	            <div class="box-header with-border">
		            <h3 class="box-title"><?php echo FOOTER_CONTENT_SETTINGS_TEXT; ?></h3>
	          	</div><!-- /.box-header -->

	            <div class="box-body">
	            	<div class="col-md-12">
		                <div class="form-group col-md-6">
		                  <label for="copyright_text">Copyright Text</label>
		                  <textarea style="height:150px; resize: none;" name="copyright_text" class="form-control" id="copyright_text" placeholder="Enter Copyright Text"><?php echo str_replace('<br/>', PHP_EOL, get_option('copyright_text')); ?></textarea>
		                </div>
		                <div class="form-group col-md-6">
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