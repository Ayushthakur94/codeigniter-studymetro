<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_coupon_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" action="<?php echo base_url(); ?>admin/coupons/addCoupon">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add Coupon</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Coupon Code</label>
		                  <input type="text" name="CouponCode" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Coupon Type</label>
		                  <select class="form-control" name="CouponType" required>
		                  	<option value="">Select Type</option>
		                  	<option value="Fixed">Fixed</option>
		                  	<option value="Percentage">Percentage</option>
		                  </select>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Amount</label>
		                  <input type="number" onkeypress="return validateNumbers(event)" name="CouponAmount" required class="form-control validate-no margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Start Date</label>
		                  <input type="text" readonly name="CoupunStartDate" id="CoupunStartDate" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">End Date</label>
		                  <input type="text" readonly name="CoupunEndDate" id="CoupunEndDate" required class="form-control margin_bottom10"/>
		                </div>
		            </div>

		        </div>
	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Add Coupon">ADD</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$.fn.jQueryDatepicker = $.fn.datepicker;
$(function() {
	$("#CoupunStartDate").jQueryDatepicker({
		minDate: 0,
		changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 1,
        onSelect: function(selected) {
		   $("#CoupunEndDate").datepicker("option","minDate", selected)
		}
	});
	$("#CoupunEndDate").jQueryDatepicker({
		minDate: 0,
		changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 1,
        onSelect: function(selected) {
		   $("#CoupunStartDate").datepicker("option","maxDate", selected)
		}
	});
});
</script>
