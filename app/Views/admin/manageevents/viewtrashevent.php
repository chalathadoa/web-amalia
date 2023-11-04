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
        <h4>Recycle Bin Events</h4>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Events</a></div>
            <div class="breadcrumb-item">All Events</div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-primary" role="alert">
            <div class="alert-body">
                <b>Success! </b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <?= session()->getFlashdata('hapus'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <h4 class="col-9">All Trash Events</h4>
                        <div class="col-3">
                            <a href="<?= site_url('manage_events/restore') ?>" class="btn btn-icon btn-primary mr-2">Restore All</a>
                            <form action="/manage_events/delete2?>" method="post" class="d-inline" id="delAll">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <a class="btn btn-danger btn-sm text-white" data-confirm="Hapus Data?|Apakah anda yakin menghapus data secara permanen?" data-confirm-yes="delAll()">Delete All</a>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped" style="background-color: #edede9;">
                                <tbody>
                                    <tr>
                                        <th class="text-center pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>ID Event</th>
                                        <th>Title</th>
                                        <th>Create By</th>
                                        <th>Created At</th>
                                        <th>Event Date</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php foreach ($events as $event) : ?>
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><?= $event['id_event']; ?></td>
                                            <td><?= $event['nama_event']; ?>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                    <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td><?= $event['created_at'] ?></td>
                                            <td><?= $event['tanggal_event']; ?></td>
                                            <td><?= $event['lokasi_event']; ?></td>
                                            <td class="text-center mt-4" style="display: flex;">
                                                <div>
                                                    <a href="/manage_events/restore/<?= $event['id_event']; ?>" class="btn btn-info btn-sm mr-3" style="width: fit-content;">Restore</a>
                                                </div>
                                                <form action="/manage_events/delete2/<?= $event['id_event']; ?>" method="post" class="d-inline" id="del-<?= $event['id_event']; ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a class="btn btn-danger btn-sm text-white" data-confirm="Hapus Data?|Apakah anda yakin menghapus data secara permanen?" data-confirm-yes="submitDel(<?= $event['id_event']; ?>)">Delete Permanently</a>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>