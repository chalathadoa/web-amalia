<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pelanggaran') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h4>Recycle Bin Report Pelanggaran</h4>
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
                        <h4 class="col-9">All Trash Report Pelanggaran</h4>
                        <div class="col-3">
                            <a href="<?= site_url('pelanggaran/restore') ?>" class="btn btn-icon btn-primary mr-2">Restore All</a>
                            <form action="/pelanggaran/delete2?>" method="post" class="d-inline" id="delAll">
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
                                        <th>Nama Santriwati</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Tanggal</th>
                                        <th>Hukuman</th>
                                        <th>Created_at</th>
                                        <th>Operasi</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelanggaran as $pelanggaran) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $pelanggaran['nama_santriwati']; ?>
                                                <div class="table-links">
                                                    <div class="bullet"></div>
                                                    <a href="/pelanggaran/view/<?= $pelanggaran['id_pelanggaran']; ?>">View</a>
                                                </div>
                                            </td>
                                            <td><?= $pelanggaran['jenis_pelanggaran']; ?></td>
                                            <td><?= $pelanggaran['tanggal_pelanggaran']; ?></td>
                                            <td><?= $pelanggaran['hukuman']; ?></td>
                                            <td><?= $pelanggaran['created_at']; ?></td>
                                            <td class="text-center mt-4" style="display: flex;">
                                                <div>
                                                    <a href="/pelanggaran/restore/<?= $pelanggaran['id_pelanggaran']; ?>" class="btn btn-info btn-sm mr-3" style="width: fit-content;">Restore</a>
                                                </div>
                                                <form action="/pelanggaran/delete2/<?= $pelanggaran['id_pelanggaran']; ?>" method="post" class="d-inline" id="del-<?= $pelanggaran['id_pelanggaran']; ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a class="btn btn-danger btn-sm text-white" data-confirm="Hapus Data?|Apakah anda yakin menghapus data secara PERMANEN?" data-confirm-yes="submitDel(<?= $pelanggaran['id_pelanggaran']; ?>)">Delete Permanently</a>
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