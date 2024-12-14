<?php
session_start();
include 'koneksi.php';
?>

<?php include './templates/header.php' ?>


<body id="page-top">
    <?php include './components/loader.php' ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './components/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Sensor</h6>
                </div>
                <div class="card-body">
                    <!-- Tombol untuk membuka modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                        Tambah Data
                    </button>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Data pH</th>
                                    <th>Suhu</th>
                                    <th>Kadar O2</th>
                                    <th>Tekanan Aerator</th>
                                    <th>Kadar Amoniak</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ambil = mysqli_query($koneksi, "SELECT * FROM tb_data_sensor");
                                $i = 1;
                                while ($data = mysqli_fetch_array($ambil)) {

                                    $dataph = $data['pH'];
                                    $suhu = $data['suhu'];
                                    $oksigen = $data['o2'];
                                    $aerator = $data['aerator'];
                                    $amonia = $data['amoniak'];
                                    $tanggal = $data['date'];

                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $dataph; ?></td>
                                        <td><?php echo $suhu; ?></td>
                                        <td><?php echo $oksigen; ?></td>
                                        <td><?php echo $aerator; ?></td>
                                        <td><?php echo $amonia; ?></td>
                                        <td><?php echo $tanggal; ?></td>
                                    </tr>
                                <?php
                                };
                                ?>
                            </tbody>
                        </table>
                        <form method="post" action="laporan-excel.php">
                            <input type="submit" name="export_excel" class="btn btn-success" value="Export to Excel" />
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
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
                    <a class="btn btn-primary" href="proses_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Sensor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi form untuk mengisi data tabel -->
                    <form id="formTambahData" method="post" action="tambah_data.php">
                        <input type="hidden" class="form-control" id="ID" name="ID" required>
                        <div class="form-group">
                            <label for="pH">Data pH</label>
                            <input type="text" class="form-control" id="pH" name="pH" required>
                        </div>
                        <!-- Tambahkan form untuk input data lainnya -->
                        <div class="form-group">
                            <label for="suhu">Suhu</label>
                            <input type="text" class="form-control" id="suhu" name="suhu" required>
                        </div>
                        <div class="form-group">
                            <label for="o2">Kadar O2</label>
                            <input type="text" class="form-control" id="o2" name="o2" required>
                        </div>
                        <div class="form-group">
                            <label for="aerator">Tekanan Aerator</label>
                            <input type="text" class="form-control" id="aerator" name="aerator" required>
                        </div>
                        <div class="form-group">
                            <label for="amoniak">Kadar Amoniak</label>
                            <input type="text" class="form-control" id="amoniak" name="amoniak" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="datetime-local" class="form-control" id="date" name="date" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" form="formTambahData" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>



    <?php include './templates/footer.php' ?>