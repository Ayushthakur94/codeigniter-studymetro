<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_faq_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" action="<?php echo base_url(); ?>admin/faqs/addFaqs">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add FAQS</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group">
		                  <label for="date">Select Country</label>
		                  <select class="form-control" name="country" required>
		                  	<option value="">Select Country</option>
		                  	<option value="General">General FAQ</option>
		                  	<option value="UK">UK FAQ</option>
		                  	<option value="Canada">Canada FAQ</option>
		                  	<option value="New Zealand">New Zealand FAQ</option>
		                  	<option value="Ireland">Ireland FAQ</option>
		                  	<option value="France">France FAQ</option>
		                  	<option value="Germany">Germany FAQ</option>
		                  	<option value="Australia">Australia FAQ</option>
		                  	<option value="Europe">Europe FAQ</option>
		                  	<option value="USA">USA FAQ</option>
		                  	<option value="Signapore">Signapore FAQ</option>
		                  	<option value="Malaysia">Malaysia FAQ</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="posted_in">Question</label>
		                  <input type="text" name="question" placeholder="Question" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="content">Answer</label>
		                  <textarea required rows="6" name="answer" placeholder="Answer" class="form-control"></textarea>
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
