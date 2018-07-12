<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_office_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/offices/addOffice">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add Office</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Title</label>
		                  <input type="text" name="title" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="photos">Address</label>
		                  <textarea required rows="6" name="address" class="form-control"></textarea>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Email</label>
		                  <input type="email" name="email" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Telephone</label>
		                  <input type="text" name="telephone" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Mobile</label>
		                  <input type="text" name="mobile" required class="form-control margin_bottom10"/>
		                </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Add Office">ADD</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
