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
        <h1>Edit Kriteria Penilaian</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Kriteria Penilaian</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/kriteria/update/<?= $kriteria['id_kriteria']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kriteria</label>
                                <input type="text" name="kriteria" class="form-control" value="<?= $kriteria['kriteria']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>KKM</label>
                                <input type="text" name="kkm" class="form-control" value="<?= $kriteria['kkm']; ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" value="Update">Update Kriteria</button>
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