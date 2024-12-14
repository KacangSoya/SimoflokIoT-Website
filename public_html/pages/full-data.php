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
            <a href="dashboard.php?page=halaman-tambah" class="btn btn-primary my-3">Detail Pakan & Kematian</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0">
                    <thead class="thead dark">
                        <tr>
                            <th>No</th>
                            <th>Suhu</th>
                            <th>Ph</th>
                            <th>Oksigen</th>
                            <th>Ammonia</th>
                            <th>Aerator</th>
                            <th>Pakan</th>
                            <th>Kematian</th>
                            <th>Tanggal / Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambil = mysqli_query($koneksi, "SELECT * FROM tb_data_sensor");
                        $i = 1;

                        while ($data = mysqli_fetch_array($ambil)) {
                            $ph = $data['pH'];
                            $suhu = $data['suhu'];
                            $amoniak = $data['amoniak'];
                            $oksigen = $data['o2'];
                            $aerator = $data['aerator'];
                            if ($aerator === "") $aerator = "-";

                            // if ($aerator == 10) {
                            //     $aerator = '<span style="font-weight: bold; color: green;">Good</span>';
                            // } elseif ($aerator < 10 && $aerator > 6) {
                            //     $aerator = '<span style="font-weight: bold; color: lightgreen;">Ok</span>';
                            // } elseif ($aerator <= 6 && $aerator > 3) {
                            //     $aerator = '<span style="font-weight: bold; color: orange;">Warning</span>';
                            // } elseif ($aerator <= 3 && $aerator >= 0) {
                            //     $aerator = '<span style="font-weight: bold; color: red;">Danger</span>';
                            // } else {
                            //     $aerator = '<span style="font-weight: bold; color: gray;">Invalid Number</span>';
                            // }
                            if ($aerator == "Ok") {
                                $aerator = '<span style="font-weight: bold; color: green;">Ok</span>';
                            } elseif ($aerator == "Masalah") {
                                $aerator = '<span style="font-weight: bold; color: red;">Masalah</span>';
                            } elseif ($aerator == "Warning") {
                                $aerator = '<span style="font-weight: bold; color: orange;">Warning</span>';
                            }

                            $timestamp = strtotime($data['date'] . ' UTC'); // Konversi ke timestamp UTC
                            date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Asia/Jakarta
                            $tanggalFull = date('Y-m-d H:i:s', $timestamp);
                            $tanggal = substr($tanggalFull, 0, 10);
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $suhu; ?></td>
                                <td><?= $ph; ?></td>
                                <td><?= $oksigen; ?></td>
                                <td><?= $amoniak; ?></td>
                                <td><?= $aerator; ?></td>
                                <?php
                                $ikanQuery = mysqli_query($koneksi, "SELECT * FROM data_ikan WHERE DATE(tanggal_awal) = '$tanggal'");
                                $dataIkan = mysqli_fetch_array($ikanQuery);
                                $pakan = isset($dataIkan['pakan_ikan']) ? $dataIkan['pakan_ikan'] : '0';
                                $kematian = isset($dataIkan['kematian_ikan']) ? $dataIkan['kematian_ikan'] : '0';
                                ?>
                                <td><?= $pakan ?></td>
                                <td><?= $kematian ?> Ekor</td>
                                <td><?= $tanggalFull; ?></td>
                            </tr>
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