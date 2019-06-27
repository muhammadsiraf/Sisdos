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

$route['penilaian/daftar']='dosen/view_evaluasi_dosen_index';
$route['penilaian/perilaku']='dosen/view_evaluasi_dosen_penilaian';
$route['penilaian/skpbkd']='dosen/view_evaluasi_dosen_skp';
$route['penilaian/perilaku/(:any)/(:any)/(:num)']='dosen/view_nilai_dosen/$1/$2/$3';
$route['penilaian/perilaku/edit/(:any)/(:any)/(:num)']='dosen/view_edit_dosen/$1/$2/$3';

$route['penilaian/nilai']='dosen/nilai_perilaku_action';
$route['penilaian/edit']='dosen/edit_nilai_perilaku_action';
$route['penilaian/skpbkd/approval-rancangan/(:num)/(:any)/(:any)']='dosen/view_approve_skp/$1/$2/$3';
$route['penilaian/skpbkd/approval-evaluasi/(:num)']='dosen/view_approve_eval_skp/$1';

$route['administrasi/dosen'] = 'dosen/view_administrasi_dosen';
$route['administrasi/dosen/(:num)'] = 'dosen/view_administrasi_dosen/$1';

$route['administrasi/akun'] = 'auth/view_administrasi_akun';
$route['administrasi/akun/(:num)'] = 'auth/view_administrasi_akun/$1';



