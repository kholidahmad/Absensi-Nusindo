                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        <div class="card-header mt-2 mb-2">
                            <h3 class="card-title text-center">Pengaturan Absensi</h3>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST" action="<?php echo base_url(); ?>karyawan/pengaturan_absensi" enctype="multipart/form-data">
                                        <div class="col-6 col-md-6"><div class="form-group">
                                            <label for="start" class="col-form-label">Mulai absen (*Contoh: 06:00)</label>
                                            <input id="start" name="start" type="text" class="form-control" data-inputmask='"mask": "99:99"' data-mask>
                                        </div></div>
                                        <div class="form-group"><div class="col-6 col-md-6">
                                            <label for="end" class="col-form-label">Selesai absen (*Contoh: 08:00)</label>
                                            <input id="end" name="end" type="text" class="form-control" data-inputmask='"mask": "99:99"' data-mask>
                                        </div></div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <hr>
                                        <h5 class="card-title">Reset data Kehadiran harian (*Semua karyawan)</h5>
                                       
                                        <button class="btn btn-outline-danger btn-sm" onClick="hapusKaryawan()"><i class="fas fa-fw fa-trash" style="font-size: 10px; margin-top: 5px"></i> 
                                        hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            