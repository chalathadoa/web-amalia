<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Jadwal</h1>
        <div class="section-header-button">
            <a href="<?= site_url('jadwal/add_jadwal') ?>" class="btn btn-primary">Add Jadwal</a>
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
        <h2 class="section-title">Manage Jadwal</h2>
        <p class="section-lead">
            You can manage all schedule, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-8">
                            <h4>All Jadwal</h4>
                        </div>
                        <div class="col-1 m-sm-4 mr-3">
                            <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Periode</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <li class="dropdown-title">Select Periode</li>
                                    <li><a href="<?= site_url('jadwal') ?>" class="dropdown-item <?= $pd == 'all' ? 'active' : '' ?>">All</a></li>
                                    <?php foreach ($periode as $periode) : ?>
                                        <li><a href="<?= site_url('jadwal/periode/' . $periode['id_periode']) ?>" class="dropdown-item <?= $pd == $periode['periode'] ? 'active' : '' ?>"><?= $periode['periode']; ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="<?= site_url('jadwal/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
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
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Kelas</th>
                                        <th>Angk</th>
                                        <th>Created_at</th>
                                        <th>Operasi</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($jadwal as $jadwal) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $jadwal->periode; ?></td>
                                            <td><?= $jadwal->hari; ?></td>
                                            <td><?= $jadwal->waktu; ?></td>
                                            <td><?= $jadwal->kelas; ?></td>
                                            <td><?= $jadwal->angkatan; ?></td>
                                            <td><?= $jadwal->created_at; ?></td>
                                            <td class="text-center" style="width:auto;">
                                                <div class="row text-center">
                                                    <a href="/jadwal/edit/<?= $jadwal->id_jadwal; ?>" class="btn btn-warning btn-sm m-auto"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="/jadwal/delete/<?= $jadwal->id_jadwal; ?>" method="post" class="d-inline" id="del-<?= $jadwal->id_jadwal; ?>">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a class="btn btn-danger btn-sm m-auto text-light" data-confirm="Hapus Data?|Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $jadwal->id_jadwal; ?>)"><i class="fas fa-trash"></i></a>
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