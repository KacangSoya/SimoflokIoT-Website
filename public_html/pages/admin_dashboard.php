<?php include 'koneksi.php' ?>
<?php include './templates/header.php' ?>

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./process/tambah_data/tambahData.php" method="post">
                    <div class="form-group">
                        <label for="pakanIkan">Pakan Ikan</label>
                        <input type="text" name="pakan_ikan" class="form-control" id="pakanIkan" required>
                    </div>
                    <div class="form-group">
                        <label for="kematianIkan">Kematian Ikan (ekor)</label>
                        <input type="number" name="kematian_ikan" class="form-control" id="kematianIkan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalAwal">Dari Tanggal</label>
                        <input type="text" name="tanggal_awal" class="form-control" id="tanggalAwal" value="<?php echo date('Y-m-d'); ?> 00:00:00" placeholder="2023-08-09 00:00:00">
                    </div>
                    <div class="form-group">
                        <label for="tanggalAkhir">Sampai Tanggal</label>
                        <input type="text" name="tanggal_akhir" class="form-control" id="tanggalAkhir" value="<?php echo date('Y-m-d'); ?> 23:59:59">
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select name="hari" class="form-control" id="hari">
                            <option value="Senin" <?= (strftime('%A') === 'Senin') ? 'selected' : ''; ?>>Senin</option>
                            <option value="Selasa" <?= (strftime('%A') === 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                            <option value="Rabu" <?= (strftime('%A') === 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                            <option value="Kamis" <?= (strftime('%A') === 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                            <option value="Jumat" <?= (strftime('%A') === 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                            <option value="Sabtu" <?= (strftime('%A') === 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                            <option value="Minggu" <?= (strftime('%A') === 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<body id="page-top">
    <?php include './components/loader.php' ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './components/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Navbar -->
                <?php include './components/navbar.php' ?>
                <!-- End of Navbar -->

                <!-- Begin Page Content -->

                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'halaman-data-suhu') {
                        $page = 'halaman-data-suhu.php';
                    } elseif ($_GET['page'] == 'halaman-data-ph') {
                        $page = 'halaman-data-ph.php';
                    } elseif ($_GET['page'] == 'halaman-data-oksigen') {
                        $page = 'halaman-data-oksigen.php';
                    } elseif ($_GET['page'] == 'halaman-data-aerator') {
                        $page = 'halaman-data-aerator.php';
                    } elseif ($_GET['page'] == 'halaman-data-amoniak') {
                        $page = 'halaman-data-amoniak.php';
                    } elseif ($_GET['page'] == 'full') {
                        $page = 'full-data.php';
                    } elseif ($_GET['page'] == 'halaman-laporan') {
                        $page = 'halaman-laporan.php';
                    } elseif ($_GET['page'] == 'halaman-tambah') {
                        $page = 'halaman-tambah.php';
                    } elseif ($_GET['page'] == 'halaman-tambah-user') {
                        $page = 'halaman-tambah-user.php';
                    } else {
                        $page = 'halaman-home.php';
                    }
                } else {
                    $page = 'halaman-home.php';
                }

                include $page;

                ?>

                <!-- End Page Content -->
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Website Monitoring Simoflok IOT 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./process/auth/proses_logout.php">Logout</a>

                </div>
            </div>
        </div>
    </div>

    <span style="display: none;">
        <?php include 'process/phChart/chart-area.php' ?>
    </span>
    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>
    <?php include './templates/footer.php' ?>