<div class="container-fluid">
    <!-- Content Row -->
    <h1 class="text-center mb-5">Halaman Laporan</h1>
    <!-- Content Row -->

    <form method="post" class="d-flex flex-wrap p-1 mt-3 justify-content-center items-center">
        <ul class="list-group mr-5 mb-5">
            <label class="list-group-item list-group-item-action list-group-item-light cursor-pointer" style="user-select: none;">
                <input type="checkbox" name="fields[]" class="m-3" value="aerator">Laporan Data Aerator
            </label>
            <label class="list-group-item list-group-item-action list-group-item-light cursor-pointer" style="user-select: none;">
                <input type="checkbox" name="fields[]" class="m-3" value="pH">Laporan Data Ph
            </label>
            <label class="list-group-item list-group-item-action list-group-item-light cursor-pointer" style="user-select: none;">
                <input type="checkbox" name="fields[]" class="m-3" value="o2">Laporan Data Oksigen
            </label>
            <label class="list-group-item list-group-item-action list-group-item-light cursor-pointer" style="user-select: none;">
                <input type="checkbox" name="fields[]" class="m-3" value="amoniak">Laporan Data Amoniak
            </label>
            <label class="list-group-item list-group-item-action list-group-item-light cursor-pointer" style="user-select: none;">
                <input type="checkbox" name="fields[]" class="m-3" value="suhu">Laporan Data Suhu
            </label>
        </ul>

        <div class="d-flex flex-column">
            <p style="color: blue">*bila anda ingin download seluruh data maka kosongkan input</p>
            <div class="form-group">
                <label for="myDatetimePicker">Tanggal & Jam Mulai</label>
                <input class="form-control" type="text" id="myDatetimePicker" name="mulai">
            </div>
            <div class="form-group">
                <label for="myDatetimePicker">Tanggal & Jam Akhir</label>
                <input class="form-control" type="text" id="myDatetimePicker" name="akhir">
            </div>
            <button type="submit" class="btn btn-success my-3" name="export_excel" formaction="report/laporan-excel.php">Download Excel</button>
            <button type="submit" class="btn btn-danger" name="export_pdf" formaction="report/laporan-pdf.php">Download PDF</button>
        </div>
    </form>
</div>
<script>
    <?php
    session_start();
    if (isset($_SESSION['empty'])) {
        echo 'swal({
                title: "Failed!",
                text: "' . $_SESSION['empty'] . '",
                icon: "error",
                timer: 3000,
            })';
        unset($_SESSION['empty']);
    }

    ?>
</script>