<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'process';
$route['login'] = 'processes/login';
$route['index'] = 'process/index';
$route['register'] = 'process/register';
$route['login'] = 'process/login';
$route['postpage'] = 'process/postpage';
$route['showpage'] = 'process/showpage';
$route['adminpanal'] = 'process/adminpanal';
$route['postjob'] = 'process/postjob';
$route['onepost/(:any)'] = 'process/onePost/$1';
$route['editPost/(:any)'] = 'process/editPost/$1';
$route['editPostShow/(:any)'] = 'process/editPostShow/$1';
$route['addOneTitle/(:any)'] = 'process/addOneTitle/$1';
$route['deletePage'] = 'process/deletePage';
$route['delete/(:any)'] = 'process/deletePost/$1';
$route['deleteUser/(:any)'] = 'process/deleteUser/$1';
$route['logout'] = 'process/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
