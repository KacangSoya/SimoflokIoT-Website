<?php
// Mulai sesi atau session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SimoflokIOT-Login</title>

    <!-- Custom fonts and stylesheets -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>
                            <form class="user" method="post" action="process/auth/proses_login.php">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <?php
                                // Periksa jika ada pesan kesalahan login dalam sesi
                                if (isset($_SESSION['pesan_error_login'])) {
                                    echo '<p style="color:red; margin: .5rem 0;">' . $_SESSION['pesan_error_login'] . '</p>';
                                    unset($_SESSION['pesan_error_login']); // Hapus pesan kesalahan setelah ditampilkan
                                }
                                ?>
                                <div class="g-recaptcha" data-sitekey="6Ldv_xYoAAAAAJhoJrkK0ranyo7t_aprHBOvZ3mH"></div>
                                <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>
                            <br>
                            <a href="auth.php?auth=resetpassword">Lupa Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk notifikasi password salah -->
    <div class="modal" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Password Salah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Password yang Anda masukkan salah. Silakan coba lagi.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // Ambil parameter error dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        // Tampilkan modal jika parameter error adalah 1
        if (error === '1') {
            $('#passwordModal').modal('show');
        }
    </script>
</body>

</html>
