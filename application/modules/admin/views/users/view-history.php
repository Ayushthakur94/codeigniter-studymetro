<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_history_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          
	          <h3><?php echo $user_name; ?></h3><br/>
            <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Documents'); ?></h2>
	          
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

	        <div class="box-body table-responsive no-padding">
	          <!-- view all documents -->

	          <div class="profile_sec">
                <?php if(!empty($documents)) { foreach($documents as $d) { ?>
                  <div class="box_doc">

                    <a download class="download_btn" href="<?php echo $d['file']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>

                    <a href="<?php echo $d['file']; ?>" class="img_doc gallery"><img src="<?php echo $d['file']; ?>"></a>
                    <div class="doc_meta">
                      <p><?php echo date('F d, Y', strtotime($d['added_date'])); ?> <span><?php echo $d['document']; ?></span></p>
                    </div>
                  </div>
                <?php } } else{ ?>
                  <div class="well text-center">Documents not uploaded by user</div>
                <?php } ?>
               </div>

	        </div>

	        <div class="box-header">
	          
	          <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Programs'); ?></h2>
	          
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <!-- view all documents -->

	        <div class="col-md-12 col-sm-12">
              <div class="right_dashboard">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.NO.</th>
                      <th>Program</th>
                      <th>Email</th>
                      <th>Phone No</th>
                      <th>Pay Status</th>
                      <th>Apply Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($applications as $a) { ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo getDetailsBy(PROGRAMS,'id',$a['program_id'],'program_name'); ?></td>
                      <td><?php echo $a['email']; ?></td>
                      <td><?php echo $a['phone_no']; ?></td>
                      <td><?php echo (!empty($a['pay_status'])) ? $a['pay_status'] : 'Pending'; ?></td>
                      <td><?php echo convertDateTime($a['apply_date']); ?></td>
                      <td>
                      	<select user_id="<?php echo $a['user_id']; ?>" app_id="<?php echo $a['id']; ?>" name="app_status" id="app_status" class="app_status form-control">
                      		<option value="0" <?php if($a['program_status']==0) { echo 'selected'; } ?>>Applied</option>
                      		<option value="1" <?php if($a['program_status']==1) { echo 'selected'; } ?>>In Process</option>
                      		<option value="2" <?php if($a['program_status']==2) { echo 'selected'; } ?>>I20 Release</option>
                      		<option value="3" <?php if($a['program_status']==3) { echo 'selected'; } ?>>Visa Appointment Date</option>
                      		<option value="4" <?php if($a['program_status']==4) { echo 'selected'; } ?>>Visa Approved</option>
                      		<option value="5" <?php if($a['program_status']==5) { echo 'selected'; } ?>>Visa Declined</option>
                      		<option value="6" <?php if($a['program_status']==6) { echo 'selected'; } ?>>Tution Fee Paid</option>
                      		<option value="7" <?php if($a['program_status']==7) { echo 'selected'; } ?>>Accepted</option>
                      	</select>
                      </td>
                    </tr>
                  <?php $i++; } ?>
                  </tbody>
                  </table>
              </div>
            </div>

	        </div>

          <div class="box-header">
            
            <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Comments'); ?></h2>
            
          </div><!-- /.box-header -->

          <div class="box-body table-responsive no-padding">
            <!-- view comments -->
              <div class="cmnt_box">
                  <?php if(!empty($comments)) { foreach($comments as $c) { ?>
                  <table cellspacing="2" cellpadding="4" border="1" class="cmnt_table">
                    <tbody>
                      <tr>
                      <?php $sess_data = $this->session->userdata('admin_session_data'); if($sess_data['user_id'] == $c['from_user_id']) { $color = '#3C8DBC'; } else {
                                    $color = '#434b4e';
                                    } ?>
                        <td align="right" style="width:50px; padding-right:8px; border-right:1px solid #dcdcdc; font-size:7pt; color:<?php echo $color; ?>;">
                            <?php echo $c['comment_date']; ?>
                            <br>
                            <?php $from = $this->common_model->getRecordBySingleJoin(USER,'id',COMMENTS,'from_user_id',$c['from_user_id']); 
                            if($from['user_type']==1){ echo 'Admin'; }
                            if($from['user_type']==2){ echo 'Student'; }
                            if($from['user_type']==5){ echo 'University'; } ?>
                        </td>
                        <td style="padding-left:8px; color:<?php echo $color; ?>;"><?php echo $c['message']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php } ?>
                </div><?php } else { ?>
            <div class="well text-center">Conversation not found</div>
            <?php } $id= $this->uri->segment(4);?>
            <form method="post" action="<?php echo base_url('admin/users/addComment/'.$id); ?>">
              <table cellspacing="0" cellpadding="0" border="0" style="">
                <tbody>
                  <tr>
                    <td style="">
                      <input type="text" class="admin_cmnt_text_box <?php if(form_error('comment_text')) { echo 'valid_error' ;} ?>" name="comment_text">
                      <input type="hidden" class="to_id" name="to_id" value="<?php echo $id; ?>">
                    </td>
                    <td>
                      <input type="submit" class="btn btn-primary" value="Add comment" name="submit">
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>

	        <!-- /.box-body -->
	        <div class="box-footer"><?php //if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper-->


<script type="text/javascript">
  $('body').on('change','.app_status',function(){
    var prgrm_status = $(this).val();
    var prgrm_id = $(this).attr('app_id');
    var user_id=$(this).attr('user_id');
    $.ajax({
            url:"<?php echo base_url('admin/users/changeAppStatus'); ?>",
            type:"POST",
            data:{prgrm_status:prgrm_status,prgrm_id:prgrm_id,user_id:user_id},
            success:function(result)
            { //alert(result);
              if(result==1)
              {
                $('.success').html('<div class="alert alert-success alert-dismissable" style="margin-top:12px;"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Status updated successfully.</div>');
              }
            }
    });
  });
</script>