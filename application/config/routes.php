<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['registrar/class'] = 'registrar/clrecord';
$route['registrar/sf10'] = 'registrar/sf10';
$route['registrar/section-id/classrecord'] = 'registrar/clrecordprint';
$route['registrar/section-id/student-list'] = 'registrar/studlist';
$route['registrar/section-id/student-id/card'] = 'registrar/studcard';

// FACULTY ROUTES
/*
 * User 
 */
$route['faculty/ajax/(.*)'] = 'faculty/ajax/$1';
$route['faculty/action/(.*)'] = 'faculty/do_action/$1';

$route['faculty/list/sy/(:num)'] = 'faculty/student_list_sy/$1';
$route['faculty/list/sy/(:num)/section/(:num)/students'] = 'faculty/student_list_section/$1/$2';
$route['faculty/list/sy/(:num)/section/(:num)/subjects'] = 'faculty/section_subjects/$1/$2';
$route['faculty/student/list'] = 'faculty/student_list';
$route['faculty/student/eform'] = 'faculty/eform';
$route['faculty/class'] = 'faculty/clreport';
$route['faculty/class-subjects'] = 'faculty/scsubjlist';
$route['faculty/section-name/subject'] = 'faculty/scsubj';
$route['faculty/student'] = 'faculty/student';

// ADMIN ROUTES
/*
 * User 
 */
$route['admin/ajax/(.*)'] = 'admin/ajax/$1';
$route['admin/action/(.*)'] = 'admin/do_action/$1';

$route['admin/school-year'] = 'admin/school_year';
$route['admin/section'] = 'admin/section';
$route['admin/assign'] = 'admin/assign';
$route['admin/forms'] = 'admin/forms';
$route['admin/subject'] = 'admin/subject';
$route['admin/user'] = 'admin/user';
$route['admin']['GET'] = 'admin';

$route['print/section-id/classrecord'] = 'printrecord/clrecordprint';
$route['print/section-id/student-id/card'] = 'printrecord/studcard';
$route['print/section-id/student-id/sf10-front'] = 'printrecord/sf10Front';
$route['print/section-id/student-id/sf10-back'] = 'printrecord/sf10Back';

$route['logout'] = 'login/logout';
$route['login/login_check'] = 'login/login_check';
$route['login'] = 'login';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
