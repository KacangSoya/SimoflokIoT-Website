<?php
session_start();
include '../../koneksi.php';

$pakan_ikan = $_POST['pakan_ikan'];
$kematian_ikan = $_POST['kematian_ikan'];
$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];
$hari = $_POST['hari'];

if (!$koneksi) {
    die("Gagal koneksi: " . mysqli_connect_error());
}

// Check if tanggal_awal already exists in the database
$checkSql = "SELECT * FROM data_ikan WHERE tanggal_awal = '$tanggal_awal'";
$checkResult = mysqli_query($koneksi, $checkSql);

if (mysqli_num_rows($checkResult) == 0) { // If there is no record with the same tanggal_awal, Insert it
    $sql = "INSERT INTO data_ikan (pakan_ikan, kematian_ikan, tanggal_awal, tanggal_akhir, hari) VALUES ('$pakan_ikan', '$kematian_ikan', '$tanggal_awal', '$tanggal_akhir', '$hari')";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $_SESSION['pesan_sukses'] = "Data telah ditambahkan!";
    } else {
        $_SESSION['pesan_error'] = "Terjadi kesalahan saat menambahkan data!";
    }
} else { // If there is a record with the same tanggal_awal, Update it
    $sql = "UPDATE data_ikan SET pakan_ikan='$pakan_ikan', kematian_ikan='$kematian_ikan', tanggal_akhir='$tanggal_akhir', hari='$hari' WHERE tanggal_awal='$tanggal_awal'";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $_SESSION['pesan_sukses'] = "Data dengan tanggal awal $tanggal_awal telah diperbarui!";
    } else {
        $_SESSION['pesan_error'] = "Terjadi kesalahan saat memperbarui data!";
    }
}

header("Location: ../../dashboard.php?page=halaman-tambah");
exit();

mysqli_close($koneksi);
