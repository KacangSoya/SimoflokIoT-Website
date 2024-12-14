<?php
include 'koneksi.php';

$sql = "SELECT * FROM tb_data_sensor ORDER BY date DESC LIMIT 25";

$result = mysqli_query($koneksi, $sql);

$dates = [];
$ph_values = [];
$suhu = [];
$oksigen = [];
$aerator = [];
$amoniak = [];

while ($row = mysqli_fetch_assoc($result)) {
    $timestamp = new DateTime($row['date'], new DateTimeZone('UTC')); // Sesuaikan dengan zona waktu asal data dari database
    $timestamp->setTimezone(new DateTimeZone('Asia/Jakarta')); // Set zona waktu tujuan

    $dates[] = $timestamp->format('Y-m-d H:i:s');
    $ph_values[] = $row['pH'];
    $suhu[] = $row['suhu'];
    $oksigen[] = $row['o2'];
    $aerator[] = $row['aerator'];
    $amoniak[] = $row['amoniak'];
}

$dates = array_reverse($dates);
$ph_values = array_reverse($ph_values);
$suhu = array_reverse($suhu);
$oksigen = array_reverse($oksigen);
$aerator = array_reverse($aerator);
$amoniak = array_reverse($amoniak);

$slicedDates = array_map(function($timestamp) {
    return substr($timestamp, 11, 10);
}, $dates);

$data = [
    'dates' => array_slice($slicedDates, -25),
    'ph_values' => $ph_values,
    'suhu' => $suhu,
    'oksigen' => $oksigen,
    'aerator' => $aerator,
    'amoniak' => $amoniak,
];

echo json_encode($data);
