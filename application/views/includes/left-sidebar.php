<?php $adminData = admin_session_data(); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php get_admin_avatar($adminData['user_id']); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo get_admin_name($adminData['user_id']); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div><!-- .user-panel -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <!-- Dashboard -->
      <li class="<?php add_active_class('admin', 'dashboard'); ?>">
        <a href="<?php cms_url('admin/dashboard'); ?>" title="Dashboard">
          <i class="fa fa-dashboard"></i> 
          <span>Dashboard</span>
        </a>
      </li>
      <!-- pages -->
      <li class="treeview <?php tree_active_class('pages', array('addNew', 'edit', 'viewAll')); ?>">
        <a href="javascript:void(0);" title="Pages">
          <i class="fa fa-file-text"></i> 
          <span>Pages</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('pages', 'addNew'); ?>">
            <a href="<?php cms_url('admin/pages/add-new'); ?>" title="Add New Page">
              <i class="fa fa-plus"></i> Add New Page
            </a>
          </li>
          <li class="<?php add_active_class('pages', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/pages/view-all'); ?>" title="View All Pages">
              <i class="fa fa-eye"></i> View All Pages
            </a>
          </li>
        </ul>
      </li>
      <!-- users -->
      <li class="treeview <?php tree_active_class('users', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Users">
          <i class="fa fa-users"></i> 
          <span>Users</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('users', 'addNew'); ?>">
            <a href="<?php cms_url('admin/users/add-new'); ?>" title="Add New User">
              <i class="fa fa-plus"></i> Add New User
            </a>
          </li>
          <li class="<?php add_active_class('users', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/users/view-all'); ?>" title="View All Users">
              <i class="fa fa-eye"></i> View All Users
            </a>
          </li>
        </ul>
      </li>
      <!-- University -->
      <li class="treeview <?php tree_active_class('university', array('addNew', 'edit','viewAll','import')); ?>">
        <a href="javascript:void(0);" title="University">
          <i class="fa fa-university"></i> 
          <span>Universities</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('university', 'addNew'); ?>">
            <a href="<?php cms_url('admin/university/add-new'); ?>" title="Add New University">
              <i class="fa fa-plus"></i> Add New University
            </a>
          </li>
          <li class="<?php add_active_class('university', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/university/view-all'); ?>" title="View All University">
              <i class="fa fa-eye"></i> View All University
            </a>
          </li>
          <li class="<?php add_active_class('university', 'import'); ?>">
            <a href="<?php cms_url('admin/university/import'); ?>" title="Import Universities">
              <i class="fa fa-upload"></i> Import Universities
            </a>
          </li>
          <!-- <li class="<?php add_active_class('university', 'invoice'); ?>">
            <a href="<?php cms_url('admin/university/invoice'); ?>" title="University Invoices">
              <i class="fa fa-upload"></i> University Invoices
            </a>
          </li> -->
        </ul>
      </li>

      <!-- Webinar -->
      <li class="treeview <?php tree_active_class('webinar', array('viewAll')); ?>">
        <a href="javascript:void(0);" title="Webinar">
          <i class="fa fa-university"></i> 
          <span>Schedule Webinar</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('webinar', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/university/view-all-webinar'); ?>" title="View All Webinars">
              <i class="fa fa-eye"></i> View All Webinars
            </a>
          </li>
        </ul>
      </li>

      <!-- Appointment -->
      <li class="treeview <?php tree_active_class('appointment', array('viewAll')); ?>">
        <a href="javascript:void(0);" title="appointment">
          <i class="fa fa-university"></i> 
          <span>Schedule Appointment</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('appointment', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/university/view-all-appointment'); ?>" title="View All Appointments">
              <i class="fa fa-eye"></i> View All Appointment
            </a>
          </li>
        </ul>
      </li>

      <!-- Programs -->
      <li class="treeview <?php tree_active_class('programs', array('addNew', 'edit','viewAll','import')); ?>">
        <a href="javascript:void(0);" title="Programs">
          <i class="fa fa-graduation-cap"></i> 
          <span>Programs</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('programs', 'addNew'); ?>">
            <a href="<?php cms_url('admin/programs/add-new'); ?>" title="Add New Program">
              <i class="fa fa-plus"></i> Add New Program
            </a>
          </li>
          <li class="<?php add_active_class('programs', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/programs/view-all'); ?>" title="View All Programs">
              <i class="fa fa-eye"></i> View All Programs
            </a>
          </li>
          <li class="<?php add_active_class('programs', 'search'); ?>">
            <a href="<?php cms_url('admin/programs/search-programs'); ?>" title="Search Programs">
              <i class="fa fa-search"></i> Search Programs
            </a>
          </li>
          <li class="<?php add_active_class('programs', 'import'); ?>">
            <a href="<?php cms_url('admin/programs/import'); ?>" title="Import Programs">
              <i class="fa fa-upload"></i> Import Programs
            </a>
          </li>
          <li class="<?php add_active_class('programs', 'addNewSummerProgram'); ?>">
            <a href="<?php cms_url('admin/programs/add-new-summer-program'); ?>" title="Add New Summer Program">
              <i class="fa fa-plus"></i> Add New Summer Program
            </a>
          </li>
          <li class="<?php add_active_class('programs', 'viewAllSummerPrograms'); ?>">
            <a href="<?php cms_url('admin/programs/view-all-summer-programs'); ?>" title="View All Summer Programs">
              <i class="fa fa-eye"></i> View All Summer Programs
            </a>
          </li>
          <li class="<?php add_active_class('programs', 'importSummerPrograms'); ?>">
            <a href="<?php cms_url('admin/programs/import-summer-programs'); ?>" title="Import Summer Programs">
              <i class="fa fa-upload"></i> Import Summer Programs
            </a>
          </li>
        </ul>
      </li>
      <!-- City Events -->
      <li class="treeview <?php tree_active_class('city_events', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="City Events">
          <i class="fa fa-calendar"></i> 
          <span>City Events</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('city_events', 'addNew'); ?>">
            <a href="<?php cms_url('admin/city-events/add-new'); ?>" title="Add New Event">
              <i class="fa fa-plus"></i> Add New Event
            </a>
          </li>
          <li class="<?php add_active_class('city_events', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/city-events/view-all'); ?>" title="View All Events">
              <i class="fa fa-eye"></i> View All Events
            </a>
          </li>
          <li class="<?php add_active_class('city_events', 'registrationHistory'); ?>">
            <a href="<?php cms_url('admin/city-events/events-registration-history'); ?>" title="Events Registration History">
              <i class="fa fa-history"></i> Events Registration History
            </a>
          </li>
        </ul>
      </li>
      <!-- Photo gallery -->
      <li class="treeview <?php tree_active_class('photos', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="University">
          <i class="fa fa-file-image-o"></i> 
          <span>Photo Gallery</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('photos', 'addNew'); ?>">
            <a href="<?php cms_url('admin/photos/add-new'); ?>" title="Add New Photo">
              <i class="fa fa-plus"></i> Add New Photo
            </a>
          </li>
          <li class="<?php add_active_class('photos', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/photos/view-all'); ?>" title="View All Photos">
              <i class="fa fa-eye"></i> View All Photos
            </a>
          </li>
        </ul>
      </li>

      <!-- Notification -->
      <!-- <li class="treeview <?php tree_active_class('notification', array('viewAll')); ?>">
        <a href="javascript:void(0);" title="University">
          <i class="fa fa-file-image-o"></i> 
          <span>Notification</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('notification', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/notification/view-all'); ?>" title="View All Notification">
              <i class="fa fa-eye"></i> View All Notification
            </a>
          </li>
        </ul>
      </li> -->

      <!-- Videos -->
      <li class="treeview <?php tree_active_class('videos', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Videos">
          <i class="fa fa-video-camera"></i> 
          <span>Videos</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('videos', 'addNew'); ?>">
            <a href="<?php cms_url('admin/videos/add-new'); ?>" title="Add New Video">
              <i class="fa fa-plus"></i> Add New Video
            </a>
          </li>
          <li class="<?php add_active_class('videos', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/videos/view-all'); ?>" title="View All Videos">
              <i class="fa fa-eye"></i> View All Video
            </a>
          </li>
        </ul>
      </li>
      <!-- Testimonials -->
      <li class="treeview <?php tree_active_class('testimonials', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Testimonials">
          <i class="fa fa-quote-left"></i> 
          <span>Testimonials</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('testimonials', 'addNew'); ?>">
            <a href="<?php cms_url('admin/testimonials/add-new'); ?>" title="Add New Testimonial">
              <i class="fa fa-plus"></i> Add New Testimonial
            </a>
          </li>
          <li class="<?php add_active_class('testimonials', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/testimonials/view-all'); ?>" title="View All Testimonials">
              <i class="fa fa-eye"></i> View All Testimonials
            </a>
          </li>
        </ul>
      </li>
      <!-- Offices -->
      <li class="treeview <?php tree_active_class('offices', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Offices">
          <i class="fa fa-building-o"></i> 
          <span>Offices</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('offices', 'addNew'); ?>">
            <a href="<?php cms_url('admin/offices/add-new'); ?>" title="Add New Office">
              <i class="fa fa-plus"></i> Add New Office
            </a>
          </li>
          <li class="<?php add_active_class('offices', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/offices/view-all'); ?>" title="View All Offices">
              <i class="fa fa-eye"></i> View All Offices
            </a>
          </li>
        </ul>
      </li>
      <!-- Blogs -->
      <li class="treeview <?php tree_active_class('blogs', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Blogs">
          <i class="fa fa-comment"></i> 
          <span>Blogs</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('blogs', 'addNew'); ?>">
            <a href="<?php cms_url('admin/blogs/add-new'); ?>" title="Add New Blog">
              <i class="fa fa-plus"></i> Add New Blog
            </a>
          </li>
          <li class="<?php add_active_class('blogs', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/blogs/view-all'); ?>" title="View All Blogs">
              <i class="fa fa-eye"></i> View All Blogs
            </a>
          </li>
        </ul>
      </li>
      <!-- Services -->
      <li class="treeview <?php tree_active_class('services', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Services">
          <i class="fa fa-shield"></i> 
          <span>Services</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('services', 'addNew'); ?>">
            <a href="<?php cms_url('admin/services/add-new'); ?>" title="Add New Service">
              <i class="fa fa-plus"></i> Add New Service
            </a>
          </li>
          <li class="<?php add_active_class('services', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/services/view-all'); ?>" title="View All Services">
              <i class="fa fa-eye"></i> View All Services
            </a>
          </li>
        </ul>
      </li>
      <!-- Events -->
      <li class="treeview <?php tree_active_class('events', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Events">
          <i class="fa fa-calendar"></i> 
          <span>Events</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('events', 'addNew'); ?>">
            <a href="<?php cms_url('admin/events/add-new'); ?>" title="Add New Event">
              <i class="fa fa-plus"></i> Add New Event
            </a>
          </li>
          <li class="<?php add_active_class('events', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/events/view-all'); ?>" title="View All Events">
              <i class="fa fa-eye"></i> View All Events
            </a>
          </li>
        </ul>
      </li>
       <!-- FAQS -->
      <li class="treeview <?php tree_active_class('faqs', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="FAQS">
          <i class="fa fa-question"></i> 
          <span>FAQS</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('faqs', 'addNew'); ?>">
            <a href="<?php cms_url('admin/faqs/add-new'); ?>" title="Add New FAQ">
              <i class="fa fa-plus"></i> Add New FAQ
            </a>
          </li>
          <li class="<?php add_active_class('faqs', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/faqs/view-all'); ?>" title="View All FAQS">
              <i class="fa fa-eye"></i> View All FAQS
            </a>
          </li>
        </ul>
      </li>
      <!-- Enquiries -->
      <li class="treeview <?php tree_active_class('enquiries', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Enquiries">
          <i class="fa fa-phone"></i> 
          <span>Enquiries</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('enquiries', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/enquiries/view-all'); ?>" title="View All Enquiries">
              <i class="fa fa-eye"></i> View All Enquiries
            </a>
          </li>
        </ul>
      </li>
      <!-- Feedbacks -->
      <li class="treeview <?php tree_active_class('feedbacks', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Feedbacks">
          <i class="fa fa-comments-o"></i> 
          <span>Feedbacks</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('feedbacks', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/feedbacks/view-all'); ?>" title="View All Feedbacks">
              <i class="fa fa-eye"></i> View All Feedbacks
            </a>
          </li>
        </ul>
      </li>
      <!-- Quotes -->
      <li class="treeview <?php tree_active_class('quotes', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Quotes">
          <i class="fa fa-quote-left"></i> 
          <span>Quotes</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('quotes', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/quotes/view-all'); ?>" title="View All Quotes">
              <i class="fa fa-eye"></i> View All Quotes
            </a>
          </li>
        </ul>
      </li>
      <!-- Referrals -->
      <li class="treeview <?php tree_active_class('referrals', array('addNew', 'edit','viewAll','setEarning')); ?>">
        <a href="javascript:void(0);" title="Referrals">
          <i class="fa fa-gift"></i> 
          <span>Referrals</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('referrals', 'setEarning'); ?>">
            <a href="<?php cms_url('admin/referrals/set-earning'); ?>" title="Set Earning Amount">
              <i class="fa fa-cog"></i> Set Earning Amount
            </a>
          </li>
        </ul>
      </li>

      <!-- Offline Payment -->
      <li class="treeview <?php tree_active_class('payments', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Offline Payment">
          <i class="fa fa-money"></i> 
          <span>Offline Payment</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('payments', 'addNew'); ?>">
            <a href="<?php cms_url('admin/payments/add-new'); ?>" title="Make New Payment">
              <i class="fa fa-plus"></i> Make New Payment
            </a>
          </li>
          <li class="<?php add_active_class('payments', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/payments/view-all'); ?>" title="View Payment History">
              <i class="fa fa-eye"></i> View Payment History
            </a>
          </li>
        </ul>
      </li>
      <!-- Coupons -->
      <li class="treeview <?php tree_active_class('coupons', array('addNew', 'edit','viewAll')); ?>">
        <a href="javascript:void(0);" title="Coupons">
          <i class="fa fa-bars"></i> 
          <span>Coupons</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('coupons', 'addNew'); ?>">
            <a href="<?php cms_url('admin/coupons/add-new'); ?>" title="Add New Coupon">
              <i class="fa fa-plus"></i> Add New Coupon
            </a>
          </li>
          <li class="<?php add_active_class('coupons', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/coupons/view-all'); ?>" title="View All Coupons">
              <i class="fa fa-eye"></i> View All Coupons
            </a>
          </li>
        </ul>
      </li>
      <!-- Menu -->
      <!-- <li class="treeview <?php tree_active_class('menu', array('addNew', 'edit', 'viewAll', 'manageLocation')); ?>">
        <a href="javascript:void(0);" title="Menu">
          <i class="fa fa-bars"></i> 
          <span>Menu</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('menu', 'addNew'); ?>">
            <a href="<?php cms_url('admin/menu/add-new'); ?>" title="Add New Menu">
              <i class="fa fa-plus"></i> Add New Menu
            </a>
          </li>
          <li class="<?php add_active_class('menu', 'viewAll'); ?>">
            <a href="<?php cms_url('admin/menu/view-all'); ?>" title="View All Menu">
              <i class="fa fa-eye"></i> View All Menu
            </a>
          </li>
          <li class="<?php add_active_class('menu', 'manageLocation'); ?>">
            <a href="<?php cms_url('admin/menu/manage-location'); ?>" title="Manage Menu Location">
              <i class="fa fa-location-arrow"></i> Manage Menu Location
            </a>
          </li>
        </ul>
      </li> -->
      <!-- Setting -->
      <li class="treeview <?php tree_active_class('settings', array('profile', 'general', 'seo', 'systemPreferences')); ?>">
        <a href="javascript:void(0);" title="Settings">
          <i class="fa fa-cog"></i> 
          <span>Settings</span> 
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php add_active_class('settings', 'general'); ?>">
            <a href="<?php cms_url('admin/settings/general'); ?>" title="General">
              <i class="fa fa-cogs"></i> General
            </a>
          </li>
          <li class="<?php add_active_class('settings', 'profile'); ?>">
            <a href="<?php cms_url('admin/settings/profile'); ?>" title="Profile">
              <i class="fa fa-user"></i> Profile
            </a>
          </li>
          <li class="<?php add_active_class('settings', 'seo'); ?>">
            <a href="<?php cms_url('admin/settings/seo'); ?>" title="SEO">
              <i class="fa fa-globe"></i> SEO
            </a>
          </li>
          <li class="<?php add_active_class('settings', 'systemPreferences'); ?>">
            <a href="<?php cms_url('admin/settings/system-preferences'); ?>" title="System Preferences">
              <i class="fa fa-desktop"></i> System Preferences
            </a>
          </li>
        </ul>
      </li>
      <!-- Download Database Backup -->
      <li class="<?php add_active_class('databse_backup'); ?>">
        <a href="<?php cms_url('admin/databse_backup'); ?>" title="Download Database Backup">
          <i class="fa fa-database"></i> 
          <span>Download Database Backup</span>
        </a>
      </li>
      <!-- Sign Out -->
      <li class="<?php add_active_class('logout'); ?>">
        <a href="<?php cms_url('admin/logout'); ?>" title="Sign Out">
          <i class="fa fa-power-off"></i> 
          <span>Sign Out</span>
        </a>
      </li>
    </ul><!-- .sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>