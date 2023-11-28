<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Raport</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Manage Raport</h2>
        <p class="section-lead">
            You can manage all raport, such as editing, deleting and more.
        </p>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-10">
                        <h4>Manage Raport</h4>
                    </div>
                    <div class="col-2">
                        <a href="<?= site_url('raport/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Santri</th>
                                    <th class="text-center">Raport</th>
                                </tr>
                                <?php $i = 1; ?>
                                <?php foreach ($santri as $santri) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $santri->nama_lengkap; ?></td>
                                        <td class="text-center" style="width:auto;">
                                            <a href="raport/santri/<?= $santri->userid; ?>" class="btn btn-primary btn-sm m-auto"><i class="fas fa-book"></i> Raport</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>