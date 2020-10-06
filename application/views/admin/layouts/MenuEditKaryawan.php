	        <!-- Modal -->
        <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <?php echo form_open_multipart('karyawan/changeFotoKaryawan/'.$dataKar[0]->nik);?>
                    <input type="hidden" name="nik" id="nik" value="<?= $dataKar[0]->nik; ?>">
                    <div class="form-group">
                        <!-- <label for="exampleFormControlFile1">pilih foto</label> -->
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small>*file gambar tidak boleh < 2MB </small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">UPLOAD</button>
                </form>
            </div>
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
							<div class="card-body">
									<div class="user-avatar text-center d-block">
											<img src="<?php echo base_url(); ?>images/<?= $dataKar[0]->image_name; ?>" alt="<?= $dataKar[0]->name; ?>" class="rounded-circle img-thumbnail foto" style="height: 150px;width: 150px;">
									</div>
									<div class="text-center mb-2">
                        <button class="btn foto bg-transparent mb-2" data-toggle="modal" data-target="#uploadfoto" style="font-size: 10px;"><i class="fas fa-edit fa-fw"></i> ubah foto</button>
                    </div>
									<div class="text-center">
											<h2 class="font-24 mb-0"><?= $dataKar[0]->name; ?></h2>
											<p><?= $dataKar[0]->divisi; ?><br><?= $dataKar[0]->nik; ?></p>
								</div>
							</div>
							<div class="card-body border-top">
								<h3 class= font-16">Contact Information</h3>
								<div class="">
										<ul class="list-unstyled mb-0">
										<li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?= $dataKar[0]->email; ?></li>
										<li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?= $dataKar[0]->handphone; ?></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- ============================================================== -->
					<!-- end card profile -->
					<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- campaign data -->
			<!-- ============================================================== -->
			<div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
					<!-- ============================================================== -->
					<!-- campaign tab one -->
					<!-- ============================================================== -->
					<div class="influence-profile-content pills-regular">
							<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
									<li class="nav-item">
											<a class="nav-link card active" id="pills-tentang-tab" data-toggle="pill" href="#pills-tentang" role="tab" aria-controls="pills-tentang" aria-selected="true">Informasi Pegawai</a>
									</li>
									<li class="nav-item">
											<a class="nav-link card" id="pills-riwayatabsensi-tab" data-toggle="pill" href="#pills-riwayatabsensi" role="tab" aria-controls="pills-riwayatabsensi" aria-selected="false">Riwayat Absensi</a>
									</li>
									<!-- <li class="nav-item">
											<a class="nav-link" id="pills-ubahinfo-tab" data-toggle="pill" href="#pills-ubahinfo" role="tab" aria-controls="pills-ubahinfo" aria-selected="false">Edit Informasi</a>
									</li> -->
										<!-- <li class="nav-item">
											<a class="nav-link" id="pills-ubahfoto-tab" data-toggle="pill" href="#pills-ubahfoto" role="tab" aria-controls="pills-ubahfoto" aria-selected="false">Ubah Foto</a>
									</li> -->
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-tentang" role="tabpanel" aria-labelledby="pills-tentang-tab">
								<div class="card">
									<div class="mt-4 text-center">
											<h3>Informasi <?= $dataKar[0]->name; ?></h3>
									</div>
										<div class="card-body">
												<form method="POST" action="<?php echo base_url(); ?>karyawan/changeInfoKaryawan/<?= $dataKar[0]->nik; ?>">
														<div class="container d-flex justify-content-start">
																<div class="col-md-12">
																		<input type="hidden" name="nik" value="<?= $dataKar[0]->nik; ?>">
																		<div class="form-group">
																					<label for="e_nik" class="col-form-label text-dark"><b>NIK :</b> </label>
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
																					<span id="" class="text-danger"></span>
																					<?= form_error('e_password', '<small class="text-danger pl-2">','</small>')?>
																			</div>
																			<div class="form-group">
																					<label for="e_name" class="col-form-label text-dark"><b>Nama :</b> </label>
																					<input id="e_name" name="e_name" type="text" class="form-control" value="<?= $dataKar[0]->name; ?>" >
																					<?= form_error('e_name', '<small class="text-danger pl-2">','</small>')?>
																			</div>
																			<div class="form-group">
																				<label for="e_cabang" class="col-form-label text-dark"><b>Cabang :</b>  <br></label>
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
																					<label for="e_bagian" class="col-form-label text-dark"><b>Bagian :</b>  <br></label>
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
																					<label for="e_handphone" class="col-form-label text-dark">Handphone</label>
																					<input id="e_handphone" name="e_handphone" type="text" value="<?= $dataKar[0]->handphone; ?>"data-inputmask='"mask": "999999999999"' data-mask class="form-control">
																			</div>
																			<!-- <div class="custom-file mb-3">
																					<input type="file" class="custom-file-input" id="uploadImage" name="upload_image" value="<?= $dataKar[0]->image_name; ?>">
																					<label class="custom-file-label" for="uploadImage">Upload Foto Diri</label>
																			</div> -->
																			<div class="form-group">
																					<label for="tentangKaryawan text-dark"><b>Tentang Pegawai :</b></label>
																					<textarea id="mytextarea" class="form-control rounded" id="tentangKaryawan" name="e_tentang" rows="3">
																					<?= $dataKar[0]->tentang; ?></textarea>
																					<?= form_error('e_tentang', '<small class="text-danger pl-2">','</small>')?>
																			</div>
																		
																		<button type="submit" class="btn btn-outline-primary float-right" id="changeInfo">UPDATE</button>
																</div>

														</div>
												</form>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-riwayatabsensi" role="tabpanel" aria-labelledby="pills-riwayatabsensi-tab">
										<div class="card">
										<div class="card-body">
												<h3 class="card-title text-center">Riwayat Absensi <?= $dataKar[0]->name; ?></h3>
										</div>
											<div class="container table-responsive">
												<table id="riwayat" class="table table_history_absen text-center">
												<thead>
													<tr>
														<th>no.</th>
														<th>Keterangan</th>
														<th>Hari</th>
														<th>Tanggal</th>
														<th>Jam</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
												<?php $no = 1; foreach($historyAbsen as $rows) { ?>
														<tr>
														<th scope="row"><?= $no++; ?></th>
																<td><?= $rows->info; ?></td>
																<td><?= $rows->hari; ?></td>
																<td><?= $rows->tanggal; ?></td>
																<td><?= $rows->jam; ?></td>
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
								<!-- <div class="tab-pane fade" id="pills-ubahinfo" role="tabpanel" aria-labelledby="pills-ubahinfo-tab">
										<div class="card">
												<h5 class="card-header">Edit Informasi <?= $dataKar[0]->name; ?></h5>
												<div class="card-body">
														
												</div>
										</div>
								</div> -->
								<!-- <div class="tab-pane fade" id="pills-ubahfoto" role="tabpanel" aria-labelledby="pills-ubahfoto-tab">
										<div class="card">
												<h5 class="card-header">Ubah Foto Karyawan</h5>
												<div class="card-body">
														<form method="POST" action="<?php echo base_url(); ?>karyawan/changeFotoKaryawan" enctype="multipart/form-data">
																<div class="row">
																		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
																				<div class="custom-file mb-3">
																						<input type="file" class="custom-file-input" id="uploadImage" name="upload_image">
																						<label class="custom-file-label" for="uploadImage">Upload Image</label>
																				</div>
																				<input type="hidden" name="id" value="<?= $dataKar[0]->id; ?>">
																				<button type="submit" class="btn btn-primary float-left" id="changeFoto">Ubah</button>
																		</div>
																</div>
														</form>
												</div>
										</div>
								</div> -->
						</div>
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