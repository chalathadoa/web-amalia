<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('raport/santri/' . $raport['id_santri']) ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Print Raport</h1>
        <div class="section-header-button">
            <button onClick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print Raport</button>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-2">Nama Santri</label>
                            <label class="col-1">:</label>
                            <label class="col"><?= $raport['nama_santri']; ?></label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-2">Periode</label>
                            <label class="col-1">:</label>
                            <label class="col"><?= $raport['periode']; ?></label>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aspek Penilaian</th>
                                        <th>KKM</th>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Tahfidz</td>
                                        <td>742</td>
                                        <td><?= $raport['tahfidz']; ?></td>
                                        <td><?= $raport['predikat_tahfidz']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Shalat Berjama'ah</td>
                                        <td>225</td>
                                        <td><?= $raport['jamaah']; ?></td>
                                        <td><?= $raport['predikat_jamaah']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kajian</td>
                                        <td>67</td>
                                        <td><?= $raport['kajian']; ?></td>
                                        <td><?= $raport['predikat_kajian']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Akademis</td>
                                        <td>40</td>
                                        <td><?= $raport['akademis']; ?></td>
                                        <td><?= $raport['predikat_akademis']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kebersihan</td>
                                        <td>41</td>
                                        <td><?= $raport['kebersihan']; ?></td>
                                        <td><?= $raport['predikat_kebersihan']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sosial</td>
                                        <td>20</td>
                                        <td><?= $raport['sosial']; ?></td>
                                        <td><?= $raport['predikat_sosial']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Perilaku dan Prestasi</td>
                                        <td>26</td>
                                        <td><?= $raport['prestasi']; ?></td>
                                        <td><?= $raport['predikat_prestasi']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Total Nilai</td>
                                        <td>1109</td>
                                        <td><?= $raport['total_nilai']; ?></td>
                                        <td>Pencapaian Nilai Dalam Lima Bulan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col">
                                <strong class="col-3 text-md-left">Wali Santriwati</strong>
                                <br><br><br><br><br><br>
                                <div class="divider py-0  bg-dark" style="width:45%; height:1px;">
                                </div>
                            </div>
                            <div class="col-3"></div>
                            <div class="col ml-4">
                                <div class="col row">
                                    <strong class="col text-center justify">Kepala Asrama Amalia<br>House of Muslimah</strong>
                                </div>
                                <br><br><br><br><br>
                                <div class="divider py-0  bg-dark ml-5" style="width:60%; height:1px;">
                                </div>
                            </div>
                        </div><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>