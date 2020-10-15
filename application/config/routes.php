<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'InfoaplikasiController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Endpoint autentikasi
$route['api/autentikasi/masuk'] = 'AutentikasiController/masuk';
$route['api/autentikasi/registrasi'] = 'AutentikasiController/registrasi';

//Endpoint Superadmin
$route['api/superadmin/tambahgunungdanadmin'] = 'SuperadminController/tambahgunungdanadmin';
$route['api/superadmin/lihatgunungdanadmin'] = 'SuperadminController/lihatgunungdanadmin';
$route['api/superadmin/ubahgunungdanadmin'] = 'SuperadminController/ubahgunungdanadmin';
$route['api/superadmin/hapusgunungdanadmin'] = 'SuperadminController/hapusgunungdanadmin';
$route['api/superadmin/resetpasswordadmingunung'] = 'SuperadminController/resetpasswordadmingunung';

$route['api/superadmin/lihatpengguna'] = 'SuperadminController/lihatpengguna';
$route['api/superadmin/hapuspengguna'] = 'SuperadminController/hapuspengguna';
$route['api/superadmin/resetpasswordpengguna'] = 'SuperadminController/resetpasswordpengguna';

$route['api/superadmin/lihatprofil'] = 'SuperadminController/lihatprofil';
$route['api/superadmin/ubahprofil'] = 'SuperadminController/ubahprofil';

$route['api/superadmin/gantipassword'] = 'SuperadminController/gantipassword';

//Endpoint Admin
$route['api/admin/tambahberitagunung'] = 'AdminController/tambahberitagunung';
$route['api/admin/lihatberitagunung'] = 'AdminController/lihatberitagunung';
$route['api/admin/ubahberitagunung'] = 'AdminController/ubahberitagunung';
$route['api/admin/hapusberitagunung'] = 'AdminController/hapusberitagunung';

$route['api/admin/lihatgunung'] = 'AdminController/lihatgunung';
$route['api/admin/ubahgunung'] = 'AdminController/ubahgunung';

$route['api/admin/tambahtourguide'] = 'AdminController/tambahtourguide';
$route['api/admin/lihattourguide'] = 'AdminController/lihattourguide';
$route['api/admin/ubahtourguide'] = 'AdminController/ubahtourguide';
$route['api/admin/hapustourguide'] = 'AdminController/hapustourguide';

$route['api/admin/tambahsewaalat'] = 'AdminController/tambahsewaalat';
$route['api/admin/lihatsewaalat'] = 'AdminController/lihatsewaalat';
$route['api/admin/ubahsewaalat'] = 'AdminController/ubahsewaalat';
$route['api/admin/hapussewaalat'] = 'AdminController/hapussewaalat';

$route['api/admin/lihatprofil'] = 'AdminController/lihatprofil';
$route['api/admin/ubahprofil'] = 'AdminController/ubahprofil';

$route['api/admin/gantipassword'] = 'AdminController/gantipassword';

//Endpoint Pengguna
$route['api/pengguna/lihatberitagunung'] = 'PenggunaController/lihatberitagunung';

$route['api/pengguna/lihatinfogunung'] = 'PenggunaController/lihatinfogunung';

$route['api/pengguna/lihattourguide'] = 'PenggunaController/lihattourguide';

$route['api/pengguna/lihatsewaalat'] = 'PenggunaController/lihatsewaalat';

$route['api/pengguna/lihatprofil'] = 'PenggunaController/lihatprofil';
$route['api/pengguna/ubahprofil'] = 'PenggunaController/ubahprofil';

$route['api/pengguna/gantipassword'] = 'PenggunaController/gantipassword';

