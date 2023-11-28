// raport
$routes->get('/raport', 'Admin\raport::index', ['filter' => 'role:admin']);
$routes->get('/raport/santri/(:num)', 'Admin\raport::santri/$1', ['filter' => 'role:admin']);
$routes->get('/raport/add_raport', 'Admin\raport::add', ['filter' => 'role:admin']);
$routes->post('/raport', 'Admin\raport::store', ['filter' => 'role:admin']);
// print dan view raport
$routes->get('/raport/view/(:any)', 'Admin\raport::detail/$1', ['filter' => 'role:admin']);
$routes->get('/raport/edit/(:num)', 'Admin\raport::edit/$1', ['filter' => 'role:admin']);
$routes->post('/raport/update/(:num)', 'Admin\raport::update/$1', ['filter' => 'role:admin']);
$routes->delete('/raport/delete/(:num)', 'Admin\raport::delete/$1', ['filter' => 'role:admin']);
$routes->get('/raport/restore/(:any)', 'Admin\raport::restore/$1', ['filter' => 'role:admin']);
$routes->get('/raport/restore', 'Admin\raport::restore', ['filter' => 'role:admin']);
$routes->get('/raport/trash', 'Admin\raport::trash', ['filter' => 'role:admin']);
$routes->delete('/raport/delete2/(:any)', 'Admin\raport::delete2/$1', ['filter' => 'role:admin']);
$routes->delete('/raport/delete2', 'Admin\raport::delete2', ['filter' => 'role:admin']);

<li><a class="nav-link <?= $submenu == 'kriteria' ? 'active' : '' ?>" href="<?= site_url('kriteria') ?>">Kriteria Penilaian</a></li>


<div class="card">
    <div class="card-header row">
        <div class="col-10">
            <h4>Manage Raport</h4>
            <strong>Periode : </strong>
        </div>
        <div class="col-2">
            <a href="<?= site_url('raport/add_raport') ?>" class="btn btn-primary ml-5 mr-5"><i class="fas fa-print"></i> Print</a>
        </div>
    </div>
</div>