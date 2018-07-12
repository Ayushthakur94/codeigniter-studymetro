<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'search_programs_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Program'); ?></h3>
	          <div class="box-tools">
	            <div class="input-group customInputGroups hidden" style="width: 150px;">
	              <form action="<?php cms_url('admin/programs/view-all'); ?>" method="get">
		              <input type="text" name="s" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo $this->input->get('s'); ?>">
		              <div class="input-group-btn cusInputGrpbtn">
		                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
		              </div>
	              </form>
	            </div>
	            <?php if($pagination) { echo $pagination; } ?>
	          </div>
	          <!-- flash data -->
            <?php if($this->session->flashdata('item_success')) { ?>
                <div class="alert alert-success alert-dismissable" style="margin-top:12px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('item_success'); ?>
                </div>
            <?php } if($this->session->flashdata('invalid_item')) { ?>
            	<div class="alert alert-danger alert-dismissable" style="margin-top:12px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('invalid_item'); ?>
                </div>
            <?php } ?>
	        </div><!-- /.box-header -->
	        <hr/>
	        <form action="" method="get">
	        <div class="box-body">
	            <div class="col-md-12">
	            	<div class="col-md-4">
		                <div class="form-group photo_1">
		                  <label for="photos">Select Country</label>
		                  <select name="country" required class="form-control select_country" id="country" name="country">
		                  <option value="">Select Country</option>
					      <?php foreach(countries() as $c) { ?>
					      	<option value="<?php echo $c; ?>" <?php if(isset($_GET['country']) && $_GET['country'] == $c) echo "selected"; ?>><?php echo $c; ?></option>
					      <?php } ?>
					      </select>
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group photo_1">
		                  <label for="photos">Select University</label>
		                  <select name="university_id" required class="form-control select_university" id="university_id" name="university_id">
		                  	<option value="">Select University</option>
		                  	<?php if(!empty($universities)) { foreach($universities as $u) { ?>
		                  		<option value="<?php echo $u['id']; ?>" <?php if(isset($_GET['university_id']) && $_GET['university_id'] == $u['id']) echo "selected"; ?>><?php echo $u['name']; ?></option>
		                  	<?php } } ?>
					      </select>
		                </div>
		            </div>
		            <div class="col-md-2">
		                <button class="btn btn-primary" style="margin-top: 24px;" title="Seach Programs Universities Wise">Search</button>
		            </div>
	            </div>
	        </div>
	        </form>
	        <hr/>
	        <?php if(!empty($programs)) { ?>
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tr>
	              <th>ID</th>
	              <th>University</th>
	              <th>Program</th>
	              <th>Country</th>
	              <th>Duration</th>
	              <th>Tution Fee</th>
	              <th>Application Fee</th>
	              <th>Action</th>
	            </tr>
	            <?php
	            	if(!empty($programs)) {
	            		$offset = $offset + 1;
	            		foreach($programs as $val) {
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td><?php echo getUniversity($val['university_id']); ?></td>
		              <td><?php echo $val['program_name']; ?></td>
		              <td><?php echo $val['country']; ?></td>
		              <td><?php echo $val['duration']; ?></td>
		              <td><?php echo $val['tution_fee']; ?></td>
		              <td>$<?php echo (empty($val['application_fee'])) ? '0' : $val['application_fee']; ?></td>
		              <td>
		              	<a href="<?php cms_url('admin/programs/edit/'.$val['id']); ?>" title="Edit Program" >
		              		<i class="fa fa-edit"></i> Edit
		              	</a>
		              	<a href="<?php cms_url('admin/programs/delete/'.$val['id']); ?>" title="Delete Program" onclick="if(!confirm('Are you sure you want to delete this program?')) return false;">
		              		<i class="fa fa-trash"></i> Delete
		              	</a>
		              </td>
		            </tr>
	            <?php } /* End foreach */ ?>
	            <?php } else { ?>
	            	<tr>
	            		<td colspan="5" align="center"><?php echo sprintf(NO_RECORDS_FOUND, 'programs') ?></td>
	            	</tr>
	            <?php } ?>
	          </table>
	        </div><!-- /.box-body -->
	        <?php } ?>
	        <div class="box-footer"><?php if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
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

