<section class="content-header">
  <h1>
    Penentuan Siswa Bermasalah SMPN 148
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box"> 
          <div class="box-body">

             <!-- <?php 
                include "../models/koneksi.php";

                $kelas = $user["kelas"];
                $query = "SELECT * FROM tb_ranking WHERE kelas_sw = '$kelas' "  ;
                $sql = mysqli_query($connect,$query);
                while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
                  if ($data['kbm']) {
                    
                  }
                }
                ?>
                 -->

          <div class="tab-content">
              <div class="box-body">

              <h3><center>Perankingan Siswa Dari Yang paling Bermasalah</center> </h3>

              <a href="#"><button class="btn btn-primary" type="button" data-target="#ModalAdd2" data-toggle="modal"><i class="fa fa-search"></i> Sortir History</button></a>
              <br><br>
              <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Prefrensi</th>
                        <th>Kesimpulan</th>
                        <th>Tanggal</th>
                        <th>Catatan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $kelas = $user["kelas"];

                        if(isset($_POST['sortir'])){
                          $sortir = $_POST['tanggal'];
                          $queryk = mysqli_query($connect, "SELECT * FROM tb_ranking where kelas_sw = '$kelas' AND tanggal_verifikasi = '$sortir' ");

                        }else{
                          $queryk = mysqli_query($connect, "SELECT * FROM tb_ranking where kelas_sw = '$kelas' ORDER BY tanggal_verifikasi DESC");
                        }
                        
                        $no = 1;
                        while ($data = mysqli_fetch_array($queryk)){ ?>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $data['nis']; ?></td>
                              <td><?php echo $data['nama_sw']; ?></td>
                              <td><?php echo $data['kelas_sw']; ?></td>
                              <td><?php echo $data['prefrensi'];?></td>
                              <td>
                                <?php if ($data['prefrensi'] >= 0.8) {
                                  echo "Bermasalah";
                                }else{
                                  echo "Tidak Bermasalah";
                                } ?>
                              </td>
                              <td><?php echo date('d F Y', strtotime($data['tanggal_verifikasi'])); ?></td>
                              <td><?php echo $data['note'];?></td>
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
    </div>
  </div>

  <div id="ModalAdd2" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Sortir Berdasarkan Tanggal</h4>
            </div>
            <div class="modal-body">
                
            <form role="form" method="POST" action = "#">
              <div class="form-group">
                <label>Tanggal</label>
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-folder-open-o"></i>
                      </div>
                        <input type="date" name="tanggal">
                  </div>       
              </div>
        
              <button type="submit" class="btn btn-danger" name="sortir"  value="FILTER">Tampilkan</button> 

              <button type="submit" class="btn btn-danger" name="refresh"  value="FILTER">Lihat Semua</button> 
              
            </form>
            </div>
        </div>
    </div>
</div>
</section>
