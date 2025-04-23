<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Public routes
$route['products/(:any)'] = 'category/view/$1';
$route['product/(:any)'] = 'product/view/$1';
$route['sitemap.xml'] = 'sitemap/index';

// Admin routes
$route['admin'] = 'admin/index';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/dashboard'] = 'admin/dashboard';

// Admin category routes
$route['admin/categories'] = 'admin/categories';
$route['admin/categories/create'] = 'admin/create_category';
$route['admin/categories/edit/(:num)'] = 'admin/edit_category/$1';
$route['admin/categories/delete/(:num)'] = 'admin/delete_category/$1';

// Admin product routes
$route['admin/products'] = 'admin/products';
$route['admin/products/create'] = 'admin/create_product';
$route['admin/products/edit/(:num)'] = 'admin/edit_product/$1';
$route['admin/products/delete/(:num)'] = 'admin/delete_product/$1';
