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

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['how-it-works'] = 'Home/how_it_works';
$route['about-us'] = 'Home/about_us';
$route['trust-safety'] = 'Home/trust_safety';
$route['privacy-policy'] = 'Home/privacy_policy';
$route['terms-and-condition'] = 'Home/terms_and_condition';
$route['help-center'] = 'Home/help_center';
$route['captcha'] = 'captcha';
$route['sign-in'] = 'account';
$route['sign-up-as'] = 'Account/sign_up_as';
$route['sign-up'] = 'Account/sign_up';
$route['confirm-sign-up'] = 'Account/confirm_sign_up';
$route['forgot-password'] = 'Account/forgot_password';
$route['logout'] = 'Account/logout';

$route['dashboard'] = 'user';
$route['dashboard/(:any)'] = 'user/index/$1';
$route['client-dashboard'] = 'Client';
$route['client-dashboard/(:any)'] = 'Client/index/$1';
$route['freelancer-dashboard'] = 'Freelancer';
$route['freelancer-dashboard/(:any)'] = 'Freelancer/index/$1';
$route['freelancer-dashboard/(:num)'] = 'Freelancer/index/$1';
$route['nlancer-dashboard'] = 'Nlancer';
$route['nlancer-dashboard/(:any)'] = 'Nlancer/index/$1';
$route['user-bio'] = 'User/client_bio';
$route['portfolio'] = 'User/portfolio';
$route['gender'] = 'User/gender';
$route['payment'] = 'User/payment_details';
$route['public-profile'] = 'User/public_profile';
$route['public-profile/(:any)'] = 'User/public_profile/$l';
$route['reviews'] = 'review';
$route['givereview/(:any)'] = 'review/give_review/$1';


$route['settings'] = 'User/settings';
$route['messages'] = 'User/messages';
$route['messages/(:any)'] = 'User/messages/$1';

$route['post-task-step-1'] = 'task';
$route['post-task-Step-2'] = 'Task/past_task_page_2';
$route['post-task-Step-3'] = 'Task/past_task_page_3';

$route['edit-task-step-1/(:any)'] = 'Task/edit_task_page_1/$1';
$route['edit-task-step-2/(:any)'] = 'Task/edit_task_page_2/$1';
$route['edit-task-step-3/(:any)'] = 'Task/edit_task_page_3/$1';
$route['delete-attachment'] = 'Task/delete_attachment';
$route['browse-task'] = 'Task/browse_task';
$route['browse-task/(:num)'] = 'Task/browse_task/$1';

$route['upcoming-projects'] = 'User/upcoming_projects';
$route['upcoming-projects/(:num)'] = 'User/upcoming_projects/$1';
$route['hired'] = 'User/hired';
$route['hired/(:num)'] = 'User/hired/$1';
$route['search-freelancer'] = 'User/search_freelancer';
$route['search-freelancer/(:any)'] = 'User/search_freelancer/$1';
$route['make-an-offer'] = 'Task/make_an_offer';
$route['download_file/(:any)'] = 'Task/download_file/$1';
$route['task-details/(:any)'] = 'Task/task_details/$1';
$route['offer-details/(:any)'] = 'Task/offer_details/$1';
$route['view-all-offers/(:any)'] = 'Task/view_all_offers/$1';
$route['view-offer-details/(:any)'] = 'Task/view_offer_details/$1';
$route['sent-offer'] = 'Task/sent_offer';
$route['sent-offer/(:num)'] = 'Task/sent_offer/$1';

$route['key-list'] = 'Freelancer/key_list';
$route['key-list/(:num)'] = 'Freelancer/key_list/$1';
$route['key-list/(:any)/(:num)'] = 'Freelancer/key_list/$l/$1';

//$route['public-profile'] = 'Freelancer/public_profile';
//$route['public-profile/(:any)'] = 'Freelancer/public_profile/$l';
$route['earnings'] = 'Freelancer/earnings';
$route['analytics'] = 'Freelancer/analytics';
$route['problem-ticket'] = 'Freelancer/problem_ticket';
$route['problem-ticket'] = 'Freelancer/problem_ticket';
$route['ticket-history'] = 'Freelancer/ticket_history';
$route['user-compose-email/(:any)'] = 'Freelancer/user_compose_email/$1';
$route['ticket-history-details/(:any)'] = 'Freelancer/ticket_history_details/$1';
$route['ticket_send_email'] = 'Freelancer/ticket_send_email';
$route['direct-hire'] = 'Hire/direct_hire';
$route['direct-hire/step-2/(:any)'] = 'Hire/direct_hire_step2/$l';
$route['hire-freelancer'] = 'Hire/hire_freelancer';
$route['job-details/(:any)'] = 'Freelancer/freelancer_job_details/$l';
$route['hired-job-details/(:any)'] = 'Freelancer/hired_job_details/$l';
$route['freelancer-direct-action/(:any)/(:any)'] = 'Freelancer/freelancer_direct_action/$l/$l';
$route['freelancer-take-action/(:any)/(:any)'] = 'Freelancer/freelancer_take_action/$l/$l';

