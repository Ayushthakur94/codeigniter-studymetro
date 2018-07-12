<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_university_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="post" enctype="multipart/form-data" id="university_form">

	          <!-- Validation error and flash data -->
                <div class="alert alert-danger alert-dismissable errors-msgs hidden">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>

	          <div class="box-header with-border">
	            <h3 class="box-title">General Information</h3>
          	  </div>

	            <div class="box-body">
	            	

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="name">Name</label>
			                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter University Name" value="<?php echo $details['name']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="founded">Founded in</label>
			                  <input type="number" min="0" name="founded" class="form-control" id="founded" placeholder="Enter University Founded Year" value="<?php echo $details['founded']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="logo">Logo</label>
			                  <input type="file" name="logo" onchange="readURL(this,'png|jpg|tif|gif','')" class="form-control" id="logo" value="<?php echo $details['logo']; ?>" />
			                  <img src="<?php echo $details['logo']; ?>" class="viewAdminLogo img-responsive thumbnail">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="image">Backgroud Image</label>
			                  <input type="file" name="image" onchange="readURL(this,'png|jpg|tif|gif','')" class="form-control" id="image" value="<?php echo $details['image']; ?>" />
			                  <img src="<?php echo $details['image']; ?>" class="viewAdminLogo img-responsive thumbnail">
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="location">Location</label>
			                  <textarea name="location" rows="2" class="form-control" placeholder="Enter University Location" id="location"><?php echo $details['location']; ?></textarea>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="address">Address</label>
			                  <textarea name="address" rows="2" class="form-control" placeholder="Enter University Address" id="address"><?php echo $details['address']; ?></textarea>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="accreditation">Ranking & Accreditation:</label>
			                  <textarea name="accreditation" rows="2" class="form-control" placeholder="Enter University Ranking & Accreditation" id="accreditation"><?php echo $details['accreditation']; ?></textarea>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="requirement">Admission Requirement</label>
			                  <textarea name="requirement" rows="2" class="form-control" placeholder="Enter University Admission Requirement" id="requirement"><?php echo $details['requirement']; ?></textarea>
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
						      <label for="institution">Institution Type</label>
						      <select name="institution" class="form-control" id="institution">
						      	<option value="public" <?php if($details['institution'] == 'public') echo "selected"; ?>>Public</option>
						      	<option value="private" <?php if($details['institution'] == 'private') echo "selected"; ?>>Private</option>
						      </select>
						    </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="estimated_cost">Estimated Cost of living</label>
			                  <input type="number" min="0" name="estimated_cost" class="form-control" id="estimated_cost" placeholder="Enter Estimated Cost Of Living In USD Per Year" value="<?php echo $details['estimated_cost']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="programs">Programs</label>
			                  <input type="url" name="programs" class="form-control" id="programs" placeholder="Enter University Programs" value="<?php echo $details['programs']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="president">President Name</label>
			                  <input type="text" name="president" class="form-control" id="president" placeholder="Enter University President Name" value="<?php echo $details['president']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="students">Total Number of Students</label>
			                  <input type="number" min="0" name="total_students" class="form-control" id="total_students" placeholder="Enter Number Of Total Students" value="<?php echo $details['total_students']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="students">Number of International Students</label>
			                  <input type="number" min="0" name="international_students" class="form-control" id="international_students" placeholder="Enter Number Of Total International Students" value="<?php echo $details['international_students']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="institution">Designated Learning Institution Number</label>
			                  <input type="text" name="institution_number" class="form-control" id="institution_number" placeholder="Enter Designated Learning Institution Number" value="<?php echo $details['institution_number']; ?>" />
			                </div>
			            </div>
		            	<div class="col-md-6">
			                <div class="form-group">
						      <label for="accommodation">Type of Accommodation</label>
						      <select name="accommodation" class="form-control" id="accommodation">
						      	<option value="on" <?php if($details['accommodation'] == 'on') echo "selected"; ?>>On Campus</option>
						      	<option value="off" <?php if($details['accommodation'] == 'off') echo "selected"; ?>>Off Campus</option>
						      	<option value="both" <?php if($details['accommodation'] == 'both') echo "selected"; ?>>Both</option>
						      </select>
						    </div>
			            </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="tution_fee">Tution Fees</label>
			                  <input type="text" name="tution_fee" class="form-control" id="tution_fee" placeholder="Enter Tution Fees" value="<?php echo $details['tution_fee']; ?>"/>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="application_fee">Application Fees</label>
			                  <input type="text" name="application_fee" class="form-control" id="application_fee" placeholder="Enter Application Fees" value="<?php echo $details['application_fee']; ?>"/>
			                </div>
			            </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
						      <label for="admission_start_month">Admission Start On</label>
						      <select name="admission_start_month" class="form-control" id="admission_start_month">
						      	<option value="January" <?php if($details['admission_start_month'] == 'January') echo "selected"; ?>>January</option>
						      	<option value="Feburary" <?php if($details['admission_start_month'] == 'Feburary') echo "selected"; ?>>Feburary</option>
						      	<option value="March" <?php if($details['admission_start_month'] == 'March') echo "selected"; ?>>March</option>
						      	<option value="April" <?php if($details['admission_start_month'] == 'April') echo "selected"; ?>>April</option>
						      	<option value="May" <?php if($details['admission_start_month'] == 'May') echo "selected"; ?>>May</option>
						      	<option value="June" <?php if($details['admission_start_month'] == 'June') echo "selected"; ?>>June</option>
						      	<option value="July" <?php if($details['admission_start_month'] == 'July') echo "selected"; ?>>July</option>
						      	<option value="August" <?php if($details['admission_start_month'] == 'August') echo "selected"; ?>>August</option>
						      	<option value="September" <?php if($details['admission_start_month'] == 'September') echo "selected"; ?>>September</option>
						      	<option value="October" <?php if($details['admission_start_month'] == 'October') echo "selected"; ?>>October</option>
						      	<option value="November" <?php if($details['admission_start_month'] == 'November') echo "selected"; ?>>November</option>
						      	<option value="December" <?php if($details['admission_start_month'] == '01') echo "selected"; ?>>December</option>
						      </select>
						    </div>
			            </div>
		            	<div class="col-md-6">
			                <div class="form-group">
						      <label for="country">Select Country</label>
						      <select name="country" class="form-control" id="country">
						      <?php foreach(countries() as $c) { ?>
						      	<option value="<?php echo $c; ?>" <?php if($details['country'] == $c) echo "selected"; ?>><?php echo $c; ?></option>
						      <?php } ?>
						      </select>
						    </div>
			            </div>
		            </div>
		            
		            
	            </div><!-- .box-body -->	

	            <div class="box-header with-border">
		            <h3 class="box-title">Contact Information</h3>
	          	</div>

	          	<div class="box-body">

	          		<div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="phone">Phone No</label>
			                  <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter University Phone No" value="<?php echo $details['phone']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="email">Email-id</label>
			                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter University Email Id" value="<?php echo $details['email']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12 full-grid">
		                <div class="form-group">
		                  <label for="website">Website Url</label>
		                  <input type="url" name="website" class="form-control" id="website" placeholder="Enter University Website URL" value="<?php echo $details['website']; ?>" />
		                </div>
		            </div>

	          	</div>

	          	<div class="box-header with-border">
		            <h3 class="box-title">Social Links</h3>
	          	</div>

	          	<div class="box-body">

	          		<div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="facebook">Facebook</label>
			                  <input type="url" name="facebook_link" class="form-control" id="facebook" placeholder="Enter Facebook Link" value="<?php echo $details['facebook_link']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="twitter">Twitter</label>
			                  <input type="url" name="twitter_link" class="form-control" id="twitter" placeholder="Enter Twitter Link" value="<?php echo $details['twitter_link']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="googlePlus">Google+</label>
			                  <input type="url" name="google_plus_link" class="form-control" id="googlePlus" placeholder="Enter Google+ Link" value="<?php echo $details['google_plus_link']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="linkedin">Linkedin</label>
			                  <input type="url" name="linkedin_link" class="form-control" id="linkedin" placeholder="Enter Linkedin Link" value="<?php echo $details['linkedin_link']; ?>" />
			                </div>
			            </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group">
			                  <label for="instagram">Instagram</label>
			                  <input type="url" name="instagram_link" class="form-control" id="instagram" placeholder="Enter Instagram Link" value="<?php echo $details['instagram_link']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  <label for="youtube">Youtube</label>
			                  <input type="url" name="youtube_link" class="form-control" id="youtube" placeholder="Enter Youtube Link" value="<?php echo $details['youtube_link']; ?>" />
			                </div>
			            </div>
		            </div>

	          	</div>

	          	<div class="box-header with-border">
		            <h3 class="box-title">Gallery</h3>
	          	</div>

	          	<div class="box-body">

	          		<div class="col-md-12 full-grid">
		                <div class="form-group">
		                  <label for="video">Youtube Video Link</label>
		                  <input type="url" name="youtube_video" class="form-control" id="youtube" placeholder="Enter Youtube Video Link" value="<?php echo $details['youtube_video']; ?>" />
		                </div>
		            </div>

		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group photo_1">
			                  <label for="photos">Photos</label>
			                  <input type="file" onchange="readURL(this,'jpg|jpeg|png|gif','')" name="photos[]" class="form-control margin_bottom10" value="<?php echo $details['photos']; ?>" />
			                </div>
			            </div>
			            <div class="col-md-6 photo_2">
			            	<a href="javascript:void(0);" title="Add More Photos" class="btn btn-primary add-more-btn add-photos"><i class="fa fa-plus"></i></a>
			            </div>
		            </div>

		        </div>	

		        <div class="box-header with-border">
		        <div class="row">
		        <div class="col-sm-12">
		            <h3 class="box-title">Quotes</h3>
		            
	          	</div>
	          		</div>
	          	</div>

	          	<div class="box-body ">

	          		<div class="col-md-12">
	          			<div class="col-md-6">
			                <div class="form-group">
			                  <label for="title">Heading</label>
			                  <input type="text" name="quotes_heading" class="form-control margin_bottom10" id="quotes_heading" placeholder="Enter Quotes Heading" value="<?php echo $details['quotes_heading']; ?>"/>
			                </div>
			            </div>
		            </div>

	          		<div class="col-md-12">
	          			<div class="col-md-6">
			                <div class="form-group quotes_1">
			                  <label for="title">Title</label>
			                  <?php 
			                  	$titles = json_decode($details['quotes_title']); 
			                  	$contents = json_decode($details['quotes_content']); 
			                  ?>
			                  <input type="text" name="quotes_title[]" class="form-control margin_bottom10" id="quotes_title" placeholder="Enter Quotes Title" value="<?php if(!empty($titles)) echo $titles[0]; ?>" />
			                  <?php if(count($titles) > 1){ 
			                  	for ($i = 1; $i < count($titles); $i++) { ?>
			                  		<input type="text" name="quotes_title[]" class="form-control margin_bottom10" id="quotes_title" placeholder="Enter Quotes Title" value="<?php if(!empty($titles)) echo $titles[$i]; ?>" />
			                  <?php	} } ?>
			                </div>
		                </div>
		                <div class="col-md-6  box_body">
			                <div class="form-group quotes_2">
			                  <label for="content">Content</label>
			                  <input type="text" name="quotes_content[]" class="form-control margin_bottom10" id="quotes_content" placeholder="Enter Quotes Content" value="<?php if(!empty($contents)) echo $contents[0]; ?>" />
			                  <a href="javascript:void(0);" class="btn btn-primary pull-right btn_ad add-quotes" title="Add More Quotes"><i class="fa fa-plus"></i></a>
			                  <?php if(count($contents) > 1){ 
			                  	for ($j = 1; $j < count($contents); $j++) { ?>
			                  		<div class="more-quotes">
			                  			<input type="text" name="quotes_content[]" class="form-control margin_bottom10" id="quotes_content" placeholder="Enter Quotes Content" value="<?php if(!empty($contents)) echo $contents[$j]; ?>" />
			                  			<a href="javascript:void(0);" class="btn btn-danger pull-right btn_ad remove-quotes" title="Remove Quotes"><i class="fa fa-minus"></i></a>
			                  		</div>
			                  <?php	} } ?>
			                </div>
		                </div>
		            </div>

		        </div>

		        <div class="box-header with-border">
		            <h3 class="box-title">Content</h3>
	          	</div>

	          	<div class="box-body">
	          		<div class="col-md-12">
					    <div class="form-group">
					      <label for="content">Content</label>
					      <textarea name="content" class="form-control" id="content" placeholder="Enter university content"><?php echo $details['content']; ?></textarea>
					    </div>
					</div>
	          	</div>

	            <div class="box-footer">
	            <button type="button" class="btn btn-primary" title="Edit University" id="edit-university-btn">Edit</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<script type="text/javascript">
