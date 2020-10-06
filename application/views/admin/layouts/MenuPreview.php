               <!-- Modal -->
                    <div class="modal fade" id="modalExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Generate Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(); ?>karyawan/form"></form>
                            <input type="file" name="uploadexcel" id="uploadexcel">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="preview" class="btn btn-primary">
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- END MODAL -->
                <div class="row">
                <?php 
                if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form     
                    if(isset($upload_error)){ // Jika proses upload gagal      
                    echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload      
                    die;
                    } // stop skrip    }
                ?>
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card" style="box-shadow: 2px 2px 5px grey;">
                        <div class="card-body mt-2 ">
                        <a href='<?=base_url("karyawan/data_karyawan")?>' class='btn'><i class="fas fa-arrow-circle-left"></i></a>
                            <h3 class="card-title text-center">Preview Tambah Data Karyawan</h3>
                        </div>
                            <form method="post" action="<?php echo base_url('karyawan/import') ?>">
                            <div class="card-body">
                                <div class="table-responsive text-center">
                                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $numrow = 1;
                                    $kosong = 0;
                                    $noUrut = 0;
                                    ?>
                                    <?php
                                    foreach($sheet as $row){
                                        $nik = $row['A']; // Ambil data NIK
                                        $nama = $row['B']; // Ambil data nama
                                        
                                        if($nik == "" && $nama == ""){
                                            continue;
                                        }
                                        if($numrow > 1){
                                            // Validasi apakah semua data telah diisi
                                            $nik_td = ( ! empty($nik))? "" : " style='background: #E07171;'"; // Jika NIK kosong, beri warna merah
                                            $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                            
                                            
                                            // Jika salah satu data ada yang kosong
                                            if($nik == "" or $nama == ""){
                                            $kosong++; // Tambah 1 variabel $kosong
                                            }
                                            echo "<tr>";
                                            echo "<td>".$noUrut."</td>";
                                            echo "<td".$nik_td.">".$nik."</td>";
                                            echo "<td".$nama_td.">".$nama."</td>";
                                            echo "</tr>";
                                            
                                            // echo "<input"." type="."text"." name="."nik_excel" ." value=".$nik.">";
                                        }
                                        $numrow++;
                                        $noUrut++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <span class="text-danger mt-5">**apabila terdapat field yang berwarna merah berarti harus diisi terlebih dahulu</span>
                                <div class="d-flex justify-content-end mt-4">
                                <?php 
                                        if($kosong > 0){    
                                        ?>        
                                        <script>      
                                        $(document).ready(function(){        
                                            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong        
                                            $("#jumlah_kosong").html('<?php echo $kosong; ?>');                
                                            $("#kosong").show(); // Munculkan alert validasi kosong      
                                        });      
                                        </script>    
                                        <?php    
                                        }else{ // Jika semua data sudah diisi        
                                        // Buat sebuah tombol untuk mengimport data ke database      
                                        echo "<a href='".base_url("karyawan/data_karyawan")."' class='btn btn-outline-danger'>CENCEL</a>";      
                                        echo "<input type='submit' class='btn btn-primary' value='SUBMIT' style='margin-left:8px;'> ";
                                    }
                                ?> 
                                </div>      
                                </div>
                            </div>
                            </div>
                        </div>
                        
                </div>
                </form>
                <?php 
                    }
                ?>
            </div>