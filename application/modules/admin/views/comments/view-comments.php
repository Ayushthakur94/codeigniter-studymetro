<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_comments_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          
	          <h3><?php echo $user_name; ?></h3><br/>
            <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Comments'); ?></h2>
	          
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
            <form method="post" action="<?php echo base_url('admin/comments/addComment/'.$id); ?>">
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
