<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'process';
$route['index'] = 'process/index';
$route['register'] = 'process/register';
$route['login'] = 'process/login';
$route['postpage'] = 'process/postpage';
$route['showpage'] = 'process/showpage';
$route['adminpanel'] = 'process/adminpanel';
$route['postjob'] = 'process/postjob';
$route['onepost/(:any)'] = 'process/onePost/$1';
$route['editPost/(:any)'] = 'process/editPost/$1';
$route['adminEditPost/(:any)'] = 'process/adminEditPost/$1';
$route['adminEditPostPage/(:any)'] = 'process/adminEditPostPage/$1';
$route['editPostShow/(:any)'] = 'process/editPostShow/$1';
$route['addOneTitle/(:any)'] = 'process/addOneTitle/$1';
$route['deletePage'] = 'process/deletePage';
$route['delete/(:any)'] = 'process/deletePost/$1';
$route['deleteUser/(:any)'] = 'process/deleteUser/$1';
$route['logout'] = 'process/logout';
$route['logoutredo'] = 'logout/loggingout';
$route['admin-verify-post/(:any)'] = 'process/adminVerifyPost/$1';
$route['admin-delete-post/(:any)'] = 'process/adminDeletePost/$1';
$route['admin-verify-user/(:any)'] = 'process/adminVerifyUser/$1';
$route['admin-delete-user/(:any)'] = 'process/adminDeleteUser/$1';
$route['superadmin-rank-update/(:any)'] = 'process/superAdminRankUpdate/$1';
$route['superadmin-delete-user/(:any)'] = 'process/superAdminDeleteUser/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
