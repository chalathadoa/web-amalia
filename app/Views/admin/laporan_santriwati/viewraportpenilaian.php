<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Laporan Santriwati > Raport Penilaian</h1>
    </div>

    <div class="section-body">
        <form class="row form-inline mr-auto mb-3">
            <div class="col-9 search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" style="width: 250px;">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
            </div>
            <div class="col-3">
                <button class="btn btn-light" style="background-color:#FF017E; color:white;">ADD PENILAIAN</button>
            </div>
        </form>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body p-2 mb-2" style="border-radius: 25px 25px 0px 0px;">
                    <div class="row">
                        <div class="col-8">
                            <p>REKAP HASIL PENILAIAN</p>
                            <p style="line-height: 2px;">Nama : Amalia Khairun Nisa'</p>
                        </div>
                        <div class="col-4">
                            <p>Periode : Ganjil 2023/2024</p>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
                <div class="card-body" style="border-radius: 0px 0px 25px 25px;">
                    <div class=" table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>NO.</th>
                                    <th>KRITERIA</th>
                                    <th>KKM</th>
                                    <th>PREDIKAT</th>
                                    <th>AKSI</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Tahfidz</td>
                                    <td>99</td>
                                    <td>B</td>
                                    <td class="text-center" style="width:auto">
                                        <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Tahfidz</td>
                                    <td>99</td>
                                    <td>B</td>
                                    <td class="text-center" style="width:auto">
                                        <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Tahfidz</td>
                                    <td>99</td>
                                    <td>B</td>
                                    <td class="text-center" style="width:auto">
                                        <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
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