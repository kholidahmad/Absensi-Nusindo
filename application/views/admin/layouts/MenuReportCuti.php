<!-- Modal -->
        <div class="modal fade" id="lampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lampiran Cuti/Izin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body justify-content-center">
                    <div id="viewpdf" style=" width: 1100px;height: 550px;border: 1px solid rgba(0, 0, 0, .2);"></div>
                </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
            <div class="card-body">
                <div class="">
                    <h2 class="card-title text-center">Laporan Data Absensi</h2>
                </div>
                <div class="table-responsive">
                  <table id="reportcuti" class="table table-hover text-center">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Kode</th>
                                  <th>Nama</th>
                                  <th>Divisi</th>
                                  <th>Tipe Cuti/izin</th>
                                  <th>Keterangan</th>
                                  <th>Dari tgl</th>
                                  <th>Sampai tgl</th>
                                  <th>Lama Cuti/Izin</th>
                                  <th>Status Izin</th>
                                  <th>Lampiran</th>
                              </tr>
                          </thead>
                          <tbody class="text-dark">
                              <?php $no = 1; foreach($reportcuti as $rows) { ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $rows->kode_izin; ?></td>
                                  <td><?= $rows->name; ?></td>
                                  <td><?= $rows->divisi; ?></td>
                                  <td><?= $rows->tipe; ?></td>
                                  <td><?= $rows->keterangan_izin; ?></td>
                                  <td id="from_tgl"><?= $rows->from_tgl; ?></td>
                                  <td id="to_tgl"><?= $rows->to_tgl; ?></td>
                                  <td><?= $rows->lama; ?> hari</td>
                                  <td>
                                    <?php if($rows->status_izin == 'approved'):?>
                                            <span class="badge badge-success">
                                            <?= $rows->status_izin; ?>
                                            </span>
                                        <?php elseif($rows->status_izin == 'rejected'):?>
                                            <span class="badge badge-danger">
                                            <?= $rows->status_izin; ?></span>
                                        <?php else : ?>
                                            <span class="badge badge-warning">
                                            <?= $rows->status_izin; ?></span>
                                        <?php endif; ?>
                                  </td>
                                  <td class="text-center"> <?php if($rows->lampiran_izin == null):?>
                                        <small> - </small>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#lampiran" style="font-size: 10px;" onClick="lihat('<?= $rows->lampiran_izin; ?>')">
                                        <i class="fas fa-file fa-fw mr-1"></i>
                                        Lampiran
                                        </button>
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
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
      </div>
    </div>

</div>