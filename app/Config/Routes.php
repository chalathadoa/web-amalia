<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin\Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// C:\xampp\htdocs\web-amalia2\app\Controllers\admin\Home.php
// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Auth
// $routes->get('/login', 'Auth::login');
// $routes->post('/login/process', 'Auth::loginProcess');
// $routes->get('/logout', 'AuthController::logout');

// 01 ADMIN

$routes->get('/home', 'Home::index',);
$routes->get('/sterbaik', 'Admin\Home::sterbaik', ['filter' => 'role:admin']);
$routes->get('/manage_users', 'Admin\ManageUsers::index', ['filter' => 'role:admin']);

// manage users
// $routes->match(['get', 'post'], '/manage_users/add_user', 'Admin\ManageUsers::create', ['filter' => 'role:admin']);
$routes->get('/manage_users/add_user', 'Admin\ManageUsers::create', ['filter' => 'role:admin']);
$routes->post('/manage_users', 'Admin\ManageUsers::save', ['filter' => 'role:admin']);
$routes->get('/manage_users/admin', 'Admin\ManageUsers::admin', ['filter' => 'role:admin']);
$routes->get('/manage_users/guru', 'Admin\ManageUsers::guru', ['filter' => 'role:admin']);
$routes->get('/manage_users/santri', 'Admin\ManageUsers::santri', ['filter' => 'role:admin']);
$routes->get('/manage_users/wali', 'Admin\ManageUsers::wali', ['filter' => 'role:admin']);


// manage events
$routes->get('/manage_events', 'Admin\ManageEvents::index', ['filter' => 'role:admin']);
$routes->get('/manage_events/add_event', 'Admin\ManageEvents::add', ['filter' => 'role:admin']);
$routes->post('/manage_events', 'Admin\ManageEvents::store', ['filter' => 'role:admin']);
$routes->get('/manage_events/view/(:any)', 'Admin\ManageEvents::detail/$1', ['filter' => 'role:admin']);
$routes->get('/manage_events/edit/(:num)', 'Admin\ManageEvents::edit/$1', ['filter' => 'role:admin']);
$routes->post('/manage_events/update/(:num)', 'Admin\ManageEvents::update/$1', ['filter' => 'role:admin']);
$routes->delete('/manage_events/delete/(:num)', 'Admin\ManageEvents::delete/$1', ['filter' => 'role:admin']);
$routes->get('/manage_events/restore/(:any)', 'Admin\ManageEvents::restore/$1', ['filter' => 'role:admin']);
$routes->get('/manage_events/restore', 'Admin\ManageEvents::restore', ['filter' => 'role:admin']);
$routes->get('/manage_events/trash', 'Admin\ManageEvents::trash', ['filter' => 'role:admin']);
$routes->delete('/manage_events/delete2/(:any)', 'Admin\ManageEvents::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/manage_events/delete2', 'Admin\ManageEvents::delete2', ['filter' => 'role:admin']);

// $routes->get('/upload', 'Admin\TryInsert::index');
// $routes->post('/upload/upload', 'Admin\TryInsert::upload');

// periode
$routes->get('/periode', 'Admin\Periode::index', ['filter' => 'role:admin']);
$routes->get('/periode/add_periode', 'Admin\Periode::add', ['filter' => 'role:admin']);
$routes->post('/periode', 'Admin\Periode::store', ['filter' => 'role:admin']);
$routes->get('/periode/edit/(:num)', 'Admin\Periode::edit/$1', ['filter' => 'role:admin']);
$routes->post('/periode/update/(:num)', 'Admin\Periode::update/$1', ['filter' => 'role:admin']);
$routes->delete('/periode/delete/(:num)', 'Admin\Periode::delete/$1', ['filter' => 'role:admin']);
$routes->get('/periode/restore/(:any)', 'Admin\Periode::restore/$1', ['filter' => 'role:admin']);
$routes->get('/periode/restore', 'Admin\Periode::restore', ['filter' => 'role:admin']);
$routes->get('/periode/trash', 'Admin\Periode::trash', ['filter' => 'role:admin']);
$routes->delete('/periode/delete2/(:any)', 'Admin\Periode::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/periode/delete2', 'Admin\Periode::delete2', ['filter' => 'role:admin']);

