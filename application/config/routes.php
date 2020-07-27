<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|rewrite url home
*/
$route['trang-chu.html'] = 'home';
$route['lien-he.html'] = 'contact';
$route['truyen.html'] = 'stories';
$route['xem-truyen/(:any)'] = 'stories/view/$1';


$route['san-pham/chi-tiet/(:any)-(:num)'] = 'product/view/$1/$2';
$route['san-pham/danh-muc/(:any)'] = 'product/catalog/$1';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
