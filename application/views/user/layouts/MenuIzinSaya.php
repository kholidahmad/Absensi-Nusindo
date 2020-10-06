
            <!-- Modal Lampiran -->
            <div class="modal fade" id="lampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lampiran Izin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body justify-content-center">
                    <div id="viewpdf" style=" width: 1100px;height: 550px;border: 1px solid rgba(0, 0, 0, .2);"></div>
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
                <h2 class="card-title text-center">Riwayat Cuti/Izin Saya</h2>
            </div>
                <div class="table-responsive">
                    <table id="data_izin" class="table table-hover text-center bg-transparant">
                        <thead class="font-weight-light">
                            <tr>
                                <th>No.</th>
                                <th>Kode Izin</th>
                                <th>Tipe Cuti/izin</th>
                                <th>Keterangan</th>
                                <th>Dari tgl</th>
                                <th>Sampai tgl</th>
                                <th>Lama Cuti/Izin</th>
                                <th>Sisa waktu</th>
                                <th>lampiran Izin</th>
                                <th>Status Izin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $no = 1; foreach($dataIzin as $rows) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $rows->kode_izin; ?></td>
                                <td><?= $rows->tipe; ?></td>
                                <td><?= $rows->keterangan_izin; ?></td>
                                <td><?= $rows->from_tgl; ?></td>
                                <td><?= $rows->to_tgl; ?></td>
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
                                <td>
                                    <?php if($rows->lampiran_izin == null):?>
                                        <small> - </small>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-xs btn-outline-primary" data-toggle="modal" data-target="#lampiran" style="font-size: 10px;" onClick="lihat('<?= $rows->lampiran_izin; ?>')">
                                            <i class="fas fa-file fa-fw mr-1"></i>
                                            Lampiran
                                            </button>
                                    <?php endif; ?>     
                                </td>
                                <td>
                                    <?php if($rows->status_izin == 'approved'):?>
                                        <span class="badge badge-pill badge-success text-sm ">
                                        <?=$rows->status_izin; ?>
                                        </span>
                                    <?php elseif($rows->status_izin == 'rejected'):?>
                                        <span class="badge badge-pill badge-danger">
                                        <?=$rows->status_izin; ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-pill badge-warning">
                                        <?=$rows->status_izin; ?></span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($rows->status_izin == 'approved'):?>
                                        <?php if($rows->sisa == 'selesai'):?>
                                        <span>-</span>
                                        <?php endif;?>
                                    <?php elseif($rows->status_izin == 'rejected'):?>
                                        <span>-</span>
                                    <?php else : ?>
                                        <?php if($rows->lampiran_izin != null):?>
                                            <button class="btn btn-outline-danger btn-sm" onClick="batalIzinKarFile('<?= $rows->kode_izin; ?>', '<?= $rows->lampiran_izin; ?>')"><i class="fas fa-fw fa-times-circle"></i> BATAL</button>
                                        <?php else : ?>
                                            <button class="btn btn-outline-danger btn-sm" onClick="batalIzinKar('<?= $rows->kode_izin; ?>')"><i class="fas fa-fw fa-times-circle"></i> BATAL</button>
                                        <?php endif; ?>
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