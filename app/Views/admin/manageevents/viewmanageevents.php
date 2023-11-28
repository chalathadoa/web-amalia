<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage Events</h1>
        <div class="section-header-button">
            <a href="<?= site_url('manage_events/add_event') ?>" class="btn btn-primary">Add Event</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Events</a></div>
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
        <h2 class="section-title">Manage Your Events</h2>
        <p class="section-lead">
            You can manage all events, such as editing, deleting and more.
        </p>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h4>All Events</h4>
                        </div>
                        <div class="col-2">
                            <a href="<?= site_url('manage_events/trash') ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i> Recycle Bin</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Event</th>
                                        <th>Title</th>
                                        <th>Create By</th>
                                        <th>Created At</th>
                                        <th>Event Date</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($events as $event) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $event['id_event']; ?></td>
                                            <td><?= $event['nama_event']; ?>
                                                <div class="table-links">
                                                    <a href="/manage_events/view/<?= $event['id_event']; ?>">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="/manage_events/edit/<?= $event['id_event']; ?>">Edit</a>
                                                    <form action="/manage_events/delete/<?= $event['id_event']; ?>" method="post" class="d-inline" id="del-<?= $event['id_event']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <div class="bullet"></div>
                                                        <a class="text-danger" data-confirm="Hapus Data?|Apakah anda yakin menghapus data?" data-confirm-yes="submitDel(<?= $event['id_event']; ?>)">Trash</a>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                    <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td><?= $event['created_at']; ?></td>
                                            <td><?= $event['tanggal_event']; ?></td>
                                            <td><?= $event['lokasi_event']; ?></td>
                                            <td>
                                                <div class="badge badge-primary">Done</div>
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