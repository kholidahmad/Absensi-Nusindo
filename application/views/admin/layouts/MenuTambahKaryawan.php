                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                <div class="mt-4">
                                    <h3 class="card-title text-center">Form Tambah Pegawai</h3><hr>
                                </div>
                                    <div class="card-body">
                                        <form id="form" method="POST" action="<?php echo base_url(); ?>karyawan/tambahKaryawan" enctype="multipart/form-data">
                                            <div class="container d-flex justify-content-start">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nik" class="col-form-label text-dark"><b> NIK :</b></label>
                                                        <input id="nik" name="nik" type="text" class="form-control" value="<?= set_value('nik');?>" >
                                                        <span id="nik_error" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label text-dark"><b> Nama :</b></label>
                                                        <input id="name" name="name" type="text" class="form-control" value="<?= set_value('name');?>" >
                                                        <span id="name_error" class="text-danger"></span>
                                                    </div>
                                                    <label for="cabang" class="text-dark"><b> Cabang :</b></label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="cabang" name="cabang">
                                                            <?php foreach($cabang as $rows) { ?>
                                                            <option value="<?= $rows->nama_cabang;?>"> <?= $rows->nama_cabang; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <label for="divisi" class="text-dark"><b> Divisi :</b></label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="divisi" name="divisi">
                                                            <?php foreach($divisi as $rows) { ?>
                                                            <option value="<?= $rows->nama_divisi;?>"> <?= $rows->nama_divisi; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <label for="bagian" class="text-dark"><b> Bagian :</b></label>
                                                    <div class="input-group mb-3">
                                                        <select class="custom-select" id="bagian" name="bagian">
                                                            <?php foreach($bagian as $rows) { ?>
                                                            <option value="<?= $rows->nama_bagian;?>"> <?= $rows->nama_bagian; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="usercode" class="col-form-label text-dark"><b> Username :</b></label>
                                                        <input id="usercode" name="usercode" type="text" class="form-control" value="<?= $userCodestaf;?>">
                                                        <span id="usercode_error" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="col-form-label text-dark"><b>Password :</b></label>
                                                        <input id="password" name="password" type="text" value="<?= $userPass;?>"class="form-control">
                                                        <span id="password_error" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="col-form-label text-dark"><b> Email :</b></label>
                                                        <input id="email" name="email" type="email" class="form-control" value="<?= set_value('email');?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="handphone" class="col-form-label text-dark"><b> Handphone :</b></label>
                                                        <input id="handphone" name="handphone" type="text" value="<?= set_value('handphone');?>" data-inputmask='"mask": "999999999999"' data-mask class="form-control">
                                                    </div>
                                                    <!-- <div class="custom-file mb-3">
                                                        <input type="file" class="custom-file-input" id="uploadImage" name="upload_image">
                                                        <label class="custom-file-label" for="uploadImage">Upload Foto Diri</label>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="tentangKaryawan" class="text-dark"><b> Tentang Pegawai :</b> (*Gunakan tag < br > untuk bari baru)</label>
                                                        <textarea id="tentang" class="form-control rounded" value="<?= set_value('tentang');?>" name="tentang" rows="3" ></textarea>
                                                    </div>
                                                    <div class="float-right mt-5 mb-3">
                                                        <button id="btnTmbhKar" type="submit" class="btn btn-primary"><i class="fas fa-fw fa-user-plus" ></i> TAMBAH </button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                