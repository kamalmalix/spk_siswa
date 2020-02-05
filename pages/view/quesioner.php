<section class="content-header">
  <h1>
    Data Quesioner Siswa SMPN 148
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">

        <div class="pull-right">

          <a href="../models/reset_quesioner.php?reset2=1&kelas=<?php echo $user["kelas"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Semua Data Quesioner ??');" title="Hapus Data Semua Quesioner" data-toggle="" class="btn btn-warning btn-sm"><span class="fa fa-trash" aria-hidden="true"> &nbsp; Reset Quesioner </span></a> ||

          <a href="../models/reset_quesioner.php?reset=1&kelas=<?php echo $user["kelas"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Semua Data Quesioner ??');" title="Hapus Data Semua Quesioner" data-toggle="" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"> &nbsp; Reset Semua Data </span></a>
        </div>

        </div>
          <div class="box-body">
          
          <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Nis</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
               $kelas = $user["kelas"];
                $queryk = mysqli_query($connect, "SELECT * FROM dt_sw where kelas_sw = '$kelas' ");
                if($queryk == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($connect));
                }
                $no = 1;
                while ($data = mysqli_fetch_array($queryk)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_sw']; ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['gender_sw']; ?></td>
                      <td><?php echo $data['kelas_sw']; ?></td>
                      <td><center>
                        <?php 
                        if ($data['status'] == "Belum Diproses" ) { ?>
                            <a href="" onclick="edit(<?php echo "'".$data['id_sw']."','".$data['nis']."','".$data['nama_sw']."','".$data['kelas_sw']."'";?>)" title="Edit Data" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> &nbsp; Isi Quesioner</a>
                        <?php
                        }
                        elseif ($data['status'] == "Diproses" ) { ?>
                            <!-- <a href="#" title="Data Diproses" class="btn btn-danger btn-sm"><i class="fa fa-warning"></i> Data Diproses</a> -->

                            <a href="home.php?edit=1&page=detail_hasil_quesioner&id=<?php echo $data['id_sw']; ?>" onclick="return confirm('Lihat data?');" class="btn btn-primary btn-circle" title="Edit Data"><i class="fa fa-search"></i> &nbsp; Hasil Quesioner</a>

                            <a href="../models/proses_quesioner.php?delete=1&id=<?php echo $data['id_sw']; ?>" onclick="return confirm("hapus data?");" class="btn btn-primary btn-sm" title="Delete Data"><span class="fa fa-trash" aria-hidden="true"> &nbsp; Hapus Quesioner</span></a>

                            <!-- <a href='#' onClick='confirm_delete("../models/proses_quesioner.php?delete=1&id=<?php echo $data['id_sw']; ?>")' title="Hapus Quesioner" data-toggle="" class="btn btn-success btn-sm"><span class="fa fa-trash" aria-hidden="true">Hapus Quesioner</span></a> -->

                        <?php
                        }elseif ($data['status'] == "Verifikasi" ) { ?>
                        <a href="home.php?edit=1&page=detail_hasil_quesioner&id=<?php echo $data['id_sw']; ?>" onclick="return confirm('Lihat data?');" class="btn btn-primary btn-circle" title="Edit Data"><i class="fa fa-search"></i> &nbsp; Hasil Quesioner</a>
                        <?php
                        }
                        ?>
                        

                        
                      </center>
                      </td>
                    </tr>
              
              <?php 
                $no++;  
                }
              ?>
            </tbody>
          </table>
          </div>
          </div>
          </div>     
</div><!-- /.col -->
</div><!-- /.row -->
</section>
        

<!-- modal edit -->

<div id="edit_" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Quesioner Siswa </h4>
      </div>
      <div class="modal-body">
       
