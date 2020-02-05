<section class="content-header">
  <h1>
   Data Profile
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">


		<?php 

          include "../models/koneksi.php";

          $id = $user['id_guru'];

          $query = "SELECT * FROM dt_guru WHERE id_gr = '$id' limit 1";
          $sql = mysqli_query($connect,$query);

          $data = mysqli_fetch_array($sql,MYSQLI_BOTH); 

    	?>

    <form action="../models/proses_user.php" method="post" enctype="multipart/form-data" class="form">
    <input type="text" style="display: none;" name="id" value="<?php echo $user['id_guru']; ?>">
      <div class="form-group has-feedback">
        <label>Nama :</label>
        <input type="text" name="nama_gr" class="form-control" value="<?php echo $data['nama_gr']; ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <label>Nomor Induk Pengajar :</label>
        <input type="text" name="nip" class="form-control" value="<?php echo $data['nip']; ?>" required>
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="form-group">
          <label>Alamat</label>
              <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-home"></i>
                  </div>
                  <textarea name="alamat_gr" class="form-control"><?php echo $data['alamat_gr']; ?></textarea>
              </div>
      </div>

      <div class="form-group">
          <label>Tlp</label>
              <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                  </div>
                  <input name="tlp_gr" type="number" class="form-control" placeholder="Input Nomor Tlp Wali Kelas" value="<?php echo $data['tlp_gr']; ?>"  />
              </div>
      </div>

      <div class="form-group">
          <label>Tempat Kelahiran</label>
              <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-bookmark-o"></i>
                  </div>
                  <input name="tempat_gr" type="text" class="form-control" placeholder="Input Tempat Kelahiran" value="<?php echo $data['tempat_gr']; ?>" />
              </div>
      </div>

      <div class="form-group">
          <label>Tanggal Lahir</label>
              <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                  <input name="tgl_gr" type="date" class="form-control" placeholder="Input Tanggal Lahir Wali Kelas" value="<?php echo $data['tgl_gr']; ?>" />
              </div>
      </div>

       <div class="form-group">
          <label>Jenis Kelamin</label>
              <div class="input-group">
                  <div class="input-group-addon">
                      <i class="fa fa-intersex"></i>
                  </div>
                   <select class="form-control" name="gender_gr" placeholder="">
                    <option value="<?php echo $data['gender_gr']; ?>" ><?php echo $data['gender_gr']; ?></option>
                    <option value= "laki-laki" >Laki-Laki</option>
                    <option value= "Perempuan" >Perempuan</option>
                  </select>
              </div>
      </div>

       <div class="form-group has-feedback">
        <label>Password :</label>
        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password_gr']; ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

     
    </div>
    <div class="modal-footer">    
      <button type="submit" class="btn btn-primary" name="edit_profile">Save</button>
      <a href="home.php" class="btn btn-danger" > Back To Home </a>
      
    </form>


        </div>
      </div>
    </div>
  </div>
 </section>