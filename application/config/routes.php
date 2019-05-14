<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'dosen';
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

$route['skp/rancangan'] = 'skp/viewRancanganSKP';
$route['skp/evaluasi'] = 'skp/viewEvaluasiSKP';
$route['skp/komponen'] = 'skp/viewKomponenSKP';




