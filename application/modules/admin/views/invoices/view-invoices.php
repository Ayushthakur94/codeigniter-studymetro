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
            <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Invoices'); ?></h2>
	          
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
	          <div class="profile_sec">
              <table class="table table-hover">
              <thead>
                <tr>
                  <th>S.NO.</th>
                  <th>Invoice</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; if(!empty($details)){  foreach($details as $a) { ?>
                <tr>
                  <td><?php echo $i; ?></td>

                  <td><a download class="download_btn" href="<?php echo base_url().$a['file']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a></td>

                  <td><?php echo date('F j, Y', strtotime($a['added_date'])); ?></td>
                </tr>
              <?php $i++; } } else { ?>
              <tr>
                  <td colspan="11" align="center"><?php echo 'No Invoice Found'; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
            </div>
            <?php $id= end($this->uri->segments); ?>

            <form name="invoice_form" action="<?php echo base_url('admin/invoices/doUploadInvoices/'.$id); ?>" method="post" id="invoice_form" enctype="multipart/form-data"> 
             <input type="hidden" name="invoice_user_id" id="invoice_user_id" value="<?php echo 'user_id'; ?>" />
                  <div class="form-group">
                      <label for="remark">Invoice File</label><br/>
                      <input type="file" class="form-control <?php if(form_error('file')) { echo 'valid_error' ;} ?>"  onchange="readURL(this,'pdf','')" name="file">
                  </div>
                      <div class="form-group">
                    <label for="remark">Remark</label><br/>
                    <input type="text" name="remark" id="remark" class="form-control <?php if(form_error('remark')) { echo 'valid_error' ;} ?>" value="<?php if(isset($_POST['remark'])){ echo $_POST['remark']; } ?>" />
                </div>
              
              <input type="submit" id="submit_invoice" class="btn btn-primary" value="Submit">
              <!-- <a href="javascript:"  class="btn btn-primary">Login</a> -->
          </form> 


	        </div>

	        <!-- /.box-body -->
	        <div class="box-footer"><?php //if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper-->
