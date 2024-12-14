<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

if (!empty($_POST)) {
    // If we get here, all the required data is present, so we can use it
    $ph = $_POST['ph'];
    $suhu = $_POST['suhu'];
    $oksigen = $_POST['oksigen'];
    $aerator = $_POST['aerator'];
    $amoniak = $_POST['amoniak'];
    $date = $_POST['date'];
    
    $ph = mysqli_real_escape_string($koneksi, $ph);
    $suhu = mysqli_real_escape_string($koneksi, $suhu);
    $oksigen = mysqli_real_escape_string($koneksi, $oksigen);
    $aerator = mysqli_real_escape_string($koneksi, $aerator);
    $amoniak = mysqli_real_escape_string($koneksi, $amoniak);
    $date = mysqli_real_escape_string($koneksi, $date);

    $sql = "INSERT INTO tb_data_sensor (pH, suhu, o2, aerator, amoniak, date) 
            VALUES ('$ph', '$suhu', '$oksigen', '$aerator', '$amoniak', '$date')";

    if (mysqli_query($koneksi, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo 'No POST data received';
}

?>

<!-- <form method="POST" action="http://localhost/SIMOFLOK_IoT3/sendData.php">
    <input type="text" name="ph" value="7.0">
    <input type="text" name="suhu" value="25.0">
    <input type="text" name="oksigen" value="50.0">
    <input type="text" name="aerator" value="5.0">
    <input type="text" name="amoniak" value="25.0">
    <input type="text" name="date" value="2023-08-10 10:00:00">
    <button type="submit">Submit</button>
</form> -->
