<section class="content-header">
  <h1>
    Hasil Penilaian Guru
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

          $id = $user['id_siswa'];
          $date = date('Y-m-d');

          $query = "SELECT * FROM tb_ranking Where id_sw ='$id' ORDER BY tanggal_verifikasi DESC LIMIT 1 ";
          $sql = mysqli_query($connect,$query);

          $data = mysqli_fetch_array($sql,MYSQLI_BOTH); 
          ?>

        <form action="#" enctype="multipart/form-data" method="post">
          <input type="text" style="display: none;" name="id" value="<?php echo $user['id_siswa']; ?>">
          <div class="box-body">


                <div class="form-group ">
                      <label>Tanggal :</label>
                     <input type="text" class="form-control" value="<?php echo date('d F Y', strtotime($data['tanggal_verifikasi']));?>" readonly />
                </div>
                <div class="form-group ">
                      <label>Nis :</label>
                     <input type="text" class="form-control" value="<?php echo $data['nis']; ?>" readonly />
                </div> 
                <div class="form-group ">
                      <label>Nama Siswa :</label>
                     <input type="text" class="form-control" value="<?php echo $data['nama_sw']; ?>" readonly />
                </div>
                <div class="form-group ">
                      <label>Kelas :</label>
                     <input type="text" class="form-control" value="<?php echo $data['kelas_sw']; ?>" readonly />
                </div>
                <div class="form-group ">
                      <label>Preferensi :</label>
                     <input type="text" class="form-control" value="<?php echo $data['prefrensi']; ?>" readonly />
                </div>
                <div class="form-group ">
                      <label>Kesimpulan :</label>
                     <input type="text" class="form-control" value="<?php if ($data['prefrensi'] >= 0.8) {
                       echo "Anak Anda Bermasalah";
                     }else{
                      echo "Tidak Bermasalah ";
                     } ?>" readonly />
                </div>
                <div class="form-group ">
                      <label>Catatan :</label>
                      <br>
                     <textarea name="note" class="form-control" readonly><?php echo $data['note']; ?> </textarea>
                </div>
                   
            </form>
          </div>
          </div>
          </div>     
</div><!-- /.col -->
</div><!-- /.row -->
</section>