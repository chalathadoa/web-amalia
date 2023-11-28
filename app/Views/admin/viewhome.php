<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Home | Amalia House of Muslimah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-sm-4 me-1" style="width:auto">
                <div class="card card-statistic-2 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div>
                        <h4><?= $guru ?></h4>
                    </div>
                    <div>
                        <p>Jumlah Asatidz</p>
                    </div>
                    <a href="<?= site_url('manage_users/guru'); ?>" class="btn btn-primary">Preview</a>
                </div>
            </div>
            <div class="col-sm-4 me-1" style="width:auto">
                <div class="card card-statistic-2 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div>
                        <h4><?= $santri ?></h4>
                    </div>
                    <div>
                        <p>Jumlah Santriwati</p>
                    </div>
                    <a href="<?= site_url('manage_users/santri'); ?>" class="btn btn-primary">Preview</a>
                </div>
            </div>
            <div class="col-sm-4" style="width:auto">
                <div class="card card-statistic-2 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div>
                        <h4>24</h4>
                    </div>
                    <div>
                        <p>Santri Terbaik</p>
                    </div>
                    <a href="<?= site_url('sterbaik'); ?>" class="btn btn-primary">Preview</a>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>