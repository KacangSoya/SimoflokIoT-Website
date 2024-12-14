<?php
session_start();
include '../../koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['pesan_error_login'] = "Input tidak boleh kosong.";
        echo "<script>location.href = '../../auth.php?auth=login';</script>";
        exit();
    }

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $hashedPassword = $data['password'];

        if (password_verify($password, $hashedPassword)) {
            // Username dan password valid, lanjutkan ke verifikasi reCAPTCHA
            $recaptchaSecretKey = "6Ldv_xYoAAAAACfXNwQnJrsNSDsIP7kLzuGKn1f_"; // Ganti dengan Secret Key reCAPTCHA Anda
            $recaptchaResponse = $_POST["g-recaptcha-response"];

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
            $responseKeys = json_decode($response, true);

            if (intval($responseKeys["success"]) === 1) {
                // reCAPTCHA terverifikasi dengan sukses
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role'];
                header('Location: ../../dashboard.php');
                exit();
            } else {
                $_SESSION['pesan_error_login'] = "reCAPTCHA verification failed. Please try again.";
                header("Location: ../../auth.php?auth=login");
                exit();
            }
        } else {
            header('Location: ../../auth.php?auth=login&error=1');
            exit();
        }
    } else {
        header('Location: ../../auth.php?auth=login&error=1');
        exit();
    }
}
?>
