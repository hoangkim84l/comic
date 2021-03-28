<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|rewrite url home
*/
$route['trang-chu'] = 'home';
$route['lien-he'] = 'contact';
$route['privacy-policy'] = 'PrivacyPolicy/index';

//tab truyện
$route['truyen'] = 'stories';
$route['xem-truyen/(:any)'] = 'stories/view/$1';
$route['xem-truyen/(:any)/(:any)'] = 'stories/view/$1/$2';
$route['truyen/tim-kiem-truyen'] = 'stories/search';
$route['truyen/tim-nang-cao'] = 'stories/search_adv';

//tab chuong/chapter
$route['truyen/(:any)'] = 'chapter/view/$1';
$route['truyen/(:any)/(:any)/(:num)'] = 'chapter/view/$1/$2/$3';
$route['truyen/(:any)/(:any)'] = 'chapter/view/$1/$2';
$route['danh-sach-chuong/(:any)/(:num)'] = 'chapter/list/$1/$2';

//tab danh mục truyện
$route['danh-muc/(:any)'] = 'catalog/view/$1';
$route['danh-muc/(:any)/(:num)'] = 'catalog/view/$1/$2';

$route['san-pham/chi-tiet/(:any)/(:num)'] = 'product/view/$1/$2';
$route['san-pham/danh-muc/(:any)'] = 'product/catalog/$1';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
