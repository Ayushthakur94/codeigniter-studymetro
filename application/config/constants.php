<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/* Error and success messages */
define('ADMIN_LOGIN_HEADING', 'Sign in to access admin panel');
define('ADMIN_CHANGE_PASSWORD_HEADING', 'Enter new password.');
define('ADMIN_FORGOT_PASSWORD_HEADING', 'Enter your email to retrieve new password.');
define('LOGIN_ERROR', 'Invalid user, please check your login details.');
define('LOGGED_OUT', "You've been successfully logged out.");
define('FORGOT_PASSWORD_SUBJECT', 'Forgot Password');
define('FORGOT_PASSWORD_MESSAGE', 'Dear %s %s,<br/><br/>Please click on the following link to create a new password, with this password you will be able to login again. <br/><br/>%s<br/><br/>If you need any further support, please do not hesitate to contact us at any time.<br/><br/><br/>Regards,<br/>Site Manager');
define('FORGOT_PASSWORD_SUCCESS', "Please check your mail, we've sent an email to you.");
define('FORGOT_PASSWORD_ERROR', 'This email is not exists in our database.');
define('INVALID_RESET_KEY', 'Invalid reset key, please check it again.');
define('CHANGE_PASSWORD_SUCCESS', 'Your password has been changed, please login with new password.');
define('NO_MESSAGE_TEXT', "You have no new message.");
define('NO_NOTIFICATION_TEXT', "You have no new notifications");
define('NO_TASKS_TEXT', "You have no new tasks.");
define('MESSAGE_TEXT', "You have %s message.");
define('NOTIFICATION_TEXT', "You have %s notifications.");
define('TASKS_TEXT', "You have %s tasks.");
define('SEE_ALL_MESSAGES', 'See All Messages');
define('SEE_ALL_NOTIFICATIONS', 'See All Notifications');
define('SEE_ALL_TASKS', 'See All Tasks');
define('EDIT_PROFILE_TEXT', 'Edit Profile');
define('ADMIN_PROFILE_UPDATE_SUCCESS', 'Your profile has been updated successfully.');
define('EMAIL_EXISTS', 'This email is already exists in our system.');
define('GENERAL_SETTING_TEXT', 'General Settings');
define('EMAIL_SETTING_TEXT', 'Email Settings');
define('SOCIAL_MEDIA_SETTINGS_TEXT', 'Social Links');
define('LOGO_FAVICON_SETTING_TEXT', 'Logo & Favicon');
define('FOOTER_CONTENT_SETTINGS_TEXT', 'Footer Content');
define('SETTING_SUCCESS', 'Settings has been updated successfully.');
define('LOGO_ERROR', 'Please select valid church logo image.');
define('FAVICON_ERROR', 'Please select valid church favicon.');
define('IMG_ERROR', 'Please select a valid image file.');
define('IMG_SIZE_ERROR_FOR_2', 'Please select image of less than 2MB.');
define('GENERAL_ERROR', 'Some error occured, please try again.');
define('SLIDER_IMAGE_REQ', 'The Slider image field is required.');
define('SLIDER_IMG_ERROR', 'Please select valid slider image.');
define('ALL_DATA', 'All %s');
define('NO_RECORDS_FOUND', 'No %s found.');
define('INVALID_OTP', 'Invalid otp, please try again.');
define('INVALID_ITEM', 'Invalid item, please try again.');
define('ITEM_ADD_SUCCESS', '%s added successfully.');
define('ITEM_ADD_ERROR', '%s not addess successfully, please try again.');
define('ITEM_UPDATE_SUCCESS', '%s updated successfully.');
define('ITEM_DELETE_SUCCESS', '%s deleted successfully.');
define('ITEM_NOT_EXISTS', '%s is not exists in our system.');
define('LOGIN_TO_CONTINUE', 'Password has been changed successfully, please login again with new password to continue.');
define('GROUP_ICON_ERROR', 'Please select valid group icon');
define('GROUP_HEADER_PICTURE_ERROR', 'Please select valid group header picture.');
define('COLLOR_ATTRIBUTES', 'Select Color Attributes');
define('MENU_ORDER_ALREADY_EXISTS', 'This menu order already in use.');
define('LOGIN_AND_SIGNUP_PAGES', 'Login & Signup');
define('ACCOUNT_CREATED_MESSAGE', 'Dear %s, <br/><br/>Your account has been created successfully, please go through the following details.<br/><br/><strong>Login Details:</strong><br/>Email: %s<br/>Password: %s<br/> Url: %s<br/><br/><br/>Regards,<br/>Site Manager');
define('ACCOUNT_CREATED', 'Account Created');
define('ADMIN_PASSWORD_CHANGE', 'Dear %s %s,<br/><br/>Your password has been changed by site admin, please login through new password.<br/><br/>New Password: %s<br/><br/><br/>Regards,<br/>Site Manager');

