<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_all_webinar_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Webinar'); ?></h3>
	          <!-- <a href="<?php cms_url('admin/university/add-new'); ?>" class="addNewAdmin" title="Add New University">Add New</a> -->
	          <div class="box-tools">
	            <div class="input-group customInputGroups" style="width: 150px;">
	              <form action="<?php cms_url('admin/university/view_all_webinar'); ?>" method="get">
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
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tr>
	              <th>ID</th>
	              <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Skype Id</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Action</th>
	            </tr>
	            <?php
	            	if(!empty($webinars)) {
	            		$offset = $offset + 1;
	            		foreach($webinars as $val) {
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td><?php echo $val['name']; ?></td>
                      <td><?php echo $val['email']; ?></td>
                      <td><?php echo $val['phone']; ?></td>
                      <td><?php echo $val['skype_id']; ?></td>
                      <td><?php echo $val['date']; ?></td>
                      <td><?php echo $val['time']; ?></td>
                      <td><?php if($val['status']==1){ ?>
                      	<span class="label label-success">Approved</span>
                      	<?php } else { ?>
                      	<span class="label label-danger">Not Approved</span>
                      	<?php } ?>
                      </td>
		              <td>
		              	<?php if($val['status']==0){ ?>
		              	<a href="<?php cms_url('admin/university/activate_webinar/'.$val['id']); ?>" title="Activate webinar">
		              	<i class="fa fa-pencil"></i> Activate
		              	</a>
		              	<?php } else{ ?>
		              	<a href="<?php cms_url('admin/university/deactivate_webinar/'.$val['id']); ?>" title="Deactivate webinar">
		              	<i class="fa fa-pencil"></i> Deactivate
		              	</a>
		              	<?php } ?>
		              </td>
		            </tr>
	            <?php } /* End foreach */ ?>
	            <?php } else { ?>
	            	<tr>
	            		<td colspan="5" align="center"><?php echo sprintf(NO_RECORDS_FOUND, 'pages') ?></td>
	            	</tr>
	            <?php } ?>
	          </table>
	        </div><!-- /.box-body -->
	        <div class="box-footer"><?php if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->