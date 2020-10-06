        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar"style="background-color: #F0F2F5;">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light " style="">
                    <a class="d-xl-none d-lg-none text-dark" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="mt-3">
                            <?php if($halaman == 'karyawan'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan"><img src="<?= base_url(); ?>assets/images/home.png"  class="d-inline-block align-center mr-3 "><b>Dashboard</b> </a>
                            <?php else : ?>
                                <a class="nav-link active text-dark" href="<?php echo base_url(); ?>karyawan"><img src="<?= base_url(); ?>assets/images/home.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Dashboard</b> </a>
                            <?php endif; ?>
                            <!--  -->
                            <?php if($halaman == 'data_karyawan'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/data_karyawan"><img src="<?= base_url(); ?>assets/images/user.png"  class="d-inline-block align-center mr-3"><b>Data Pegawai</b> </a>
                            <?php elseif($halaman == 'edit'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/data_karyawan"><img src="<?= base_url(); ?>assets/images/user.png"  class="d-inline-block align-center mr-3"><b>Data Pegawai</b> </a>
                            <?php elseif($halaman == 'changeInfoKaryawan'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/data_karyawan"><img src="<?= base_url(); ?>assets/images/user.png"  class="d-inline-block align-center mr-3"><b>Data Pegawai</b> </a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/data_karyawan"><img src="<?= base_url(); ?>assets/images/user.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Data Pegawai</b> </a>
                            <?php endif; ?>

                            <!--  -->
                            <?php if($halaman == 'tambah_karyawan'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/tambah_karyawan"><img src="<?= base_url(); ?>assets/images/b1.png" class="d-inline-block align-center mr-3"><b>Tambah Pegawai</b> </a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/tambah_karyawan"><img src="<?= base_url(); ?>assets/images/b1.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Tambah Pegawai</b> </a>
                            <?php endif; ?>
                            <!--  -->
                            <div class="accordion" id="accordionExample">
                            <div class="">
                                <div class="" id="headingOne">
                                    <h2 class="mb-0">
                                        <a class="nav-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <img src="<?= base_url(); ?>assets/images/b10.png" width="30px" height="30px" class="d-inline-block align-center mr-3">Data Master
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="ml-5">
                                        <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/master_divisi"><b><i class="fas fa-fw fa-file"></i>Master Divisi</b> </a>
                                        <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/master_bagian"><b><i class="fas fa-fw fa-file"></i>Master Bagian</b> </a>
                                        <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/master_cabang"><b><i class="fas fa-fw fa-file"></i>Master Cabang</b> </a>
                                    </div>
                                </div>
                            </div> <hr>
                            <!--  -->
                            <?php if($halaman == 'setting_absensi'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/setting_absensi"><img src="<?= base_url(); ?>assets/images/b2.png" class="d-inline-block align-center mr-3"><b>Pengaturan Absensi</b></a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/setting_absensi"><img src="<?= base_url(); ?>assets/images/b2.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Pengaturan Absensi</b></a>
                            <?php endif; ?>
                            <!--  -->
                            <?php if($halaman == 'history_absensi'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/history_absensi"><img src="<?= base_url(); ?>assets/images/riwayat.png" class="d-inline-block align-center mr-3"><b>Riwayat Absensi</b> </a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/history_absensi"><img src="<?= base_url(); ?>assets/images/riwayat.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Riwayat Absensi</b> </a>
                            <?php endif; ?>
                            <!--  -->
                            <?php if($halaman == 'absensi_karyawan'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/absensi_karyawan"><img src="<?= base_url(); ?>assets/images/b6.png" class="d-inline-block align-center mr-3"><b>Tanpa Keterangan</b></a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/absensi_karyawan"><img src="<?= base_url(); ?>assets/images/b6.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Tanpa Keterangan</b></a>
                            <?php endif; ?><hr>
                            <!--  -->
                            <?php if($halaman == 'izinKaryawan'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/izinKaryawan"><img src="<?= base_url(); ?>assets/images/b7.png" class="d-inline-block align-center mr-3"><b>Cuti/Izin</b>
                                 <?php if($jmlIzin == 0):?>
                                    <span></span>
                                <?php else : ?>
                                    <span class="badge-pill badge-success float-right"><?= $jmlIzin ?></span>
                                    </a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/izinKaryawan"><img src="<?= base_url(); ?>assets/images/b7.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Cuti/Izin</b>
                                 <?php if($jmlIzin == 0):?>
                                    <span></span>
                                <?php else : ?>
                                    <span class="badge-pill badge-success float-right"><?= $jmlIzin ?></span>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!--  -->
                            <?php if($halaman == 'sedang_cuti'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/sedang_cuti"><img src="<?= base_url(); ?>assets/images/b8.png" class="d-inline-block align-center mr-3"><b>Sedang Cuti/Izin</b></a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/sedang_cuti"><img src="<?= base_url(); ?>assets/images/b8.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Sedang Cuti/Izin</b></a>
                            <?php endif; ?>
                            <!--  -->
                            <!-- <?php if($halaman == ''):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/setting_absensi"><img src="<?= base_url(); ?>assets/images/a16.png" class="d-inline-block align-center mr-3"><b>Lembur </b></a><hr>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/setting_absensi"><img src="<?= base_url(); ?>assets/images/a16.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Lembur </b></a>
                            <?php endif; ?> -->
                            <hr>
                            <!--  -->
                            <?php if($halaman == 'data_hadir'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/data_hadir"><img src="<?= base_url(); ?>assets/images/b3.png" class="d-inline-block align-center mr-3"><b>Laporan Absensi</b></a>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/data_hadir"><img src="<?= base_url(); ?>assets/images/b3.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Laporan Absensi</b></a>
                            <?php endif; ?>
                            <!--  -->
                            <?php if($halaman == 'ReportCuti'):?>
                                <a class="nav-link aktiv text-dark" href="<?php echo base_url(); ?>karyawan/ReportCuti"><img src="<?= base_url(); ?>assets/images/b5.png" class="d-inline-block align-center mr-3"><b>Laporan Izin/Cuti</b></a><hr>
                            <?php else : ?>
                                <a class="nav-link  active text-dark" href="<?php echo base_url(); ?>karyawan/ReportCuti"><img src="<?= base_url(); ?>assets/images/b5.png" width="30px" height="30px" class="d-inline-block align-center mr-3"><b>Laporan Izin/Cuti</b></a>
                            <?php endif; ?>
                            <br><br><br><br><br><br><br><br><br>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
                <!-- Content Wrapper -->
        
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        