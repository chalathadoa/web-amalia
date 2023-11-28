<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Santriwati</h1>
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
        <h2 class="section-title">All Santriwati</h2>
        <p class="section-lead">
            There are active and unactive santri.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-8">
                            <h4>All Santriwati</h4>
                        </div>
                        <div class="col-3">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-1">
                            <a href="<?= site_url('manage_santriwati/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
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
                                            <td><?= $value->username; ?></td>
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
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>