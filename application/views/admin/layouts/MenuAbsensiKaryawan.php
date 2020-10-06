                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                <div class="card-body mt-2">
                                    <h3 class="card-title text-center">Tanpa Keterangan</h3><hr>
                                </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url(); ?>karyawan/AdminAbsenKaryawan">
                                            <label class="text-dark"><b> Nama Karyawan :</b></label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="nik" name="nik" required>
                                                        <option value="" selected>pilih karayawan...</option>
                                                        <?php foreach($dataKar as $rows) { ?>
                                                        <option value="<?= $rows->nik;?>"><?= $rows->nik;?> - <?= $rows->name; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            
                                            <div class="form-group mt-2">
                                                <label for="jumlah" class="col-form-label text-dark"><b>Jumlah Hari </b></label>
                                                <input id="jumlah" name="jumlah" type="number" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right pl-5 pr-5">SIMPAN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>