<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_documents_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          
	          <h3><?php echo $user_name; ?></h3><br/>
            <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Assigned University'); ?></h2>
	          
	        </div><!-- /.box-header -->

          <div class="success">
          <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php } elseif($this->session->flashdata('error')) { ?>
          <div class="alert alert-danger">
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php } ?>
          </div>
          <?php $id= end($this->uri->segments); ?>

	        <div class="box-body  no-padding">
	          <div class="profile_sec">
              <form method="post" action="<?php echo base_url('admin/university/assignUniversity/'.$id) ?>">
                <div class="form-group">
                    <label for="inputEmail">University List</label><br/>
                    <div id="getAssignedUniversity">
                    <?php $univ = explode(',',$assign_univ['university_id']); ?>
                      <select multiple="" name="univ_name[]" id="univ_name" class="chosen-select form-control">
                        <!-- <option value="">Select University</option> -->
                        <?php 
                       foreach($universities as $u)
                        {  ?>
                        <option value="<?php echo $u['id']; ?>" <?php if(in_array($u['id'],$univ)){ echo 'selected'; } ?>><?php echo $u['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>
                <input type="submit" id="submit_univ" class="btn btn-primary" value="Submit">
            </form>
            </div>
	        </div>

	        <!-- /.box-body -->
	        <div class="box-footer"><?php //if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/chosen.min.css">
<script src="<?php echo base_url(); ?>assets/admin/js/chosen.jquery.js"></script>

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      
      $(selector).chosen(config[selector]);
    }

    $('#univ_name_chosen').attr('style','width: 100%;');
  </script>