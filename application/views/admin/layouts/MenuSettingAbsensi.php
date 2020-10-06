        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body mt-2">
                            <h2 class="card-title text-center">Pengaturan Absensi</h2><hr>
                        </div>
                    <div class="card-body">
                        <h5 class="card-title">A.) Setting Waktu Absen Harian</h5>
                        <form method="POST" action="<?php echo base_url(); ?>karyawan/settingAbsensi">
                            <div class="container d-flex justify-content-start">
                                <div class="col-6">
                                    <label for="datang" class="text-dark"> Absen Datang</label>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="start" class="col-form-label">Mulai absen (*Contoh: 06:00)</label>
                                            <input id="start_absen" name="start" type="text" class="form-control" data-inputmask='"mask": "99:99"' data-mask required value="<?= $datang[0]->mulai_absen?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <label for="end" class="col-form-label">Selesai absen (*Contoh: 08:00)</label>
                                            <input id="end" name="end" type="text" class="form-control" data-inputmask='"mask": "99:99"' data-mask required value="<?= $datang[0]->selesai_absen?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="garis-divider"></div>
                                <div class="col-6">
                                    <label for="datang" class="text-dark"> Absen Pulang</label>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="mulaipulang" class="col-form-label">Mulai absen (*Contoh: 06:00)</label>
                                            <input id="mulaipulang" name="mulaipulang" type="text" class="form-control" data-inputmask='"mask": "99:99"' data-mask required value="<?= $pulang[0]->mulai_absen?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <label for="selesaipulang" class="col-form-label">Selesai absen (*Contoh: 08:00)</label>
                                            <input id="selesaipulang" name="selesaipulang" type="text" class="form-control" data-inputmask='"mask": "99:99"' data-mask required value="<?= $pulang[0]->selesai_absen?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group ml-4">
                                <div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-edit" ></i> UPDATE</button>
                                </div>
                            </div>
                            <hr>
                            <!-- <button class="btn btn-outline-danger btn-sm" onClick="resethadir('<?=$rows->nik?>')"><i class="fas fa-fw fa-trash" style="font-size: 10px; margin-top: 5px"></i> Reset Kehadiran</button> -->
                        </form>
                        <!-- <div class="bg-light">
                            <h5 class="card-title text-dark">B.) Reset data Kehadiran harian </h5>
                            <div class="ml-3 bg-light">
                                <p class="text-dark">Reset semua data absensi hadir harian karyawan. Dapat dilakukan setiap sebulan sekali pada saat setelah selesai report data kehadiran. Setelah Anda menekan tombol Reset Kehadiran di bawah ini maka semua data absensi kehadiran akan menjadi 0.</p>
                                <a href="<?= base_url(); ?>karyawan/resetAbsen" class="btn btn-outline-danger"><i class="fas fa-fw fa-history" style="font-size: 10px; margin-top: 5px"></i> RESET KEHADIRAN </a>
                            </div>
                        </div> -->
                        
                        <h5 class="card-title text-dark">B.) Setting Hari Absen </h5>
                        
                            <label class="ml-3 text-dark">Beri tanda centang pada hari dimana pegawai dapat melakukan absensi. Apabila hari tidak tercentang berarti pegawai tidak diizinkan melakukan absensi.</label>
                            <div class="col-6 ml-3">
                                <div class="d-flex justify-content-between">
                                <form action="<?php echo base_url(); ?>karyawan/SettingHariAbsen"" method="post">
                                    <?php foreach($namahari as $namaharii): ?>
                                        <div class="form-check">
                                            <?php if(preg_match("/{$namaharii}/i", $hari) == true):?>
                                                <label><input type="checkbox" name="hariAbsen[]" value="<?= $namaharii;?>" checked> <?= $namaharii;?></label>
                                            <?php else:?>
                                                <label><input type="checkbox" name="hariAbsen[]" value="<?= $namaharii;?>"> <?= $namaharii;?></label>
                                            <?php endif;?> 
                                        </div>
                                    <?php endforeach; ?>
                                    </div><br>
                                   <button type="submit" class="btn btn-primary">update hari absensi</button>
                                </form>
                                
                            </div><hr>
                        <div class="bg-light">
                        <h5 class="card-title text-dark">C.) Setting Tanggal Libur </h5>
                            <label class="ml-3 text-dark">Menambahkan hari libur bertujuan agar karyawan tidak dapat melakukan input data absensi pada hari libur tersebut.</label>
                            
                            <div class="container d-flex justify-content-start">
                                <div class="col-4">
                                    <form method="POST" action="<?php echo base_url(); ?>karyawan/tambahLibur">
                                    <label for="tgl_izin" class="text-dark pl-2"><b>Tanggal :</b></label>
                                    <input class="form-control" type="text" id="from" name="from" required placeholder="pilih tanggal...">
                                    <input hidden class="form-control" type="text" id="alternate" name="alternate" readonly>
                                    <label for="ketlibur" class="text-dark pl-2 mt-4"><b>Keterangan</b></label>
                                    <input class="form-control" type="text" id="ketlibur" name="ketlibur" >
                                    <button type="submit" class="btn btn-primary float-right mb-5 mt-3">tambah libur</button>
                                </form>
                                </div>
                                <div class="garis-divider"></div>
                                <div class="col-8 table-responsive ">
                                   <table id="settinglibur" class="table table-hover table-responsive table-bordered mt-4">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Tgl/bulan/tahun</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;foreach($libur as $l){ ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= $l->tgl?></td>
                                            <td><?= $l->keterangan?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                
                                                <button class="btn btn-outline-danger btn-sm ml-2" onClick="hapusLibur('<?= $l->id; ?>')"><i class="fas fa-fw fa-trash" style="font-size: 10px; margin-top: 5px"></i> HAPUS</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
                
        </div>
    </div>
</div>