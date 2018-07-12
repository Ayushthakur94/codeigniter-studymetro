<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_city_event_details_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title">View Event Registration Details</h3>
	          
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
	            		<td><strong>Institution</strong></td>
	            		<td><?php echo $details['institution']; ?></td>
	            	</tr>
	            	<tr>
	            		<td><strong>Name</strong></td>
	            		<td><?php echo $details['name']; ?></td>
	            	</tr>
	            	<tr>
	            		<td><strong>Phone</strong></td>
	            		<td><?php echo $details['phone']; ?></td>
	            	</tr><tr>
	            		<td><strong>Email</strong></td>
	            		<td><?php echo $details['email']; ?></td>
	            	</tr><tr>
	            		<td><strong>Request Only For Enquiry</strong></td>
	            		<td><?php echo ($details['is_only_enquiry'] == 0) ? 'Yes' : 'No'; ?></td>
	            	<tr>
	            		<td><strong>Apply Date</strong></td>
	            		<td><?php echo convertDateTime($details['purchase_date']); ?></td>
	            	</tr>
	            	<?php if($details['is_only_enquiry'] == 1) { ?>
	            		<tr>
		            		<td><strong>Total Paid Amount</strong></td>
		            		<td>$<?php echo $details['total_paid_amount']; ?></td>
		            	</tr>
		            	<tr>
		            		<td><strong>Payment Method</strong></td>
		            		<td><?php echo ($details['pay_type'] == 0) ? 'PayPal' :'Offline'; ?></td>
		            	</tr>
		            	<tr>
		            		<td><strong>Transaction ID</strong></td>
		            		<td><?php echo $details['pay_txn_id']; ?></td>
		            	</tr>
		            	<tr>
		            		<td><strong>Payment Status</strong></td>
		            		<td>
		            			<?php 
		            				switch ($details['pay_status']) {
		            					case '1':
		            						echo "Completed";
		            						break;
		            					case '2':
		            						echo "Failed";
		            						break;
		            					case '3':
		            						echo "Pending";
		            						break;
		            					default:
		            						echo "--";
		            						break;
		            				}
		            			?>
		            		</td>
		            		<tr>
			            		<td><strong>Payment Date Time</strong></td>
			            		<td><?php echo convertDateTime($details['payment_datetime']); ?></td>
			            	</tr>
		            	</tr>
	            	<?php } ?>
	          </table>
	          <?php if($details['is_only_enquiry'] == 1) { 
	          	$event_details = unserialize($details['event_details']);
	          ?>
	          	<br/><h4>Event Details</h4>
	          	<table class="table table-hover">
		            <tr>
		              <th>Name</th>
		              <th>Venue</th>
		              <th>City</th>
		              <th>Date</th>
		              <th>Price</th>
		            </tr>
		            <?php foreach($event_details as $val) { ?>
			            <tr>
			              <td><?php echo $val['event_name']; ?></td>
			              <td><?php echo $val['event_venue']; ?></td>
			              <td><?php echo $val['event_city']; ?></td>
			              <td><?php echo $val['event_date']; ?></td>
			              <td>$<?php echo $val['event_price']; ?></td>
			            </tr>
			        <?php } ?>
		        </table>
	          <?php } ?>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->