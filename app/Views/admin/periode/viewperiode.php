<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Periodes</h1>
        <div class="section-header-button">
            <a href="<?= site_url('periode/add_periode') ?>" class="btn btn-primary">Add Periode</a>
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
        <h2 class="section-title">Manage Periodes</h2>
        <p class="section-lead">
            You can manage all periodes, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h4>All Periodes</h4>
                        </div>
                        <div class="col-2">
                            <a href="<?= site_url('periode/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Periode</th>
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th>Operasi</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($periode as $periode) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $periode['periode']; ?></td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                    <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td><?= $periode['created_at']; ?></td>
                                            <td class="text-center" style="width:auto;">
                                                <div class="row text-center">
                                                    <a href="/periode/edit/<?= $periode['id_periode']; ?>" class="btn btn-warning btn-sm m-auto"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="/periode/delete/<?= $periode['id_periode']; ?>" method="post" class="d-inline" id="del-<?= $periode['id_periode']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a class="btn btn-danger btn-sm m-auto text-light" data-confirm="Hapus Data?|Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $periode['id_periode']; ?>)"><i class="fas fa-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?= $this->endSection() ?>