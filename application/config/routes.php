<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'process';
$route['login'] = 'processes/login';
$route['index'] = 'process/index';
$route['register'] = 'process/register';
$route['join'] = 'process/bringmejoin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
