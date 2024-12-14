<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php'; // Include PhpSpreadsheet
date_default_timezone_set('Asia/Jakarta');

$hubungkan = mysqli_connect("localhost", "u984831496_root", "@Simoflokiot3", "u984831496_simoflokiot_db");
$output = "";

if (!$hubungkan) {
    die("Connection failed: " . mysqli_connect_error());
}

function sanitize($value) {
    return htmlspecialchars($value ?? ''); // This will handle null values
}

if (isset($_POST["export_excel"])) {
    $fields = $_POST['fields'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    if (empty($fields)) {
        $_SESSION['empty'] = "Input harus dicentang, minimal 1";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    array_push($fields, "date");
    $fieldsStr = implode(', ', $fields);

    $sql = (!empty($mulai) && !empty($akhir)) 
           ? "SELECT $fieldsStr FROM tb_data_sensor WHERE date BETWEEN '$mulai' AND '$akhir' ORDER BY id DESC"
           : "SELECT $fieldsStr FROM tb_data_sensor ORDER BY id DESC";

    $result = mysqli_query($hubungkan, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Create a new PhpSpreadsheet instance
        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the column headers
        $columnIndex = 1;
        foreach ($fields as $field) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, sanitize($field));
            $columnIndex++;
        }
        $sheet->setCellValueByColumnAndRow($columnIndex, 1, "Pakan");
        $columnIndex++;
        $sheet->setCellValueByColumnAndRow($columnIndex, 1, "Kematian");

        // Fetch and add data to the Excel sheet
        $rowNumber = 2;
        while ($row = mysqli_fetch_assoc($result)) {
            $columnIndex = 1;
            foreach ($fields as $field) {
                if ($field === 'date') {
                    // Mengonversi timestamp ke zona waktu "Asia/Jakarta"
                    $tanggalTimestamp = strtotime($row['date']);
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggalTimestamp = strtotime(date('Y-m-d H:i:s', $tanggalTimestamp));
                    $sheet->setCellValueByColumnAndRow($columnIndex, $rowNumber, date('Y-m-d H:i:s', $tanggalTimestamp));
                } else {
                    $sheet->setCellValueByColumnAndRow($columnIndex, $rowNumber, sanitize($row[$field]));
                }
                $columnIndex++;
            }

            // Fetch 'pakan' and 'kematian' from the data_ikan table for the given date
            $tanggalTimestamp = strtotime($row['date']);
            date_default_timezone_set('Asia/Jakarta');
            $tanggalTimestamp = strtotime(date('Y-m-d H:i:s', $tanggalTimestamp));
            $tanggal = date('Y-m-d', $tanggalTimestamp);
            $ikanQuery = mysqli_query($hubungkan, "SELECT * FROM data_ikan WHERE DATE(tanggal_awal) = '$tanggal'");
            $dataIkan = mysqli_fetch_array($ikanQuery);
            $pakan = $dataIkan['pakan_ikan'] ?? '0'; // Default to '0' if not found
            $kematian = $dataIkan['kematian_ikan'] ?? '0'; // Default to '0' if not found

            $sheet->setCellValueByColumnAndRow($columnIndex, $rowNumber, sanitize($pakan) . '');
            $columnIndex++;
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowNumber, sanitize($kematian) . ' Ekor');

            // Menambahkan border hitam pada setiap kolom
            for ($col = 1; $col <= $columnIndex; $col++) {
                $cellCoordinate = PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col) . $rowNumber;
                $sheet->getStyle($cellCoordinate)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
            }

            $rowNumber++;
        }

        // Save the Excel file to a temporary location
        $excelFile = tempnam(sys_get_temp_dir(), 'excel');
        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
        $writer->save($excelFile);

        // Provide a download link to the user
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_monitoring_excel.xls");
        header("Content-Length: " . filesize($excelFile));
        readfile($excelFile);

        // Clean up the temporary file
        unlink($excelFile);
        exit;
    }
}
?>