/* Rest API Constant */
define('USER_REGISTERED_SUCCESS', 'User registered successfully.');
define('USER_LOGIN_SUCCESS', 'User loggedin successfully.');
define('EMAIL_VERIFY_TEXT', 'Please verify your email to complete signup process.');
define('PHONE_VERIFY_TEXT', 'Please verify your phone to complete signup process.');
define('INCORRECT_OTP', 'Incorrect otp.');
define('VERIFY_EMAIL_SUCCESS', 'Your email has been successfully verified.');
define('VERIFY_OTP_SUCCESS', 'Your phone number has been successfully verified.');
define('ALREADY_VERIFIED', 'This %s has been already verified.');
define('EMAIL_VERIFICATION_MESSAGE', 'Dear %s %s,<br/><br/>Please click on the following link to verify your email.<br/><br/>%s<br/><br/>If you need any further support, please do not hesitate to contact us at any time.<br/><br/><br/>Regards,<br/>Site Manager');
define('EMAIL_VERIFICATION_HEADER', 'Verify Email');
define('INVALID_VERIFICATION_CODE', 'Invalid url, please try again.');
define('EMAIL_NOT_VERIFIED', 'Your email is not verified yet, please check your inbox.');
define('PHONE_NOT_VERIFIED', 'Your phone number is not verified yet, please enter otp.');

/* Basic site settings attributes */
define('CMS_ABR', 'sm');
define('CMS_NAME', 'Study Metro');
define('ADMIN_PANEL_HEADING', 'Admin Panel');
define('ADMIN_USER_ID', 1);
define('SUPER_ADMIN_USER_TYPE', 1);
define('NORMAL_USER_TYPE', 2);
define('ADMIN_FIRST_NAME', 'Site');
define('ADMIN_LAST_NAME', 'Admin');
define('ADMIN_AVATAR_IMAGE', 'dist/img/malecostume-512.png');
define('RESULT_PER_PAGE', 25);
define('API_TOKEN_LENGTH', 80);

/* Define uploads directory */
define('SITE_UPLOAD_PATH', 'uploads/site/');
define('USER_UPLOAD_PATH', 'uploads/users/');

/* Admin Views Directory */
define('LOGIN_INCLUDES', 'login_includes/');
define('FRONT_INCLUDES', 'front_includes/');
define('INCLUDES', 'includes/');
define('DEFAULT_PROGRAM_FEE', '50');

/* Database Tables */
define('ABROAD_COURSES', 'abroad_courses');
define('CITY_EVENTS', 'city_events');
define('EVENT_REGISTRATION', 'event_registration');
define('MENU', 'menus');
define('COUPONS', 'coupons');
define('BLOGS', 'blogs');
define('OFFICES', 'offices');
define('OFFLINE_PAYMENT', 'offline_payment');
define('APPLIED_PROGRAMS', 'applied_programs');
define('FAVORITE_PROGRAMS', 'favorite_programs');
define('ASSIGNED_UNIVERSITY', 'assigned_university');
define('PORTFOLIO', 'portfolio');
define('COMMENTS', 'comments');
define('INVOICES', 'invoices');
define('QUESTIONS', 'assignment_questions');
define('WEBINARS', 'schedule_webinar');
define('APPOINTMENT', 'schedule_appointment');
define('POST_LANDING_FORM', 'post_landing_form');
define('ANSWERS', 'assignment_answers');
define('STATIC_PAGE', 'static_pages');
define('SYSTEM_PREFERENCE', 'system_preferences');
define('USER', 'users');
define('USER_META', 'users_meta');
define('UNIVERSITIES', 'universities');
define('PHOTOS', 'photos');
define('TESTIMONIALS', 'testimonials');
define('SERVICES', 'services');
define('EVENTS', 'events');
define('FAQS', 'faqs');
define('COUNTRY', 'country');
define('DOCUMENTS', 'documents');
define('ENQUIRIES', 'enquiries');
define('FEEDBACKS', 'feedbacks');
define('QUOTATIONS', 'quotations');
define('NOTES', 'notes');
define('PROGRAMS', 'programs');
define('SUMMER_PROGRAMS', 'summer_programs');
define('EMAILS', 'emails');
define('REFERRALS', 'referrals');
define('CERTIFICATIONS', 'certifications');
define('EDUCATION', 'education');
define('INTERESTS', 'interests');
define('VOLUNTEERS', 'volunteers');
define('INTERNATIONAL', 'international_partnership');
define('MY_VIDEOS', 'my_videos');
define('LOCATIONS', 'locations');

