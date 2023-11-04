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
            <a href="<?= site_url('manageevents/addevent') ?>" class="btn btn-primary">Add User</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Users</a></div>
            <div class="breadcrumb-item">All Posts</div>
        </div>
    </div>

    <div class="section-body">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Manage Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Status</th>
                                    <th>Prodi</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>No. HP</th>
                                    <th>Operasi</th>
                                </tr>

                                <?php foreach ($query as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->id_user ?></td>
                                        <td><?= $value->nama_user ?></td>
                                        <td>
                                            <div class="badge badge-danger">Not Active</div>
                                        </td>
                                        <td><?= $value->prodi ?></td>
                                        <td><?= $value->email_user ?></td>
                                        <td>***</td>
                                        <td><?= $value->no_hp ?></td>
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