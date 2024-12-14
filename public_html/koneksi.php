<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "simoflok_iot_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  echo "Gagal konek: " . die(mysqli_connect_error());
}

?>