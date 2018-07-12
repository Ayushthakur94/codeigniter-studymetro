<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_event_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" action="<?php echo base_url(); ?>admin/events/addEvents">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add Events</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group">
		                  <label for="date">Date</label>
		                  <input type="text" name="date" placeholder="Date" required class="form-control margin_bottom10" id="datepicker" />
		                </div>
		                <div class="form-group">
		                  <label for="posted_in">Posted In</label>
		                  <input type="text" name="posted_in" placeholder="Posted In" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="content">Content</label>
		                  <textarea required rows="6" name="content" placeholder="Content" class="form-control"></textarea>
		                </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Add Event">ADD</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    	minDate: 0,
    	format: "yyyy-M-dd",
        autoclose: true
    });
  });
</script>