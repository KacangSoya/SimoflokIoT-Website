<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../vendor/fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');

$hubungkan = mysqli_connect("localhost", "u984831496_root", "@Simoflokiot3", "u984831496_simoflokiot_db");

if (isset($_POST["export_pdf"])) {
    $fields = $_POST['fields'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    if (empty($fields)) {
        $_SESSION['empty'] = "Input harus dicentang, minimal 1";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (count($fields) > 0) {
        array_push($fields, "date");
        $fieldsStr = implode(', ', $fields);

        if (!empty($mulai) && !empty($akhir)) {
            $sql = "SELECT $fieldsStr FROM tb_data_sensor WHERE date BETWEEN '$mulai' AND '$akhir' ORDER BY id DESC";
        } else {
            $sql = "SELECT $fieldsStr FROM tb_data_sensor ORDER BY id DESC";
        }

        $result = mysqli_query($hubungkan, $sql);

        if (mysqli_num_rows($result) > 0) {
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);
            if (!empty($mulai) && !empty($akhir)) {
                $pdf->Cell(0, 10, 'Data Laporan', 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 14);
                $pdf->Cell(0, 10, 'Dari Tanggal ' . $mulai . ' Sampai ' . $akhir, 0, 1, 'C');
            } else {
                $pdf->Cell(0, 10, 'Data Laporan Seluruhnya', 0, 1, 'C');
            }
            $pdf->Ln();

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(9, 10, 'No.', 1);
            $pdf->Cell(45, 10, 'Date (Asia/Jakarta)', 1); // Mengubah label menjadi "Date (Asia/Jakarta)"
            foreach ($fields as $field) {
                if ($field != "date") {
                    $pdf->Cell(20, 10, $field, 1);
                }
            }
            $pdf->Cell(30, 10, 'Pakan', 1);
            $pdf->Cell(20, 10, 'Kematian', 1);
            $pdf->Ln();

            $pdf->SetFont('Arial', '', 12);
            $rowNumber = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $dateTimeUtc = new DateTime($row["date"], new DateTimeZone('UTC'));
                $dateTimeJakarta = $dateTimeUtc->setTimezone(new DateTimeZone('Asia/Jakarta'));
                $pdf->Cell(9, 10, $rowNumber, 1);
                $pdf->Cell(45, 10, $dateTimeJakarta->format('Y-m-d H:i:s'), 1);
                foreach ($fields as $field) {
                    if ($field != "date") {
                        $pdf->Cell(20, 10, mb_convert_encoding($row[$field], 'ISO-8859-1', 'UTF-8'), 1);
                    }
                }
                $tanggal = substr($dateTimeJakarta->format('Y-m-d H:i:s'), 0, 10);  // Extract the date
                $ikanQuery = mysqli_query($hubungkan, "SELECT * FROM data_ikan WHERE DATE(tanggal_awal) = '$tanggal'");
                $dataIkan = mysqli_fetch_array($ikanQuery);
                $pakan = $dataIkan['pakan_ikan'] ?? '0';
                $kematian = $dataIkan['kematian_ikan'] ?? '0';
                $pdf->Cell(30, 10, mb_convert_encoding($pakan, 'ISO-8859-1', 'UTF-8'), 1);
                $pdf->Cell(20, 10, mb_convert_encoding($kematian, 'ISO-8859-1', 'UTF-8'), 1);
                $pdf->Ln();
                $rowNumber++;
            }

            $pdf->Output('D', 'laporan_monitoring.pdf');
        }
    }
}
?>
