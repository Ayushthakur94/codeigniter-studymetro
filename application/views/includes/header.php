<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php admin_meta_title((!empty($meta_title)) ? $meta_title : ''); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php admin_favicon(); ?>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>bootstrap/css/bootstrap.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>css/font-awesome.min.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>css/ionicons.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>dist/css/AdminLTE.min.css"/>
    <link rel="stylesheet" href="<?php admin_assets(); ?>css/custom.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>dist/css/skins/_all-skins.min.css"/>
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/iCheck/flat/blue.css"/>
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/morris/morris.css"/>
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/datepicker/datepicker3.css"/>
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/daterangepicker/daterangepicker-bs3.css"/>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/colorpicker/bootstrap-colorpicker.min.css"/>
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/timepicker/bootstrap-timepicker.min.css"/>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>plugins/select2/select2.min.css"/>

    <link href="<?php admin_assets(); ?>datatables/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- nestable Menu -->
    <link rel="stylesheet" href="<?php admin_assets(); ?>css/jquery-nestable.css"/>
    <link rel="stylesheet" href="<?php admin_assets(); ?>css/chosen.css"/>
    <link rel="stylesheet" href="<?php admin_assets(); ?>css/dropzone.css"/>
    <script src="<?php admin_assets(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php admin_assets(); ?>js/jquery-ui.min.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini <?php body_class((!empty($body_class)) ? $body_class : ''); ?>">
    <?php $adminData = admin_session_data(); ?>
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php cms_url('admin/dashboard'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><?php echo strtoupper(CMS_ABR); ?></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo get_option('site_name'); ?></b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><?php echo sprintf(MESSAGE_TEXT, 0); ?></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li class="text-center"><!-- start message -->
                        <a href="javascript:void(0);">
                          <p><?php echo NO_MESSAGE_TEXT; ?></p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer hidden"><a href="javascript:void(0);"><?php echo SEE_ALL_MESSAGES; ?></a></li>
                </ul>
              </li>

              <!-- Notifications: style can be found in dropdown.less -->
              <?php $data['session_data'] = admin_session_data();
                    $data['user_info'] = get_user($data['session_data']['user_id']);
                    $user_id = $data['user_info']['user_id'];
                    $notification = $this->common_model->getAllRecordsOrderById(ADMIN_NOTIFICATION,'id','DESC',array('is_read' => 1));
              ?>
             
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?php echo count($notification); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                    <?php if(!empty($notification))
                          { 
                            foreach($notification as $val)
                            { ?>
                              <li>
                              <?php if(!empty($val['noti_url'])) { ?>
                                <a href="<?php echo base_url().$val['noti_url']; ?>">
                              <?php } else { ?>
                                <a href="javascript:void(0);">
                              <?php } ?>
                                  <p><?php echo exactNotfiyMessage($val['id']); ?></p>
                                  <p><?php echo time_elapsed_string($val['sent_datetime']); ?></p>
                                </a>
                              </li>
                      <?php } } else{ ?>
                      <li class="text-center">
                        <a href="javascript:void(0);">
                          <p><?php echo NO_NOTIFICATION_TEXT; ?>
                          </p>
                        </a>
                      </li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo base_url(); ?>admin/notifications/view-all"><?php echo SEE_ALL_NOTIFICATIONS; ?>l</a></li>
                </ul>
              </li>

              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><?php echo sprintf(TASKS_TEXT, 0); ?></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <p><?php echo NO_TASKS_TEXT; ?></p>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="javascript:void(0);"><?php echo SEE_ALL_TASKS; ?></a>
                  </li>
                </ul>
              </li>

              <li>
                <a href="<?php echo get_option('public_website_url'); ?>" title="Visit Website" target="_blank">
                <i class="fa fa-external-link"></i>&nbsp;&nbsp;Visit Site
                </a>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php get_admin_avatar($adminData['user_id']); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo get_admin_name($adminData['user_id']); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php get_admin_avatar($adminData['user_id']); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo get_admin_name($adminData['user_id']); ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php cms_url('admin/settings/profile'); ?>" class="btn btn-default btn-flat" title="Profile">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php cms_url('admin/logout'); ?>" class="btn btn-default btn-flat" title="Sign Out">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul><!-- .navbar-nav -->
          </div><!-- .navbar-custom-menu -->
        </nav><!-- .navbar-static-top -->
      </header><!-- .main-header -->

      <script type="text/javascript">
        $(document).ready(function(){

          /* To update all notifications start */
          $('body').on('click','li.notifications-menu',function(){
            $.ajax({
                url  : "<?php echo base_url(); ?>admin/admin/update_notifications",
                type : "POST",
                data : {notifications:''},   
                dataType : "JSON",   
                success: function(resp){
                   console.log(resp);
                },
                error:function(error)
                {
                  console.log(error);
                }
            });
          });
          /* To update all notifications end */

        });
      </script>