<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'edit_testimonial_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/testimonials/updateTestimonial">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Edit Testimonial</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Given By</label>
		                  <input type="text" name="given_by" required class="form-control margin_bottom10" value="<?php echo $details['given_by']; ?>" />
		                </div>
		                <input type="hidden" name="id" value="<?php echo $details['id']; ?>">
		                <div class="form-group">
		                  <label for="photos">Photos</label>
		                  <input type="file" onchange="readURL(this,'jpg|jpeg|png|gif','')" name="image" class="form-control margin_bottom10"/>
		                </div>
		                <img src="<?php echo SUB_DOMAIN_BASE_URL.$details['image']; ?>" class="viewAdminLogo img-responsive thumbnail">
		                <div class="form-group">
		                  <label for="photos">Content</label>
		                  <textarea required rows="6" name="content" class="form-control"><?php echo $details['content']; ?></textarea>
		                </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Edit Testimonial">EDIT</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
