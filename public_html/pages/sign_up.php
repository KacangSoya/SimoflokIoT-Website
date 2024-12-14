<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Sign Up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding-top: 100px;
    }

    h1 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }

    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
    }

    .sign-up-link {
        text-align: center;
        margin-top: 20px;
    }

    .sign-up-link a {
        color: #fff;
    }

    .sign-up-link a:hover {
        color: #f8f9fc;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="process/auth/proses_registrasi.php">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" id="exampleInputUsername" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="auth.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk notifikasi berhasil membuat akun -->
    <div class="modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                </div>
                <div class="modal-body">
                    <p>Akun berhasil dibuat.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redirectToLogin()">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>