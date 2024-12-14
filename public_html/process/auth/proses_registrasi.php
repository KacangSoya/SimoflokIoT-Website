<?php
session_start();
include '../../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (!$koneksi) {
    die("Gagal koneksi: " . mysqli_connect_error());
}

if (strlen($username) < 8) {
    $_SESSION['pesan_error'] = "Username harus terdiri dari setidaknya 8 karakter.";
    header("Location: ../../dashboard.php?page=halaman-tambah-user");
    exit();
}

if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
    $_SESSION['pesan_error'] = "Password harus terdiri dari setidaknya 8 karakter dengan kombinasi huruf dan angka.";
    header("Location: ../../dashboard.php?page=halaman-tambah-user");
    exit();
}

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['pesan_error'] = "Username sudah digunakan. Silahkan pilih username lain.";
    header("Location: ../../dashboard.php?page=halaman-tambah-user");
    exit();
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$hashedPassword', 'admin')";

    if (mysqli_query($koneksi, $sql)) {        
        $_SESSION['pesan_sukses'] = "Pendaftaran berhasil!";
        header("Location: ../../dashboard.php?page=halaman-tambah-user");
        exit();
    } else {
        $_SESSION['pesan_error'] = "Gagal menyimpan data.";
        header("Location: ../../dashboard.php?page=halaman-tambah-user");
        exit();
    }
}
mysqli_close($koneksi);


