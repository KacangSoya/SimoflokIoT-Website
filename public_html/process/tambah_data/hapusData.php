<?php
session_start();
include '../../koneksi.php';

// Check if id is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create the DELETE query
    $sql = "DELETE FROM data_ikan WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['pesan_sukses'] = "Data telah dihapus!";
    } else {
        $_SESSION['pesan_error'] = "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    $_SESSION['pesan_error'] = "ID tidak ditemukan!";
}

// Redirect to a page (modify the location based on your needs)
header("Location: ../../dashboard.php?page=halaman-tambah");
exit();

mysqli_close($koneksi);
?>
