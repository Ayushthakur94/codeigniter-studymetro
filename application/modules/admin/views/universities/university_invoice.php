<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'university_invoice_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          
	          <!-- <h3><?php echo $user_name; ?></h3><br/> -->
            <!-- <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Invoices'); ?></h2> -->
	          
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
	          <!-- upload invoice -->
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/university/doUploadInvoices" enctype="multipart/form-data">
            <div class="profile_content">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label"> Browse file:</label>
                    <div class="col-sm-9">
                    <input type="file" class="form-control"  onchange="readURL(this,'pdf','')" name="file">
                     <div class="error_form"><?php echo form_error('file'); ?></div>
                    </div>
                </div>
                 <span ><button class="commn_btn">UPLOAD</button></span>
                 <span><a href="javascript:void(0);" class="commn_btn" onclick="cancelAction()">CANCEL</a></span>
            </div>
            </form>

	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer"><?php //if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper-->
