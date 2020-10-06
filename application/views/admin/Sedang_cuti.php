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
                                            <li class="breadcrumb-item active" aria-current="page">Pegawai Sedang Cuti/Izin</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('admin/layouts/MenuSedangCuti'); ?>

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
        <?= $this->session->flashdata('messageAlert');?>
        <?= $this->session->flashdata('pesanGagal'); ?>
        <?= $this->session->flashdata('pesanBerhasil'); ?>

        $(document).ready(function() {  
            $('#data_izin').DataTable( {  
                
            }); 
        });
        
        function lihat(file){
            
            var viewer = $('#viewpdf');
            PDFObject.embed("../doc/"+ file, viewer);
            
        }

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
        
        
        function rejectIzin(kode_izin, name){
            var id = kode_izin;
            Swal.fire({
            title: 'Yakin?',
            text: "yakin REJECT permohanan dari "+name+" ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, REJECT!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                // url: "http://localhost/absensipegawai/Karyawan/rejectIzin",
                url: "<?php echo (base_url().'Karyawan/rejectIzin'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    id:id
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function(data) {
                    Swal.fire({
                        position: 'midle',
                        icon: 'success',
                        title: 'Berhasil Reject',
                        showConfirmButton: false,
                        timer: 1100
                    });
                    setTimeout(function() {
                    window.location.href = "<?php echo (base_url().'karyawan/izinKaryawan'); ?>";
                    }, 1100);

                },
                error: function(errorThrown) {
                    console.log(errorThrown);

                }

                });

            }
            });
        }

        function hapusIzinFile(kode_izin, lampiran_izin){
            var kode_izin = kode_izin;
            var file = lampiran_izin;
            Swal.fire({
                title: 'Are you sure?',
                text: "Yakin hapus permohonan cuti/izin? jika permohonan cuti/izin dihapus maka pegawai dapat melakukan absensi seperti biasa kembali.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                // url: "http://localhost/absensipegawai/Karyawan/hapusIzinFile",
                url: "<?php echo (base_url().'Karyawan/hapusIzinFile'); ?>",
                method: 'POST',
                dataType: 'json',
                data: {
                    kode_izin: kode_izin,
                    file : file
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
                    window.location.href = "<?php echo (base_url().'karyawan/izinKaryawan'); ?>";
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
            text: "Yakin hapus permohonan cuti/izin? jika permohonan cuti/izin dihapus maka pegawai dapat melakukan absensi seperti biasa kembali.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                // url: "http://localhost/absensipegawai/Karyawan/hapusIzin",
                url: "<?php echo (base_url().'Karyawan/hapusIzin'); ?>",
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
                    window.location.href = "<?php echo (base_url().'karyawan/izinKaryawan'); ?>";
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