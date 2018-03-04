<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'process';
$route['index'] = 'process/index';
$route['register'] = 'process/register';
$route['login'] = 'process/login';
$route['postpage'] = 'process/postpage';
$route['postjob'] = 'process/postjob';
$route['logout'] = 'process/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
