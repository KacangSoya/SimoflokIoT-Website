<div class="container-fluid">
    <!-- Content Row -->
    <h1>Tambah User</h1>
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
            <div class="container" style="max-width: 500px;">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form action="./process/auth/proses_registrasi.php" method="post" class="d-flex flex-column gap-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="exampleInputUsername" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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