<div class="box box-primary">
              <form action="../models/proses_quesioner.php" name="modal_popup" enctype="multipart/form-data" method="post" class="was-validated">

                <input type="text" style="display: none;" name="id_sw" id="idsw" value="">
                
                  <div class="box-body">
                      <div class="form-group ">
                          <label><h4> Pilih Salah Satu Dari Jawaban Yang Ada! </h4></label>
                        </div> 
                        <div class="form-group ">
                              <label>Nis :</label>
                             <input name="nis" id="nissw" type="text" class="form-control" readonly />
                        </div> 
                        <div class="form-group ">
                              <label>Nama Siswa :</label>
                             <input name="nama_sw" id="namasw" type="text" class="form-control" readonly />
                        </div>
                        <div class="form-group ">
                              <label>Kelas :</label>
                             <input name="kelas_sw" id="kelassw" type="text" class="form-control" readonly />
                        </div>
                        <div class="form-group ">
                              <label>Tanggal Pengisian :</label>
                             <input name="date" type="text" style="display: none;" value="<?php echo date("d-m-Y"); ?>" readonly />
                        </div>

                        <div class="form-group ">
                          <label><h4>A. Prilaku / Sikap Pada Saat KBM </h4></label>
                        </div>
                            <div class="form-group ">
                              <label>1. Apakah Siswa Disiplin dalam mengikuti KBM seperti masuk kelas tepat waktu, tertib dalam mengikuti pelajaran maupun mengumpulkan tugas tepat waktu ?</label>
                              <select class="form-control custom-select" name="nilai1_1" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu Disiplin</option>
                                    <option value="2">Sering Disiplin</option>
                                    <option value="3">Kadang - Kadang Disiplin</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                            </div>

                            <div class="form-group ">
                              <label>2. Apakah Siswa Mengalami Penurunan Nilai, Penurunan dalam Memahami Pelajaran, maupun berkurangnya konsentrasi/fokus dalam KBM ?</label>
                                <select class="form-control custom-select" name="nilai1_2" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="4">Selalu</option>
                                    <option value="3">Sering</option>
                                    <option value="2">Kadang - Kadang</option>
                                    <option value="1">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                            </div>
                            <div class="form-group ">
                              <label>3. Apakah Siswa Selalu Membuat Keributan Saat KBM ?</label>
                                <select class="form-control custom-select" name="nilai1_3" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="4">Selalu</option>
                                    <option value="3">Sering</option>
                                    <option value="2">Kadang - Kadang</option>
                                    <option value="1">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                            </div>
                            <div class="form-group ">
                              <label>4. Apakah Siswa Selalu Bertanggung Jawab Atas Tugas / Kegiatan yang Diberikan Guru ?</label>
                                <select class="form-control custom-select" name="nilai1_4" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                            </div>
                            <div class="form-group ">
                              <label>5. Apakah Siswa dapat berbaur dengan teman, tidak mudah putus asa, ataupun berani dalam presentasi, bertanya, berpendapat maupun menjawab pertanyaan ?</label>
                                <select class="form-control custom-select" name="nilai1_5" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                            </div>

                        <div class="form-group ">
                          <label><h4>B. Prilaku Spiritual </h4></label>
                        </div>
                          <div class="form-group ">
                            <label>1. Apakah Siswa Berdoa Sebelum Dan Sesudah Melakukan Sesuatu ? </label>
                              <select class="form-control custom-select" name="nilai2_1" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>2. Apakah Siswa Mengungkapkan Atau Mengucapkan Rasa Syukur Atas Karunia Tuhan yang diterima ? </label>
                              <select class="form-control custom-select" name="nilai2_2" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>3. Apakah Siswa Mengucapkan Salam Sebelum dan Sesudah Menyampaikan Pendapat Atau Presentasi  ? </label>
                              <select class="form-control custom-select" name="nilai2_3" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>4. Apakah Siswa Mengungkapkan rasa kekaguman, baik secara lisan maupun tulisan, terhadap Tuhan saat melihat atau merasakan kebesaran Tuhan ? </label>
                              <select class="form-control custom-select" name="nilai2_4" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>5. Apakah Siswa Merasakan keberadaan dan kebesaran Tuhan saat mempelajari ilmu pengetahuan, dengan menyebut nama-Nya ? </label>
                              <select class="form-control custom-select" name="nilai2_5" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>

                        <div class="form-group ">
                          <label><h4>C. Prilaku Sosial </h4></label>
                        </div>
                          <div class="form-group ">
                            <label>1. Apakah Siswa Menjaga Sopan Santun dari ucapan maupun perlakuan Kepada Orang Lain ?</label>
                              <select class="form-control custom-select" name="nilai3_1" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>2. Apakah Siswa Selalu Peduli Tehadap Kebersihan Lingkungan ?</label>
                              <select class="form-control custom-select" name="nilai3_2" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>3. Apakah Siswa Selalu Aktif Dalam Kegiatan Diluar KBM ?</label>
                              <select class="form-control custom-select" name="nilai3_3" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>4. Apakah Siswa Sering Membuat Keributan yang merugikan diri sendiri, orang lain maupun sekolah ?</label>
                              <select class="form-control custom-select" name="nilai3_4" required>
                                    <option value="">-Pilih Jawaban-</option>
                                    <option value="4">Selalu</option>
                                    <option value="3">Sering</option>
                                    <option value="2">Kadang - Kadang</option>
                                    <option value="1">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group ">
                            <label>5. Apakah Siswa Mampu Bertoleransi Maupun Bekerja Sama Dengan Siapapun ?</label>
                              <select class="form-control custom-select" name="nilai3_5" required>
                                   <option value="">-Pilih Jawaban-</option>
                                    <option value="1">Selalu</option>
                                    <option value="2">Sering</option>
                                    <option value="3">Kadang - Kadang</option>
                                    <option value="4">Tidak Pernah</option>
                              </select>
                              <div class="invalid-feedback">Harus diinputkan !!</div>
                          </div>
                          <div class="form-group">
                            <label><h3>Catatan Tambahan Untuk Orang Tua Siswa : </h3></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <textarea name="note" rows="4" cols="100" class="form-control"></textarea>
                            </div>
                          </div>

                          <div class="box-footer">
                            <button type="submit"  class="btn btn-primary" name="tambah_quesioner">Simpan</button>
                            <div class="pull-right">
                            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                            Batal
                        </button>
                            </div>
                          </div>     
                    </form>
                  </div>
      </div>
    </div>

  </div>
</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
            </div>    
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

     function edit(id,nis,nama,kelas) {
      $('#edit_').modal('show');
      $("#idsw").val(id);
      $("#nissw").val(nis);
      $("#namasw").val(nama);
      $("#kelassw").val(kelas);
    }   

</script>
