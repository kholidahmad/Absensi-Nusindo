<!doctype html>
<html lang="en">
 
<?php $this->load->view('user/partials/head'); ?>
<title><?= SITE_NAME; ?> - Semua Izin</title>
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
                                            <li class="breadcrumb-item active" aria-current="page">Semua Pegawai Cuti/Izin</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('user/layouts/MenuSemuaIzin'); ?>

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
    // $('#tgl_izin').inputmask('dd/mm/yyyy', {
    // 'placeholder': 'dd/mm/yyyy'
    // });
    // $('[data-mask]').inputmask();

    $(document).ready(function() {  
            $('#data_izin').DataTable( { }); 
    });
    $(document).ready(function() {  
            $('#sakit').DataTable( { }); 
    });
    $(document).ready(function() {  
            $('#pribadi').DataTable( { }); 
    });
    $(document).ready(function() {  
            $('#libur').DataTable( { }); 
    });
    $(document).ready(function() {  
            $('#tahunan').DataTable( { }); 
    });

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    function lihat(file){  
        var viewer = $('#viewpdf');
        PDFObject.embed("../doc/"+ file, viewer);
    }

    $(document).ready(function() {
        $( "#from" ).datepicker({
            altField: "#alternate",
            altFormat: "dMy",
            minDate: new Date(),
            
            onSelect: function(selected) {
            $("#to").datepicker("option","minDate", selected);
            calcDiff();
            }
        });

        $( "#to" ).datepicker({
            altField: "#alternate1",
            altFormat: "dMy",
            minDate: new Date( (new Date()).getTime() + 86400000 ),
            
            onSelect: function(selected) {
            $("#from").datepicker("option","maxDate", selected);
            calcDiff();
            }
        });

        function calcDiff() {
            var date1 = $('#from').datepicker('getDate');
            var date2 = $('#to').datepicker('getDate');
            var diff = 1;
            if (date1 && date2) {
            diff = Math.floor(((date2.getTime() - date1.getTime()) / 86400000)+1); 
            // console.log(date2.getTime()-date1.getTime());\
            }
            $('#calculated').val(diff);
        }
    });
  </script>
</body>
 
</html>