// manage kelas
$routes->get('/manage_class', 'Admin\Kelas::index', ['filter' => 'role:admin']);
$routes->get('/manage_class/add_class', 'Admin\Kelas::create', ['filter' => 'role:admin']);
$routes->post('/manage_class', 'Admin\Kelas::store', ['filter' => 'role:admin']);
$routes->get('/manage_class/guru/(:num)', 'Admin\Kelas::guru/$1', ['filter' => 'role:admin']);
$routes->get('/manage_class/edit/(:num)', 'Admin\Kelas::edit/$1', ['filter' => 'role:admin']);
$routes->post('/manage_class/update/(:num)', 'Admin\Kelas::update/$1', ['filter' => 'role:admin']);
$routes->delete('/manage_class/delete/(:num)', 'Admin\Kelas::delete/$1', ['filter' => 'role:admin']);
$routes->get('/manage_class/restore/(:any)', 'Admin\Kelas::restore/$1', ['filter' => 'role:admin']);
$routes->get('/manage_class/restore', 'Admin\Kelas::restore', ['filter' => 'role:admin']);
$routes->get('/manage_class/trash', 'Admin\Kelas::trash', ['filter' => 'role:admin']);
$routes->delete('/manage_class/delete2/(:any)', 'Admin\Kelas::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/manage_class/delete2', 'Admin\Kelas::delete2', ['filter' => 'role:admin']);

// jadwal
$routes->get('/jadwal', 'Admin\Jadwal::index', ['filter' => 'role:admin']);
$routes->get('/jadwal/periode/(:num)', 'Admin\Jadwal::periode/$1', ['filter' => 'role:admin']);
$routes->get('/jadwal/add_jadwal', 'Admin\Jadwal::add', ['filter' => 'role:admin']);
$routes->post('/jadwal', 'Admin\Jadwal::store', ['filter' => 'role:admin']);
// $routes->get('/jadwal/view/(:any)', 'Admin\ManageEvents::detail/$1', ['filter' => 'role:admin']);
$routes->get('/jadwal/edit/(:num)', 'Admin\Jadwal::edit/$1', ['filter' => 'role:admin']);
$routes->post('/jadwal/update/(:num)', 'Admin\Jadwal::update/$1', ['filter' => 'role:admin']);
$routes->delete('/jadwal/delete/(:num)', 'Admin\Jadwal::delete/$1', ['filter' => 'role:admin']);
$routes->get('/jadwal/restore/(:any)', 'Admin\Jadwal::restore/$1', ['filter' => 'role:admin']);
$routes->get('/jadwal/restore', 'Admin\Jadwal::restore', ['filter' => 'role:admin']);
$routes->get('/jadwal/trash', 'Admin\Jadwal::trash', ['filter' => 'role:admin']);
$routes->delete('/jadwal/delete2/(:any)', 'Admin\Jadwal::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/jadwal/delete2', 'Admin\Jadwal::delete2', ['filter' => 'role:admin']);

// pelanggaran
$routes->get('/pelanggaran', 'Admin\Pelanggaran::index', ['filter' => 'role:admin']);
$routes->get('/pelanggaran/santri/(:num)', 'Admin\Pelanggaran::santri/$1', ['filter' => 'role:admin']);
$routes->get('/pelanggaran/add_pelanggaran', 'Admin\Pelanggaran::add', ['filter' => 'role:admin']);
$routes->post('/pelanggaran', 'Admin\Pelanggaran::store', ['filter' => 'role:admin']);
// print dan view pelanggaran
$routes->get('/pelanggaran/view/(:any)', 'Admin\Pelanggaran::detail/$1', ['filter' => 'role:admin']);
$routes->get('/pelanggaran/edit/(:num)', 'Admin\Pelanggaran::edit/$1', ['filter' => 'role:admin']);
$routes->post('/pelanggaran/update/(:num)', 'Admin\Pelanggaran::update/$1', ['filter' => 'role:admin']);
$routes->delete('/pelanggaran/delete/(:num)', 'Admin\Pelanggaran::delete/$1', ['filter' => 'role:admin']);
$routes->get('/pelanggaran/restore/(:any)', 'Admin\Pelanggaran::restore/$1', ['filter' => 'role:admin']);
$routes->get('/pelanggaran/restore', 'Admin\Pelanggaran::restore', ['filter' => 'role:admin']);
$routes->get('/pelanggaran/trash', 'Admin\Pelanggaran::trash', ['filter' => 'role:admin']);
$routes->delete('/pelanggaran/delete2/(:any)', 'Admin\Pelanggaran::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/pelanggaran/delete2', 'Admin\Pelanggaran::delete2', ['filter' => 'role:admin']);

