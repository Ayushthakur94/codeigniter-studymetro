<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_all_events_registration_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Events Registration'); ?></h3>
	          <div class="box-tools">
	            <div class="input-group customInputGroups" style="width: 150px;">
	              <form action="<?php cms_url('admin/city-events/events-registration-history'); ?>" method="get">
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
	              <th>Institution</th>
	              <th>Name</th>
	              <th>Email</th>
	              <th>Phone</th>
	              <th>Pay By</th>
	              <th>Pay Status</th>
	              <th>View</th>
	            </tr>
	            <?php
	            	if(!empty($registrations)) {
	            		$offset = $offset + 1;
	            		foreach($registrations as $val) {
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td><?php echo $val['institution']; ?></td>
		              <td><?php echo $val['name']; ?></td>
		              <td><?php echo $val['email']; ?></td>
		              <td><?php echo $val['phone']; ?></td>
		              <td>
		              	<?php
		              		if($val['is_only_enquiry'] == 0){
		              			echo "Request for enquiry";
		              		}else{
		              			if($val['pay_type'] == 0){
		              				echo "PayPal";
		              			}else{
		              				echo "Offline";
		              			}
		              		}
		              	?>
		              </td>
		              <td>
		              	<?php
		              		if($val['pay_status'] == 0 || $val['pay_status'] == NULL){
		              			echo "--";
		              		}
		              		else if($val['pay_status'] == 1){
		              			echo "Completed";
		              		}
		              		else if($val['pay_status'] == 2 || $val['pay_status'] == 3){ ?>
		              		<a href="<?php cms_url('admin/city_events/mark_payment_completed/'.$val['id']); ?>" title="Click here to mark payment as completed" onclick="if(!confirm('Are you sure you want to mark as completed this payment ?')) return false;">
		              		 	Mark Completed
		              		</a>
		              	<?php } ?>
		              </td>
		              <td>
		              	<a href="<?php cms_url('admin/city-events/view-event-registration-details/'.$val['id']); ?>" title="View Registration Details">
		              		 View
		              	</a>
		              </td>
		            </tr>
	            <?php } /* End foreach */ ?>
	            <?php } else { ?>
	            	<tr>
	            		<td colspan="5" align="center"><?php echo sprintf(NO_RECORDS_FOUND, 'event registrations') ?></td>
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