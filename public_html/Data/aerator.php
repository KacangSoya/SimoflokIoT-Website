<?php
date_default_timezone_set("Asia/Jakarta");
$hubungkan = mysqli_connect("localhost", "root", "", "simoflok_iot_db");

$sql = mysqli_query($hubungkan, "SELECT * FROM tb_data_sensor ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($sql);
$nilai = $data['aerator'];


if ($nilai === "") $nilai = "-";

// if ($nilai == 10) {
//     $nilai = '<span style="color: green;">Good</span>';
// } elseif ($nilai < 10 && $nilai > 6) {
//     $nilai = '<span style="color: lightgreen;">Ok</span>';
// } elseif ($nilai <= 6 && $nilai > 3) {
//     $nilai = '<span style="color: orange;">Warning</span>';
// } elseif ($nilai <= 3 && $nilai >= 0) {
//     $nilai = '<span style="color: red;">Danger</span>';
// } else {
//     $nilai = '<span style="color: gray;">Invalid Number</span>';
// }
if ($nilai == "Ok") {
    $nilai = '<span style="font-weight: bold; color: green;">Ok</span>';
} elseif ($nilai == "Masalah") {
    $nilai = '<span style="font-weight: bold; color: red;">Masalah</span>';
} elseif ($nilai == "Warning") {
    $nilai = '<span style="font-weight: bold; color: orange;">Warning</span>';
}


echo $nilai;



