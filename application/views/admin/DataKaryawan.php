<!doctype html>
<html lang="en">
 
<?php $this->load->view('admin/partials/head'); ?>
<title><?= SITE_NAME; ?> - Data Pegawai</title>
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
                                            <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('admin/layouts/MenuDataKaryawan'); ?>

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
    <?= $this->session->flashdata('pesanGagal'); ?>
    <?= $this->session->flashdata('pesanBerhasil'); ?>
     $(document).ready(function() {  
        $('#data_karyawan').DataTable( {  
            
        }); 
    });

    $('#tgl').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
    });
    $('[data-mask]').inputmask();

    function tambahKaryawan(){
        window.location.href = "<?php echo (base_url().'karyawan/tambah_karyawan'); ?>";
        }

    function hapusKaryawan(id_karyawan, name){
            var idkar = id_karyawan;
            var name = name;
            Swal.fire({
            title: 'Yakin?',
            text: "Hapus data "+ name +" ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                url: "<?php echo (base_url().'karyawan/delete'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    idkar: idkar
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function(data) {
                    Swal.fire({
                    position: 'midle',
                    icon: 'success',
                    title: 'Berhasil Hapus data',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    setTimeout(function() {
                    window.location.href = "<?php echo (base_url().'karyawan/data_karyawan'); ?>";
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