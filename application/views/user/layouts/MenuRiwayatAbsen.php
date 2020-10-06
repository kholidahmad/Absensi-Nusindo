
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
    <div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        <div class="card">
            <div class="card-body">
            <div class="mt-2">
                <h2 class="card-title text-center">Riwayat Absensi</h2>
            </div>
                <div class="table-responsive">
                    <table id="riwayat" class="table table_history_absen text-center rounded">
                        <thead>
                          <tr>
                            <th>no.</th>
                            <th>Keterangan</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Lokasi</th>
                            <th>Status</th>
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
                                    <?php if($rows->lokasi!=null):?>
                                            <a target="_blank" href="https://www.google.co.id/maps/place/<?=$rows->lokasi;?>"><i class="fas fa-map-marked-alt"></i></a>
                                            <!-- <button onclick="showmap('<?=$rows->lokasi;?>')"><i class="fas fa-map-marked-alt"></i></button> -->
                                        <?php else:?>
                                            -
                                        <?php endif;?>
                                </td>
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
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->

    <!-- END TABS -->

        
    </div>

        </div>
    </div>