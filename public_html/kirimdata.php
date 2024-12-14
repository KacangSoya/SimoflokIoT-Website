<?php
$hubungkan = mysqli_connect("localhost", "root", "", "simoflok_iot_db");

date_default_timezone_set("Asia/Jakarta");
$timestamp = date('d-m-y H:i:s'); // Menggabungkan tanggal, jam, dan menit

$pH = $_GET['pH'];
$suhu = $_GET['suhu'];
$o2 = $_GET['o2'];
$aerator = $_GET['aerator'];
$amoniak = $_GET['amoniak'];

mysqli_query($hubungkan, "ALTER TABLE tb_data_sensor AUTO_INCREMENT=1");

$simpan = mysqli_query($hubungkan, "INSERT INTO tb_data_sensor (tanggal, pH, suhu, o2, aerator, amoniak) VALUES ('$timestamp', '$pH', '$suhu', '$o2', '$aerator', '$amoniak')");

if ($simpan)
    echo "Sukses dikirim";
else
    echo "Gagal dikirim";
?>

