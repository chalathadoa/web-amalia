<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('manage_events') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Events</a></div>
            <div class="breadcrumb-item">All Events</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title"><?= $event['nama_event'] ?></h2>
    </div>
    <div class="card mt-3" style="width:100%;">
        <img src="/assets/img/uploaded/<?= $event['banner_event']; ?>" style="width: fit-content; display: block;" class="img-fluid m-auto p-2" alt="Responsive image">
    </div>
    <div class="card">
        <div class="card-header">
            <div class="media mt-2">
                <img src="/assets/img/logo/logo.png" width="40" style="display: block;" class="mr-3 rounded-circle" alt="">
                <div class="media-body text-left">
                    <b class="d-sm-none d-lg-inline-block" style="display: block; margin:auto; font-size:14px;">Amalia Khairun Nisa'</b>
                    <p style="font-size:14px; line-height:80%;"><?= $tanggal; ?></p>
                </div>
            </div>
        </div>
        <div class="card-body" style="text-align:justify;">
            <p>
                <?= $event['deskripsi_event'] ?>
            </p>
        </div>
    </div>

</section>
<?= $this->endSection() ?>