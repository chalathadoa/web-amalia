<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Kriteria Penilaian</h1>
        <div class="section-header-button">
            <a href="<?= site_url('kriteria/add_kriteria') ?>" class="btn btn-primary">Add kriteria</a>
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
        <h2 class="section-title">Manage Kriteria Penilaian</h2>
        <p class="section-lead">
            You can manage all kriteria, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h4>All Kriterias</h4>
                        </div>
                        <div class="col-2">
                            <a href="<?= site_url('kriteria/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>kriteria</th>
                                        <th>KKM</th>
                                        <th>Created At</th>
                                        <th>Operasi</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kriteria as $kriteria) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $kriteria['kriteria']; ?></td>
                                            <td><?= $kriteria['kkm']; ?></td>
                                            <td><?= $kriteria['created_at']; ?></td>
                                            <td class="text-center" style="width:auto;">
                                                <div class="row text-center">
                                                    <a href="/kriteria/edit/<?= $kriteria['id_kriteria']; ?>" class="btn btn-warning btn-sm m-auto"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="/kriteria/delete/<?= $kriteria['id_kriteria']; ?>" method="post" class="d-inline" id="del-<?= $kriteria['id_kriteria']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a class="btn btn-danger btn-sm m-auto text-light" data-confirm="Hapus Data?|Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $kriteria['id_kriteria']; ?>)"><i class="fas fa-trash"></i></a>
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