<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Users</h1>
        <div class="section-header-button">
            <a href="<?= site_url('manage_users/add_user') ?>" class="btn btn-primary">Add User</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Users</a></div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-primary" role="alert">
            <div class="alert-body">
                <b>Success! </b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <?= session()->getFlashdata('hapus'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="section-body">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-10">
                        <h4>Manage Users</h4>
                    </div>
                    <div class="col-1">
                        <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Role</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <li class="dropdown-title">Select Role</li>
                                <li><a href="<?= site_url('manage_users/admin') ?>" class="dropdown-item <?= $role == 'admin' ? 'active' : '' ?>">Admin</a></li>
                                <li><a href="<?= site_url('manage_users/guru') ?>" class="dropdown-item <?= $role == 'guru' ? 'active' : '' ?>">Guru</a></li>
                                <li><a href="<?= site_url('manage_users/santri') ?>" class="dropdown-item <?= $role == 'santri' ? 'active' : '' ?>">Santriwati</a></li>
                                <li><a href="<?= site_url('manage_users/wali') ?>" class="dropdown-item <?= $role == 'wali' ? 'active' : '' ?>">Wali Santri</a></li>
                                <li><a href="<?= site_url('manage_users') ?>" class="dropdown-item <?= $role == 'all' ? 'active' : '' ?>">All Users</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-1">
                        <a href="<?= site_url('manage_santriwati/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Operasi</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($users as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $value->userid; ?></td>
                                        <td><?= $value->nama_lengkap; ?></td>
                                        <td>
                                            <div class="badge badge-danger">Not Active</div>
                                        </td>
                                        <td><?= $value->name; ?></td>
                                        <td><?= $value->email; ?></td>
                                        <td><?= $value->no_hp; ?></td>
                                        <td class="text-center" style="width:auto;">
                                            <div class="row text-center">
                                                <a href="" class="btn btn-warning btn-sm m-auto"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="" class="btn btn-danger btn-sm m-auto"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>