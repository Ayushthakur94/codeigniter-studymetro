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
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'University'); ?></h3>
	          <a href="<?php cms_url('admin/university/add-new'); ?>" class="addNewAdmin" title="Add New University">Add New</a>
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
	              <th>Name</th>
	              <th>Established</th>
	              <th>Country</th>
	              <th>Location</th>
	              <th>Action</th>
	            </tr>
	            <?php
	            	if(!empty($university)) {
	            		$offset = $offset + 1;
	            		foreach($university as $val) {
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td><?php echo $val['name']; ?></td>
		              <td><?php echo $val['founded']; ?></td>
		              <td><?php echo $val['country']; ?></td>
		              <td><?php echo $val['location']; ?></td>
		              <td>
		              	<a href="<?php cms_url('admin/university/edit/'.$val['id']); ?>" title="Edit University">
		              	<i class="fa fa-pencil"></i> Edit
		              	</a>
		              	<span>&nbsp;</span>
		              	<a href="<?php cms_url('admin/university/delete/'.$val['id']); ?>" title="Delete University" onclick="if(!confirm('Are you sure you want to delete this university?')) return false;">
		              		<i class="fa fa-trash"></i> Delete
		              	</a>
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