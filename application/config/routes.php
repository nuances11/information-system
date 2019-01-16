<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['registrar/ajax/(.*)'] = 'registrar/ajax/$1';
$route['registrar/action/(.*)'] = 'registrar/do_action/$1';

$route['registrar/sf10/print'] = 'registrar/printForm';
$route['registrar/records/sy/(:num)/grade/(:num)/section/(:num)/subject/(:num)/student/(:num)'] = 'registrar/student_grades_print/$1/$2/$3/$4/$5';
$route['registrar/records/sy/(:num)/grade/(:num)/section/(:num)/subject/(:num)/print'] = 'registrar/subject_grades_print/$1/$2/$3/$4';
$route['registrar/records/sy/(:num)/grade/(:num)/section/(:num)/subject/(:num)'] = 'registrar/subject_grades/$1/$2/$3/$4';
$route['registrar/records/sy/(:num)/grade/(:num)/section/(:num)'] = 'registrar/records_students/$1/$2/$3';
$route['registrar/records/sy/(:num)'] = 'registrar/records_sy/$1';
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

$route['faculty/subjects'] = 'faculty/subjects';
$route['faculty/subjects/sy/(:num)'] = 'faculty/subject_section_list/$1';
$route['faculty/subject/sy/(:num)/section/(:num)/subject/(:num)'] = 'faculty/subject_student_list/$1/$2/$3';
$route['faculty/subject/sy/(:num)/section/(:num)/encode/(:num)/student/(:num)'] = 'faculty/encode_subject_grade/$1/$2/$3/$4';
$route['faculty/list/sy/(:num)'] = 'faculty/student_list_sy/$1';
$route['faculty/list/sy/(:num)/section/(:num)/students'] = 'faculty/student_list_section/$1/$2';
$route['faculty/list/sy/(:num)/section/(:num)/subjects'] = 'faculty/section_subjects/$1/$2';
$route['faculty/student/list'] = 'faculty/student_list';
$route['faculty/student/eform/sy/(:num)/section/(:num)'] = 'faculty/eform/$1/$2';
$route['faculty/student/eform/(:num)'] = 'faculty/edit_eform/$1/';
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
// $route['print/section-id/student-id/sf10-front'] = 'printrecord/sf10Front';
$route['print/sf10'] = 'registrar/printForm';
$route['print/section-id/student-id/sf10-back'] = 'printrecord/sf10Back';

$route['logout'] = 'login/logout';
$route['login/login_check'] = 'login/login_check';
$route['login'] = 'login';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
