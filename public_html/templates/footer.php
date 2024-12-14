<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js?v=<?= time() ?>"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js?v=<?= time() ?>"></script>
<script src="js/sb-admin-2.min.js?v=<?= time() ?>"></script>
<script src="js/demo/chart-pie-demo.js?v=<?= time() ?>"></script>
<script src="js/script.js?v=<?= time() ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#myDatetimePicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i:S",
        time_24hr: true,
        noCalendar: false
    });
</script>
<script>
    function updateClock() {
        let now = new Date();
        let hours = String(now.getHours()).padStart(2, '0');
        let minutes = String(now.getMinutes()).padStart(2, '0');
        let seconds = String(now.getSeconds()).padStart(2, '0');

        document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
    }

    setInterval(updateClock, 1000);
</script>
</body>

</html>