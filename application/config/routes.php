<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['home'] = 'auth/home';
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

$route['skp/rancangan'] = 'skp/viewRancanganSKP';
$route['skp/evaluasi'] = 'skp/viewEvaluasiSKP';
$route['skp/komponen'] = 'skp/viewKomponenSKP';
$route['skp/hasil'] = 'skp/view_hasil_skp';
$route['skp/tambah/(:num)'] = 'skp/viewTambahSKP/$1';


$route['bkd/pendidikan']='skp/viewPendidikanBKD';
$route['bkd/penelitian']='skp/viewPenelitianBKD';
$route['bkd/pengabdian']='skp/viewPengabdianBKD';
$route['bkd/penunjang']='skp/viewPenunjangBKD';
$route['bkd/kesimpulan']='skp/viewKesimpulanBKD';

$route['jabatan/kelengkapan']='jabatan/viewKelengkapan';
$route['jabatan/simulasi']='jabatan/viewSimulasi';
$route['jabatan/pengajuan']='jabatan/viewPengajuan';

$route['serdos/bkdserdos']='serdos/viewBKDSerdos';
$route['serdos/simulasi']='serdos/viewSimulasi';
$route['serdos/pengajuan']='serdos/viewPengajuan';


$route['profile'] = 'dosen/viewProfileDosen';
$route['profile/edit'] = 'dosen/viewEditProfil';
