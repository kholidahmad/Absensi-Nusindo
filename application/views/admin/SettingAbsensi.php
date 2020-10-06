<!doctype html>
<html lang="en">
 
<?php $this->load->view('admin/partials/head'); ?>
<title><?= SITE_NAME; ?> - Pengaturan Absensi</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php $this->load->view('admin/partials/navbar'); ?>
        <?php $this->load->view('admin/partials/leftsidebar'); ?>
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
                                            <li class="breadcrumb-item active" aria-current="page">Pengaturan Absensi</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('admin/layouts/MenuSettingAbsensi'); ?>

            <?php $this->load->view('admin/partials/footer'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <?php $this->load->view('admin/partials/bottom'); ?>
    <script>
    <?= $this->session->flashdata('pesanBerhasil'); ?>
    <?= $this->session->flashdata('pesanGagal'); ?>
    $('#start_absen').inputmask();
    $('#end').inputmask();
    $('[data-mask]').inputmask();

    // $('.form-check-input').on('click', function(){
    //     const hari = $(this).data('hari');
    //     $.ajax({
    //             url: "http://localhost/absensipegawai/Karyawan/hari_absen",
    //             url: "<?php echo (base_url().'Karyawan/hari_absen'); ?>",
    //             method: 'POST',
    //             dataType: 'json',
    //             data: {
    //                 hari : hari
    //             },
    //             success: function() {
    //                 document.location.haref= "<?php echo (base_url().'karyawan/setting_absensi'); ?>";
    //             },
    //             error: function(errorThrown) {
    //                 console.log(errorThrown);

    //             }
    //     });
    // });

    $(document).ready(function() {
        $( "#from" ).datepicker({
            altField: "#alternate",
            altFormat: "dMy",
        });
    });

    function resethadir(){
       Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
        if (result.value) {
            
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    }
    
    function hapusLibur(id){
        var id =id;
        Swal.fire({
        title: 'Are you sure?',
        text: "yakin hapus hari libur ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                // url: "http://localhost/absensipegawai/Karyawan/hapusLibur",
                url: "<?php echo (base_url().'Karyawan/hapusLibur'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    id : id
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function(data) {
                    Swal.fire({
                        position: 'midle',
                        icon: 'success',
                        title: 'Berhasil hapus hari libur',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() {
                    window.location.href = "<?php echo (base_url().'karyawan/setting_absensi'); ?>";
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