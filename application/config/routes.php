<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front/Front';
$route['404_override'] = 'error/error_404';
$route['translate_uri_dashes'] = FALSE;

/* custom Routing */
$route['admin'] = 'admin/index';
$route['admin/forgot-password'] = 'admin/forgotPassword';
$route['admin/change-password'] = 'admin/changePassword';

$route['admin/users/add-new'] = 'admin/users/addNew';

$route['admin/users/view-all'] = 'admin/users/viewAll';
$route['admin/users/view-all/(:any)'] = 'admin/users/viewAll';
$route['admin/users/view-history'] = 'admin/users/viewHistory';
$route['admin/users/view-history/(:any)'] = 'admin/users/viewHistory/$1';
$route['admin/users/changeAppStatus'] = 'admin/users/change_app_status';
$route['admin/users/addComment/(:any)'] = 'admin/users/add_comment/$1';

$route['admin/pages/add-new'] = 'admin/pages/addNew';
$route['admin/pages/view-all'] = 'admin/pages/viewAll';
$route['admin/pages/view-all/(:any)'] = 'admin/pages/viewAll/$1';


$route['admin/menu/add-new'] = 'admin/menu/addNew';

$route['admin/menu/filtermenuitem/(:any)'] = 'admin/menu/filtermenuitem/$1';

$route['admin/menu/view-all'] = 'admin/menu/viewAll';
$route['admin/menu/view-all/(:any)'] = 'admin/menu/viewAll/$1';

$route['admin/menu/updateMenu/(:any)'] = 'admin/menu/updateMenu/$1';

$route['admin/menu/manage-location'] = 'admin/menu/manageLocation';

$route['admin/settings/system-preferences'] = 'admin/settings/systemPreferences';

$route['admin/university/add-new'] = 'admin/university/addNew';
$route['admin/university/import']  = 'admin/university/import';
$route['admin/university/view-all'] = 'admin/university/viewAll';
$route['admin/university/view-all-webinar'] = 'admin/university/view_all_webinar';
$route['admin/university/view-all-appointment'] = 'admin/university/view_all_appointment';
$route['admin/university/view-all/(:any)'] = 'admin/university/viewAll/$1';

$route['admin/photos/add-new'] = 'admin/photos/addNew';
$route['admin/photos/view-all'] = 'admin/photos/viewAll';
$route['admin/photos/view-all/(:any)'] = 'admin/photos/viewAll/$1';

$route['admin/videos/add-new'] = 'admin/videos/addNew';
$route['admin/videos/view-all'] = 'admin/videos/viewAll';
$route['admin/videos/view-all/(:any)'] = 'admin/videos/viewAll/$1';

$route['admin/testimonials/add-new'] = 'admin/testimonials/addNew';
$route['admin/testimonials/view-all'] = 'admin/testimonials/viewAll';
$route['admin/testimonials/view-all/(:any)'] = 'admin/testimonials/viewAll/$1';

$route['admin/city-events/add-new'] = 'admin/city_events/addNew';
$route['admin/city-events/view-all'] = 'admin/city_events/viewAll';
$route['admin/city-events/view-all/(:any)'] = 'admin/city_events/viewAll/$1';
$route['admin/city-events/events-registration-history'] = 'admin/city_events/registrationHistory';
$route['admin/city-events/events-registration-history/(:any)'] = 'admin/city_events/registrationHistory/$1';
$route['admin/city-events/view-event-registration-details/(:any)'] = 'admin/city_events/view_registration/$1';

$route['admin/payments/add-new'] = 'admin/payments/addNew';
$route['admin/payments/view-all'] = 'admin/payments/viewAll';
$route['admin/payments/view-all/(:any)'] = 'admin/payments/viewAll/$1';

$route['admin/coupons/add-new'] = 'admin/coupons/addNew';
$route['admin/coupons/view-all'] = 'admin/coupons/viewAll';
$route['admin/coupons/view-all/(:any)'] = 'admin/coupons/viewAll/$1';

$route['admin/blogs/add-new'] = 'admin/blogs/addNew';
$route['admin/blogs/view-all'] = 'admin/blogs/viewAll';
$route['admin/blogs/view-all/(:any)'] = 'admin/blogs/viewAll/$1';

$route['admin/offices/add-new'] = 'admin/offices/addNew';
$route['admin/offices/view-all'] = 'admin/offices/viewAll';
$route['admin/offices/view-all/(:any)'] = 'admin/offices/viewAll/$1';

$route['admin/services/add-new'] = 'admin/services/addNew';
$route['admin/services/view-all'] = 'admin/services/viewAll';
$route['admin/services/view-all/(:any)'] = 'admin/services/viewAll/$1';

$route['admin/events/add-new'] = 'admin/events/addNew';
$route['admin/events/view-all'] = 'admin/events/viewAll';
$route['admin/events/view-all/(:any)'] = 'admin/events/viewAll/$1';

$route['admin/faqs/add-new'] = 'admin/faqs/addNew';
$route['admin/faqs/view-all'] = 'admin/faqs/viewAll';
$route['admin/faqs/view-all/(:any)'] = 'admin/faqs/viewAll/$1';

