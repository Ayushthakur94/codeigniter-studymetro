<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_page_header'); ?>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" action="<?php cms_url('admin/pages/add-new'); ?>" method="post" enctype="multipart/form-data">
	            <div class="box-body">
	            	<!-- Validation error and flash data -->
		            <?php if(validation_errors() || $this->session->flashdata('general_error')) { ?>
		                <div class="alert alert-danger alert-dismissable">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  <?php echo validation_errors(); ?>
		                  <?php echo $this->session->flashdata('general_error'); ?>
		                </div>
		            <?php } ?>

	            	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="title">Title</label>
		                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter page title" value="<?php echo set_value('title'); ?>" />
		                </div>
		            </div><!-- .col-md-6 -->
		            <div class="col-md-12">
		                <div class="form-group">
		                  <label for="content">Content</label>
		                  <textarea name="content" class="form-control mceEditor" id="content" placeholder="Enter page content"><?php echo set_value('content'); ?></textarea>
		                </div>
		            </div><!-- .col-md-12 -->
		            <div class="col-md-6">
		            	<div class="form-group photo-div">
		                  <label for="page_no">Select Page Template</label>
		                  <select class="form-control" name="page_no">
		                  <?php foreach (getAllPages() as $key => $p) {	
		                  	if(!in_array($key, $added_pages)){ ?>
		                  	<option value="<?php echo $key; ?>" <?php echo set_select('page_no', $key); ?>><?php echo $p; ?></option>
		                  <?php } } ?>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="meta_title">Background Photo/Video</label>
		                    <div class="radio">
							  <label><input type="radio" name="media" value="0" <?php echo  set_radio('media', '0', TRUE); ?> checked>Photo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <label><input type="radio" name="media" value="1" <?php echo  set_radio('media', '1'); ?>>Video</label>
							</div>
		                </div>
		                <div class="form-group photo-div">
		                  <label for="media_file">Select Photo</label>
		                  <input type="file" name="media_file" onchange="readURL(this,'jpg|jpeg|png|gif','')" required class="form-control bg-photo"/>
		                </div>
		                 <div class="form-group hidden video-div">
		                  <label for="media_file">Select Video</label>
		                  <input type="file" onchange="readURL(this,'mp4','')" class="form-control bg-video"/>
		                </div>
		                <div class="form-group">
		                  <label for="meta_title">Meta Title</label>
		                  <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta title" value="<?php echo set_value('meta_title'); ?>" />
		                </div>
		           		<div class="form-group">
		                  <label for="meta_description">Meta Description</label>
		                  <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Enter meta description"><?php echo set_value('meta_description'); ?></textarea>
		                </div>
		                <div class="form-group">
		                  <label for="meta_keywords">Meta Keywords</label>
		                  <textarea name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Enter meta keywords"><?php echo set_value('meta_keywords'); ?></textarea>
		                </div>
		                <div class="form-group">
		                  <label for="status">Status</label>
		                  <select name="status" class="form-control" id="status">
		                  	<option value="1" <?php echo set_select('status', 1, TRUE); ?>>Enable</option>
		                  	<option value="0" <?php echo set_select('status', 0); ?>>Disable</option>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need Photos Gallery ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="photo_gallery" value="0" <?php echo  set_radio('photo_gallery', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="photo_gallery" value="1" <?php echo  set_radio('photo_gallery', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need Videos Gallery ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="video_gallery" value="0" <?php echo  set_radio('video_gallery', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="video_gallery" value="1" <?php echo  set_radio('video_gallery', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need Testimonials ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="is_testimonails" value="0" <?php echo  set_radio('is_testimonails', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="is_testimonails" value="1" <?php echo  set_radio('is_testimonails', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need How It Works ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="how_it_works" value="0" <?php echo  set_radio('how_it_works', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="how_it_works" value="1" <?php echo  set_radio('how_it_works', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need services ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="is_services" value="0" <?php echo  set_radio('is_services', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="is_services" value="1" <?php echo  set_radio('is_services', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need Scholarship Form ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="scholar_form" value="0" <?php echo  set_radio('scholar_form', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="scholar_form" value="1" <?php echo  set_radio('scholar_form', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Need Search Study Program ?</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="study_program" value="0" <?php echo  set_radio('study_program', '0', TRUE); ?> checked>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="study_program" value="1" <?php echo  set_radio('study_program', '1'); ?>>No</label>
							</div>
							</div>
		                </div>
		                <div class="form-group">
		                  <label for="media_file">Show On Menu</label>
		                    <div class="checkbox">
							  <div class="radio">
								  <label><input type="radio" name="show_on_menu" value="0" <?php echo  set_radio('show_on_menu', '0', TRUE); ?> checked>No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <label><input type="radio" name="show_on_menu" value="1" <?php echo  set_radio('show_on_menu', '1'); ?>>Yes</label>
							</div>
							</div>
		                </div>
	              	</div><!-- .col-md-6 -->
	            </div><!-- .box-body -->	

	            <div class="box-footer">
	              <input type="submit" name="submit" value="Add" class="btn btn-primary"/>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('change','input[name="media"]',function(){
			var type = $('input[name="media"]:checked').val();
			if(type == 1){ // video
				$('.photo-div').addClass('hidden');
				$('.video-div').removeClass('hidden');
				$(".bg-photo").removeAttr("name");
				$(".bg-photo").removeAttr("required");
				$(".bg-video").attr('name','media_file');
				$(".bg-video").attr('required','required');
			}else{
				$('.photo-div').removeClass('hidden');
				$('.video-div').addClass('hidden');
				$(".bg-video").removeAttr("name");
				$(".bg-video").removeAttr("required");
				$(".bg-photo").attr('name','media_file');
				$(".bg-photo").attr('required','required');
			}
		});
	});
</script>