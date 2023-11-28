<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('raport/santri') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Raport</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Class</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('raport') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>