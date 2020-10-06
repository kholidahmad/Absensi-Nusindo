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
                                            <li class="breadcrumb-item active" aria-current="page">Permohonan Izin</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('user/layouts/MenuPermohonanIzin'); ?>

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
            $('#data_izin').DataTable( {  
                
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
    // input tanggal
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
    
    // $(function(){
    //     $(".datepicker").datepicker({
    //         format: 'dd-mm-yyyy',
    //         autoclose: true,
    //         todayHighlight: true,
    //     });
    //     $("#tgl_mulai").on('changeDate', function(selected) {
    //         var startDate = new Date(selected.date.valueOf());
    //         $("#tgl_akhir").datepicker('setStartDate', startDate);
    //         if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
    //         $("#tgl_akhir").val($("#tgl_mulai").val());
    //         }
    //     });
    // });

    function batalIzinKarFile(kode_izin, lampiran_izin){
        var id = kode_izin;
        var file = lampiran_izin;
        Swal.fire({
        title: 'Are you sure?',
        text: "yakin batalkan permohanan?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
            // url: "http://localhost/absensipegawai/User/batalIzinKarFile",
            url: "<?php echo (base_url().'User/batalIzinKarFile'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                file: file
            },
            contentType: 'application/x-www-form-urlencoded',
            success: function(data) {
                Swal.fire({
                    position: 'midle',
                    icon: 'success',
                    title: 'Berhasil membatalkan permohonan',
                    showConfirmButton: false,
                    timer: 1100
                });
                setTimeout(function() {
                window.location.href = "<?php echo (base_url().'user/permohonanIzin'); ?>";
                }, 1100);

            },
            error: function(errorThrown) {
                console.log(errorThrown);

            }

            });

        }
        });
    }
    function batalIzinKar(kode_izin){
        var id = kode_izin;
        Swal.fire({
        title: 'Are you sure?',
        text: "yakin membatalkan permohonan?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
            // url: "http://localhost/absensipegawai/User/batalIzinKar",
            url: "<?php echo (base_url().'User/batalIzinKar'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            contentType: 'application/x-www-form-urlencoded',
            success: function(data) {
                Swal.fire({
                    position: 'midle',
                    icon: 'success',
                    title: 'Berhasil membatalkan permohonan',
                    showConfirmButton: false,
                    timer: 1100
                });
                setTimeout(function() {
                window.location.href = "<?php echo (base_url().'user/permohonanIzin'); ?>";
                }, 1100);

            },
            error: function(errorThrown) {
                console.log(errorThrown);

            }

            });

        }
        });
    }

    function hapusIzin(kode_izin){
            var kode_izin = kode_izin;
            Swal.fire({
            title: 'Are you sure?',
            text: "yakin hapus data izin ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                // url: "http://localhost/absensipegawai/User/hapusIzin",
                url: "<?php echo (base_url().'User/hapusIzin'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    kode_izin: kode_izin
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function(data) {
                    Swal.fire({
                        position: 'midle',
                        icon: 'success',
                        title: 'Berhasil hapus data',
                        showConfirmButton: false,
                        timer: 1100
                    });
                    setTimeout(function() {
                    window.location.href = "<?php echo (base_url().'user/permohonanIzin'); ?>";
                    }, 1100);

                },
                error: function(errorThrown) {
                    console.log(errorThrown);

                }

                });

            }
            });
        }
    
    </script>
</body>
 
</html>