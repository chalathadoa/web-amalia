<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('manage_class') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h4>Recycle Bin Kelas</h4>
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
                        <h4 class="col-9">All Trash Kelass</h4>
                        <div class="col-3">
                            <a href="<?= site_url('manage_class/restore') ?>" class="btn btn-icon btn-primary mr-2">Restore All</a>
                            <form action="/manage_class/delete2?>" method="post" class="d-inline" id="delAll">
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
                                        <th>ID</th>
                                        <th>Kode Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Angk</th>
                                        <th>Guru</th>
                                        <th>Ruangan</th>
                                        <th>Periode</th>
                                        <th>Created At</th>
                                        <th>Created By</th>
                                        <th>Operasi</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($class as $class) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $class['id_kelas']; ?></td>
                                            <td><?= $class['kode_kelas']; ?></td>
                                            <td><?= $class['nama_kelas']; ?></td>
                                            <td><?= $class['angkatan']; ?></td>
                                            <td><?= $class['pengajar']; ?></td>
                                            <td><?= $class['ruangan']; ?></td>
                                            <td><?= $class['periode']; ?></td>
                                            <td><?= $class['created_at']; ?></td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                    <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td class="text-center mt-4" style="display: flex;">
                                                <div>
                                                    <a href="/manage_class/restore/<?= $class['id_kelas']; ?>" class="btn btn-info btn-sm mr-3" style="width: fit-content;">Restore</a>
                                                </div>
                                                <form action="/manage_class/delete2/<?= $class['id_kelas']; ?>" method="post" class="d-inline" id="del-<?= $class['id_kelas']; ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a class="btn btn-danger btn-sm text-white" data-confirm="Hapus Data?|Apakah anda yakin menghapus data secara PERMANEN?" data-confirm-yes="submitDel(<?= $class['id_kelas']; ?>)">Delete Permanently</a>
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