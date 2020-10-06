			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="row text-white">
						<div class="col-4 col-lg-4 col-md-4">
							<div class="card" style="background-image: linear-gradient(to right,#56ab2f,#a8e063);">
								<div class="card-body">
									<h3 class="card-title text-white"><i class="fas fa-fw fa-check-circle"></i> Sudah Absen</h3>
									<p class="text-white"><?= date('d F Y')?></p>
									<h1 class="d-flex text-white justify-content-center" style="font-size: 30px;"><b><?=$sudahHadir;?></b></h1>
								</div>
							</div>
						</div>
						<div class="col-4 col-lg-4 col-md-4">
							<div class="card" style="background-image: linear-gradient(to right, #CAC531, #F3F9A7);">
								<div class="card-body">
									<h3 class="card-title text-white"><i class="fas fa-sign-out-alt"></i> Sudah Pulang</h3>
									<p class="text-white"><?= date('d F Y')?></p>
										<h1 class="d-flex text-white justify-content-center" style="font-size: 30px;"><b><?= $sudahPulang?></b></h1>
								</div>
							</div>
						</div>
						<div class="col-4 col-lg-4 col-md-4">
							<div class="card" style="background-image: linear-gradient(to right,#FF512F,#DD2476);">
								<div class="card-body">
								
									<h3 class="card-title text-white mb-5"><i class="fas fa-times-circle"></i> Cuti/Izin</h3>
										<h1 class="d-flex text-white justify-content-center" style="font-size: 30px;"><b><?= $jmlCuti?></b></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="">
						<div class="card-body">
							<a href="<?=base_url('Karyawan/grafik')?>" class="btn btn-primary"><i class="fas fa-eye mr-2"></i> Grafik Total Kehadiran Karyawan</a>

						</div>
					</div>
				</div>
			</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
