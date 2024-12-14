<?php
date_default_timezone_set("Asia/Jakarta");
$hubungkan = mysqli_connect("localhost", "root", "", "simoflok_iot_db");

    $sql = mysqli_query($hubungkan, "SELECT * FROM tb_data_sensor ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_array($sql);
    $nilai = $data['amoniak'];
    if($nilai == "") $nilai = 0;
    echo $nilai;
?>
