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
                        <h4>24</h4>
                    </div>
                    <div>
                        <p>Jumlah Asatidz</p>
                    </div>
                    <button class="btn" style="background-color:#FFB3C1">Preview</button>
                </div>
            </div>
            <div class="col-sm-4 me-1" style="width:auto">
                <div class="card card-statistic-2 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div>
                        <h4>24</h4>
                    </div>
                    <div>
                        <p>Jumlah Asatidz</p>
                    </div>
                    <button class="btn" style="background-color:#FFB3C1">Preview</button>
                </div>
            </div>
            <div class="col-sm-4" style="width:auto">
                <div class="card card-statistic-2 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div>
                        <h4>24</h4>
                    </div>
                    <div>
                        <p>Jumlah Asatidz</p>
                    </div>
                    <button class="btn" style="background-color:#FFB3C1">Preview</button>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>