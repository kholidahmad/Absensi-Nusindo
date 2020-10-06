               <!-- Modal -->
                    <div class="modal fade" id="modalExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Generate file Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                            <p>Format file harus sesuai dengan template yang telah tersedia pada link di bawah ini :</p>
                            <a href="<?php echo base_url('Karyawan/aksiDownloadTemplate'); ?>" class="mt-2"><i class="fas fa-file-download mr-2"></i>download template</a>

                            <form action="<?php echo base_url(); ?>karyawan/form" method="POST" enctype="multipart/form-data">
                            <input type="file" class="form-control mt-5" name="file" id="uploadexcel">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cencel</button>
                            <input type="submit" name="preview" class="btn btn-primary" value="Preview">
                            
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <!-- END MODAL -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        <div class="card-body mb-2">
                            <h2 class="card-title text-center">Data Pegawai</h2>
                        </div>
                        <div class="container text-center">
                            <button class="btn bg-white btn-sm mr-2" onClick="tambahKaryawan()"><i class="fas fa-fw fa-user-plus" style="font-size: 10px; margin-top: 5px"></i> 
                            Tambah Pegawai</button>
                            <button type="button" class="btn bg-white btn-sm" data-toggle="modal" data-target="#modalExcel"><i class="fas fa-fw fa-file-excel"></i>
                            Generate Excel
                            </button>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="data_karyawan" class="table table-hover table-sm">
                                        <thead class="thead-transparent">
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Cabang</th>
                                                <th>Divisi</th>
                                                <th>Bagian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $no = 1; foreach($getAllDataKaryawan as $rows) { ?>
                                            <tr>
                                                <td class="text-dark"><?= $no++; ?></td>
                                                <td class="text-dark">
                                                <img src="<?php echo base_url(); ?>images/<?= $rows->image_name; ?>" alt="" class="rounded-circle d-inline-block align-center" 
                                                style="height: 38px;width: 38px;">    
                                                </td>
                                                <td class="text-dark"><?= $rows->nik; ?></td>
                                                <td class="text-dark"><?= $rows->name; ?></td>
                                                <td class="text-dark"><?= $rows->cabang; ?></td>
                                                <td class="text-dark"><?= $rows->divisi; ?></td>
                                                <td class="text-dark"><?= $rows->bagian; ?></td>

                                                <td class="d-flex justify-content-start">
                                                    <a href="<?php echo base_url(); ?>karyawan/edit/<?= $rows->nik; ?>" class="btn btn-primary btn-xs btn-space mt-2 pt-2"><i class="fas fa-fw fa-search" style="font-size: 12px; margin-top: 5px"></i> Detail</a>

                                                    <!-- cara mengigrim 2 parameter di onClick -->
                                                    <button class="btn btn-outline-danger btn-xs" style="font-size: 12px; margin-top: 5px" onClick="hapusKaryawan('<?=$rows->nik?>', '<?=$rows->name?>')"><i class="fas fa-fw fa-trash" ></i> 
                                                    HAPUS</button>
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