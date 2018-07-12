<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_city_event_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/city_events/addCityEvent">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add City Event</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-6">
		            	<div class="form-group photo_1">
		                  <label for="photos">Name</label>
		                  <input type="text" name="name" placeholder="Event Name" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Venue</label>
		                  <input type="text" name="venue" placeholder="Event Venue" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Hotel URL</label>
		                  <input type="text" name="hotel_url" placeholder="Hotel URL" class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">City</label>
		                  <input type="text" name="city" placeholder="Event City" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group photo_1">
		                  <label for="photos">Date</label>
		                  <input type="text" name="date" id="datepicker" placeholder="Event Date" required class="form-control margin_bottom10"/>
		                </div>
		                <div class="form-group">
		                  <label for="status">Is Free</label>
		                  <select name="is_free" class="form-control" id="is_free">
		                  	<option value="0">Yes</option>
		                  	<option value="1">No</option>
		                  </select>
		                </div>
		                <div class="paid-section hidden">
			                <h4>Early Registration Rates (by January 31st, 2017)</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" name="price[]" placeholder="Price (In USD)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="1" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table">
			                  	<option value="0">Yes</option>
			                  	<option value="1">No</option>
			                  </select>
			                </div>

			                <h4>Regular Registration Rates (by February 24th, 2017)</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" name="price[]" placeholder="Price (In USD)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="1" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table">
			                  	<option value="0">Yes</option>
			                  	<option value="1">No</option>
			                  </select>
			                </div>

			                <h4>Late Registration Rates(After February 24th, 2017))</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" name="price[]" placeholder="Price (In USD)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="0" name="inr_price[]" placeholder="Price (In INR)" value="0" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table">
			                  	<option value="0">Yes</option>
			                  	<option value="1">No</option>
			                  </select>
			                </div>

			                <h4>Presentation</h4><br/>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In USD)</label>
			                  <input type="number" min="1" name="price[]" placeholder="Price (In USD)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group price-view">
			                  <label for="photos">Price (In INR)</label>
			                  <input type="number" min="1" name="inr_price[]" placeholder="Price (In INR)" class="form-control event_price margin_bottom10"/>
			                </div>
			                <div class="form-group">
			                  <label for="status">Is Table</label>
			                  <select name="is_table[]" class="form-control is_table" id="is_table">
			                  	<option value="0">Yes</option>
			                  	<option value="1">No</option>
			                  </select>
			                </div>
			            </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Add City Event">ADD</button>
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
