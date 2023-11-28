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
        <h1>Create New Report</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Report</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('pelanggaran') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Santriwati</label>
                                <select class="form-control" name="santri" required>
                                    <?php foreach ($santri as $santri) : ?>
                                        <option><?= $santri->nama_lengkap; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Pelanggaran</label>
                                <input type="text" name="jenis_pelanggaran" class="form-control" value="<?= old('jenis_pelanggaran'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pelanggaran</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= old('tanggal'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Hukuman</label>
                                <input type="text" name="hukuman" class="form-control" value="<?= old('hukuman'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="deskripsi_pelanggaran" class="form-control" value="<?= old('deskripsi_pelanggaran'); ?>" rows="50" style="height:100%;"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Report</button>
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