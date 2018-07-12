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
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Notifications'); ?></h3>
	          
	          <div class="box-tools">
	            <div class="hidden input-group customInputGroups" style="width: 150px;">
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
	              <th>Message</th>
	              <th>Sent Time</th>
	              <th>Action</th>
	            </tr>
	            <?php
	            	if(!empty($notification)) { //p($users);
	            		$offset = $offset + 1;
	            		foreach($notification as $val) {
	            			$name = getUserName($val['sender_id']);
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td>
		              	<?php if(!empty($val['noti_url'])) { ?>
                            <a href="<?php echo base_url().$val['noti_url']; ?>" style="color:#000000">
                        <?php } else { ?>
                            <a href="javascript:void(0);" style="color:#000000">
                        <?php } ?>
		             	 	<?php echo exactNotfiyMessage($val['id']); ?>
		             	</a>
		              </td>
		              <td><?php echo convertDateTime($val['sent_datetime']); ?></td>
		              <td>
		              	<a href="<?php cms_url('admin/notifications/delete_notification/'.$val['id']); ?>" title="Delete Notification" onclick="if(!confirm('Are you sure you want to delete this notification ?')) return false;">
		              	<i class="fa fa-trash"></i> Delete
		              	</a>
		              </td>
		            </tr>
	            <?php } /* End foreach */ ?>
	            <?php } else { ?>
	            	<tr>
	            		<td colspan="11" align="center"><?php echo 'Notifaction not found.' ?></td>
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


<script type="text/javascript">
	$('body').on('change','.action',function(){
		var action = $(this).val();
		var user_id = $(this).attr('user_id');
		if(action=='allDoc')
		{
			location.href = "<?php echo base_url(); ?>admin/documents/viewDocuments/"+user_id;
		}
		else if(action=='allPrg')
		{
			location.href = "<?php echo base_url(); ?>admin/programs/viewPrograms/"+user_id;
		}
		else if(action=='allCom')
		{
			location.href = "<?php echo base_url(); ?>admin/comments/viewComments/"+user_id;
		}
		else if(action=='invoice')
		{
			location.href = "<?php echo base_url(); ?>admin/invoices/viewInvoices/"+user_id;
		}
		else if(action=='university')
		{
			location.href = "<?php echo base_url(); ?>admin/university/viewUniversity/"+user_id;
		}
		else
		{
			alert('Please select atleast one');
		}
	});
</script>