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
        <h1>Laporan Pelanggaran</h1>
        <div class="section-header-button">
            <a href="<?= site_url('pelanggaran/print') ?>" class="btn btn-primary">Print Laporan</a>
        </div>
    </div>
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="invoice-title">
                    <h2>Laporan Pelanggaran</h2>
                    <strong style="font-size:20px;">Nomor #<?= $pelanggaran['id_pelanggaran']; ?></strong>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Tanggal :</strong>
                        <?= $tanggal; ?>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <strong>Nomor Laporan :</strong>
                        <?= $pelanggaran['id_pelanggaran']; ?>
                    </div>
                </div><br>
                <div class="row" style="line-height:2;">
                    <strong class="col-4">Nama Santriwati </strong>
                    <p class="col">:</p>
                    <p class="col-7"> <?= $pelanggaran['nama_santriwati']; ?>
                    </p>
                </div>
                <div class="row" style="line-height:2;">
                    <strong class="col-4">Jenis Pelanggaran </strong>
                    <p class="col">:</p>
                    <p class="col-7"> <?= $pelanggaran['jenis_pelanggaran']; ?>
                    </p>
                </div>
                <div class="row" style="line-height:2;">
                    <strong class="col-4">Hukuman </strong>
                    <p class="col-1">:</p>
                    <p class="col-7"> <?= $pelanggaran['hukuman']; ?>
                    </p>
                </div>
                <div class="row" style="line-height:2;">
                    <strong class="col-4">Keterangan </strong>
                    <p class="col-1">:</p>
                    <p class="col-7 text-justify"><?= $pelanggaran['deskripsi_pelanggaran']; ?>
                    </p>
                </div><br><br>
                <div class="row">
                    <div class="col"></div>
                    <strong class="col-3 text-md-right">Kepala Asrama Amalia<br>House of Muslimah</strong>
                </div><br><br><br><br>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <div class="divider py-0  bg-dark" style="width:100%; height:3px;"></div>
                    </div>
                </div><br><br>
            </div>
        </div>
</section>
<?= $this->endSection() ?>