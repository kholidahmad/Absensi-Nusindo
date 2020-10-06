        <!-- Modal Tmabah izin -->
        <!-- <div class="modal fade" id="tmbhIzin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Izin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('user/addIzin');?>
                    <input hidden id="nik" name="nik" type="text" class="form-control" value="<?= $userr['nik']; ?>" readonly>
                        <input hidden id="name" name="name" type="text" class="form-control" value="<?= $userr['name']; ?>">
                        <input hidden id="divisi" name="divisi" type="text" class="form-control" value="<?= $datakar['divisi']?>">
                    
                    <div class="form-group">
                        <label for="tgl_izin" class="col-form-label text-dark">Tanggal Izin</label>
                        <input id="tgl_izin" name="tgl_izin" type="text" data-date="" data-date-format="dd-mm-yyyy" class="form-control date"> 
                        <?= form_error('tgl_izin', '<small class="text-danger pl-2">', '</small>')?>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_izin" class="col-form-label text-dark">Keterangan Izin</label>
                        <input id="keterangan_izin" name="keterangan_izin" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lampiran_izin" class="col-form-label text-dark">Lampiran Izin</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran_izin" name="lampiran_izin">
                            <label class="custom-file-label" for="lampiran_izin">Pilih file..</label>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
            </div>
        </div>
        </div> -->

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

    <!-- TABS -->
    <!-- <nav>
        <div class="nav nav-tabs mb-4 bg-light" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">   <b>Tambah Izin</b>  </a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b> Data Izin </b></a>
        </div>
    </nav> -->
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" >
            <div class="card">
                <div class="mt-4">
                    <h2 class="card-title text-center">Form Cuti/Izin</h2><hr>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('user/addIzin');?>
                    <input hidden id="nik" name="nik" type="text" class="form-control" value="<?= $userr['nik'];?>" readonly>
                        <?php if($cekInputsedangizin != null || $cekInputizin != null):?>
                            <div class="container d-flex justify-content-center text-dark">
                                <div class="alert alert-success" role="alert">
                                    <i class="fas fa-check-circle mr-2"></i>Anda sudah mengajukan cuti/izin. Setiap pegawai hanya dapat mengajukan permohonan cuti/izin satu kali sampai cuti/izin yang diambil selesai atau direject oleh admin.
                                </div>
                            </div>
                        <?php else :?>
                            <div class="form-group">
                            <table class="table-borderless text-center">
                                <tr>
                                    <td><label for="tgl_izin" class="text-dark"><b>Dari : </b></label></td>
                                    <td class="text-left pl-0"></td>
                                    <td><input class="form-control" type="text" id="from" name="from" placeholder="mm/dd/yyyy">
                                    <input class="form-control" type="text" id="alternate" name="alternate" readonly>
                                    <?= form_error('from', '<small class="text-danger pl-2">','</small>')?>
                                    </td>
                                    <td> <label for="tgl_izin" class="text-dark pl-2"><b>Sampai : </b></label></td>
                                    <td class="text-left pl-0"></td>
                                    <td><input class="form-control" type="text" id="to" name="to" placeholder="mm/dd/yyyy">
                                    <input class="form-control" type="text" id="alternate1" name="alternate1" readonly> 
                                    <?= form_error('to', '<small class="text-danger pl-2">','</small>')?>
                                    </td>
                                    <td><label for="tgl_izin" class="text-dark ml-4"><b>Lama : </b></label></td>
                                    <td class="text-left pl-0"></td>
                                    <td><input class="form-control text-center" type="text" id="calculated" name="lama" readonly></td>
                                    <td class="text-left pl-2"> hari</td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </table>
                            <?= form_error('tgl_izin', '<small class="text-danger pl-2">','</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="kode_izin" class="col-form-label text-dark kode_izin"><b>Kode Izin</b></label>
                            <input id="kode_izin" name="kode_izin" type="text" class="form-control" value="<?= $kodeizin ?>" readonly>
                        </div>
                        <label for="tipe" class="text-dark"><b> Tipe Cuti/Izin :</b></label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="tipe" name="tipe" required> 
                                <option>pilih tipe...</option>
                                <option value="sakit">Sakit </option>
                                <option value="libur">Libur</option>
                                <option value="pribadi">Pibadi </option>
                                <option value="tahunan">Tahunan </option>
                            </select>
                            <?= form_error('tipe', '<small class="text-danger pl-2">','</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_izin" class="col-form-label text-dark keterangan_izin"><b>Keterangan Izin</b></label>
                            <input id="keterangan_izin" name="keterangan_izin" type="text" class="form-control" value="<?= set_value('keterangan_izin');?>">
                            <?= form_error('keterangan_izin', '<small class="text-danger pl-2">','</small>')?>
                        </div>
                        <div class="form-group mb-5">
                            <label for="exampleFormControlFile1"><b>Lampiran Izin</b></label>
                            <input type="file" class="form-control-file form-control" id="lampiran_izin" name="lampiran_izin">
                        </div>

                        <button type="submit" class="btn btn-primary float-right pl-5 pr-5 mr-2">SUBMIT</button>
                        </form>
                        <?php endif ?>
                </div>
            </div>
        </div>
 
</div>

    </div>
</div>