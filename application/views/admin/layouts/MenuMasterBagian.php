	<!-- Modal -->
        <div class="modal fade" id="editbagian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Master Bagian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <form action="<?php echo base_url(); ?>karyawan/updateBagian" method="POST">     
				<input type="hidden" class="form-control" name="id" id="id" value="">           
				<input type="text" class="form-control" name="bagian" id="bagian" value="">           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">BATAL</button>
                <input type="submit"  class="btn btn-primary" value="UPDATE">
            </div>
            </form>
            </div>
        </div>
        </div>
    <!-- END MODAL -->
	<!-- Modal -->
        <div class="modal fade" id="addbagian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Master Bagian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <form action="<?php echo base_url(); ?>karyawan/addbagian" method="POST">     
				<label for="name" class="col-form-label text-dark"><b> Nama Bagian :</b></label>           
				<input type="text" class="form-control" name="nama_bagian" value="" required>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">BATAL</button>
                <input type="submit"  class="btn btn-primary" value="TAMBAH">
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
                <h2 class="card-title text-center">Data Master Bagian</h2>
            </div>
            <div class="container text-center">
                <button class="btn bg-white btn-sm mr-2" data-toggle="modal" data-target="#addbagian" ><i class="fas fa-fw fa-plus" style="font-size: 10px; margin-top: 5px"><b></i> 
                Tambah </b> </button>
            </div>
			<div class="container">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblbagian" class="table table-hover">
                            <thead class="thead-transparent">
                                <tr>
                                    <th>No</th>
                                    <th>bagian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($getBagian as $rows) { ?>
                                <tr>
                                    <td class="text-dark"><?= $no++; ?></td>
                                    <td class="text-dark"><?= $rows->nama_bagian; ?></td>
                                    <td class="d-flex justify-content-start">
										                <a data-toggle="modal" data-id="<?=$rows->id?>" data-name="<?=$rows->nama_bagian?>" title="Add this item" class="open-modalEdit btn  btn-warning mr-2" href="#editbagian"><i class="fas fa-fw fa-edit"></i></a>

                                        <button class="btn btn-outline-danger " onClick="hapusBagian('<?=$rows->id?>')"><i class="fas fa-fw fa-trash" ></i> 
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                        </table>
						
                    </div>
                </div>
			</div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
</div>