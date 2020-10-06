
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar"style="background-color: #F0F2F5;">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none text-dark" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-2" id="navbarNav">
                
                <div class="mt-3">
                        <?php if($halaman == 'user'):?>
                           <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user">
                           <img src="<?= base_url(); ?>assets/images/home.png"  class="d-inline-block align-center mr-3"><b>Dashboard</b></span></a>
                        <?php else : ?>
                            <a class="nav-link text-dark" href="<?php echo base_url(); ?>user"><img src="<?= base_url(); ?>assets/images/home.png" width="30px" height="30px" class="d-inline-block align-center mr-2"><b>Dashboard</b></span></a>
                        <?php endif; ?>
                        <!--  -->
                        <?php if($halaman == 'userEdit'):?>
                           <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/userEdit"><img src="<?= base_url(); ?>assets/images/user.png"  class="d-inline-block align-center mr-2"><b>Data Pribadi</b></a><hr>
                        <?php elseif($halaman == 'changeDataKar'):?>
                            <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/userEdit"><img src="<?= base_url(); ?>assets/images/user.png"  class="d-inline-block align-center mr-2"><b>Data Pribadi</b></a><hr>
                        <?php else : ?>
                            <a class="nav-link text-dark" href="<?php echo base_url(); ?>user/userEdit"><img src="<?= base_url(); ?>assets/images/user.png" width="30px" height="30px" class="d-inline-block align-center mr-2"><b>Data Pribadi</b></a><hr>
                        <?php endif; ?>
                        <!--  -->
                        <?php if($halaman == 'Riwayat_absen'):?>
                           <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/Riwayat_absen">
                           <img src="<?= base_url(); ?>assets/images/riwayat.png"  class="d-inline-block align-center mr-2">
                            <b>Riwayat Absensi</b></a>
                        <?php else : ?>
                            <a class="nav-link text-dark" href="<?php echo base_url(); ?>user/Riwayat_absen">
                            <img src="<?= base_url(); ?>assets/images/riwayat.png" width="30px" height="30px" class="d-inline-block align-center mr-2">
                            <b>Riwayat Absensi</b></a>
                        <?php endif; ?><hr>
                        <!--  -->
                        <?php if($halaman == 'permohonanIzin'):?>
                           <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/permohonanIzin"><img src="<?= base_url(); ?>assets/images/jam.png"  class="d-inline-block align-center mr-2"><b>Form Cuti/Izin</b> </a>
                        <?php elseif($halaman == 'addIzin'):?>
                            <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/permohonanIzin"><img src="<?= base_url(); ?>assets/images/jam.png"  class="d-inline-block align-center mr-2"><b>Form Cuti/Izin</b> </a>
                        <?php else : ?>
                            <a class="nav-link text-dark" href="<?php echo base_url(); ?>user/permohonanIzin"><img src="<?= base_url(); ?>assets/images/jam.png" width="30px" height="30px" class="d-inline-block align-center mr-2"><b>Form Cuti/Izin</b> </a>
                        <?php endif; ?>
                        <!--  -->
                        <?php if($halaman == 'Izin_saya'):?>
                           <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/Izin_saya"><img src="<?= base_url(); ?>assets/images/calender.png"  class="d-inline-block align-center mr-2"><b>Cuti/Izin Saya</b></a>
                        <?php else : ?>
                            <a class="nav-link text-dark" href="<?php echo base_url(); ?>user/Izin_saya"><img src="<?= base_url(); ?>assets/images/calender.png" width="30px" height="30px" class="d-inline-block align-center mr-2"><b>Cuti/Izin Saya</b></a>
                        <?php endif; ?>
                        <!--  -->
                        <?php if($halaman == 'semua_izin'):?>
                           <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>user/semua_izin"><img src="<?= base_url(); ?>assets/images/users.png"  class="d-inline-block align-center mr-2"><b>Semua Cuti/Izin</b></a><hr>
                        <?php else : ?>
                            <a class="nav-link text-dark" href="<?php echo base_url(); ?>user/semua_izin"><img src="<?= base_url(); ?>assets/images/users.png" width="30px" height="30px" class="d-inline-block align-center mr-2"><b>Semua Cuti/Izin</b></a><hr>
                        <?php endif; ?>
                        <!--  -->
                        <a class="nav-link text-dark active" href="<?php echo base_url(); ?>user/logout"><img src="<?= base_url(); ?>assets/images/a25.png" width="30px" height="30px" class="d-inline-block align-center mr-2"><b>Keluar</b></a>

                </div>
                
            </div>
        </nav>
    </div>
</div>
        <!-- Content Wrapper -->

<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->