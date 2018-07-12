<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_video_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/videos/addVideos">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Add Videos</h3>
	          	</div>

	          	<div class="box-body">

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group photo_1">
			                  <label for="photos">Videos</label>
			                  <input type="url" name="videos[]" placeholder="Add youtube or vimeo link" required class="form-control margin_bottom10"/>
			                </div>
			            </div>
			            <div class="col-md-6 photo_2">
			            	<a href="javascript:void(0);" title="Add More Videos" class="btn btn-primary add-more-btn add-videos"><i class="fa fa-plus"></i></a>
			            </div>
		            </div>

		        </div>

	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary" title="Add Video">ADD</button>
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

/****** Add More & Remove Script Start ********/

$('body').on('click','.add-videos',function(){
	var photohtml_1 = '<input type="url" name="videos[]" placeholder="Add youtube or vimeo link" required class="form-control margin_bottom10"/>';
	$('.photo_1').append(photohtml_1);
	var photohtml_2 = '<span class="add_more"><a href="javascript:void(0);" title="Remove Video" class="btn btn-danger add-more-btn remove-video"><i class="fa fa-minus"></i></a></span>';
	$('.photo_2').append(photohtml_2);
});
$('body').on('click','.remove-video',function(){
	var index = $(this).parent().index();
	if(index > -1){
		$(this).parent().remove();
		$('.photo_1').find("input:eq("+index+")").remove();
	}
});

/****** Add More & Remove Script End **********/

});
</script>