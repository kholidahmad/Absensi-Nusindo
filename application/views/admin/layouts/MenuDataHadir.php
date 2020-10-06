      <!-- Modal -->
        <div class="modal fade" id="cetakLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <form action="<?= base_url() . 'karyawan/reportAbsen' ?>" target="_blank" method="post">
                    <label for="bulan" class="text-dark"><b> Bulan :</b></label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="bulan" name="bulan">
                                <?php foreach($month as $rows) { ?>
                                <option value="<?= $rows->bulan;?>"> <?= $rows->bulan; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-sm btn-primary float-right">CETAK</button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
        </div>
        <!-- end modal -->
      <!-- TABS -->
      <nav>
          <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active pl-4 pr-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">   <b>Absensi</b>  </a>
              <a class="nav-item nav-link pl-4 pr-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b>Laporan Absensi </b></a>
          </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card">
                <div class="card-body table-responsive">
                    <div>
                        <h3 class="card-title text-center">Data Absensi Periode: <b> <?= date('F Y')?> </b></h3>
                        <div class="d-flex justify-content-center">
                            <button onclick="backupPerBulan()" class="btn btn-outline-success mt-2 mb-4"><i class="fas fa-fw fa-file"></i> <b>BACKUP & RESET DATA</b></button>
                        </div>
                    </div>
                    <div>
                    
                      <table id="history_absen" class="table table-hover first mb-5">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th>Datang Tepat</th>
                                    <th>Datang Terlambat</th>
                                    <th>Pulang Awal</th>
                                    <th>Pulang Tepat</th>
                                    <th>Pulang Terlambat</th>
                                    <th>Tanpa Keterangan</th>
                                    <th>Total Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                
                                <?php $no = 1; foreach($hadir as $rows) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $rows->nik; ?></td>
                                    <td><?= $rows->name; ?></td>
                                    <td><?= $rows->divisi; ?></td>
                                    <td><?= $rows->datang_tepat; ?></td>
                                    <td><?= $rows->datang_terlambat; ?></td>
                                    <td><?= $rows->pulang_awal; ?></td>
                                    <td><?= $rows->pulang_tepat; ?></td>
                                    <td><?= $rows->pulang_terlambat; ?></td>
                                    <td><?= $rows->tidak_hadir; ?></td>
                                    <td><b><?= $rows->hadir; ?></b></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                        </table><br>
                      </div>
                  </div>
              </div>
          </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <div class="row">
      <!-- ============================================================== -->
      <!-- basic table  -->
      <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="">
                        <h3 class="card-title text-center">Laporan Absensi Per Periode</h3>
                    </div>
                    <!-- <form id="cetakReport" action="<?= base_url() . 'karyawan/reportAbsen' ?>" target="_blank" method="post">
                        <div class="text-center mt-2">
                            <a onclick="document.getElementById('cetakReport').submit()" class="btn btn-sm bg-white text-dark mb-2"><i class="fas fa-fw fa-print"></i> Cetak Laporan</a>
                    </form> -->
                    <div class="text-center mt-2">
                        <button class="btn btn-sm bg-white text-dark mb-2" data-toggle="modal" data-target="#cetakLaporan"><i class="fas fa-fw fa-print"></i> Cetak Laporan</button>
                    </div>
                    <table id="backupabsen" class="table table-hover first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Waktu Backup</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Datang Tepat</th>
                                <th>Datang Terlambat</th>
                                <th>Pulang Awal</th>
                                <th>Pulang Tepat</th>
                                <th>Pulang Terlambat</th>
                                <th>Tanpa Keterangan</th>
                                <th>Total Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            
                        <?php $no = 1; foreach($backuphadir as $rows) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $rows->periode; ?></td>
                            <td><?= $rows->nik; ?></td>
                            <td><?= $rows->name; ?></td>
                            <td><?= $rows->divisi; ?></td>
                            <td><?= $rows->datang_tepat; ?></td>
                            <td><?= $rows->datang_terlambat; ?></td>
                            <td><?= $rows->pulang_awal; ?></td>
                            <td><?= $rows->pulang_tepat; ?></td>
                            <td><?= $rows->pulang_terlambat; ?></td>
                            <td><?= $rows->tidak_hadir; ?></td>
                            <td><b><?= $rows->hadir; ?></b></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- end basic table  -->
      <!-- ============================================================== -->
      </div>
      <!-- END TABS -->

  </div>

      </div>
  </div>