$route['download_attachment/(:any)'] = 'Task/download_attachment/$1';

$route['rehire-freelancer'] = 'Hire/rehire_freelancer';

$route['take-action/(:any)'] = 'Notification/take_action/$l';
$route['take-action/(:any)/(:any)'] = 'Notification/take_action/$l/$l';


$route['save-job'] = 'Freelancer/save_job';
$route['save-inappropriate'] = 'Freelancer/save_inappropriate';
$route['my-jobs'] = 'Freelancer/save_job_list';
$route['my-jobs/(:num)'] = 'Freelancer/save_job_list/$1';


$route['offer-jobs'] = 'Freelancer/offer_jobs';

$route['proposal'] = 'Freelancer/proposal';
$route['active-jobs'] = 'Freelancer/active_jobs';
$route['job-list/(:any)'] = 'Freelancer/job_list/$l';
$route['job-list/(:any)/(:num)'] = 'Freelancer/job_list/$l/$l';

$route['view-contract/(:any)'] = 'Hire/view_contract/$l';
$route['close-contract/(:any)'] = 'Hire/close_contract/$l';
$route['release-approve/(:any)'] = 'Hire/release_approve/$l';

$route['freelancer-close-contract/(:any)/(:any)'] = 'Freelancer/close_contract/$l/$2';

/************************************************/
//$route['admin/login'] = 'Admin/login';
//$route['admin/logout'] = 'Admin/logout';
$route['admin/dashboard'] = 'Admin/dashboard';
$route['admin/client-list'] = 'Admin/client_list';
$route['admin/user/add/(:any)'] = 'Admin/user_add/$l';
$route['admin/user/edit/(:any)'] = 'Admin/user_edit/$l';
$route['admin/user/delete/(:any)'] = 'Admin/user_delete/$l';

$route['admin/freelancer-list'] = 'Admin/freelancer_list';
$route['admin/naluacer-list'] = 'Admin/naluacer_list';
$route['admin/category-list'] = 'Admin/category_list';
$route['admin/category-add'] = 'Admin/category_add';
$route['admin/category-edit/(:any)'] = 'Admin/category_edit/$l';
$route['admin/task-list'] = 'Admin/task_list';
$route['admin/problem-ticket'] = 'Admin/problem_ticket_list';

$route['admin/problem-ticket-history'] = 'Admin/admin/problem_ticket_history';
$route['admin/faq-list'] = 'Admin/faq_list';
$route['admin/notification-list'] = 'Admin/notification_list';
$route['admin/notification-add'] = 'Admin/notification_add';
$route['admin/problem-ticket-answer'] = 'Admin/problem_ticket_answer';
$route['admin/faq-add'] = 'Admin/faq_add';
$route['admin/site-settings'] = 'Admin/site_settings';
$route['admin/user-query'] = 'Admin/user_query';
$route['user-analytics'] = 'User/analytics';
$route['admin/compose_email/(:any)'] = 'Admin/compose_email/$1';
$route['admin/send_email'] = 'Admin/send_email';
$route['see-all-projects'] = 'Freelancer/see_all_projects';



/*$route['microkey-list'] = 'Freelancer/microkey_list';
$route['microkey-details/(:any)'] = 'Freelancer/microkey_details/$l';
$route['post-microkey-step-1'] = 'Freelancer/past_microkey_page_1';
$route['post-microkey-Step-2'] = 'Freelancer/past_microkey_page_2';
$route['post-microkey-Step-3'] = 'Freelancer/past_microkey_page_3';*/


$route['microkey-list'] = 'Freelancer/microkey_list';
$route['hire-freelancer1'] = 'Freelancer/hire_freelancer1';
$route['microkey-details/(:any)'] = 'Freelancer/microkey_details/$l';
$route['post-microkey-step-1'] = 'Freelancer/past_microkey_page_1';
$route['post-microkey-Step-2'] = 'Freelancer/past_microkey_page_2';
$route['post-microkey-Step-3'] = 'Freelancer/past_microkey_page_3';



$route['edit-microkey-client/(:any)'] = 'Task/edit_microkey_client/$1';
$route['microkey-client-details/(:any)'] = 'Task/microkey_client_details/$1';
$route['post-microkey-client'] = 'Freelancer/post_microkey_client';
$route['microkey-list-client'] = 'Freelancer/microkey_list_client';
$route['microkey-list-clientpanel'] = 'Freelancer/microkey_list_clientpanel';
$route['microkey-client-details/(:any)'] = 'Freelancer/microkey_client_details/$1';
$route['micro-freelancer'] = 'Freelancer/micro_freelancer';
$route['micro-freelancer-details/(:any)'] = 'Freelancer/micro_freelancer_details/$l';

$route['browse-freelancer'] = 'Task/browse_freelancer';










