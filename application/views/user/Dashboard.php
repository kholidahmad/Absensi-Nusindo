<!doctype html>
<html lang="en">
 
<?php $this->load->view('user/partials/head'); ?>
<title>Dashboard Pegawai</title>
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
                            <!-- <div class="page-header">
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><i class="fas fa-home"></i> Dashboard</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('user/layouts/MenuDashboard'); ?>
            
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
    <!-- GEOLOC API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDoTWSPuXSRJkqb6kmPi08OmeF56KZ5CA&callback=geoFindMe"type="text/javascript"></script>
    <script>
    <?= $this->session->flashdata('pesanGagal'); ?>
    <?= $this->session->flashdata('pesanBerhasil'); ?>
    $(document).ready(function() {  
            $('.table_history_absen').DataTable( {        
            }); 
        });

    // JAM DIGITAL
    window.setTimeout("waktu()", 1000);
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
    // END JAM

    // GEOLOCATION
    function geoFindMe() {
        const status = document.querySelector('#status');
        const mapLink = document.querySelector('#map-link');
        mapLink.href = '';
        mapLink.textContent = '';
        function success(position) {
            const latitude  = position.coords.latitude;
            const longitude = position.coords.longitude;
            status.textContent = '';
            // mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
            mapLink.href = `https://www.google.co.id/maps/place/${latitude} ${longitude}`;
            mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
            document.getElementById("lokasi").value = `${latitude} ${longitude}`;
            document.getElementById("lokasi2").value = `${latitude} ${longitude}`;
            // document.getElementById("lokasi3").value = `${latitude} ${longitude}`;
            // document.getElementById("lokasi4").value = `${latitude} ${longitude}`;
        }
        function error() {
        status.textContent = 'tidak dapat mengidentifikasi lokaksi Anda, cek koneksi internet Anda! ';
        }
        if(!navigator.geolocation) {
        status.textContent = 'Geolocation is not supported by your browser';
        } else {
        status.textContent = 'mencari lokasi terkini…';
        navigator.geolocation.getCurrentPosition(success, error);
        }
    }

    // END GEOLOC

    // PAP FROM GOOGLE
    // var player = document.getElementById('player'); 
    // var snapshotCanvas = document.getElementById('snapshot');
    // var captureButton = document.getElementById('capture');
    // var videoTracks;

    // var handleSuccess = function(stream) {
    //   // Attach the video stream to the video element and autoplay.
    //   player.srcObject = stream;
    //   videoTracks = stream.getVideoTracks();
    // };

    // captureButton.addEventListener('click', function() {
    //   var context = snapshot.getContext('2d');
    //   // Draw the video frame to the canvas.
    //   context.drawImage(player, 0, 0, snapshotCanvas.width, 
    //       snapshotCanvas.height);
    //   var c=document.getElementById('snapshot');
    //   var d=c.toDataURL("image/png");
    // //   var w=window.open('about:blank','image from canvas');
    // //   w.document.write("<img src='"+d+"' alt='from canvas'/>");
    
    </script>
</body>
 
</html>