$(document).ready(function(){

/****** Add More & Remove Script Start ********/

$('body').on('click','.add-photos',function(){
	var photohtml_1 = '<input type="file" name="photos[]" onchange="readURL(this,&quot;jpg|jpeg|png|gif&quot;,&quot;&quot;)" class="form-control margin_bottom10" />';
	$('.photo_1').append(photohtml_1);
	var photohtml_2 = '<span class="add_more"><a href="javascript:void(0);" title="Remove Photos" class="btn btn-danger add-more-btn remove-photo"><i class="fa fa-minus"></i></a></span>';
	$('.photo_2').append(photohtml_2);
});
$('body').on('click','.add-quotes',function(){
	var quotehtml_1 = '<input type="text" name="quotes_title[]" class="form-control margin_bottom10" id="quotes_title" placeholder="Enter Quotes Title" />';
	$('.quotes_1').append(quotehtml_1);
	var quotehtml_2 = '<div class="more-quotes"><input type="text" name="quotes_content[]" class="form-control margin_bottom10" id="quotes_content" placeholder="Enter Quotes Content"/>';
	quotehtml_2 += '<a href="javascript:void(0);" class="btn btn-danger pull-right btn_ad remove-quotes" title="Remove Quotes"><i class="fa fa-minus"></i></a></div>';
	$('.quotes_2').append(quotehtml_2);
});
$('body').on('click','.remove-photo',function(){
	var index = $(this).parent().index();
	if(index > -1){
		$(this).parent().remove();
		$('.photo_1').find("input:eq("+index+")").remove();
	}
});
$('body').on('click','.remove-quotes',function(){
	var index = parseInt($(this).parent().index()) - 2;
	if(index > -1){
		$(this).parent().remove();
		$('.quotes_1').find("input:eq("+index+")").remove();
	}
});

/****** Add More & Remove Script End **********/

/****** Add University Script Start ***********/

$('body').on('click','#edit-university-btn',function(){
  var form_data = new FormData($('#university_form')[0]);
  var content = CKEDITOR.instances['content'].getData()
  form_data.append('content',content);
  var error = "";
    $.ajax({
        url  : "<?php echo base_url(); ?>admin/university/edituniversity/<?php echo $this->uri->segment(4); ?>",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          ajaxindicatorstart();
        },       
        success: function(resp){
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
             	if(errObj[keys[i]] != ''){
                 error += errObj[keys[i]];
             	}
             };
             $('.errors').html(error);
             $('.errors-msgs').removeClass('hidden');
             $('html, body').animate({ scrollTop: $('.navbar-static-top').height() }, 500);
           }
           if(resp.type == "error"){
            	alert(resp.msg);
           }
           if(resp.type == "success"){
            	window.location.href = "<?php echo base_url(); ?>admin/university/view-all";
           }
           ajaxindicatorstop();
        },
        error:function(error)
        {
            ajaxindicatorstop();
            alert('Internal server error !!');  
        }
    });
});

/****** Add University Script End *************/

});
</script>