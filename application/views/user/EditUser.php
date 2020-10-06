<!doctype html>
<html lang="en">
 
<?php $this->load->view('user/partials/head'); ?>
<title><?= SITE_NAME; ?> - Edit </title>
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
                                            <li class="breadcrumb-item active" aria-current="page">Edit Data Pribadi</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('user/layouts/MenuEditUser'); ?>

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

    function batalIzinKar(id_izin, lampiran_izin){
            var id = id_izin;
            var file = lampiran_izin;
            Swal.fire({
            title: 'Are you sure?',
            text: "yakin Batal izin ?",
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
                    id: id,
                    file: file
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function(data) {
                    Swal.fire('Izin berhasil dihapus.', 'success');
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
    
//     $("#formEditUser").on('submit', function(event) {
//     event.preventDefault()
//     $.ajax({
//       url: '<?php echo (base_url().'user/changeDataKar'); ?>',
//       method: 'POST',
//       dataType: 'json',
//       contentType: 'application/x-www-form-urlencoded',
//       data: $(this).serialize(),
//     //   beforeSend:function(){
//     //     $('#btnEditKar').attr('disabled', 'disabled');
//     //   },
//       success: function(data){
//         if(data.error){
//           if(data.nik_error != ''){
//             $('#nik_error').html(data.nik_error);
//           }else{
//             $('#nik_error').html('');
//           }
//           if(data.name_error != ''){
//             $('#name_error').html(data.name_error);
//           }else{
//             $('#name_error').html('');
//           }
//           if(data.usercode_error != ''){
//             $('#usercode_error').html(data.usercode_error);
//           }else{
//             $('#usercode_error').html('');
//           }
          
//         }else{
//           $('#nik_error').html('');
//           $('#name_error').html('');
//           $('#divisi_error').html('');
//           $('#usercode_error').html('');
//           $('#form')[0].reset();
//           Swal.fire({
//                     position: 'midle',
//                     icon: 'success',
//                     title: 'Berhasil tambah data',
//                     showConfirmButton: false,
//                     timer: 1500
//           });
//           window.location.href = "<?php echo (base_url().'user/userEdit'); ?>";
//         }
//         $('#btnTmbhKar').attr('disabled', false);
//       }
//     });

//   });
    
    </script>
</body>
 
</html>