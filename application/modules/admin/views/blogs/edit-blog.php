<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'edit_blog_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/blogs/updateBlog">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Edit Blog</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-12">
		            	<div class="form-group photo_1">
		                  <label for="photos">Title</label>
		                  <input type="text" name="title" required class="form-control margin_bottom10" value="<?php echo $details['title']; ?>" />
		                </div>
		                <input type="hidden" name="id" value="<?php echo $details['id']; ?>">
		                <div class="form-group">
		                  <label for="photos">Descprition</label>
		                  <textarea rows="15" name="descprition" class="form-control mceEditor"><?php echo $details['descprition']; ?></textarea>
		                </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Edit Blog">EDIT</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
