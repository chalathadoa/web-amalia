<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('kriteria') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h4>Recycle Bin Kriteria</h4>
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
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <h4 class="col-9">All Trash Kriteria</h4>
                        <div class="col-3">
                            <a href="<?= site_url('kriteria/restore') ?>" class="btn btn-icon btn-primary mr-2">Restore All</a>
                            <form action="/kriterias/delete2?>" method="post" class="d-inline" id="delAll">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <a class="btn btn-danger btn-sm text-white" data-confirm="Hapus Data?|Apakah anda yakin menghapus data secara permanen?" data-confirm-yes="delAll()">Delete All</a>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped" style="background-color: #edede9;">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Kriteria</th>
                                        <th>KKM</th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kriteria as $kriteria) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $kriteria['kriteria']; ?></td>
                                            <td><?= $kriteria['kkm']; ?></td>
                                            <td><?= $kriteria['created_at'] ?></td>
                                            <td class="text-center mt-4" style="display: flex;">
                                                <div>
                                                    <a href="/kriteria/restore/<?= $kriteria['id_kriteria']; ?>" class="btn btn-info btn-sm mr-3" style="width: fit-content;">Restore</a>
                                                </div>
                                                <form action="/kriteria/delete2/<?= $kriteria['id_kriteria']; ?>" method="post" class="d-inline" id="del-<?= $kriteria['id_kriteria']; ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a class="btn btn-danger btn-sm text-white" data-confirm="Hapus Data?|Apakah anda yakin menghapus data secara PERMANEN?" data-confirm-yes="submitDel(<?= $kriteria['id_kriteria']; ?>)">Delete Permanently</a>
                                                </form>
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