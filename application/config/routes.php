<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|rewrite url home
*/
$route['trang-chu.html'] = 'home';
$route['lien-he.html'] = 'contact';

//tab truyện
$route['truyen.html'] = 'stories';
$route['xem-truyen/(:any)'] = 'stories/view/$1';
$route['xem-truyen/(:any)-(:num)'] = 'stories/view/$1/$2';
$route['truyen/tim-kiem-truyen'] = 'stories/search';
$route['truyen/tim-nang-cao'] = 'stories/search_adv';

//tab chuong/chapter
$route['truyen/(:any)'] = 'chapter/view/$1';
$route['truyen/(:any)-(:num)'] = 'chapter/view/$1/$2';
$route['danh-sach-chuong/(:any)-(:num)'] = 'chapter/list/$1/$2';

//tab danh mục truyện
$route['danh-muc/(:any)'] = 'catalog/view/$1';
$route['danh-muc/(:any)-(:num)'] = 'catalog/view/$1/$2';

$route['san-pham/chi-tiet/(:any)-(:num)'] = 'product/view/$1/$2';
$route['san-pham/danh-muc/(:any)'] = 'product/catalog/$1';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
