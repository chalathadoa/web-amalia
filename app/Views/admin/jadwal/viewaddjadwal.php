<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('jadwal') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Jadwal</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Jadwal</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('jadwal') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Periode</label>
                                <select class="form-control" name="periode" value="<?= old('periode'); ?>">
                                    <?php foreach ($periode as $periode) : ?>
                                        <option><?= $periode['periode']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hari</label>
                                <select class="form-control" name="hari" value="<?= old('hari'); ?>">
                                    <?php foreach ($hari as $hari) : ?>
                                        <option selected><?= $hari['nama_hari']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="text" name="waktu" class="form-control" placeholder="ex: 18.00" value="<?= old('waktu'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas" value="<?= old('nama_kelas'); ?>">
                                    <?php foreach ($class as $class) : ?>
                                        <option><?= $class['nama_kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Angkatan</label>
                                <input type="text" name="angkatan" class="form-control" placeholder="ex: 2" value="<?= old('tanggal_event'); ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Jadwal</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>