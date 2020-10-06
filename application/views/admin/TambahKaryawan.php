<!doctype html>
<html lang="en">
 
<?php $this->load->view('admin/partials/head'); ?>
<title><?= SITE_NAME; ?> - Tambah Pegawai</title>
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
                                            <li class="breadcrumb-item"><a href="<?php echo (base_url().'karyawan/data_karyawan'); ?>" class="breadcrumb-link"><i class="fas fa-calendar fa-fw"></i> Data Pegawai</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus fa-fw"></i>Tambah Pegawai</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('admin/layouts/MenuTambahKaryawan'); ?>

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
    <?= $this->session->flashdata('messageAlert'); ?>
    <?= $this->session->flashdata('pesanGagal'); ?>
    <?= $this->session->flashdata('pesanBerhasil'); ?>

    $('#start_date').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
    });
    $('#handphone').inputmask();
    
    $('[data-mask]').inputmask();

    $("#form").on('submit', function(event) {
    event.preventDefault()
    $.ajax({
      // url: 'http://localhost/absensipegawai/Karyawan/tambahKaryawan',
      url: '<?php echo (base_url().'Karyawan/tambahKaryawan'); ?>',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: $(this).serialize(),
      beforeSend:function(){
        $('#btnTmbhKar').attr('disabled', 'disabled');
      },
      success: function(data){
        if(data.error){
          if(data.nik_error != ''){
            $('#nik_error').html(data.nik_error);
          }else{
            $('#nik_error').html('');
          }
          if(data.name_error != ''){
            $('#name_error').html(data.name_error);
          }else{
            $('#name_error').html('');
          }
          if(data.usercode_error != ''){
            $('#usercode_error').html(data.usercode_error);
          }else{
            $('#usercode_error').html('');
          }
          if(data.password_error != ''){
            $('#password_error').html(data.password_error);
          }else{
            $('#password_error').html('');
          }
          
        }else{
          $('#nik_error').html('');
          $('#name_error').html('');
          $('#divisi_error').html('');
          $('#usercode_error').html('');
          $('#password_error').html('');
          $('#form')[0].reset();
          Swal.fire({
                    position: 'midle',
                    icon: 'success',
                    title: 'Berhasil tambah data',
                    showConfirmButton: false,
                    timer: 1500
          });
          window.location.href = "<?php echo (base_url().'karyawan/tambah_karyawan'); ?>";
        }
        $('#btnTmbhKar').attr('disabled', false);
      }
    });

  });
    
    </script>
</body>
 
</html>