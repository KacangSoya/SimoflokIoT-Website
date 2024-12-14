<div class="container-fluid">
    <!-- Content Row -->
    <h1>Detail Data Keseluruhan</h1>
    <!-- Content Row -->
    <div class="row">
        <div class="w-100 px-2">
            <!-- <div class="card shadow mb-4 w-100 border">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Data Aerator</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="aeratorChart"></canvas>
                    </div>
                </div>
            </div> -->
            <div class="table-responsive">
                <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0">
                    <thead class="thead dark">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Pakan</th>
                            <th>Kematian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambil = mysqli_query($koneksi, "SELECT * FROM data_ikan");
                        $i = 1;

                        while ($data = mysqli_fetch_array($ambil)) {
                            $id = $data['id'];
                            $tanggal_awal = $data['tanggal_awal'];
                            $tanggal_akhir = $data['tanggal_akhir'];
                            $pakan = $data['pakan_ikan'];
                            $kematian = $data['kematian_ikan'];
                            $hari = $data['hari'];
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $hari; ?></td>
                                <td><?= $tanggal_awal; ?></td>
                                <td><?= $tanggal_akhir; ?></td>
                                <td><?= $pakan; ?></td>
                                <td><?= $kematian; ?></td>
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#editData" type="button">Edit</button>
                                    <?= '<a class="btn btn-danger" href="./process/tambah_data/hapusData.php?id=' . $id . '">Delete</a>'; ?>
                                </td>
                            </tr>
                            <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="./process/tambah_data/editData.php" method="post">
                                                <div class="form-group">
                                                    <label for="pakanIkan">Pakan Ikan</label>
                                                    <input type="text" name="pakan_ikan" class="form-control" id="pakanIkan" value="<?= $pakan ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kematianIkan">Kematian Ikan (ekor)</label>
                                                    <input type="number" name="kematian_ikan" class="form-control" id="kematianIkan" value="<?= $kematian ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggalAwal">Dari Tanggal</label>
                                                    <input type="text" name="tanggal_awal" class="form-control" id="tanggalAwal" value="<?= $tanggal_awal ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggalAkhir">Sampai Tanggal</label>
                                                    <input type="text" name="tanggal_akhir" class="form-control" id="tanggalAkhir" value="<?= $tanggal_akhir ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="hari">Hari</label>
                                                    <select name="hari" class="form-control" id="hari">
                                                        <option value="Senin" <?= ($hari === 'Senin') ? 'selected' : ''; ?>>Senin</option>
                                                        <option value="Selasa" <?= ($hari === 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                                                        <option value="Rabu" <?= ($hari === 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                                                        <option value="Kamis" <?= ($hari === 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                                                        <option value="Jumat" <?= ($hari === 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                                                        <option value="Sabtu" <?= ($hari === 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                                                        <option value="Minggu" <?= ($hari === 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    <?php
    session_start();
    if (isset($_SESSION['pesan_error'])) {
        echo 'swal({
      title: "Error!",
      text: "' . $_SESSION['pesan_error'] . '",
      icon: "error",
      timer: 3000,
    });';
        unset($_SESSION['pesan_error']);
    }

    if (isset($_SESSION['pesan_sukses'])) {
        echo 'swal({
                title: "Success!",
                text: "' . $_SESSION['pesan_sukses'] . '",
                icon: "success",
                timer: 3000,
            }).then(function() {
                redirectToLogin();
            });';
        unset($_SESSION['pesan_sukses']);
    }
    ?>
</script>