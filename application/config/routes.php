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

//AUTH__LOGIN
$route['login'] = 'authentication/auth/authorization';
$route['logout'] = 'authentication/auth/logout';

//ADMIN
$route['admin'] = 'admin/admin/dashboard';
$route['user'] = 'admin/c_crud_users/read';
$route['tambah_pengguna'] = 'admin/c_crud_users/create';
$route['ubah_pengguna/(:any)'] = 'admin/c_crud_users/update/$1';
$route['proses_tambah_pengguna'] = 'admin/c_crud_users/create_process';
$route['hapus_pengguna/(:any)']= 'admin/c_crud_users/delete/$1';
$route['proses_ubah_pengguna/(:any)'] = 'admin/c_crud_users/update_process/$1';
$route['gaji'] = 'admin/c_crud_gaji/read';
$route['tambah_gaji'] = 'admin/c_crud_gaji/create';
$route['proses_tambah_gaji'] = 'admin/c_crud_gaji/create_process';
$route['hapus_gaji/(:any)'] = 'admin/c_crud_gaji/delete/$1';
$route['ubah_gaji/(:any)'] = 'admin/c_crud_gaji/update/$1';
$route['proses_ubah_gaji/(:any)'] = 'admin/c_crud_gaji/update_process/$1';
$route['import_gaji'] = 'admin/c_crud_gaji/import';
$route['hapus_semua_gaji'] = 'admin/c_crud_gaji/delete_all';
$route['format_surat'] = 'admin/c_format_surat/read';
$route['ubah_format_surat'] = 'admin/c_format_surat/update';
$route['proses_ubah_format_surat'] = 'admin/c_format_surat/update_process';
$route['kantor'] = 'admin/c_crud_kantor/read';
$route['tambah_kantor'] = 'admin/c_crud_kantor/create';
$route['ubah_kantor/(:any)'] = 'admin/c_crud_kantor/update/$1';
$route['proses_tambah_kantor'] = 'admin/c_crud_kantor/create_process';
$route['hapus_kantor/(:any)']= 'admin/c_crud_kantor/delete/$1';
$route['proses_ubah_kantor/(:any)'] = 'admin/c_crud_kantor/update_process/$1';

//PETUGAS
$route['petugas'] = 'petugas/petugas/dashboard';
$route['disdikbudpora'] = 'petugas/c_crud_duk/read/1';
$route['uptd'] = 'petugas/c_crud_duk/read/2';
$route['sekolah'] = 'petugas/c_crud_duk/read/3';
$route['tambah_duk/(:any)'] = 'petugas/c_crud_duk/create/$1';
$route['proses_tambah_duk/(:any)'] = 'petugas/c_crud_duk/create_process/$1';
$route['ubah_duk/(:any)/(:any)'] = 'petugas/c_crud_duk/edit/$1/$2';
$route['proses_ubah_duk/(:any)/(:any)'] = 'petugas/c_crud_duk/update/$1/$2';
$route['hapus_duk/(:any)/(:any)']= 'petugas/c_crud_duk/delete/$1/$2';
$route['kgb/1'] = 'petugas/c_crud_kgb/read/1';
$route['kgb/2'] = 'petugas/c_crud_kgb/read/2';
$route['kgb/3'] = 'petugas/c_crud_kgb/read/3';
$route['kgb/riwayat/(:any)'] = 'petugas/c_crud_kgb/riwayat/$1';
$route['tambah_kgb/(:any)'] = 'petugas/c_crud_kgb/create/$1';
$route['preview_kgb/(:any)/(:any)'] = 'petugas/c_crud_kgb/read_kgb/$1/$2';
$route['proses_tambah_kgb/(:any)'] = 'petugas/c_crud_kgb/create_process/$1';
$route['ubah_kgb/(:any)/(:any)'] = 'petugas/c_crud_kgb/edit/$1/$2';
$route['proses_ubah_kgb/(:any)/(:any)'] = 'petugas/c_crud_kgb/update/$1/$2';
$route['hapus_kgb/(:any)/(:any)'] = 'petugas/c_crud_kgb/delete/$1/$2';
$route['format_tanggal/(:any)'] = 'petugas/c_crud_kgb/tgl_indo/$1';
$route['preview_img_kgb/(:any)'] = 'petugas/c_crud_kgb/read_img_kgb/$1';
$route['print/(:any)/(:any)'] = 'petugas/c_crud_kgb/print_kgb/$1/$2';
$route['upload_sk_kgb'] = 'petugas/c_crud_kgb/upload_sk_kgb/$1/$2';
$route['jadwal_kgb'] = 'petugas/c_crud_kgb/read_jadwal_kgb';
$route['upload_sk_kgb/(:any)/(:any)'] = 'petugas/c_crud_kgb/upload_sk_kgb/$1/$2';

$route['default_controller'] = 'authentication/auth/authorization';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
