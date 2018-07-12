<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'admin_dashboard'); ?>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo getAllCount(UNIVERSITIES); ?></h3>
            <p>Universities</p>
          </div>
          <div class="icon">
            <i class="fa fa-university"></i>
          </div>
          <a href="<?php echo base_url(); ?>admin/university/view-all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo getAllCount(PROGRAMS); ?></h3>
            <p>Programs</p>
          </div>
          <div class="icon">
            <i class="fa fa-graduation-cap"></i>
          </div>
          <a href="<?php echo base_url(); ?>admin/programs/view-all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo getAllCount(USER); ?></h3>
            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="<?php echo base_url(); ?>admin/users/view-all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo getAllCount(TESTIMONIALS); ?></h3>
            <p>Testimonials</p>
          </div>
          <div class="icon">
            <i class="fa fa-quote-left" aria-hidden="true"></i>
          </div>
          <a href="<?php echo base_url(); ?>admin/testimonials/view-all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->

    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->