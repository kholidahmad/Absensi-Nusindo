      <!-- Modal Lampiran -->
      <div class="modal fade" id="lampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style=" width: 900px;height: 620px;border: 1px solid rgba(0, 0, 0, .2);">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lampiran Izin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body justify-content-center">
              <div id="viewpdf" style=" width: 870px;height: 500px;border: 1px solid rgba(0, 0, 0, .2);"></div>
          </div>
          <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> -->
          </div>
      </div>
      </div>

      <!-- TABS -->
    <div class="" style="border:1px;">
      <nav>
          <div class="nav nav-tabs mb-4 " id="nav-tab" role="tablist">
              <a class="nav-item nav-link active pl-5 pr-5" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>Sakit</b></a>
              <a class="nav-item nav-link pl-5 pr-5" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b>Pribadi </b></a>
              <a class="nav-item nav-link pl-5 pr-5" id="nav-libur-tab" data-toggle="tab" href="#nav-libur" role="tab" aria-controls="nav-libur" aria-selected="false"><b>Libur </b></a>
              <a class="nav-item nav-link pl-5 pr-5" id="nav-tahunan-tab" data-toggle="tab" href="#nav-tahunan" role="tab" aria-controls="nav-tahunan" aria-selected="false"><b>Tahunan </b></a>
          </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card" >
              <div class="card-body">
                <div class="mt-2">
                    <h3 class="card-title text-center">Dafatar Pegawai izin Sakit</h3>
                </div>
                  <div class="table-responsive">
                      <table id="sakit" class="table table-hover text-center">
                          <thead class="bg-light">
                              <tr>
                                  <th>No.</th>
                                  <th>Nama</th>
                                  <th>Divisi</th>
                                  <th>Tipe Cuti/izin</th>
                                  <th>Keterangan</th>
                                  <th>Dari tgl</th>
                                  <th>Sampai tgl</th>
                                  <th>Lama Cuti/Izin</th>
                                  <th>Sisa Waktu</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; foreach($sakit as $rows) { ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $rows->name; ?></td>
                                  <td><?= $rows->divisi; ?></td>
                                  <td><?= $rows->tipe; ?></td>
                                  <td><?= $rows->keterangan_izin; ?></td>
                                  <td id="from_tgl"><?= $rows->from_tgl; ?></td>
                                  <td id="to_tgl"><?= $rows->to_tgl; ?></td>
                                  <td><?= $rows->lama; ?> hari</td>
                                  <td>
                                    <?php 
                                        $today = strtotime(date('dMy'));
                                        $dari_tgl = strtotime($rows->from_tgl);
                                        $ke_tgl = strtotime($rows->to_tgl);
                                        $start_date = new DateTime("d");
                                        $end_date = new DateTime($rows->to_tgl);
                                        $interval = $start_date->diff($end_date);
                                    ?>
                                    <?php if($today >= $dari_tgl && !($today > $ke_tgl)):?>
                                        <?php if($dari_tgl == $ke_tgl):?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d; ?></b> hari</span>
                                        <?php else:?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d+1; ?></b> hari</span>
                                        <?php endif; ?> 
                                    <?php elseif($today > $ke_tgl):?>
                                        <span class="text-primary">sudah selesai</span>
                                    <?php else : ?>
                                        <span class="text-primary">belum digunakan</span>
                                    <?php endif; ?>     
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
      <!-- ============================================================== -->
      <!-- end basic table  -->
      <!-- ============================================================== -->
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <div class="row">
      <!-- ============================================================== -->
      <!-- basic table  -->
      <!-- ============================================================== -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card" >
              <div class="card-body">
                <div class="mt-2">
                    <h3 class="card-title text-center">Dafatar Pegawai izin Pribadi</h3>
                </div>
                  <div class="table-responsive">
                      <table id="pribadi" class="table table-hover text-center">
                          <thead class="bg-light">
                              <tr>
                                  <th>No.</th>
                                  <th>Nama</th>
                                  <th>Divisi</th>
                                  <th>Tipe Cuti/izin</th>
                                  <th>Keterangan</th>
                                  <th>Dari tgl</th>
                                  <th>Sampai tgl</th>
                                  <th>Lama Cuti/Izin</th>
                                  <th>Sisa Waktu</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; foreach($pribadi as $rows) { ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $rows->name; ?></td>
                                  <td><?= $rows->divisi; ?></td>
                                  <td><?= $rows->tipe; ?></td>
                                  <td><?= $rows->keterangan_izin; ?></td>
                                  <td id="from_tgl"><?= $rows->from_tgl; ?></td>
                                  <td id="to_tgl"><?= $rows->to_tgl; ?></td>
                                  <td><?= $rows->lama; ?> hari</td>
                                  <td>
                                    <?php 
                                        $today = strtotime(date('dMy'));
                                        $dari_tgl = strtotime($rows->from_tgl);
                                        $ke_tgl = strtotime($rows->to_tgl);
                                        $start_date = new DateTime("d");
                                        $end_date = new DateTime($rows->to_tgl);
                                        $interval = $start_date->diff($end_date);
                                    ?>
                                    <?php if($today >= $dari_tgl && !($today > $ke_tgl)):?>
                                        <?php if($dari_tgl == $ke_tgl):?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d; ?></b> hari</span>
                                        <?php else:?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d+1; ?></b> hari</span>
                                        <?php endif; ?> 
                                    <?php elseif($today > $ke_tgl):?>
                                        <span class="text-primary">sudah selesai</span>
                                    <?php else : ?>
                                        <span class="text-primary">belum digunakan</span>
                                    <?php endif; ?>      
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
      <!-- ============================================================== -->
      <!-- end basic table  -->
      <!-- ============================================================== -->
      </div>
      <!-- END TABS -->
      <div class="tab-pane fade" id="nav-libur" role="tabpanel" aria-labelledby="nav-libur-tab">
      <div class="row">
      <!-- ============================================================== -->
      <!-- basic table  -->
      <!-- ============================================================== -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card" >
            <div class="card-body">
                <div class="mt-2">
                    <h3 class="card-title text-center">Dafatar Pegawai Libur</h3>
                </div>
                  <div class="table-responsive">
                      <table id="libur" class="table table-hover text-center">
                          <thead class="bg-light">
                              <tr>
                                  <th>No.</th>
                                  <th>Nama</th>
                                  <th>Divisi</th>
                                  <th>Tipe Cuti/izin</th>
                                  <th>Keterangan</th>
                                  <th>Dari tgl</th>
                                  <th>Sampai tgl</th>
                                  <th>Lama Cuti/Izin</th>
                                  <th>Sisa Waktu</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; foreach($libur as $rows) { ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $rows->name; ?></td>
                                  <td><?= $rows->divisi; ?></td>
                                  <td><?= $rows->tipe; ?></td>
                                  <td><?= $rows->keterangan_izin; ?></td>
                                  <td id="from_tgl"><?= $rows->from_tgl; ?></td>
                                  <td id="to_tgl"><?= $rows->to_tgl; ?></td>
                                  <td><?= $rows->lama; ?> hari</td>
                                  <td>
                                    <?php 
                                        $today = strtotime(date('dMy'));
                                        $dari_tgl = strtotime($rows->from_tgl);
                                        $ke_tgl = strtotime($rows->to_tgl);
                                        $start_date = new DateTime("d");
                                        $end_date = new DateTime($rows->to_tgl);
                                        $interval = $start_date->diff($end_date);
                                    ?>
                                    <?php if($today >= $dari_tgl && $today <= $ke_tgl):?>
                                        <?php if($dari_tgl == $ke_tgl):?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d; ?></b> hari</span>
                                        <?php else:?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d+1; ?></b> hari</span>
                                        <?php endif; ?> 
                                    <?php elseif($today > $ke_tgl):?>
                                        <span class="text-primary">sudah selesai</span>
                                    <?php else : ?>
                                        <span class="text-primary">belum digunakan</span>
                                    <?php endif; ?>     
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
      <!-- ============================================================== -->
      <!-- end basic table  -->
      <!-- ============================================================== -->
      </div>
      <!-- END TABS -->
      <div class="tab-pane fade" id="nav-tahunan" role="tabpanel" aria-labelledby="nav-tahunan-tab">
      <div class="row">
      <!-- ============================================================== -->
      <!-- basic table  -->
      <!-- ============================================================== -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          
          <div class="card" >
              <div class="card-body">
                <div class="mt-2">
                    <h3 class="card-title text-center">Daftar Pegawai Cuti Tahunan</h3>
                </div>
                  <div class="table-responsive">
                      <table id="tahunan" class="table table-hover text-center">
                          <thead class="bg-light">
                              <tr>
                                  <th>No.</th>
                                  <th>Nama</th>
                                  <th>Divisi</th>
                                  <th>Tipe Cuti/izin</th>
                                  <th>Keterangan</th>
                                  <th>Dari tgl</th>
                                  <th>Sampai tgl</th>
                                  <th>Lama Cuti/Izin</th>
                                  <th>Sisa Waktu</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; foreach($tahunan as $rows) { ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $rows->name; ?></td>
                                  <td><?= $rows->divisi; ?></td>
                                  <td><?= $rows->tipe; ?></td>
                                  <td><?= $rows->keterangan_izin; ?></td>
                                  <td id="from_tgl"><?= $rows->from_tgl; ?></td>
                                  <td id="to_tgl"><?= $rows->to_tgl; ?></td>
                                  <td><?= $rows->lama; ?> hari</td>
                                  <td>
                                    <?php 
                                        $today = strtotime(date('dMy'));
                                        $dari_tgl = strtotime($rows->from_tgl);
                                        $ke_tgl = strtotime($rows->to_tgl);
                                        $start_date = new DateTime("d");
                                        $end_date = new DateTime($rows->to_tgl);
                                        $interval = $start_date->diff($end_date);
                                    ?>
                                    <?php if($today >= $dari_tgl && !($today > $ke_tgl)):?>
                                        <?php if($dari_tgl == $ke_tgl):?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d; ?></b> hari</span>
                                        <?php else:?>
                                            <span class="badge-pill badge-success text-white"><b><?= $interval->d+1; ?></b> hari</span>
                                        <?php endif; ?> 
                                    <?php elseif($today > $ke_tgl):?>
                                        <span class="text-primary">sudah selesai</span>
                                    <?php else : ?>
                                        <span class="text-primary">belum digunakan</span>
                                    <?php endif; ?>     
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
      <!-- ============================================================== -->
      <!-- end basic table  -->
      <!-- ============================================================== -->
      </div>
    </div>
    <!-- END TABS -->

      
  </div>

      </div>
  </div>