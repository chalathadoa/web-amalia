<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Laporan Pelanggaran</h1>
        <div class="section-header-button">
            <a href="<?= site_url('pelanggaran/add_pelanggaran') ?>" class="btn btn-primary">Add Laporan</a>
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
        <h2 class="section-title">Manage Laporan</h2>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-8">
                        <h4>Manage Laporan</h4>
                    </div>
                    <div class="col-1 mr-3">
                        <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Santri</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <li class="dropdown-title">Select Santri</li>
                                <li><a href="<?= site_url('pelanggaran') ?>" class="dropdown-item <?= $role == 'all' ? 'active' : '' ?>">All</a></li>
                                <?php foreach ($santri as $santri) : ?>
                                    <li><a href="<?= site_url('pelanggaran/santri/' . $santri->userid) ?>" class="dropdown-item <?= $role == $santri->nama_lengkap ? 'active' : '' ?>"><?= $santri->nama_lengkap; ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="<?= site_url('pelanggaran/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                        <td><?= $pelanggaran->nama_santriwati; ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="/pelanggaran/view/<?= $pelanggaran->id_pelanggaran; ?>">View</a>
                                            </div>
                                        </td>
                                        <td><?= $pelanggaran->jenis_pelanggaran; ?></td>
                                        <td><?= $pelanggaran->tanggal_pelanggaran; ?></td>
                                        <td><?= $pelanggaran->hukuman; ?></td>
                                        <td><?= $pelanggaran->created_at; ?></td>
                                        <td class="text-center" style="width:auto;">
                                            <div class="row text-center">
                                                <a href="pelanggaran/edit/<?= $pelanggaran->id_pelanggaran; ?>" class="btn btn-warning btn-sm m-auto"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/pelanggaran/delete/<?= $pelanggaran->id_pelanggaran; ?>" method="post" class="d-inline" id="del-<?= $pelanggaran->id_pelanggaran; ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a class="btn btn-danger btn-sm m-auto text-light" data-confirm="Hapus Data?|Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $pelanggaran->id_pelanggaran; ?>)"><i class="fas fa-trash"></i></a>
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
</section>
<?= $this->endSection() ?>