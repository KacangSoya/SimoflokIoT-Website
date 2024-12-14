<?php
if (!isset($_SESSION)) {
    session_start();
}

setlocale(LC_TIME, 'id_ID');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css?v=<?= time() ?>" rel="stylesheet">
    <link href="./css/style.css?v=<?= time() ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="vendor/chart.js/Chart.min.js?v=<?= time() ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="vendor/datatables/dataTables.bootstrap4.css"> -->
    <!-- <script type="text/javascript" src="vendor/jquery/jquery.js"></script> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!-- <script src="vendor/datatables/dataTables.bootstrap4.js"></script>    -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#ph").load("Data/ph.php");
                $("#suhu").load("Data/suhu.php");
                $("#o2").load("Data/oksigen.php", function() {
                    // Setelah nilai diperbarui, tambahkan kembali simbol %
                    $("#o2").append(" mg/L");
                });
                $("#aerator").load("Data/aerator.php");
                $("#amoniak").load("Data/amoniak.php", function() {
                    // Setelah nilai diperbarui, tambahkan kembali simbol %
                    $("#amoniak").append(" ppm");
                });
            }, 1000);
        });
    </script>
</head>