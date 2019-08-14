<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */



$route['login']       = 'AuthController/login_page';

$route['auth'] = 'AuthController';
$route['auth/(:any)'] = 'AuthController/$1';
$route['auth/(:any)/(:any)'] = 'AuthController/$1/$2';

$route['admin']       = 'admin/DashboardController';
$route['admin/dashboard']       = 'admin/DashboardController';


$route['admin/pengguna'] = 'admin/PenggunaController';
$route['admin/pengguna/(:any)'] = 'admin/PenggunaController/$1';
$route['admin/pengguna/(:any)/(:num)'] = 'admin/PenggunaController/$1/$2';



$route['admin/berita'] = 'admin/BeritaController';
$route['admin/berita/(:any)'] = 'admin/BeritaController/$1';
$route['admin/berita/(:any)/(:any)'] = 'admin/BeritaController/$1/$2';



$route['admin/pengaturan/umum'] = 'admin/PengaturanController/umum';
$route['admin/pengaturan'] = 'admin/PengaturanController';
$route['admin/pengaturan/(:any)'] = 'admin/PengaturanController/$1';
$route['admin/pengaturan/(:any)/(:any)'] = 'admin/PengaturanController/$1/$2';

$route['admin/pages'] = 'admin/PagesController';
$route['admin/pages/(:any)'] = 'admin/PagesController/$1';
$route['admin/pages/(:any)/(:any)'] = 'admin/PagesController/$1/$2';


$route['admin/fasilitas/ruangan'] = 'admin/PagesController/ruangan';
$route['admin/fasilitas/elektronik'] = 'admin/PagesController/elektronik';
$route['admin/fasilitas/moubiler'] = 'admin/PagesController/moubiler';
$route['admin/fasilitas/inventaris'] = 'admin/PagesController/inventaris';

$route['admin/prestasi'] = 'admin/PagesController/prestasi';
$route['admin/ekstrakulikuler'] = 'admin/PagesController/ekstrakulikuler';

$route['admin/kategori_berita'] = 'admin/KategoriBeritaController';
$route['admin/kategori_berita/(:any)'] = 'admin/KategoriBeritaController/$1';
$route['admin/kategori_berita/(:any)/(:any)'] = 'admin/KategoriBeritaController/$1/$2';



$route['admin/hubungi-kami'] = 'admin/HubungiKamiController';
$route['admin/hubungi-kami/(:any)'] = 'admin/HubungiKamiController/$1';
$route['admin/hubungi-kami/(:any)/(:any)'] = 'admin/HubungiKamiController/$1/$2';


$route['admin/album-photo'] = 'admin/AlbumPhotoController';
$route['admin/album-photo/(:any)'] = 'admin/AlbumPhotoController/$1';
$route['admin/album-photo/(:any)/(:any)'] = 'admin/AlbumPhotoController/$1/$2';


$route['admin/photo'] = 'admin/PhotoController/daftar_photo';
$route['admin/photo/(:any)'] = 'admin/PhotoController/$1';
$route['admin/photo/(:any)/(:any)'] = 'admin/PhotoController/$1/$2';


$route['admin/video'] = 'admin/VideoController';
$route['admin/video/(:any)'] = 'admin/VideoController/$1';
$route['admin/video/(:any)/(:any)'] = 'admin/VideoController/$1/$2';



$route['admin/image-slider'] = 'admin/ImageSliderController';
$route['admin/image-slider/(:any)'] = 'admin/ImageSliderController/$1';
$route['admin/image-slider/(:any)/(:any)'] = 'admin/ImageSliderController/$1/$2';



$route['admin/quote'] = 'admin/QuoteController';
$route['admin/quote/(:any)'] = 'admin/QuoteController/$1';
$route['admin/quote/(:any)/(:any)'] = 'admin/QuoteController/$1/$2';




$route['admin/data_guru_pegawai'] = 'admin/DataGuruPegawaiController';
$route['admin/data_guru_pegawai/(:any)'] = 'admin/DataGuruPegawaiController/$1';
$route['admin/data_guru_pegawai/(:any)/(:num)'] = 'admin/DataGuruPegawaiController/$1/$2';

$route['admin/struktur_organisasi'] = 'admin/StrukturOrganisasiController';
$route['admin/struktur_organisasi/(:any)'] = 'admin/StrukturOrganisasiController/$1';
$route['admin/struktur_organisasi/(:any)/(:num)'] = 'admin/StrukturOrganisasiController/$1/$2';


$route['pages/visi-misi'] = 'public/PagesController/visi_misi';
$route['pages/profil'] = 'public/PagesController/profil';
$route['pages/sambutan'] = 'public/PagesController/sambutan';
$route['pages/guru-pegawai'] = 'public/PagesController/guru_pegawai';
$route['pages/struktur-organisasi'] = 'public/PagesController/struktur_organisasi';
$route['pages/prestasi'] = 'public/PagesController/prestasi';
$route['pages/ekstrakulikuler'] = 'public/PagesController/ekstrakulikuler';

$route['pages/hubungi-kami'] = 'public/HubungiKamiController';
$route['pages/hubungi-kami/(:any)'] = 'public/HubungiKamiController/$1';

$route['fasilitas/ruangan'] = 'public/PagesController/ruangan';
$route['fasilitas/elektronik'] = 'public/PagesController/elektronik';
$route['fasilitas/moubiler'] = 'public/PagesController/moubiler';
$route['fasilitas/inventaris'] = 'public/PagesController/inventaris';



$route['berita'] = 'public/ReadBeritaController';
$route['berita/page'] = 'public/ReadBeritaController/list';
$route['berita/page/(:any)'] = 'public/ReadBeritaController/list/$2';

$route['berita/(:any)'] = 'public/ReadBeritaController/$1';
$route['berita/(:any)/(:any)'] = 'public/ReadBeritaController/$1/$2';



$route['galeri-photo'] = 'public/GaleriPhotoController';
$route['galeri-photo/(:any)'] = 'public/GaleriPhotoController/$1';
$route['galeri-photo/(:any)/(:any)'] = 'public/GaleriPhotoController/$1/$2';

$route['galeri-video'] = 'public/GaleriVideoController';
$route['galeri-video/(:any)'] = 'public/GaleriVideoController/$1';
$route['galeri-video/(:any)/(:any)'] = 'public/GaleriVideoController/$1/$2';

$route['default_controller']   = 'IndexController';
$route['404_override']         = '';
$route['translate_uri_dashes'] = false;
