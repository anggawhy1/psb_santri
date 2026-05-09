<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('psb', 'Home::psb');
$routes->get('profil', 'Home::profil');
$routes->get('program', 'Home::program');
$routes->get('berita', 'Home::berita');
$routes->get('berita/detail/(:num)', 'Home::detailBerita/$1');
$routes->get('prestasi', 'Home::prestasi');
$routes->get('galeri', 'Home::galeri');
$routes->get('kontak', 'Home::kontak');      
$routes->get('login', 'Auth::index');     
$routes->get('register', 'Auth::register'); 

$routes->post('auth/attemptRegister', 'Auth::attemptRegister');
$routes->post('auth/attemptLogin', 'Auth::attemptLogin');
$routes->get('auth/logout', 'Auth::logout');

$routes->group('pendaftar', function($routes) {
    $routes->get('dashboard', 'Pendaftar::dashboard');
    $routes->get('berkas', 'Pendaftar::berkas');
    $routes->post('uploadBerkas', 'Pendaftar::uploadBerkas');
    $routes->get('pembayaran', 'Pendaftar::pembayaran');
    $routes->post('uploadPembayaran', 'Pendaftar::uploadPembayaran');
    $routes->get('status', 'Pendaftar::status');
});

$routes->get('admin/login', 'Auth::adminLogin');
$routes->post('auth/attemptAdminLogin', 'Auth::attemptAdminLogin');

$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('berita', 'Admin::berita');
    $routes->get('prestasi', 'Admin::prestasi');
    $routes->get('galeri', 'Admin::galeri');
    $routes->get('informasi', 'Admin::informasi');
    $routes->get('editInformasi/(:num)', 'Admin::editInformasi/$1');
    $routes->post('updateInformasi', 'Admin::updateInformasi');

    $routes->get('(:segment)/tambah', 'Admin::tambahPromosi/$1');
    $routes->get('editPromosi/(:num)', 'Admin::editPromosi/$1');
    $routes->post('updatePromosi', 'Admin::updatePromosi'); 
    $routes->post('savePromosi', 'Admin::savePromosi');
    $routes->get('deletePromosi/(:num)', 'Admin::deletePromosi/$1');

    $routes->get('pendaftar', 'Admin::pendaftar');
    $routes->post('verifikasiPembayaran', 'Admin::verifikasiPembayaran');
    $routes->post('verifikasiBerkas', 'Admin::verifikasiBerkas');
    $routes->post('setJadwal', 'Admin::setJadwal');
    $routes->post('setKelulusan', 'Admin::setKelulusan');
    $routes->post('updateDataPendaftar', 'Admin::updateDataPendaftar');

    $routes->get('viewFormulir/(:num)', 'Admin::viewFormulir/$1');
    $routes->get('viewPembayaran/(:num)', 'Admin::viewPembayaran/$1');
    $routes->get('viewBerkas/(:num)', 'Admin::viewBerkas/$1');
    $routes->get('viewWawancara/(:num)', 'Admin::viewWawancara/$1');
    $routes->get('viewKelulusan/(:num)', 'Admin::viewKelulusan/$1');

    $routes->get('riwayat', 'Admin::riwayat');
    $routes->get('detailRiwayat/(:num)', 'Admin::detailRiwayat/$1');
    $routes->get('profile', 'Admin::profile');
    $routes->post('updateProfile', 'Admin::updateProfile');
});

$routes->group('pimpinan', function($routes) {

    $routes->get('dashboard', 'Pimpinan::dashboard');
    
    // KELOLA ADMIN
    $routes->get('kelolaAdmin', 'Pimpinan::kelolaAdmin');      // Tampilkan List
    $routes->get('admin/tambah', 'Pimpinan::createAdmin');     // Tampilkan Form
    $routes->post('saveAdmin', 'Pimpinan::saveAdmin');         // Proses Simpan
    $routes->get('hapusAdmin/(:num)', 'Pimpinan::hapusAdmin/$1');
    $routes->post('updateAdmin', 'Pimpinan::updateAdmin');

    // MONITORING & RIWAYAT (Read Only)
    $routes->get('pendaftar', 'Pimpinan::pendaftar');
    $routes->get('riwayat', 'Pimpinan::riwayat');
    $routes->get('detailSantri/(:num)', 'Pimpinan::detailSantri/$1');
    $routes->get('detailRiwayat/(:num)', 'Pimpinan::detailRiwayat/$1');
});