// kriteria
$routes->get('/kriteria', 'Admin\Kriteria::index', ['filter' => 'role:admin']);
$routes->get('/kriteria/santri/(:num)', 'Admin\Kriteria::santri/$1', ['filter' => 'role:admin']);
$routes->get('/kriteria/add_kriteria', 'Admin\Kriteria::add', ['filter' => 'role:admin']);
$routes->post('/kriteria', 'Admin\Kriteria::store', ['filter' => 'role:admin']);
$routes->get('/kriteria/view/(:any)', 'Admin\Kriteria::detail/$1', ['filter' => 'role:admin']);
$routes->get('/kriteria/edit/(:num)', 'Admin\Kriteria::edit/$1', ['filter' => 'role:admin']);
$routes->post('/kriteria/update/(:num)', 'Admin\Kriteria::update/$1', ['filter' => 'role:admin']);
$routes->delete('/kriteria/delete/(:num)', 'Admin\Kriteria::delete/$1', ['filter' => 'role:admin']);
$routes->get('/kriteria/restore/(:any)', 'Admin\Kriteria::restore/$1', ['filter' => 'role:admin']);
$routes->get('/kriteria/restore', 'Admin\Kriteria::restore', ['filter' => 'role:admin']);
$routes->get('/kriteria/trash', 'Admin\Kriteria::trash', ['filter' => 'role:admin']);
$routes->delete('/kriteria/delete2/(:any)', 'Admin\Kriteria::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/kriteria/delete2', 'Admin\Kriteria::delete2', ['filter' => 'role:admin']);

// raport
$routes->get('/raport', 'Admin\Raport::index', ['filter' => 'role:admin']);
$routes->get('/raport/santri/(:num)', 'Admin\Raport::santri/$1', ['filter' => 'role:admin']);
$routes->get('/raport/santri/print/(:num)', 'Admin\Raport::print/$1', ['filter' => 'role:admin']);
$routes->get('/raport/add_raport/(:num)', 'Admin\Raport::addpersantri/$1', ['filter' => 'role:admin']);
$routes->get('/raport/add_raport', 'Admin\Raport::add', ['filter' => 'role:admin']);
$routes->post('/raport/(:num)', 'Admin\Raport::storepersantri/$1', ['filter' => 'role:admin']);
$routes->post('/raport', 'Admin\Raport::store', ['filter' => 'role:admin']);
$routes->get('/raport/view/(:any)', 'Admin\Raport::detail/$1', ['filter' => 'role:admin']);
$routes->get('/raport/edit/(:num)', 'Admin\Raport::edit/$1', ['filter' => 'role:admin']);
$routes->post('/raport/update/(:num)', 'Admin\Raport::update/$1', ['filter' => 'role:admin']);
$routes->delete('/raport/delete/(:num)', 'Admin\Raport::delete/$1', ['filter' => 'role:admin']);
$routes->get('/raport/restore/(:any)', 'Admin\Raport::restore/$1', ['filter' => 'role:admin']);
$routes->get('/raport/restore', 'Admin\Raport::restore', ['filter' => 'role:admin']);
$routes->get('/raport/trash', 'Admin\Raport::trash', ['filter' => 'role:admin']);
$routes->delete('/raport/delete2/(:any)', 'Admin\Raport::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/raport/delete2', 'Admin\Raport::delete2', ['filter' => 'role:admin']);

// $routes->get('/manage_santriwati', 'Admin\ManageSantriwati::index', ['filter' => 'role:admin']);
$routes->get('/jamaah', 'Admin\Jamaah::index', ['filter' => 'role:admin']);
$routes->get('/prestasi', 'Admin\Prestasi::index', ['filter' => 'role:admin']);
// $routes->get('/raport_penilaian', 'Admin\RaportPenilaian::index', ['filter' => 'role:admin']);

// service('auth')->routes($routes);
// $routes->addRedirect('/', 'admin/viewhome');

// 02 SANTRI
$routes->get('/santri', 'Santri\Home::index', ['filter' => 'role:santriwati']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
