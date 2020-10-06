<!doctype html>
<html lang="en">
 
<?php $this->load->view('admin/partials/head'); ?>
<title><?= SITE_NAME; ?> - Absensi Pegawai</title>
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
                                            <li class="breadcrumb-item active" aria-current="page">Absensi Pegawai</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('admin/layouts/MenuMasterCabang'); ?>

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
    <?= $this->session->flashdata('messageAlert'); ?>

    $(document).ready(function(){
        $('#tblcabang').DataTable({

        });
    });
    // cara mengirim parameter ke modal
    $(document).on("click", ".open-modalEdit", function () {
     var Id = $(this).data('id');
     var cabang = $(this).data('name');
     $(".modal-body #id").val( Id );
     $(".modal-body #cabang").val( cabang );
    });

    function hapusCabang(id){
            var id = id;
            Swal.fire({
            title: 'Yakin?',
            text: "Hapus data ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                url: "<?php echo (base_url().'Karyawan/deleteCabang'); ?>",
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
                    title: 'Berhasil hapus',
                    showConfirmButton: false,
                    timer: 1100
                });
                    setTimeout(function() {
                    window.location.href = "<?php echo (base_url().'karyawan/master_cabang'); ?>";
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