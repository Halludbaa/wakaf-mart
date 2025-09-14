<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// akses front
$routes->get('/', 'Home::index');

$routes->group('', ['namespace' => $routes->getDefaultNamespace()], function ($routes) {
    // Login
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::attemptLogin');

    // Logout
    $routes->get('logout', 'AuthController::logout');

    // Register
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::attemptRegister');

    // Forgot password
    $routes->get('forgot', 'AuthController::forgotPassword');
    $routes->post('forgot', 'AuthController::attemptForgot');

    // Reset password
    $routes->get('reset-password', 'AuthController::resetPassword');
    $routes->post('reset-password', 'AuthController::attemptReset');

    // Email activation (opsional jika aktifasi email dinyalakan)
    $routes->get('activate-account', 'AuthController::activateAccount');
    $routes->post('activate-account', 'AuthController::resendActivateAccount');
});


// donasi & transaksi
$routes->get('/donasi', 'Donasi::index');
$routes->get('/donasi/detail/(:segment)', 'Donasi::detail/$1');
$routes->get('/transaksi/register/(:segment)', 'Transaksi::register/$1');
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/midtrans/token', 'Midtrans::token');
$routes->get('/transaksi/payment/(:segment)', 'Transaksi::payment/$1');
// $routes->get('/transaksi/complete/(:segment)', 'Transaksi::complete/$1');
$routes->post('/transaksi/bayar-bank', 'Transaksi::bayarBank');
$routes->post('/transaksi/bayar-qris', 'Transaksi::bayarQris');
$routes->post('/transaksi/getSnapToken', 'Transaksi::getSnapToken');
$routes->post('/transaksi/complete', 'Transaksi::complete');
$routes->get('/transaksi/success', 'Transaksi::success');

$routes->post('/midtrans/token', 'Midtrans::token');
$routes->post('/transaksi/create', 'Transaksi::create');

// artikel
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/detail/(:segment)', 'Artikel::detail/$1');

// profil
$routes->get('/profil', 'Profil::index');

// search
$routes->get('/search', 'Search::index');

// lapor front
$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/laportransaksi/(:any)', 'Laporan::LaporTransaksi/$1');
$routes->get('/laporan/laporpengeluaran/(:any)', 'Laporan::LaporPengeluaran/$1');
$routes->get('/laporan/lapordonasi/(:any)', 'Laporan::LaporDonasi/$1');
$routes->get('/laporan/laporfull/(:any)', 'Laporan::LaporFull/$1');

// admin dashboard
$routes->get('/admadmin', 'AdmAdmin::index');

// admin spanduk
$routes->get('/admspanduk', 'AdmSpanduk::index');
$routes->get('/admspanduk/addspanduk', 'AdmSpanduk::addSpanduk');
$routes->get('/admspanduk/editspanduk/(:num)', 'AdmSpanduk::editSpanduk/$1');
$routes->get('/admspanduk/deletespanduk/(:num)', 'AdmSpanduk::deleteSpanduk/$1');
$routes->post('/admspanduk/savespanduk', 'AdmSpanduk::saveSpanduk');
$routes->post('/admspanduk/updatespanduk/(:num)', 'AdmSpanduk::updateSpanduk/$1');

// admin donasi
$routes->get('/admdonasi', 'AdmDonasi::index');
$routes->get('/admdonasi/adddonasi', 'AdmDonasi::addDonasi');
$routes->get('/admdonasi/editdonasi/(:num)', 'AdmDonasi::editDonasi/$1');
$routes->get('/admdonasi/deletedonasi/(:num)', 'AdmDonasi::deleteDonasi/$1');
$routes->post('/admdonasi/savedonasi', 'AdmDonasi::saveDonasi');
$routes->post('/admdonasi/updatedonasi/(:num)', 'AdmDonasi::updateDonasi/$1');

