<!DOCTYPE html>
<html>

<div class="container">

<?php $this->load->view('admin/partials/head'); ?>
<title><?= SITE_NAME; ?> - Grafik Kehadiran</title>
</head>

<body>

    <?php
    /* Mengambil query report*/
    foreach ($grafikhadir as $result) {
        $bulan[] = $result->periode; //ambil bulan
        $value[] = (float) $result->hadir; //ambil nilai
    }
    /* end mengambil query*/
    // var_dump($value);die;
    ?>

    <!-- Load chart dengan menggunakan ID -->
    <div id="report"></div>
    <!-- END load chart -->


    <script src="<?php echo base_url('assets/vendor/grafik/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/grafik/highcharts.js') ?>"></script>
    <!-- Script untuk memanggil library Highcharts -->
    <script type="text/javascript">
        $(function() {
            $('#report').highcharts({
                chart: {
                    type: 'line',
                    margin: 75,
                    options3d: {
                        enabled: false,
                        alpha: 10,
                        beta: 25,
                        depth: 70
                    }
                },
                title: {
                    text: 'Grafik Rata-rata Kahadiran Karyawan per Bulan',
                    style: {
                        fontSize: '18px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
                subtitle: {
                    text: '',
                    style: {
                        fontSize: '15px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
                plotOptions: {
                    column: {
                        depth: 25
                    }
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    categories: <?php echo json_encode($bulan); ?>
                },
                exporting: {
                    enabled: false
                },
                yAxis: {
                    title: {
                        text: 'Total Kehadiran'
                    },
                },
                tooltip: {
                    formatter: function() {
                        return 'Rata-rata Jumlah Kehadiran pada <b>' + this.x + '</b> Adalah <b>' + Highcharts.numberFormat(this.y, 0) + '</b> ';
                    }
                },
                series: [{
                    name: 'Periode',
                    data: <?php echo json_encode($value); ?>,
                    shadow: true,
                    dataLabels: {
                        enabled: true,
                        color: '#045396',
                        align: 'center',
                        formatter: function() {
                            return Highcharts.numberFormat(this.y, 0);
                        }, // one decimal
                        y: 0, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });
        });
    </script>
</body>
</div>

</html>
