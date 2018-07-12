<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo (!empty($meta_keywords)) ? $meta_keywords : ''; ?>">
    <meta name="description" content="<?php echo (!empty($meta_description)) ? $meta_description : ''; ?>">
    <title><?php echo (!empty($meta_title)) ? $meta_title : 'Study Metro Overseas Education Consultant'; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php admin_favicon(); ?>
      <link href="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/css/bundle.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
      <script src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/js/jquery.min.js"></script>
      
      <?php
      if(isset($slug) && !in_array($slug, array('city-events','indian-university'))){
        $google_remarking_code = get_option('google_remarking_code');
        $facebook_plugin       = get_option('facebook_plugin');
        $twitter_plugin        = get_option('twitter_plugin');
        $google_analytics      = get_option('google_analytics');
        $google_webmaster      = get_option('google_webmaster');
        $bing_webmaster        = get_option('bing_webmaster');
        $linkedin_plugin       = get_option('linkedin_plugin');
        $lead_squared          = get_option('lead_squared');
        $hubspot_plugin        = get_option('hubspot_plugin');
        $pop_up_function       = get_option('pop_up_function');
        $other_plugin          = get_option('other_plugin');

        if(!empty($google_remarking_code)){
            echo $google_remarking_code;
        }
        if(!empty($facebook_plugin)){
            echo $facebook_plugin;
        }
        if(!empty($twitter_plugin)){
            echo $twitter_plugin;
        }
        if(!empty($google_analytics)){
            echo $google_analytics;
        }
        if(!empty($google_webmaster)){
            echo $google_webmaster;
        }
        if(!empty($bing_webmaster)){
            echo $bing_webmaster;
        }
        if(!empty($linkedin_plugin)){
            echo $linkedin_plugin;
        }
        if(!empty($lead_squared)){
            echo $lead_squared;
        }
        if(!empty($hubspot_plugin)){
            echo $hubspot_plugin;
        }
        if(!empty($pop_up_function)){
            echo $pop_up_function;
        }
        if(!empty($other_plugin)){
            echo $other_plugin;
        }
      }
      ?>
  </head>
  <body class="hold-transition login-page <?php body_class((!empty($body_class)) ? $body_class : ''); ?>">
    <main class="animsition">
    <!--Header sec start-->
    <header class="header_sec" id="header">
      <div class="top_bar">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <ul class="contact_list">
                <li><a href="javascript:void(0);"><i class="fa fa-phone"></i> 91-8088-867-867</a></li>
                <li><a href="mailto:admission@studymetro.com"><i class="fa fa-envelope"></i> <span class="hide_num"> admission@studymetro.com </span></a></li>
              </ul>
            </div>
            <div class="col-md-8 col-sm-8">
              <div class="facebook_like">
                <a href="https://www.facebook.com/studymetro.abroad" target="_blank">Like Us on Facebook 
                  <span><i aria-hidden="true" class="fa fa-facebook"></i>
                  </span>
                  </a>
              </div>
              <div class="login_wrap">
                <div class="frt_toggle"><span></span> <span></span> <span></span></div>
                <ul class="head_right sidefrt_menu_list">
                <?php $user = $this->session->userdata("user_id"); 
                $first_name = $this->session->userdata("first_name"); 
                if(empty($user)) { ?>
                  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#register" data-keyboard="false" data-backdrop="static"><span class="are-you-member">Are you a member?</span> Register  / </a></li>
                  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static">Login</a></li>
                <?php } else { ?>
                  <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php if(isset($first_name)) echo $first_name; ?>, </a>
                    <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>user/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change_password" data-keyboard="false" data-backdrop="static"><i class="fa fa-key"></i> Change Password</a></li>
                    <li><a href="<?php echo base_url(); ?>user/profile"><i class="fa fa-user"></i> My Profile</a></li>
                  </ul>
                  </li>
                  <li><a href="<?php echo base_url(); ?>front/user/logout"> Logout</a></li>
                <?php } ?>
                  <li><a href="<?php echo base_url(); ?>blogs">Blog </a></li>
                  <li><a href="<?php echo base_url(); ?>faqs">FAQs  </a></li>
                  <li><a href="<?php echo base_url(); ?>contact-us"> Contact us</a></li>
                </ul>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="navigation_wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-3">
              <div class="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/logo.png" class="img-responsive"></a>
              </div>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navigation">
                  <ul class="nav navbar-nav">
                    <?php 
                    $slug = $this->uri->segment(1);
                    $i = 1; foreach(getmenus() as $m){ if($m['page_no'] != 10 && $m['page_no'] != 11 && $m['page_no'] != 12) { ?>
                      <li <?php if($slug == $m['slug']) echo "class='active'"; ?>><a href="<?php echo base_url(); ?><?php echo $m['slug']; ?>"><?php echo $m['title']; ?></a></li>
                    <?php $i++; } } ?>
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="head_bottom_bar">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <p>Study Metro - An ISO 9001 Certified Company</p>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="ftr_menu_list_main">
              <div class="frt_toggle1"><span></span> <span></span> <span></span></div>
              <ul class="ftr_menu_list toggle_menu">
                  <li><a href="http://page.studymetro.com/Recorded-Webinar">Webinar</a></li>
                  <li><a href="<?php echo base_url(); ?>pricing">Pricing</a></li>
                  <li><a href="<?php echo base_url(); ?>forum" target="_blank">Forum</a></li>
                  <li><a href="<?php echo base_url(); ?>internship">Internship</a></li>
                  <li><a href="<?php echo base_url(); ?>abroad-courses">Abroad Courses</a></li>
              </ul>
            </div>
            </div>
            <div class="col-md-2 col-sm-2">
              <div class="appy_now">
                <a href="<?php cms_url('apply-now'); ?>">Apply Now <i class="fa fa-check"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--Header sec end-->