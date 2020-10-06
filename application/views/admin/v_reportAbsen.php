<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Report Absensi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/libs/css/laporan.css') ?>" />
    <!-- Logo -->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/images/nusindo.png" height='35' width='40'>
</head>

<!-- <body onload="window.print()"> -->
<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:800px; border-bottom:none;border-top:none;border-right:none;border-left:none;margin-top:5px;">
            <tr>
                <td width="95px"><img src="<?= base_url(); ?>assets/images/nusindo.png" height='90' width='90'></td>
                <td style="text-align:left;padding-left:5px;padding-top:10px;padding-bottom:10px;font-size:1rem">
                    <b>PT. RAJAWALI NUSINDO</b>
                    <br> Kota Jakarta Selatan
                    <br> Kadipiro, Banjarsari, Surakarta City, Central Java 57136
                    <br> Telp. (0271) 742485
                </td>
            </tr>
        </table>
        <hr width="800px" color="black">

        <table class="" align="center" style="width:800px;border:none;margin-top:5px;margin-bottom:-23px;">
            <tr>
                <td colspan="2" style="width:800px;padding-left:20px;font-size:1.4rem;">
                    <center>
                        <h4 class="mb-5">Laporan Absensi <?= date('F Y') ?></h4>
                    </center>
                </td>
            </tr>
        </table>

        <table class="table table-striped" align="center" style="width:800px;margin-bottom:20px;font-size:1rem;">
            <thead class="bg-light">
                <tr>
                    <th style="padding-top:10px;padding-bottom:10px;">No</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Waktu Backup</th>
                    <th style="padding-top:10px;padding-bottom:10px;">NIK</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Nama</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Divisi</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Datang Tepat</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Datang Terlambat</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Pulang Awal </th>
                    <th style="padding-top:10px;padding-bottom:10px;">Pulang Tepat</th>
                    <th style="padding-top:10px;padding-bottom:10px;">Pulang Terlambat</th>
                    <th style="padding-top:20px;padding-bottom:20px;">Total Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($backuphadir as $value) : ?>

                    <tr>
                        <td style="text-align:center;padding-top:10px;padding-bottom:10px;"><?= $no; ?></td>
                        <?php $no++; ?>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;"><?= $value->periode;?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;"><?= $value->nik; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;"><?= $value->name; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;"><?= $value->bagian; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;width:120px"><?= $value->datang_tepat; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;width:120px"><?= $value->datang_terlambat; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;width:120px"><?= $value->pulang_awal; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;width:120px"><?= $value->pulang_tepat; ?>
                        </td>
                        <td style=" padding-left:10px;padding-top:10px;padding-bottom:10px;width:120px"><?= $value->pulang_terlambat; ?>
                        </td>
                        <td style=" padding-left:20px;padding-top:15px;padding-bottom:15px;"><?= $value->hadir; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table align=" center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;font-size:1rem;">
            <tr>
                <td align="right">Jakarta, <?= date('d F Y') ?></td>
            </tr>
        </table>
    </div>
    
</body>

</html>