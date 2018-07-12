<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'edit_city_event_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/city_events/updateCityEvent">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Edit City Event</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Name</label>
		                  <input type="text" value="<?php echo $details['name']; ?>" name="name" placeholder="Event Name" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Venue</label>
		                  <input type="text" value="<?php echo $details['venue']; ?>" name="venue" placeholder="Event Venue" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Hotel URL</label>
		                  <input type="text" name="hotel_url" value="<?php echo $details['hotel_url']; ?>" placeholder="Hotel URL" class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">City</label>
		                  <input type="text" value="<?php echo $details['city']; ?>" name="city" placeholder="Event City" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Date</label>
		                  <input type="text" value="<?php echo $details['date']; ?>" name="date" id="datepicker" placeholder="Event Date" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="status">Is Free</label>
		                  <select name="is_free" class="form-control" id="is_free">
		                  	<option value="0" <?php if($details['is_free'] == 0) echo "selected"; ?>>Yes</option>
		                  	<option value="1" <?php if($details['is_free'] == 1) echo "selected"; ?>>No</option>
		                  </select>
		                </div>
		                <div class="paid-section <?php if($details['is_free'] == 0) echo "hidden"; ?>">
		                <?php 
		                	if($details['is_free'] == 1){ // paid
		                		$price_arr    = unserialize($details['price']);
		                		$is_table_arr = unserialize($details['is_table']);
		                		$inr_price_arr    = unserialize($details['inr_price']);
		                	}else{ // free
		                		$price_arr    = array();
		                		$is_table_arr = array();
		                		$inr_price_arr = array();
		                	}
		                ?>
			                <h4>Early Registration Rates (by January 31st, 2017)</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" value="<?php if(!empty($price_arr)) echo $price_arr[0]; ?>" name="price[]" <?php if($details['is_free'] == 1) echo "required"; ?> placeholder="Price (In USD)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="1" value="<?php if(!empty($inr_price_arr)) echo $inr_price_arr[0]; ?>" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table" <?php if($details['is_free'] == 1) echo "required"; ?> >
			                  	<option value="0" <?php if(!empty($is_table_arr) && $is_table_arr[0] == 0) echo 'selected'; ?>>Yes</option>
			                  	<option value="1" <?php if(!empty($is_table_arr) && $is_table_arr[0] == 1) echo 'selected'; ?>>No</option>
			                  </select>
			                </div>

			                <h4>Regular Registration Rates (by February 24th, 2017)</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" value="<?php if(!empty($price_arr)) echo $price_arr[1]; ?>" name="price[]" placeholder="Price (In USD)" <?php if($details['is_free'] == 1) echo "required"; ?> class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="1" value="<?php if(!empty($inr_price_arr)) echo $inr_price_arr[1]; ?>" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table" <?php if($details['is_free'] == 1) echo "required"; ?>>
			                  	<option value="0" <?php if(!empty($is_table_arr) && $is_table_arr[1] == 0) echo 'selected'; ?>>Yes</option>
			                  	<option value="1" <?php if(!empty($is_table_arr) && $is_table_arr[1] == 1) echo 'selected'; ?>>No</option>
			                  </select>
			                </div>

			                <h4>Late Registration Rates(After February 24th, 2017))</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" value="<?php if(!empty($price_arr)) echo $price_arr[2]; ?>" name="price[]" placeholder="Price (In USD)" <?php if($details['is_free'] == 1) echo "required"; ?> class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="1" value="<?php if(!empty($inr_price_arr)) echo $inr_price_arr[2]; ?>" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table" <?php if($details['is_free'] == 1) echo "required"; ?>>
			                  	<option value="0" <?php if(!empty($is_table_arr) && $is_table_arr[2] == 0) echo 'selected'; ?>>Yes</option>
			                  	<option value="1" <?php if(!empty($is_table_arr) && $is_table_arr[2] == 1) echo 'selected'; ?>>No</option>
			                  </select>
			                </div>

			                <h4>Presentation</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" value="<?php if(!empty($price_arr)) echo $price_arr[3]; ?>" name="price[]" placeholder="Price (In USD)" <?php if($details['is_free'] == 1) echo "required"; ?> class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="0" value="<?php if(!empty($inr_price_arr)) echo $inr_price_arr[3]; ?>" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table" <?php if($details['is_free'] == 1) echo "required"; ?>>
			                  	<option value="0" <?php if(!empty($is_table_arr) && $is_table_arr[3] == 0) echo 'selected'; ?>>Yes</option>
			                  	<option value="1" <?php if(!empty($is_table_arr) && $is_table_arr[3] == 1) echo 'selected'; ?>>No</option>
			                  </select>
			                </div>
			            </div>
		                <input type="hidden" name="id" value="<?php echo $details['id']; ?>">
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Edit City Event">EDIT</button>
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
    	format: "yyyy-mm-dd",
        autoclose: true
    });
    $('body').on('change','#is_free',function(){
    	var type = $(this).val();
    	if(type == 0){ // free
    		$('.paid-section').addClass('hidden');
    		$('.event_price').attr('required',false);
    		$('.is_table').attr('required',false);
    	}else{ // paid
    		$('.paid-section').removeClass('hidden');
    		$('.event_price').attr('required',true);
    		$('.is_table').attr('required',true);
    	}
    });
  });
</script>
