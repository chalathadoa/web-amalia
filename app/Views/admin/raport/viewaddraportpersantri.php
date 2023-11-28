<?

/**
 * @var CodeIgniter\View\View $this
 */ ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('raport/santri/' . $santriid) ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Raport</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create New Raport</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= site_url('raport/' . $santriid) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Santri</label>
                                <input type="text" name="nama_santri" class="form-control" placeholder="ex: HDS0223" value="<?= $santriname; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Periode</label>
                                <select class="form-control" name="periode">
                                    <?php foreach ($periode as $periode) : ?>
                                        <option><?= $periode['periode']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="card-body">
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
                                                <td><input type="number" class="form-control" name="tahfidz" id="tahfidz" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_tahfidz" placeholder="contoh: A"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Shalat Berjama'ah</td>
                                                <td>225</td>
                                                <td><input type="number" class="form-control" name="jamaah" id="jamaah" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_jamaah" placeholder="contoh: A"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kajian</td>
                                                <td>67</td>
                                                <td><input type="number" class="form-control" name="kajian" id="kajian" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_kajian" placeholder="contoh: A"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Akademis</td>
                                                <td>40</td>
                                                <td><input type="number" class="form-control" name="akademis" id="akademis" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_akademis" placeholder="contoh: A"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kebersihan</td>
                                                <td>41</td>
                                                <td><input type="number" class="form-control" name="kebersihan" id="kebersihan" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_kebersihan" placeholder="contoh: A"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Sosial</td>
                                                <td>20</td>
                                                <td><input type="number" class="form-control" name="sosial" id="sosial" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_sosial" placeholder="contoh: A"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Perilaku dan Prestasi</td>
                                                <td>26</td>
                                                <td><input type="number" class="form-control" name="prestasi" id="prestasi" value="0" onkeyup="sum();"></td>
                                                <td><input type="text" class="form-control" name="predikat_prestasi" placeholder="contoh: A"></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Total Nilai</td>
                                                <td>1109</td>
                                                <td><input type="number" name="total_nilai" class="form-control" id="totalnilai" value="0" readonly></td>
                                                <td>Pencapaian Nilai Dalam Lima Bulan</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8"></div>
                                <div class="col-2"> <button type="reset" class="col btn btn-danger">Reset</button>
                                </div>
                                <div class="col-2"> <button type="submit" class="col btn btn-primary">Simpan Raport</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // total nilai raport

        function sum() {
            var tahfidz = parseInt(document.getElementById('tahfidz').value);
            var jamaah = parseInt(document.getElementById('jamaah').value);
            var kajian = parseInt(document.getElementById('kajian').value);
            var akademis = parseInt(document.getElementById('akademis').value);
            var kebersihan = parseInt(document.getElementById('kebersihan').value);
            var sosial = parseInt(document.getElementById('sosial').value);
            var prestasi = parseInt(document.getElementById('prestasi').value);
            var total = tahfidz + jamaah + kajian + akademis + kebersihan + sosial + prestasi;

            if (!isNaN(total)) {
                document.getElementById('totalnilai').value = total;
            }
        }
    </script>
</section>
<?= $this->endSection() ?>