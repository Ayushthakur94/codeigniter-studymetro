<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_all_users_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Users'); ?></h3>
	          <a href="<?php cms_url('admin/users/add-new'); ?>" class="addNewAdmin" title="Add New User">Add New</a>
	          <div class="box-tools">
	            <div class="input-group customInputGroups" style="width: 150px;">
	              <form action="<?php cms_url('admin/users/view-all'); ?>" method="get">
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
	              <th>Username</th>
	              <th>Picture</th>
	              <th>Email</th>
	              <th>Verified</th>
	              <th>Online Status</th>
	              <th>User Status</th>
	              <th>User Type</th>
	              <th>Action</th>
	              <th>Date Created</th>
	              <th>Delete</th>
	            </tr>
	            <?php
	            	if(!empty($users)) { //p($users);
	            		$offset = $offset + 1;
	            		foreach($users as $val) {
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td><?php echo $val['username']; ?></td>
		              <td>
		              	<?php 
		              		$profilePic = get_user_meta($val['id'], 'profile_picture');
		              		if(!empty($profilePic)) {
		              	?>
		              		<?php echo display_profile_pic($profilePic, 52, 52, 'profile_pic'); ?>
		              	<?php } else { ?>
		              		<?php echo display_profile_pic(get_admin_assets().'dist/img/no-image.jpg', 52, 52, 'profile_pic'); ?>
		              	<?php } ?>
		              </td>
		              <td>
		              	<a href="<?php cms_url('admin/users/edit/'.$val['id']); ?>">
		              		<?php echo $val['email']; ?>
		              </td>
		              <td>
		              	<?php if($val['user_status'] == 1) { ?>
		              		<span class="label label-success">Yes</span>
		              	<?php } else { ?>
		              		<span class="label label-danger">No</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['online_status'] == 1) { ?>
		              		<span class="label label-success">Online</span>
		              	<?php } else { ?>
		              		<span class="label label-danger">Offline</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['is_blocked'] == 1) { ?>
		              		<span class="label label-danger">Blocked</span>
		              	<?php } else { ?>
		              		<span class="label label-success">Active</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['user_type'] == 1) { ?>
		              		<span class="label label-warning">Super Admin</span>
		              	<?php } elseif($val['user_type'] == 2) { ?>
		              		<span class="label label-success">Student</span>
		              	<?php } elseif($val['user_type'] == 3) { ?>
		              		<span class="label label-info">Agency</span>
		              	<?php } elseif($val['user_type'] == 4) { ?>
		              		<span class="label label-danger">Trainer</span>
		              	<?php } elseif($val['user_type'] == 5) { ?>
		              		<span class="label label-default">University</span>
		              	<?php } elseif($val['user_type'] == 6) { ?>
		              		<span class="label label-primary">Frainchsee</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<a href="<?php cms_url('admin/users/edit/'.$val['id']); ?>" title="Edit User">
		              		<i class="fa fa-pencil"></i> Edit
		              	</a>
		              </td>
		              <td><?php echo date('m-d-Y', strtotime($val['date_created'])); ?></td>
		              <td>
		              	<a href="<?php cms_url('admin/users/delete/'.$val['id']); ?>" title="Delete Page" onclick="if(!confirm('Are you sure you want to delete this user?')) return false;">
		              		<i class="fa fa-trash"></i> Delete
		              	</a>
		              </td>
		            </tr>
	            <?php } /* End foreach */ ?>
	            <?php } else { ?>
	            	<tr>
	            		<td colspan="11" align="center"><?php echo sprintf(NO_RECORDS_FOUND, 'users') ?></td>
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