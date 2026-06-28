<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('testdb', 'TestDB::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/laporan', 'Laporan::index');
$routes->post('/laporan/simpan', 'Laporan::simpan');
$routes->get('/laporan', 'Laporan::index');
$routes->post('/laporan/simpan', 'Laporan::simpan');
$routes->get('/data-laporan', 'Laporan::data');
$routes->get('/logout', 'Login::logout');

$routes->get('/dashboard-admin', 'Dashboard::admin');
$routes->get('/dashboard-karyawan', 'Dashboard::karyawan');
$routes->get('/dashboard-teknisi', 'Dashboard::teknisi');
$routes->get('/dashboard-supervisor', 'Dashboard::supervisor');
$routes->get('/approve/(:num)', 'Laporan::approve/$1');
$routes->get('/tolak/(:num)', 'Laporan::tolak/$1');
$routes->get('/terima-tugas/(:num)', 'Dashboard::terimaTugas/$1');
$routes->get('/dalam-perbaikan/(:num)', 'Dashboard::dalamPerbaikan/$1');
$routes->get('/selesai-tugas/(:num)', 'Dashboard::selesaiTugas/$1');
$routes->get('/assign-rian/(:num)', 'Laporan::assignRian/$1');
$routes->get('/eskalasi/(:num)', 'Laporan::eskalasi/$1');
$routes->get('/hasil-perbaikan/(:num)', 'Dashboard::formHasil/$1');
$routes->post('/simpan-hasil/(:num)', 'Dashboard::simpanHasil/$1');
$routes->get('/followup/(:num)', 'Dashboard::formFollowUp/$1');
$routes->post('/followup/(:num)', 'Dashboard::simpanFollowUp/$1');
$routes->get('/pemeriksaan/(:num)', 'Dashboard::pemeriksaan/$1');
$routes->get('/tutup-laporan/(:num)', 'Dashboard::tutupLaporan/$1');
$routes->get('/penugasan/(:num)', 'Laporan::penugasan/$1');
$routes->post('/simpan-penugasan/(:num)', 'Laporan::simpanPenugasan/$1');
$routes->get('/simulasi-reminder', 'Dashboard::simulasiReminder');
$routes->get('/simulasi-eskalasi', 'Dashboard::simulasiEskalasi');