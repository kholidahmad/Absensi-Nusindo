        <!-- Modal -->
        <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <?php echo form_open_multipart('user/changeFotoKaryawan');?>
                    <input type="hidden" name="nik" id="nik" value="<?= $dataKaryawan[0]->nik; ?>">
                    <div class="form-group">
                        <!-- <label for="exampleFormControlFile1">pilih foto</label> -->
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small>*file gambar tidak boleh < 2MB </small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">UPLOAD</button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
        </div>
        <!-- end modal -->
          <!-- Jam Digital -->
        <div class="conteiner d-flex justify-content-center">
            <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons">
                <label class="btn bg-white d-flex justify-content-start">
                    <b><p id="jam"></p></b>
                    <b class="mr-1 ml-1"> : </b>
                    <b><p id="menit"></p></b>
                    <b class="mr-1 ml-1"> : </b>
                    <p id="detik"></p>
                </label>
            </div>
        </div>
        <!-- END Jam -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- profile -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- card profile -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body ">
                        <div class="user-avatar text-center d-block">
                            <img src="<?php echo base_url(); ?>images/<?= $dataKaryawan[0]->image_name; ?>" alt="<?= $dataKaryawan[0]->name; ?>" class="rounded-circle foto img-thumbnail" style="height: 150px;width: 150px;">
                        </div>
                    </div>
                    <div class="text-center mb-2">
                        <button class="btn foto bg-transparent mb-2" data-toggle="modal" data-target="#uploadfoto" style="font-size: 10px;"><i class="fas fa-edit fa-fw"></i> ubah foto</button>
                    </div>
                    <div class="text-center text-dark">
                        <h2 class="font-24 text-dark mb-0"><?= $dataKaryawan[0]->name; ?></h2>
                        <p><?= $dataKaryawan[0]->divisi; ?><br><?= $dataKaryawan[0]->nik; ?></p>
                    </div>
                    <div class="card-body border-top text-dark">
                        <h3 class="font-16 text-dark">Contact Information:</h3>
                        <div class="">
                            <ul class="list-unstyled mb-0 text-dark">
                            <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?= $dataKaryawan[0]->email; ?></li>
                            <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?= $dataKaryawan[0]->handphone; ?></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end card profile -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end profile -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- campaign data -->
            <!-- ============================================================== -->
            <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- campaign tab one -->
                <!-- ============================================================== -->
                <div class="influence-profile-content pills-regular">
                    <!-- <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-tentang-tab" data-toggle="pill" href="#pills-tentang" role="tab" aria-controls="pills-tentang" aria-selected="true">Absensi Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-riwayatabsensi-tab" data-toggle="pill" href="#pills-riwayatabsensi" role="tab" aria-controls="pills-riwayatabsensi" aria-selected="false">Riwayat Absensi</a>
                        </li>
                    </ul> -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel" aria-labelledby="pills-tentang-tab">
                            <div class="card">
                                <div class="mt-4">
                                    <h2 class="card-title text-center">Absensi Pegawai</h2>
                                </div>
                                <div class="card-body">
                                <div class="tentang-block">
                                    <p class="tentang-text m-0">
                                    Pegawai wajib absen satu hari sekali, jika tidak maka akan di anggap tidak hadir.</p><br>Absen Datang | Mulai: <b> <?= $settingAbsensi[0]->mulai_absen; ?></b> Selesai: <b><?= $settingAbsensi[0]->selesai_absen; ?></b><br>
                                     Absen Pulang | Mulai: <b> <?= $settingPulang[0]->mulai_absen; ?></b> Selesai: <b><?= $settingPulang[0]->selesai_absen; ?></b>
                                    <hr><br>

                                    <!-- GEOLOCATION -->
                                    <p id = "status"></p>
                                    <a hidden id = "map-link" target="_blank"></a>
                                
                                <!-- TOMBOL ABSEN -->
                                
                                <?php if($ceksedangizin != null):?>
                                    <?php 
                                        $today = strtotime(date('dMy'));
                                        $dari_tgl = strtotime($ceksedangizin[0]->from_tgl);
                                        $ke_tgl = strtotime($ceksedangizin[0]->to_tgl);
                                    ?>
                                    <?php if($ceksedangizin != null && $today>=$dari_tgl && $today <= $ke_tgl):?>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fas fa-exclamation-circle mr-2"></i></i>Anda sedang mengambil cuti/izin. Pegawai yang sedang mengambil cuti/izin tidak dapat melakukan absen.
                                        </div>
                                    <?php else : ?>
                                        <?php if($cekabsen == null):?>
                                        <i class="fas fa-minus-circle mr-1 mt-4"></i><span>Belum Absen Datang</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 mt-5 text-success"></i><span>Sudah Absen Datang</span>
                                        <?php endif ?>
                                        <form method="POST" action="<?php echo base_url(); ?>user/absenKaryawan">
                                            <input hidden type="text" id="lokasi" name="lokasi">
                                            <input hidden type="text" name="nik" value="<?= $dataKaryawan[0]->nik;?>">
                                            <button type="submit" class="btn btn-block btn-lg mt-2 mb-5 text-white"style="background-image: linear-gradient(to right, #3a7bd5,#3a6073);" ><i class="fas fa-calendar-check mr-2"></i><b> ABSEN DATANG</b></button>
                                        </form>

                                        <?php if($cekabsenPulang == null):?>
                                            <i class="fas fa-minus-circle mr-1"></i><span>Belum Absen Pulang</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 text-success"></i><span>Sudah Absen Pulang</span>
                                        <?php endif ?>
                                         <form method="POST" action="<?php echo base_url(); ?>user/absenPulang">
                                            <input hidden type="text" id="lokasi2" name="lokasi">
                                            <input hidden type="text" name="nik" value="<?= $dataKaryawan[0]->nik;?>">
                                            <button type="submit" class="btn btn-block btn-lg mt-2 mb-5 text-white" style="background-image: linear-gradient(to right, #141E30,#243B55);"><i class="fas fa-calendar-check mr-2"></i><b> ABSEN PULANG</b></button>
                                        </form><hr>
                                        
                                        <!-- ABSEN SHIFT -->
                                        <!-- <?php if($cekHistoryShift == null):?>
                                        <i class="fas fa-minus-circle mr-1 mt-4"></i><span>Belum Absen Shift</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 mt-5 text-success"></i><span>Sudah Absen Shift</span>
                                        <?php endif ?>
                                        <a href="<?= base_url(); ?>user/absen_shift_datang/<?= $dataKaryawan[0]->nik; ?>" class="btn btn-brand btn-block btn-lg mt-2 mb-5" ><i class="fas fa-calendar-check"></i>SHIFT DATANG</a>

                                        <?php if($cekHistoryPulangShift == null):?>
                                            <i class="fas fa-minus-circle mr-1"></i><span>Belum Absen Shift Pulang</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 text-success"></i><span>Sudah Absen Shift Pulang</span>
                                        <?php endif ?>
                                        <a href="<?= base_url(); ?>user/absen_shift_pulang/<?= $dataKaryawan[0]->nik; ?>" class="btn btn-dark btn-block btn-lg mt-2 mb-4" 
                                        ><i class="far fa-calendar-check"></i>
                                        SHIFT PULANG</a> -->
                                        <!-- END SHIFT -->
                                    <?php endif; ?>
                                <?php else :?>
                                    <?php if($cekabsen == null):?>
                                        <i class="fas fa-minus-circle mr-1"></i><span>Belum Absen Datang</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 text-success"></i><span>Sudah Absen Datang</span>
                                        <?php endif ?>
                                        <form method="POST" action="<?php echo base_url(); ?>user/absenKaryawan">
                                            <input hidden type="text" id="lokasi2" name="lokasi">
                                            <input hidden type="text" name="nik" value="<?= $dataKaryawan[0]->nik;?>">
                                            <button type="submit" class="btn btn-block text-white btn-lg mt-2 mb-5" style="background-image: linear-gradient(to right, #3a7bd5,#3a6073);" ><i class="fas fa-calendar-check mr-2"></i><b> ABSEN DATANG</b></button>
                                        </form>
                                       
                                        <?php if($cekabsenPulang == null):?>
                                            <i class="fas fa-minus-circle mr-1"></i><span>Belum Absen Pulang</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 text-success"></i><span>Sudah Absen Pulang</span>
                                        <?php endif ?>
                                        <form method="POST" action="<?php echo base_url(); ?>user/absenPulang">
                                            <input hidden type="text" id="lokasi" name="lokasi">
                                            <input hidden type="text" name="nik" value="<?= $dataKaryawan[0]->nik;?>">
                                            <button type="submit" class="btn btn-block text-white btn-lg mt-2 mb-5" style="background-image: linear-gradient(to right, #141E30,#243B55);"><i class="fas fa-calendar-check mr-2"></i><b> ABSEN PULANG</b></button>
                                        </form>
                                        

                                        <!-- ABSEN SHIFT -->
                                        <!-- <?php if($cekHistoryShift == null):?>
                                        <i class="fas fa-minus-circle mr-1 mt-4"></i><span>Belum Absen Shift</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 mt-5 text-success"></i><span>Sudah Absen Shift</span>
                                        <?php endif ?>
                                        <a href="<?= base_url(); ?>user/absen_shift_datang/<?= $dataKaryawan[0]->nik; ?>" class="btn btn-brand btn-block btn-lg mt-2 mb-5" ><i class="fas fa-calendar-check"></i> SHIFT DATANG</a>

                                        <?php if($cekHistoryPulangShift == null):?>
                                            <i class="fas fa-minus-circle mr-1"></i><span>Belum Absen Shift Pulang</span>
                                        <?php else : ?>
                                            <i class="fas fa-check-circle mr-1 text-success"></i><span>Sudah Absen Shift Pulang</span>
                                        <?php endif ?>
                                        <a href="<?= base_url(); ?>user/absen_shift_pulang/<?= $dataKaryawan[0]->nik; ?>" class="btn btn-dark btn-block btn-lg mt-2 mb-4" 
                                        ><i class="far fa-calendar-check"></i>
                                        SHIFT PULANG</a> -->
                                        <!-- END SHIFT -->
                                    <?php endif ?>
                                <!-- END ABSEN -->
                                    <!-- PAP -->
                                    <!-- <video id="player" controls autoplay></video><br>
                                    <button id="capture" class="btn btn-success btn-sm"><i class="fas fa-fw fa-camera"></i> Jepret</button>
                                    <canvas id="snapshot" width=320 height=240></canvas> -->

                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="pills-riwayatabsensi" role="tabpanel" aria-labelledby="pills-riwayatabsensi-tab">
                            <div class="card">
                                <h5 class="card-header bg-light ">Riwayat Absensi <?= $dataKaryawan[0]->name; ?></h5>
                                <div class="card-body border-top">
                                    <div class="riwayatabsensi-block table-responsive">
                                        <table class="table table_history_absen">
                                            <thead class="bg-light">
                                                <tr>
                                                <th scope="col">no.</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Hari</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Jam</th>
                                                <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1; foreach($historyAbsen as $rows) { ?>
                                                <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $rows->info; ?></td>
                                                    <td><?= $rows->hari; ?></td>
                                                    <td><?= $rows->tanggal; ?></td>
                                                    <td><?= $rows->jam; ?></td>
                                                    <td>
                                                        <?php if($rows->status_absen == 'diluar waktu'):?>
                                                        <span class="badge badge-pill badge-danger">
                                                        <?= $rows->status_absen; ?>
                                                        </span>
                                                    <?php elseif($rows->status_absen == 'tepat waktu') : ?>
                                                        <span class="badge badge-pill badge-success">
                                                        <?= $rows->status_absen; ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-pill badge-warning">
                                                        <?= $rows->status_absen; ?></span>
                                                    <?php endif; ?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                                <?php foreach($alasanKaryawan as $rows) { ?>
                                <div class="card-body border-top">
                                    <div class="riwayatabsensi-block">
                                        <p class="riwayatabsensi-text m-0"><?= $rows->tanggal; ?></p>
                                        <span class="text-dark font-weight-bold"><?= $rows->alasan; ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end campaign tab one -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end campaign data -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>