define('NOTIFICATION', 'notification_data');
define('STUDENT_NOTIFICATION', 'student_notification_history');
define('ADMIN_NOTIFICATION', 'admin_notification_history');
define('UNIVERSITY_NOTIFICATION', 'university_notification_history');
define('AGENT_NOTIFICATION', 'agent_notification_history');
define('FRAINCHSEE_NOTIFICATION', 'frainchsee_notification_history
');

define('ADMIN_ID',1);

/* Rest Api constants */
define('SUCCESS', '100');
define('ERROR', '200');
define('SERVER_ERROR', '300');
define('MISSING_PARAM', '400');
define('SUCCESS_MSG', 'SUCCESS');
define('ERROR_MSG', 'ERROR');
define('SERVER_MSG', 'SERVER_ERROR');

define('FROM_EMAIL', 'studymetro@studymetro.com');
define('SUPPORT_EMAIL', 'support@studymetro.com');
define('VISA_EMAIL', 'visa@studymetro.com');
define('SITE_NAME', 'Study Metro');
define('DEFAULT_IMG', 'default-148.png');
define('CRM_ACCESS_KEY', 'u$r5f9d994f80d8e0629cafc38bb0e0446b');
define('CRM_SECRET_KEY', 'abcc73f9e7a9c54d754dc87bb9e124cfe45c0bcf');
define('TINIFY_KEY', 'lCUcrXxZu_127H_fP_21hv89o9qinl4l');

/* URLS constant start */

define('EVENT_REGISTRATION_HISTORY', 'admin/city-events/events-registration-history');
define('VIEW_ALL_WEBINAR', 'admin/university/view-all-webinar');
define('VIEW_ALL_APPOINTMENTS', 'admin/university/view-all-appointment');
define('VIEW_ALL_QUOTES', 'admin/quotes/view-all');
define('VIEW_ALL_FEEDBACK', 'admin/feedbacks/view-all');

/* URLS constant end */

define('UPLOAD_PREFIX', 'static/uploads/');

define('SUB_DIR', 'static/');

define('HTTP_HOST', $_SERVER['HTTP_HOST']);

if(HTTP_HOST == 'localhost' || HTTP_HOST == 'studymetro.sid.mwdemoserver.com' || HTTP_HOST == 'studymetro.mobi96.com'){
	/* Paypal Details */
	define('PAYPAL_BUSINESS_ID', 'sourav-facilitator@mobiwebtech.com');
	define('PAYPAL_FORM_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');

	/* Citrus Details */
	define('CITRUS_FORM_URL', 'https://sandbox.citruspay.com/uycuxzlzv2');
	define('CITRUS_SECRET_KEY', 'cbce9048aab88acabb0fc1e0d3d0b1b88d275001');
	define('CITRUS_VANITY_URL', 'uycuxzlzv2');

	switch (HTTP_HOST) {
		case 'localhost':
			define('SUB_DOMAIN_BASE_URL', 'http://localhost/study_metro/static/');
			break;
		case 'studymetro.sid.mwdemoserver.com':
			define('SUB_DOMAIN_BASE_URL', 'http://studymetro.sid.mwdemoserver.com/');
			break;
		case 'studymetro.mobi96.com':
			define('SUB_DOMAIN_BASE_URL', 'http://studymetro.mobi96.com/');
			break;
		default:
			break;
	}
}else{
	/* Paypal Details */
	define('PAYPAL_BUSINESS_ID', 'abhishekbajaj01@gmail.com');
	define('PAYPAL_FORM_URL', 'https://www.paypal.com/cgi-bin/webscr');

	/* Citrus Details */
	define('CITRUS_FORM_URL', 'https://www.citruspay.com/studymetro');
	define('CITRUS_SECRET_KEY', '2f616053f8837dc11d2a6cb28944873a3cdaaa66');
	define('CITRUS_VANITY_URL', 'studymetro');

	define('SUB_DOMAIN_BASE_URL', 'http://www.static.studymetro.com/');
}
	
define('INVALID_LOGIN_SESSION_KEY', 'Invalid user login session key');
define('EMAIL_SEND_FAILED', 'Email sending failed');
define('NO_CHANGES', 'We didn`t found any changes');
