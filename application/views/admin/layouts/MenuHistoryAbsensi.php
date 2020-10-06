    <!-- Modal -->
    <div class="modal fade" id="lokasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lokasi Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <div id="lokasi" style=" width: 1100px;height: 550px;border: 1px solid rgba(0, 0, 0, .2);"></div>
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
                    <h2 class="card-title text-center">History Absensi</h2>
                </div>
                    <div class="table-responsive">
                        <table id="history_absen" class="table table-hover first">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($getAllHistoryAbsen as $rows) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><img src="<?php echo base_url(); ?>images/<?= $rows->image_name; ?>" alt="" class="rounded-circle d-inline-block align-center" 
                                                style="height: 38px;width: 38px;"></td>
                                    <td><?= $rows->nik; ?></td>
                                    <td><?= $rows->name; ?></td>
                                    <td><?= $rows->info; ?></td>
                                    <td><?= $rows->hari; ?></td>
                                    <td><?= $rows->tanggal; ?></td>
                                    <td><?= $rows->jam; ?></td>
                                    <td class="text-center">
                                        <?php if($rows->lokasi!=null):?>
                                            <a target="_blank" href="https://www.google.co.id/maps/place/<?=$rows->lokasi;?>"><i class="fas fa-map-marked-alt"></i></a>
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
    </div>
</div>