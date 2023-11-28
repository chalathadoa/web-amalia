<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('raport') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1><?= $santri->nama_lengkap; ?></h1>
        <div class="section-header-button">
            <a href="<?= site_url('raport/add_raport/' . $santri->id) ?>" class="btn btn-primary ml-5 mr-5">Add Raport</a>
            <a href="<?= site_url('raport/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
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
        <h2 class="section-title"><?= $santri->nama_lengkap; ?></h2>
        <p class="section-lead">
            All <?= $santri->nama_lengkap; ?>'s raports.
        </p>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-10">
                        <h4>Manage Raport</h4>
                    </div>
                    <div class="col-2">
                        <a href="<?= site_url('raport/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Santri</th>
                                    <th>Periode</th>
                                    <th>Tahfidz</th>
                                    <th>Jama'ah</th>
                                    <th>Kajian</th>
                                    <th>Akademis</th>
                                    <th>Kebersihan</th>
                                    <th>Sosial</th>
                                    <th>Prestasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <!-- where periode = $periode -->
                                <?php foreach ($raport as $raport) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $santri->nama_lengkap; ?></td>
                                        <td><?= $raport->periode; ?></td>
                                        <td><?= $raport->tahfidz; ?></td>
                                        <td><?= $raport->jamaah; ?> (<?= $raport->predikat_jamaah; ?>)</td>
                                        <td><?= $raport->kajian; ?> (<?= $raport->predikat_kajian; ?>)</td>
                                        <td><?= $raport->akademis; ?> (<?= $raport->predikat_akademis; ?>)</td>
                                        <td><?= $raport->kebersihan; ?> (<?= $raport->predikat_kebersihan; ?>)</td>
                                        <td><?= $raport->sosial; ?> (<?= $raport->predikat_sosial; ?>)</td>
                                        <td><?= $raport->prestasi; ?> (<?= $raport->predikat_prestasi; ?>)</td>
                                        <td class="text-center" style="width:auto;">
                                            <a href="print/<?= $raport->id_raport; ?>" class="btn btn-primary btn-sm m-auto"><i class="fas fa-book"></i> Print</a>
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