$route['admin/enquiries/view-all'] = 'admin/enquiries/viewAll';
$route['admin/feedbacks/view-all'] = 'admin/feedbacks/viewAll';
$route['admin/quotes/view-all'] = 'admin/quotes/viewAll';

$route['admin/referrals/set-earning'] = 'admin/referrals/setEarning';

$route['admin/programs/import']   = 'admin/programs/import';
$route['admin/programs/add-new'] = 'admin/programs/addNew';
$route['admin/programs/search-programs'] = 'admin/programs/searchPrograms';
$route['admin/programs/add-new-summer-program'] = 'admin/programs/addNewSummerProgram';
$route['admin/programs/view-all'] = 'admin/programs/viewAll';
$route['admin/programs/view-all/(:any)'] = 'admin/programs/viewAll/$1';
$route['admin/programs/view-all-summer-programs'] = 'admin/programs/viewAllSummerPrograms';
$route['admin/programs/view-all-summer-programs/(:any)'] = 'admin/programs/viewAllSummerPrograms/$1';
$route['admin/programs/import-summer-programs'] = 'admin/programs/importSummerPrograms';
$route['admin/programs/edit-summer-program/(:any)'] = 'admin/programs/editSummerProgram/$1';

$route['admin/notifications/view-all'] = 'admin/notifications/viewAll';

/* Front custom Routing */

$route['home']         = 'front/Home';
$route['universities'] = 'front/Home/universities';
$route['user/profile'] = 'front/user/profile';
$route['user/online-scheduling-meeting'] = 'front/user/online_scheduling_meeting';
$route['user/feedback'] = 'front/user/feedback';
$route['user/dashboard'] = 'front/user/dashboard';
$route['user/upload_documents'] = 'front/user/upload_documents';
$route['user/notes'] = 'front/user/notes';
$route['user/emails'] = 'front/user/emails';
$route['user/my-videos'] = 'front/user/myvideos';
$route['user/sendEmail'] = 'front/user/sendEmailToAdmin';
$route['user/addComment'] = 'front/user/add_comment';
$route['student/getquote'] = 'front/student/getquote';
$route['student/portfolio'] = 'front/student/portfolio';
$route['student/Personal-Education'] = 'front/student/add_personal_education';
$route['user/view-portfolio'] = 'front/user/view_portfolio';
$route['user/my-events'] = 'front/user/my_events';
$route['user/my-comments'] = 'front/user/my_comments';
$route['user/my-notification'] = 'front/user/my_notification';
$route['user/favorite-programs'] = 'front/user/favorite_programs';
$route['user/addFavoritePrograms'] = 'front/user/add_favorite_programs';
$route['user/RemoveFavoritePrograms'] = 'front/user/Remove_favorite_programs';
$route['student/my-applications'] = 'front/student/my_applications';
$route['student/my-assignments'] = 'front/student/my_assignments';
$route['student/setInterviewDate'] = 'front/student/set_interview_date';
$route['university/profile_types'] = 'front/university/profile_types';
$route['university/post_grad'] = 'front/university/post_grad';
$route['university/mba'] = 'front/university/mba';
$route['university/short_term'] = 'front/university/short_term';
$route['university/online'] = 'front/university/online';
$route['university/international_partnerships'] = 'front/university/international_partnerships';
$route['university/locations'] = 'front/university/locations';
$route['university/university-dashboard'] = 'front/university/university_dashboard';
$route['university/updateUniversityData/(:any)'] = 'front/university/updateUniversityData/$1';
$route['university/my-programs'] = 'front/university/my_programs';
$route['university/my-invoices'] = 'front/university/my_invoices';
$route['university/webinar'] = 'front/university/webinar';
$route['university/add-webinar'] = 'front/university/add_webinar';
$route['university/add-new-program'] = 'front/university/add_new_program';
$route['university/delete-webinar/(:any)'] = 'front/university/delete_webinar/$1';
$route['university/delete-program/(:any)'] = 'front/university/delete_program/$1';
$route['university/edit-program/(:any)'] = 'front/university/edit_program/$1';
$route['university/edit-webinar/(:any)'] = 'front/university/edit_webinar/$1';
$route['university/appointment'] = 'front/university/appointment';
$route['university/add-appointment'] = 'front/university/add_appointment';
$route['university/delete-appointment/(:any)'] = 'front/university/delete_appointment/$1';
$route['university/edit-appointment/(:any)'] = 'front/university/edit_appointment/$1';
$route['university/application'] = 'front/university/application';
$route['university/postLandingForm'] = 'front/university/postLandingForm';
$route['university/add-landing-form'] = 'front/university/add_landing_form';
$route['university/delete-landing-form/(:any)'] = 'front/university/delete_landing_form/$1';
$route['university/edit-landing-form/(:any)'] = 'front/university/edit_landing_form/$1';

$route['(:any)'] = 'front/home/pages/$1';
$route['faqs/(:any)'] = 'front/home/faqs/$1';
$route['contact-us'] = 'front/home/contactus';
$route['university/details/(:any)/(:any)'] = 'front/university/details/$1/$1';
$route['(:any)/apply-to-program'] = 'front/user/applytoprogram/$1';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8