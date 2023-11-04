<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Manage > Manage Santriwati</h1>
    </div>

    <div class="section-body">
        <form class="row form-inline mr-auto mb-3">
            <div class="col-9 search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" style="width: 250px;">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
            </div>
            <div class="col-3">
                <button class="btn btn-light" style="background-color:#FF017E; color:white;">ADD SANTRI</button>
            </div>
        </form>
        <div class="card border position-relative" style="width: 14rem; border-radius:25px;">
            <div class="card list-group list-group-flush" style="border-radius: 25px 25px 0px 0px; text-align:center;">
                <img src="assets/img/logo/logo.png" class="card-img-top list-group-item" style="border-radius:50%; width:200px; display:block; margin:auto;" alt="Avatar">
                <div class="card-body list-group-item">
                    <p class="card-title mb-0" style="text-align:center;">AMALIA KHAIRUN NISA</p>
                    <p class="card-text mb-0" style="text-align:center;">S1 Pendidikan Matematika</p>
                    <p class="card-text" style="text-align:center;">30 Juz</p>
                    <a href=" #">Detail</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>