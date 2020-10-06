    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->

        <!-- Modal -->
        <div class="modal fade" id="lampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
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

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body text-left">
                <div class="">
                    <h2 class="card-title text-center">Data Izin Pegawai</h2>
                </div>
                    <div class="table-responsive">
                        <table id="data_izin" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Izin</th>
                                    <th>Nama Pegawai</th>
                                    <th>Divisi</th>
                                    <th>Tipe</th>
                                    <th>Dari tgl</th>
                                    <th>Sampai tgl</th>
                                    <th>Lama</th>
                                    <th>Keterangan</th>
                                    <th>lampiran Izin</th>
                                    <th>Status Izin</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($dataIzin as $rows) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $rows->kode_izin; ?></td>
                                    <td><?= $rows->name; ?></td>
                                    <td><?= $rows->divisi; ?></td>
                                    <td><?= $rows->tipe; ?></td>
                                    <td><?= $rows->from_tgl; ?></td>
                                    <td><?= $rows->to_tgl; ?></td>
                                    <td><?= $rows->lama; ?> hari</td>
                                    <td><?= $rows->keterangan_izin; ?></td>
                                    <td class="text-center"> <?php if($rows->lampiran_izin == null):?>
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
                                    
                                    <td class="d-flex justify-content-start">
                                        <?php if($rows->status_izin == 'approved' && $rows->sisa == 'selesai'):?>
                                            <?php if($rows->lampiran_izin != null):?>
                                                <button class="btn btn-sm mt-2" onClick="hapusIzinFile('<?= $rows->kode_izin; ?>','<?= $rows->lampiran_izin; ?>')"><i class="fas fa-fw fa-trash text-primary" 
                                                ></i> HAPUS</button>
                                            <?php else :?>
                                                <button class="btn btn-sm mt-2" onClick="hapusIzin('<?= $rows->kode_izin; ?>')"><i class="fas fa-fw fa-trash text-primary" ></i> HAPUS</button>
                                            <?php endif; ?>
                                        <?php elseif($rows->status_izin == 'approved' && $rows->sisa == 'belum'):?>
                                            <span>sedang berlangsung</span>
                                        <?php elseif($rows->status_izin == 'rejected' ):?>
                                            <?php if($rows->lampiran_izin != null):?>
                                                <button class="btn btn-sm mt-2" onClick="hapusIzinFile('<?= $rows->kode_izin; ?>','<?= $rows->lampiran_izin; ?>')"><i class="fas fa-fw fa-trash text-primary" 
                                                ></i> HAPUS</button>
                                            <?php else :?>
                                                <button class="btn btn-sm mt-2" onClick="hapusIzin('<?= $rows->kode_izin; ?>')"><i class="fas fa-fw fa-trash text-primary" ></i> HAPUS</button>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <button class="btn btn-success btn-xs " onClick="approveIzin('<?=$rows->nik?>','<?=$rows->kode_izin?>', '<?=$rows->name?>', '<?=$rows->tipe?>', '<?=$rows->lama?>')"><i class="fas fa-fw fa-check"></i> 
                                            APPROVE</button>
                                            <button class="btn btn-danger btn-xs  ml-2" onClick="rejectIzin('<?=$rows->kode_izin?>', '<?=$rows->name?>')"><i class="fas fa-fw fa-times-circle"></i> 
                                            REJECT</button>
                                        <?php endif; ?>

                                        <!-- <a href="<?php echo base_url(); ?>karyawan/approvIzin/<?= $rows->id_izin;?>/<?= $rows->id_karyawan;?>" 
                                        class="btn btn-primary btn-space"><i class="fas fa-fw fa-user-check"></i><font color="WHITE"></font>
                                        </a> -->
                                        
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
