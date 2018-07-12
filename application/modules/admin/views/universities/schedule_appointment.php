<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_all_university_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Appointment'); ?></h3>
	          <!-- <a href="<?php cms_url('admin/university/add-new'); ?>" class="addNewAdmin" title="Add New University">Add New</a> -->
	          <div class="box-tools">
	            <div class="input-group customInputGroups" style="width: 150px;">
	              <form action="<?php cms_url('admin/university/view-all'); ?>" method="get">
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
	              <td>Appointment By</td>
	              <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Type</th>
                  <th>Skype Id</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Action</th>
	            </tr>
	            <?php
	            	if(!empty($appointments)) {
	            		$offset = $offset + 1;
	            		foreach($appointments as $val) {
	            		$user_name = $this->common_model->getSingleRecordById(USER,array('id'=>$val['user_id']));
	            		//print_r($user_name);
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td><?php echo $user_name['first_name'].' '.$user_name['last_name']; ?></td>
		              <td><?php echo $val['name']; ?></td>
                      <td><?php echo $val['email']; ?></td>
                      <td><?php echo $val['phone']; ?></td>
                      <td><?php if($val['type']==1){ echo 'Indian Education Fair/ School Fair'; }
                              if($val['type']==2){ echo 'Talk to Study Metro though Skype/ Phone'; }
                              if($val['type']==3){ echo 'Hired Shared Resource'; }
                              if($val['type']==4){ echo 'Local Marketing via Digital, Paper, Radio Ads'; }
                              if($val['type']==5){ echo 'Shared CRM'; }
                              if($val['type']==6){ echo 'Marketing Material Printing and Courier In india'; }
                              if($val['type']==7){ echo 'Meet with SM Agents'; }
                              if($val['type']==8){ echo 'Open Study Centre'; } ?></td>
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
		              	<a href="<?php cms_url('admin/university/activate_appointment/'.$val['id']); ?>" title="Activate appointment">
		              	Activate
		              	</a>
		              	<?php } else{ ?>
		              	<a href="<?php cms_url('admin/university/deactivate_appointment/'.$val['id']); ?>" title="Deactivate appointment">
		              	<!-- <i class="fa fa-pencil"></i> --> Deactivate
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