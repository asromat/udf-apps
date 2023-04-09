<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/splash';
$route['p/(:any)'] = 'page/p/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
