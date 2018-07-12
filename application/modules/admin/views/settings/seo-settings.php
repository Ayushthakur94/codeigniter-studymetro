<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'seo_settings_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/settings/seo'); ?>" method="post" enctype="multipart/form-data">
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
		                  <label for="meta_separator">Meta Separator</label>
		                  <select name="meta_separator" class="form-control" id="meta_separator">
		                  	<option value="|" <?php show_selected(get_option('meta_separator'), '|'); ?>>|</option>
		                  	<option value="-" <?php show_selected(get_option('meta_separator'), '-'); ?>>-</option>
		                  	<option value="»" <?php show_selected(get_option('meta_separator'), '»'); ?>>&raquo;</option>
		                  	<option value="::" <?php show_selected(get_option('meta_separator'), '::'); ?>>::</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="meta_title">Meta Title</label>
		                  <textarea name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta title"><?php echo get_option('meta_title'); ?></textarea>
		                </div>
		                <div class="form-group">
		                  <label for="meta_description">Meta Description</label>
		                  <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Enter meta description"><?php echo get_option('meta_description'); ?></textarea>
		                </div>
		                <div class="form-group">
		                  <label for="meta_keywords">Meta keywords</label>
		                  <textarea name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Enter comma seprated meta keywords. Eg: church, church management"><?php echo get_option('meta_keywords'); ?></textarea>
		                </div>
		                <div class="form-group">
		                  <label for="meta_title_preview">Meta Title Preview</label>
		                  <input disabled="disabled" type="text" name="meta_title_preview" class="form-control" id="meta_title_preview" value="<?php echo get_option('meta_title').' '.get_option('meta_separator').' '.get_option('site_name'); ?>"/>
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