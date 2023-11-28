<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('periode') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Periode</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Periode</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/periode/update/<?= $periode['id_periode']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Periode</label>
                                <input type="text" name="periode" class="form-control" value="<?= $periode['periode']; ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" value="Update">Update Periode</button>
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