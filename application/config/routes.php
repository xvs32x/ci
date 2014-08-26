<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['404_override'] = '';

$route['articles/view/(:any)'] = "articles/view/$1";
$route['articles/(:num)'] = "articles/index/$1/";
$route['articles/(:any)'] = "articles/with_categs/$1/1/";
$route['articles/'] = "articles/index/";

$route['admin/settings/edit/(:num)'] = "admin/setting_edit/$1";
$route['admin/articles/edit/(:num)'] = "admin/article_edit/$1";
$route['admin/categs/edit/(:num)'] = "admin/categ_edit/$1";
$route['admin/gallery/edit/(:num)'] = "admin/album_edit/$1";
$route['admin/meta/edit/(:num)'] = "admin/meta_edit/$1";

$route['admin/settings/add'] = "admin/setting_edit/";
$route['admin/articles/add'] = "admin/article_edit/";
$route['admin/categs/add'] = "admin/categ_edit/";
$route['admin/gallery/add'] = "admin/album_edit/";
$route['admin/meta/add'] = "admin/meta_edit/";


/* End of file routes.php */
/* Location: ./application/config/routes.php */