// admin artikel
$routes->get('/admartikel', 'AdmArtikel::index');
$routes->get('/admartikel/addartikel', 'AdmArtikel::addArtikel');
$routes->get('/admartikel/editartikel/(:num)', 'AdmArtikel::editArtikel/$1');
$routes->get('/admartikel/deleteartikel/(:num)', 'AdmArtikel::deleteArtikel/$1');
$routes->post('/admartikel/saveartikel', 'AdmArtikel::saveArtikel');
$routes->post('/admartikel/updateartikel/(:num)', 'AdmArtikel::updateArtikel/$1');

//admin pengeluaran
$routes->get('/admpengeluaran', 'AdmPengeluaran::index');
$routes->get('/admpengeluaran/addpengeluaran', 'AdmPengeluaran::addPengeluaran');
$routes->get('/admpengeluaran/editpengeluaran/(:num)', 'AdmPengeluaran::editPengeluaran/$1');
$routes->get('/admpengeluaran/deletepengeluaran/(:num)', 'AdmPengeluaran::deletePengeluaran/$1');
$routes->post('/admpengeluaran/savepengeluaran', 'AdmPengeluaran::savePengeluaran');
$routes->post('/admpengeluaran/updatepengeluaran/(:num)', 'AdmPengeluaran::updatePengeluaran/$1');

//admin transaksi
$routes->get('/admtransaksi', 'AdmTransaksi::index');
$routes->get('/admtransaksi/addtransaksi', 'AdmTransaksi::addTransaksi');
$routes->get('/admtransaksi/edittransaksi/(:num)', 'AdmTransaksi::editTransaksi/$1');
$routes->get('/admtransaksi/deletetransaksi/(:num)', 'AdmTransaksi::deleteTransaksi/$1');

$routes->post('/admtransaksi/savetransaksi', 'AdmTransaksi::saveTransaksi');
$routes->post('/admtransaksi/updatetransaksi/(:num)', 'AdmTransaksi::updateTransaksi/$1');

// admin bank
$routes->get('/admbank', 'AdmBank::index');
$routes->get('/admbank/addbank', 'AdmBank::addBank');
$routes->get('/admbank/editbank/(:num)', 'AdmBank::editBank/$1');
$routes->get('/admbank/deletebank/(:num)', 'AdmBank::deleteBank/$1');
$routes->post('/admbank/savebank', 'AdmBank::saveBank');
$routes->post('/admbank/updatebank/(:num)', 'AdmBank::updateBank/$1');

//admin laporan
$routes->get('/admlaporan', 'AdmLaporan::index');
$routes->get('/admlaporan/laporanfull/(:any)', 'AdmLaporan::laporanFull/$1');
$routes->get('/admlaporan/laporantransaksi/(:any)', 'AdmLaporan::laporanTransaksi/$1');
$routes->get('/admlaporan/laporandonasi/(:any)', 'AdmLaporan::laporanDonasi/$1');
$routes->get('/admlaporan/laporanpengeluaran/(:any)', 'AdmLaporan::laporanPengeluaran/$1');
$routes->get('/admlaporan/laporandonatur/(:any)', 'AdmLaporan::laporanDonatur/$1');

// admin user
$routes->get('/admuser', 'AdmUser::index');
$routes->get('/admuser/adduser', 'AdmUser::addUser');
$routes->get('/admuser/edituser/(:num)', 'AdmUser::editUser/$1');
$routes->get('/admuser/deleteuser/(:num)', 'AdmUser::deleteUser/$1');
$routes->post('/admuser/saveuser', 'AdmUser::saveUser');
$routes->post('/admuser/updateuser/(:num)', 'AdmUser::updateUser/$1');

// admin pengaturan
$routes->get('/admpengaturan', 'AdmPengaturan::index');
$routes->post('/admpengaturan/updatepengaturan/(:num)', 'AdmPengaturan::updatePengaturan/$1');

// admin backup
$routes->get('/admadmin/backupdb', 'AdmAdmin::backupDB');
