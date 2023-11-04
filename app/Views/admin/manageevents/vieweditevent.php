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
        <h1>Edit Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Events</a></div>
            <div class="breadcrumb-item">All Events</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Event</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/manage_events/update/<?= $events['id_event']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <input type="hidden" name="slug" value="<?= $events['slug']; ?>">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_event" class="form-control <?= ($validation->hasError('nama_event')) ? 'is_invalid' : ''; ?>" value="<?= $events['nama_event']; ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_event'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal_event" class="form-control <?= ($validation->hasError('tanggal_event')) ? 'is_invalid' : ''; ?>" value="<?= $events['tanggal_event']; ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal_event'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Banner Kegiatan</label>
                                <p style="line-height:5px; font-size:small;">*silakan pakai format .jpg/.jpeg/.png</p>
                                <p style="line-height:3px; font-size:small;">*ukuran maksimum 1 MB</p>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="banner_event" id="image-label">Choose File</label>
                                        <input type="file" class="form-file-input <?= ($validation->hasError('banner_event')) ? 'is_invalid' : ''; ?>" name="banner_event" id="banner_event" onchange="getImagePreview(event)">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('banner_event'); ?>
                                        </div>
                                    </div>
                                    <div class="card col-3 m-sm-1" style="width:fit-content; outline: 1.5px solid #9a8c98;">
                                        <div class="card m-1" id="preview" name="preview" style="background-image:none;  background-size: cover; background-repeat: no-repeat; background-position: center center; height:230px;">
                                            <img src="/assets/img/uploaded/<?php echo $events['banner_event']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <form>
                                        <div class="form-group">
                                            <textarea class="summernote form-control <?= ($validation->hasError('deskripsi_event')) ? 'is_invalid' : ''; ?>" name="deskripsi_event" style="display: none;" required> <?php echo $events['deskripsi_event']; ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('deskripsi_event'); ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Kegiatan</label>
                                    <input type="text" name="lokasi_event" class="form-control <?= ($validation->hasError('lokasi_event')) ? 'is_invalid' : ''; ?>" value="<?= $events['lokasi_event']; ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasi_event'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" value="Update">Update Event</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            imagediv.appendChild(newimg);
        }
    </script>
</section>
<?= $this->endSection() ?>