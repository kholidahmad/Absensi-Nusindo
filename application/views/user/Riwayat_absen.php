<!doctype html>
<html lang="en">
 
<?php $this->load->view('user/partials/head'); ?>
<title><?= SITE_NAME; ?> - Tambah Pegawai</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php $this->load->view('user/partials/navbar'); ?>
        <?php $this->load->view('user/partials/leftsidebar'); ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <!-- <h2 class="pageheader-title"><?= SITE_NAME; ?> </h2> -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Riwayat Absen
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('user/layouts/MenuRiwayatAbsen'); ?>

            <?php $this->load->view('user/partials/footer'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <?php $this->load->view('user/partials/bottom'); ?>
    <script>
    <?= $this->session->flashdata('messageAlert'); ?>
    <?= $this->session->flashdata('pesanBerhasil'); ?>
    <?= $this->session->flashdata('pesanGagal'); ?>

    $('#tgl_izin').datepicker();

    $(".form-control.date").datepicker();

    $(document).ready(function() {  
            $('#riwayat').DataTable( {  
                
            }); 
        });
        
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    function lihat(file){  
        var viewer = $('#viewpdf');
        PDFObject.embed("../doc/"+ file, viewer);
    }

    function showmap(lokasi){
        const ipAPI = 'https://www.google.co.id/maps/place/'+lokasi;

        Swal.queue([{
        title: 'Your public IP',
        confirmButtonText: 'Show my public IP',
        text:
            'Your public IP will be received ' +
            'via AJAX request',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            window.location.href= ipAPI;
        }
        }])
    }
    
    </script>
</body>
 
</html>