<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'manange_menu_location_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/menu/manage-location'); ?>" method="post">
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
		                  <label for="is_primary">Set Primary Menu</label>
		                  <select name="is_primary" class="form-control" id="is_primary">
		                  	<?php if(!empty($menus)) { ?>
		                  		<option value="">Select Menu</option>
		                  		<?php foreach($menus as $val) { ?>
		                  			<option value="<?php echo $val['menu_id']; ?>" <?php if($val['is_primary'] == 1) { echo 'selected="selected"'; } ?>><?php echo $val['menu_name']; ?></option>
		             			<?php } ?>
		             		<?php } else { ?> 
		             			<option value=""><?php echo sprintf(NO_RECORDS_FOUND, 'Menus') ?></option>
		             		<?php } ?>
		                  </select>
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