<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Jama'ah</h1>
    </div>

    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kelola Jama'ah</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-9 mb-4">
                            <label class="form-label row col-md-3">Periode :</label>
                            <div class="col-md-4 row">
                                <select class="form-control selectric" tabindex="-1">
                                    <option>Ganjil 2023/2024</option>
                                    <option>Genap 2024/2025</option>
                                    <option>Ganjil 2024/2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-light" style="background-color:#FF017E; color:white;">BUKA PRESENSI</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>No.</th>
                                    <th>User ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Subuh</th>
                                    <th>Dzhuhur</th>
                                    <th>Ashar</th>
                                    <th>Maghrib</th>
                                    <th>Isya'</th>
                                    <th>Detail</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>19010001</td>
                                    <td>Amalia Khairun Nisa'</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>19010001</td>
                                    <td>Amalia Khairun Nisa'</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>19010001</td>
                                    <td>Amalia Khairun Nisa'</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>