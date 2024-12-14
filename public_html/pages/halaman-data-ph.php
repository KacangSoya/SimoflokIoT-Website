<div class="container-fluid">
    <!-- Content Row -->
    <h1>Detail Data Ph</h1>
    <!-- Content Row -->
    <div class="row">
        <div class="w-100 px-2">
            <div class="card shadow mb-4 w-100 border">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Data Ph</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="phChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0">
                    <thead class="thead dark">
                        <tr>
                            <th>No</th>
                            <th>Ph</th>
                            <th>Tanggal / Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambil = mysqli_query($koneksi, "SELECT pH, date FROM tb_data_sensor");
                        $i = 1;
                        while ($data = mysqli_fetch_array($ambil)) {
                            $ph = $data['pH'];
                            $timestamp = strtotime($data['date'] . ' UTC'); // Konversi ke timestamp UTC
                            date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Asia/Jakarta
                            $tanggal = date('Y-m-d H:i:s', $timestamp);
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $ph; ?></td>
                                <td><?php echo $tanggal; ?></td>
                            </tr>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>              
            </div>
        </div>
    </div>
</div>