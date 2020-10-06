                    <!-- Modal Lampiran -->
                    <div class="modal fade" id="lampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
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

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card">
                              <div class="mt-4">
                                <h2 class="card-title text-center">Edit Data Pribadi</h2><hr>
                              </div>
                              <div class="card-body">
                                <form method="POST" action="<?php echo base_url(); ?>user/changeDataKar">
                                  <input type="hidden" name="nik" value="<?= $dataKar[0]->nik; ?>">
                                  <div class="container d-flex justify-content-start">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="e_nik" class="col-form-label text-dark"><b> NIK :</b></label>
                                        <input id="e_nik" name="e_nik" type="text" class="form-control" value="<?= $dataKar[0]->nik; ?>">
                                        <?= form_error('e_nik', '<small class="text-danger pl-2">','</small>')?>
                                      </div>
                                      <div class="form-group">
                                          <label for="e_usercode" class="col-form-label text-dark"><b> Username :</b></label>
                                          <input id="e_usercode" name="e_usercode" type="text" class="form-control" value="<?= $getUser[0]->usercode;?>">
                                          <?= form_error('e_usercode', '<small class="text-danger pl-2">','</small>')?>
                                      </div>
                                      <div class="form-group">
                                          <label for="e_password" class="col-form-label text-dark"><b>Password :</b></label>
                                          <input id="e_password" name="e_password" type="text" value="<?= $getUser[0]->password;?>" class="form-control">
                                          <?= form_error('e_password', '<small class="text-danger pl-2">','</small>')?>
                                      </div>
                                      <div class="form-group">
                                          <label for="e_name" class="col-form-label text-dark"><b>Nama :</b> </label>
                                          <input id="e_name" name="e_name" type="text" class="form-control" value="<?= $dataKar[0]->name; ?>" >
                                          <?= form_error('e_name', '<small class="text-danger pl-2">','</small>')?>
                                      </div>
                                      <div class="form-group">
                                        <label for="e_cabang" class="col-form-label text-dark"><b>Cabang :</b> <br></label>
                                        <div class="input-group mb-3">
                                          <select class="custom-select" id="e_cabang" name="e_cabang">
                                            <?php foreach($cabang as $rows) { ?>
                                                  <?php if ( $dataKar[0]->cabang == $rows->nama_cabang) : ?>
                                                    <option selected value="<?= $rows->nama_cabang;?>"> <?= $rows->nama_cabang; ?> </option>
                                                  <?php else : ?>
                                                    <option value="<?= $rows->nama_cabang;?>"> <?= $rows->nama_cabang; ?> </option>
                                                  <?php endif; ?>
                                              <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="e_divisi" class="col-form-label text-dark"><b>Divisi :</b> <br></label>
                                        <div class="input-group mb-3">
                                          <select class="custom-select" id="e_divisi" name="e_divisi">
                                            <?php foreach($divisi as $rows) { ?>
                                                  <?php if ( $dataKar[0]->divisi == $rows->nama_divisi) : ?>
                                                    <option selected value="<?= $rows->nama_divisi;?>"> <?= $rows->nama_divisi; ?> </option>
                                                  <?php else : ?>
                                                    <option value="<?= $rows->nama_divisi;?>"> <?= $rows->nama_divisi; ?> </option>
                                                  <?php endif; ?>
                                              <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="e_bagian" class="col-form-label text-dark"><b>Bagian :</b> <br></label>
                                        <div class="input-group mb-3">
                                          <select class="custom-select" id="e_bagian" name="e_bagian">
                                            <?php foreach($bagian as $rows) { ?>
                                                  <?php if ( $dataKar[0]->bagian == $rows->nama_bagian) : ?>
                                                    <option selected value="<?= $rows->nama_bagian;?>"> <?= $rows->nama_bagian; ?> </option>
                                                  <?php else : ?>
                                                    <option value="<?= $rows->nama_bagian;?>"> <?= $rows->nama_bagian; ?> </option>
                                                  <?php endif; ?>
                                              <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="e_email" class="col-form-label text-dark"><b>Email :</b></label>
                                          <input id="e_email" name="e_email" type="email" class="form-control" value="<?= $dataKar[0]->email; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="e_handphone" class="col-form-label text-dark"><b>Handphone :</b></label>
                                          <input id="e_handphone" name="e_handphone" type="text" value="<?= $dataKar[0]->handphone; ?>"data-inputmask='"mask": "999999999999"' data-mask class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="e_tentang text-dark"><b>Tentang Pegawai :</b></label>
                                          <textarea id="e_tentang" class="form-control rounded" id="e_tentang" name="e_tentang" rows="3">
                                          <?= $dataKar[0]->tentang; ?> </textarea>
																					<?= form_error('e_tentang', '<small class="text-danger pl-2">','</small>')?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="container d-flex justify-content-end mb-2 mt-3">
                                  <button type="submit" class="btn btn-primary mt-2 mr-2" id="changeInfo">UPDATE</button>
                                  <a class="btn btn-danger mt-2 mr-3" href="<?= base_url()?>user">BATAL</a>
                                  </div>
                                </form>
                            </div>
                            </div>
                        </div>
                
                <!-- END TABS -->

                
            </div>

                </div>
            </div>