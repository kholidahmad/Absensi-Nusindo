    <!-- Modal -->
            <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body justify-content-center">
                    <?php echo form_open_multipart('Karyawan/changeFotoAdmin');?>
                        <input type="hidden" name="nik" id="nik" value="<?= $dataKaryawan[0]->nik; ?>">
                        <div class="form-group">
                            <!-- <label for="exampleFormControlFile1">pilih foto</label> -->
                            <input type="file" class="form-control-file" id="foto" name="foto">
                            <small>*file gambar tidak boleh < 2MB </small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">UPLOAD</button>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
                </div>
            </div>
            </div>
            <!-- end modal -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- profile -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- card profile -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-body ">
                <div class="user-avatar text-center d-block">
                    <img src="<?php echo base_url(); ?>images/<?= $dataAdmin[0]->image_name; ?>" alt="<?= $dataAdmin[0]->name; ?>" class="rounded-circle foto img-thumbnail" style="height: 150px;width: 150px;">
                </div>
            </div>
            <div class="text-center mb-2">
                <button class="btn foto bg-transparent mb-2" data-toggle="modal" data-target="#uploadfoto" style="font-size: 10px;"><i class="fas fa-edit fa-fw"></i> ubah foto</button>
            </div>
            <div class="text-center text-dark">
                <h2 class="font-24 text-dark mb-0"><?= $dataAdmin[0]->name; ?></h2>
                <p><?= $dataAdmin[0]->divisi; ?><br><?= $dataAdmin[0]->nik; ?></p>
            </div>
            <div class="card-body border-top text-dark">
                <h3 class="font-16 text-dark">Contact Information:</h3>
                <div class="">
                    <ul class="list-unstyled mb-0 text-dark">
                    <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?= $dataAdmin[0]->email; ?></li>
                    <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?= $dataAdmin[0]->handphone; ?></li>
                </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end card profile -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end profile -->
    <!-- ============================================================== -->
    <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- campaign tab one -->
        <!-- ============================================================== -->
        <div class="influence-profile-content pills-regular">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card">
                        <div class="mt-4">
                        <h2 class="card-title text-center">Edit Data Pribadi</h2><hr>
                        </div>
                        <div class="card-body">
                        <form method="POST" action="<?php echo base_url(); ?>karyawan/changeInfoAdmin">
                            <input type="hidden" name="nik" value="<?= $dataAdmin[0]->nik; ?>">
                            <div class="container d-flex justify-content-start">
                            <div class="col-12">
                                <div class="form-group">
                                <label for="e_nik" class="col-form-label text-dark"><b> NIK :</b></label>
                                <input id="e_nik" name="e_nik" type="text" class="form-control" value="<?= $dataAdmin[0]->nik; ?>">
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
                                    <input id="e_name" name="e_name" type="text" class="form-control" value="<?= $dataAdmin[0]->name; ?>" >
                                    <?= form_error('e_name', '<small class="text-danger pl-2">','</small>')?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="e_email" class="col-form-label text-dark"><b>Email :</b></label>
                                    <input id="e_email" name="e_email" type="email" class="form-control" value="<?= $dataAdmin[0]->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="e_handphone" class="col-form-label text-dark"><b>Handphone :</b></label>
                                    <input id="e_handphone" name="e_handphone" type="text" value="<?= $dataAdmin[0]->handphone; ?>"data-inputmask='"mask": "999999999999"' data-mask class="form-control">
                                </div>
                                
                            </div>
                            </div>
                            <div class="container d-flex justify-content-end mb-2 mt-3">
                            <button type="submit" class="btn btn-primary mt-2 mr-2" id="changeInfo">UPDATE</button>
                            <a class="btn btn-danger mt-2 mr-3" href="<?= base_url()?>karyawan">BATAL</a>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
        
        <!-- END TABS -->
        </div>
        <!-- ============================================================== -->
        <!-- end campaign tab one -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end campaign data -->
    <!-- ============================================================== -->
    </div>

</div>
</div>
