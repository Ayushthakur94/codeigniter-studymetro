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

                    <a href="<?php echo $d['file']; ?>" class="img_doc gallery">
                      <!-- <img src="<?php echo $d['file']; ?>"> -->
                      <embed src="<?php echo $d['file']; ?>" width="111px" height="80px" />
                    </a>
                    <div class="doc_meta">
                      <p><?php echo date('F d, Y', strtotime($d['added_date'])); ?> <span><?php echo $d['document']; ?></span></p>
                    </div>
                  </div>
                <?php } } else{ ?>
                  <div class="well text-center">Documents not uploaded by user</div>
                <?php } ?>
               </div>

	        </div>

	        <!-- /.box-body -->
	        <div class="box-footer"><?php //if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper-->
