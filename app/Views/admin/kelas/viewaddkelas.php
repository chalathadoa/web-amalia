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
        <h1>Create New Class</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Class</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('manage_class') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <p style="line-height:5px; font-size:small;">*urutan kode: mapel, angkatan, tahun</p>
                                <p style="line-height:3px; font-size:small;">*contoh: pelajaran hadits untuk angkatan 02 tahun 2023 = HDS0223</p>
                                <input type="text" name="kode_kelas" class="form-control" placeholder="ex: HDS0223" value="<?= old('nama_kelas'); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" value="<?= old('nama_kelas'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Angkatan</label>
                                <input type="text" name="angkatan" class="form-control" placeholder="ex: 2" value="<?= old('tanggal_event'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Pengajar</label>
                                <select class="form-control" name="pengajar_name">
                                    <?php foreach ($guru as $guru) : ?>
                                        <option><?= $guru->nama_lengkap; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <select class="form-control" name="ruangan" selected>
                                    <?php foreach ($ruangan as $ruangan) : ?>
                                        <option><?= $ruangan['nama_ruangan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Periode</label>
                                <select class="form-control" name="periode">
                                    <?php foreach ($periode as $periode) : ?>
                                        <option><?= $periode['periode']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Class</button>
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