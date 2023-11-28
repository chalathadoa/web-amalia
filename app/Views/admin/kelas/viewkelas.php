<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Classes</h1>
        <div class="section-header-button">
            <a href="<?= site_url('manage_class/add_class') ?>" class="btn btn-primary">Add Class</a>
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
        <h2 class="section-title">Manage Classes</h2>
        <p class="section-lead">
            You can manage all class, such as editing, deleting and more.
        </p>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-8">
                        <h4>Manage Classes</h4>
                    </div>
                    <div class="col-1 m-sm-4 mr-3">
                        <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Teacher</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <li class="dropdown-title">Select Teacher</li>
                                <li><a href="<?= site_url('manage_class') ?>" class="dropdown-item <?= $role == 'all' ? 'active' : '' ?>">All</a></li>
                                <?php foreach ($guru as $guru) : ?>
                                    <li><a href="<?= site_url('manage_class/guru/' . $guru->userid) ?>" class="dropdown-item <?= $role == $guru->nama_lengkap ? 'active' : '' ?>"><?= $guru->nama_lengkap; ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="<?= site_url('manage_class/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
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
                                        <td><?= $class->kode_kelas; ?></td>
                                        <td><?= $class->nama_kelas; ?></td>
                                        <td><?= $class->angkatan; ?></td>
                                        <td><?= $class->pengajar; ?></td>
                                        <td><?= $class->ruangan; ?></td>
                                        <td><?= $class->periode; ?></td>
                                        <td><?= $class->created_at; ?></td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                            </a>
                                        </td>
                                        <td class="text-center" style="width:auto;">
                                            <div class="row text-center">
                                                <a href="manage_class/edit/<?= $class->id_kelas; ?>" class="btn btn-warning btn-sm m-auto"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/manage_class/delete/<?= $class->id_kelas; ?>" method="post" class="d-inline" id="del-<?= $class->id_kelas; ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a class="btn btn-danger btn-sm m-auto text-light" data-confirm="Hapus Data?|Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $class->id_kelas; ?>)"><i class="fas fa-trash"></i></a>
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