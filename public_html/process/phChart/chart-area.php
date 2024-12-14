
<?php include 'fetch_data.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let dates = <?= json_encode($data['dates']); ?>;
        let ph = <?= json_encode($data['ph_values']); ?>;
        let aerator = <?= json_encode($data['aerator']); ?>;
        let oksigen = <?= json_encode($data['oksigen']); ?>;
        let amoniak = <?= json_encode($data['amoniak']); ?>;
        let suhu = <?= json_encode($data['suhu']); ?>;
        
        const ctx_ph = document.getElementById("phChart");
        const ctx_aerator = document.getElementById("aeratorChart");
        const ctx_oksigen = document.getElementById("oksigenChart");
        const ctx_amoniak = document.getElementById("amoniakChart");
        const ctx_suhu = document.getElementById("suhuChart");

        const ChartPh = Charting(ctx_ph, dates, ph);
        const ChartSuhu = Charting(ctx_suhu, dates, suhu);
        const ChartOksigen = Charting(ctx_oksigen, dates, oksigen);
        const ChartAmoniak = Charting(ctx_amoniak, dates, amoniak);

        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';        

        // Transform the aerator data to categories for doughnut chart
        let baikCount = aerator.filter(val => val >= 6 && val <= 10).length;
        let peringatanCount = aerator.filter(val => val >= 3 && val < 6).length;
        let berbahayaCount = aerator.filter(val => val >= 0 && val < 3).length;
        
        var myPieChart = new Chart(ctx_aerator, {
            type: 'doughnut',
            data: {
                labels: ['Ok', 'Warning', 'Masalah'],
                datasets: [{
                    data: [baikCount, peringatanCount, berbahayaCount],
                    backgroundColor: ['green', 'yellow', 'red'],                    
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true, // Set to true to display legend
                    position: 'top', // Position of the legend (e.g., 'top', 'bottom', 'right', 'left')
                    labels: {
                        fontColor: '#333', // Color of the legend text
                    },
                },
                cutoutPercentage: 80,
            },
        });

        function Charting(chartInitiator = null, dates = [], chartData = []) {
            if (!chartInitiator) {
                return null;
            }

            var chart = new Chart(chartInitiator, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: "Hasil ",
                        lineTension: 0.3,
                        backgroundColor: "rgba(51, 187, 197, 0.1)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: chartData,
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 25
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                // min: 1, // Nilai minimum pada sumbu Y
                                // max: 14, // Nilai maksimum pada sumbu Y
                                // stepSize: 1,
                                maxTicksLimit: 10,
                                padding: 10,
                                // Adjusted the label callback for general data, removing the dollar sign
                                callback: function(value, index, values) {
                                    return '' + value;
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        // Adjusted the label callback for general data, removing the dollar sign
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + tooltipItem.yLabel;
                            }
                        }
                    }
                }
            });

            return chart;
        }

        function updateChart() {
            $.getJSON('fetch_data.php', function(data) {
                if (ChartPh && ChartPh.data && ChartPh.update) {
                    ChartPh.data.labels = data.dates;
                    ChartPh.data.datasets[0].data = data.ph_values;
                    ChartPh.update();
                }

                if (ChartSuhu && ChartSuhu.data && ChartSuhu.update) {
                    ChartSuhu.data.labels = data.dates;
                    ChartSuhu.data.datasets[0].data = data.suhu;
                    ChartSuhu.update();
                }

                if (ChartOksigen && ChartOksigen.data && ChartOksigen.update) {
                    ChartOksigen.data.labels = data.dates;
                    ChartOksigen.data.datasets[0].data = data.oksigen;
                    ChartOksigen.update();
                }

                if (myPieChart && myPieChart.data && myPieChart.update) {
                    let baikCount = data.aerator.filter(val => val === "Ok").length;
                    let peringatanCount = data.aerator.filter(val => val === "Warning").length;
                    let berbahayaCount = data.aerator.filter(val => val === "Masalah").length;
                    
                    myPieChart.data.labels = ['Baik', 'Peringatan', 'Berbahaya'];
                    myPieChart.data.datasets[0].data = [baikCount, peringatanCount, berbahayaCount];
                    myPieChart.update();
                }

                if (ChartAmoniak && ChartAmoniak.data && ChartAmoniak.update) {
                    ChartAmoniak.data.labels = data.dates;
                    ChartAmoniak.data.datasets[0].data = data.amoniak;
                    ChartAmoniak.update();
                }
            });
        }

        setInterval(updateChart, 3000);
    });
</script>
