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
        <h1>Add new User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Users</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Add New User</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('manage_users') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= old('nama_lengkap'); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= old('email'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="role">
                                    <option>admin</option>
                                    <option>santriwati</option>
                                    <option>guru</option>
                                    <option>wali santri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <input type="text" name="prodi" class="form-control" placeholder="kosongkan jika tidak ada">
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="no_hp" class="form-control phone-number" value="<?= old('no_hp'); ?>" placeholder="ex: 08123456789">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add User</button>
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