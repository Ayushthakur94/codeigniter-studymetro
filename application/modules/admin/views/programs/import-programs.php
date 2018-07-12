<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'import_programs_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" action="<?php cms_url('admin/programs/importData'); ?>" enctype="multipart/form-data">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Import Programs</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group photo_1">
			                  <label for="photos">Select Country</label>
			                  <select name="country" required class="form-control select_country" id="country">
			                  <option value="">Select Country</option>
						      <?php foreach(countries() as $c) { ?>
						      	<option value="<?php echo $c; ?>"><?php echo $c; ?></option>
						      <?php } ?>
						      </select>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group photo_1">
			                  <label for="photos">Select University</label>
			                  <select name="university_id" required class="form-control select_university" id="university_id">
			                  	<option value="">Select University</option>
						      </select>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
			            <div class="col-md-6">
				            <div class="form-group">
			                  <label for="photos">Excel File (XLSX,XLS)</label>
			                  <input type="file" onchange="readURL(this,'xlsx|xls','')" name="file" required class="form-control margin_bottom10"/>
			                </div>
			            </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Import Programs">Import</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">

  $(document).ready(function(){

  /**************** Get University Start ***************/

  $('body').on('change','.select_country',function(){
    var country = $(this).val();
    var appendHTML = '<option value="">Select University</option>';
    if(country == ''){
      $('.select_university').html(appendHTML);
      return false;
    }else{
       $.ajax({
        url :"<?php echo base_url(); ?>admin/programs/getUniversities",
        type:"POST",
        data:{country:country},
        dataType:"JSON",
        beforeSend: function() {
          ajaxindicatorstart();
        }, 
        success: function(resp)
        {
          if(resp != ''){
            for (var i = 0; i < resp.length; i++) {
              appendHTML += '<option value="'+resp[i]['id']+'">'+resp[i]['name']+'</option>';
            }
          }
          $('.select_university').html(appendHTML);
          ajaxindicatorstop();
        },
        error:function(error)
        {
          ajaxindicatorstop();
        }
      });
    }
  }); 

  /**************** Get University End *****************/

});

</script>
