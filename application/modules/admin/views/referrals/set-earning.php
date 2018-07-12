<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'set_earning_amount_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" action="<?php cms_url('admin/referrals/manageEarningAmount'); ?>" enctype="multipart/form-data">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('item_success')) { ?>
                <div class="alert alert-success alert-dismissable" style="margin-top:12px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('item_success'); ?>
                </div>
	          	<?php } if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Set Earning Amount</h3>
	          	</div>

	          	<div class="box-body">

	          		<div class="col-md-12">
			            <div class="col-md-6">
				            <div class="form-group">
			                  <label for="referrals">User Earning Amount</label>
			                  <input type="number" min="1" value="<?php echo get_option('user_earning'); ?>" onkeypress="return validateNumbers(event)" name="user_earning" required placeholder="Enter User Earning Amount ($)" required class="form-control margin_bottom10"/>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
			            <div class="col-md-6">
				            <div class="form-group">
			                  <label for="referrals">Friend Earning Amount</label>
			                  <input type="number" min="1" value="<?php echo get_option('friend_earning'); ?>" onkeypress="return validateNumbers(event)" name="friend_earning" required placeholder="Enter Friend Earning Amount ($)" required class="form-control margin_bottom10"/>
			                </div>
			            </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Set Earning Amount">Submit</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
