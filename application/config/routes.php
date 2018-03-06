<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'process';
$route['login'] = 'processes/login';
$route['index'] = 'process/index';
$route['register'] = 'process/register';
$route['login'] = 'process/login';
$route['postpage'] = 'process/postpage';
$route['showpage'] = 'process/showpage';
$route['postjob'] = 'process/postjob';
$route['onepost/(:any)'] = 'process/onePost/$1';
$route['logout'] = 'process/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
