<section class="content-header">
  <h1>
    Hasil Quesioner Data Siswa SMPN 148
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
          <div class="box-body">        
          <?php 
          include "../models/koneksi.php";

          $id = $_GET['id'];

          $query = "SELECT * FROM tb_quesioner WHERE id_sw ='$id' limit 1";
          $sql = mysqli_query($connect,$query);

          $data = mysqli_fetch_array($sql,MYSQLI_BOTH); 
          ?>

        <form action="#" name="modal_popup" enctype="multipart/form-data" method="post">
                  <div class="box-body">
                        <div class="form-group ">
                        </div> 
                        <div class="form-group ">
                              <label>Nis :</label>
                             <input name="nis" id="nissw" type="text" class="form-control" value="<?php echo $data['nis']; ?>" readonly />
                        </div> 
                        <div class="form-group ">
                              <label>Nama Siswa :</label>
                             <input name="nama_sw" id="namasw" type="text" class="form-control" value="<?php echo $data['nama_sw']; ?>" readonly />
                        </div>
                        <div class="form-group ">
                              <label>Kelas :</label>
                             <input name="kelas_sw" id="kelassw" type="text" class="form-control" value="<?php echo $data['kelas_sw']; ?>" readonly />
                        </div>
                            
                        <div class="form-group ">
                          <label><h4>A. Prilaku / Sikap Pada Saat KBM </h4></label>
                        </div>
                            <div class="form-group ">
                              <label>1. Apakah Siswa Disiplin dalam mengikuti KBM seperti masuk kelas tepat waktu, tertib dalam mengikuti pelajaran maupun mengumpulkan tugas tepat waktu ?</label>
                              <?php 
                              if ($data['1_1'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu Disiplin" readonly />
                              <?php 
                              }elseif ($data['1_1'] == 2) {?>
                                <input type="text" class="form-control" value="Sering Disiplin" readonly />
                              <?php 
                              }elseif ($data['1_1'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang Disiplin" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?> 
                            </div>

                            <div class="form-group ">
                              <label>2. Apakah Siswa Mengalami Penurunan Nilai, Penurunan dalam Memahami Pelajaran, maupun berkurangnya konsentrasi/fokus dalam KBM ?</label>
                              <?php 
                              if ($data['1_2'] == 1) {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php 
                              }elseif ($data['1_2'] == 2) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php 
                              }elseif ($data['1_2'] == 3) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php
                              }
                              ?>
                            </div>
                            <div class="form-group ">
                              <label>3. Apakah Siswa Selalu Membuat Keributan Saat KBM ?</label>
                              <?php 
                              if ($data['1_3'] == 1) {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php 
                              }elseif ($data['1_3'] == 2) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php 
                              }elseif ($data['1_3'] == 3) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php
                              }
                              ?>
                            </div>
                            <div class="form-group ">
                              <label>4. Apakah Siswa Selalu Bertanggung Jawab Atas Tugas / Kegiatan yang Diberikan Guru ?</label>
                              <?php 
                              if ($data['1_4'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['1_4'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['1_4'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?> 
                            </div>
                            <div class="form-group ">
                              <label>5. Apakah Siswa dapat berbaur dengan teman, tidak mudah putus asa, ataupun berani dalam presentasi, bertanya, berpendapat maupun menjawab pertanyaan ?</label>
                              <?php 
                              if ($data['1_5'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['1_5'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['1_5'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                            </div>

                        <div class="form-group ">
                          <label><h4>B. Prilaku Spiritual </h4></label>
                        </div>
                          <div class="form-group ">
                            <label>1. Apakah Siswa Berdoa Sebelum Dan Sesudah Melakukan Sesuatu ? </label>
                              <?php 
                              if ($data['2_1'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['2_1'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['2_1'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                          </div>
                          <div class="form-group ">
                            <label>2. Apakah Siswa Mengungkapkan Atau Mengucapkan Rasa Syukur Atas Karunia Tuhan yang diterima ? </label>
                              <?php 
                              if ($data['2_2'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['2_2'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['2_2'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                          </div>
                          <div class="form-group ">
                            <label>3. Apakah Siswa Mengucapkan Salam Sebelum dan Sesudah Menyampaikan Pendapat Atau Presentasi  ? </label>
                              <?php 
                              if ($data['2_3'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['2_3'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['2_3'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?> 
                          </div>
                          <div class="form-group ">
                            <label>4. Apakah Siswa Mengungkapkan rasa kekaguman, baik secara lisan maupun tulisan, terhadap Tuhan saat melihat atau merasakan kebesaran Tuhan ? </label>
                              <?php 
                              if ($data['2_4'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['2_4'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['2_4'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                          </div>
                          <div class="form-group ">
                            <label>5. Apakah Siswa Merasakan keberadaan dan kebesaran Tuhan saat mempelajari ilmu pengetahuan, dengan menyebut nama-Nya ? </label>
                              <?php 
                              if ($data['2_5'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['2_5'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['2_5'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                          </div>

                        <div class="form-group ">
                          <label><h4>C. Prilaku Sosial </h4></label>
                        </div>
                          <div class="form-group ">
                            <label>1. Apakah Siswa Menjaga Sopan Santun dari ucapan maupun perlakuan Kepada Orang Lain ?</label>
                              <?php 
                              if ($data['3_1'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['3_1'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['3_1'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?> 
                          </div>
                          <div class="form-group ">
                            <label>2. Apakah Siswa Selalu Peduli Tehadap Kebersihan Lingkungan ?</label>
                              <?php 
                              if ($data['3_2'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['3_2'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['3_2'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?> 
                          </div>
                          <div class="form-group ">
                            <label>3. Apakah Siswa Selalu Aktif Dalam Kegiatan Diluar KBM ?</label>
                             <?php 
                              if ($data['3_3'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['3_3'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['3_3'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                          </div>
                          <div class="form-group ">
                            <label>4. Apakah Siswa Sering Membuat Keributan yang merugikan diri sendiri, orang lain maupun sekolah ?</label>
                              <?php 
                              if ($data['3_4'] == 1) {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php 
                              }elseif ($data['3_4'] == 2) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php 
                              }elseif ($data['3_4'] == 3) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php
                              }
                              ?> 
                          </div>
                          <div class="form-group ">
                            <label>5. Apakah Siswa Mampu Bertoleransi Maupun Bekerja Sama Dengan Siapapun ?</label>
                              <?php 
                              if ($data['3_5'] == 1) {?>
                                <input type="text" class="form-control" value="Selalu" readonly />
                              <?php 
                              }elseif ($data['3_5'] == 2) {?>
                                <input type="text" class="form-control" value="Sering" readonly />
                              <?php 
                              }elseif ($data['3_5'] == 3) {?>
                                <input type="text" class="form-control" value="Kadang - Kadang" readonly />
                              <?php
                              }else {?>
                                <input type="text" class="form-control" value="Tidak Pernah" readonly />
                              <?php
                              }
                              ?>
                          </div>

                          <div class="form-group">
                            <label><h3>Catatan Tambahan Untuk Orang Tua Siswa : </h3></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-folder-open-o"></i>
                                </div>
                                <textarea name="note" rows="4" cols="100" readonly><?php echo $data['note']; ?> </textarea>
                            </div>
                          </div>


                          <div class="box-footer">
                            <div class="pull-right">
                            <a href="home.php?page=quesioner" class="btn btn-primary btn-sm">Kembali </a>
                            </div>
                          </div>     
                    </form>


          </div>
          </div>
          </div>     
</div><!-- /.col -->
</div><!-- /.row -->
</section>
        

<!-- modal edit -->

