<section class="content-header">
  <h1>
    Prilaku Siswa SMPN 148
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box"> 
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
                      </form>
                      <hr>
                      <hr>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab"  href="#home">Jenis Nilai</a></li>
    <li><a data-toggle="tab" class="btn btn-primary" href="#menu1"> KBM</a></li>
    <li><a data-toggle="tab" class="btn btn-danger" href="#menu2"> Spiritual</a></li>
    <li><a data-toggle="tab" class="btn btn-success" href="#menu3"> Sosial</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3><center> Tabel Semua Kriteria </center> </h3>
      <div class="box-body">
      <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nilai</th>
            <th>Range</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Baik</td>
            <td> 0 - 3 </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Sedang</td>
            <td> 4 - 6 </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Buruk</td>
            <td> 7 - 10 </td>
          </tr>
        </tbody>
      </table>       
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Nilai KBM</h3>
      <div class="box-body">
      <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
        <tbody>
          <tr>
            <th>Total Point</th>
            <th><?php hitung_point_kbm(
              $data['1_1'],
              $data['1_2'],
              $data['1_3'],
              $data['1_4'],
              $data['1_5']) ?></th>
          </tr>
          <tr>
            <td>Nilai </td>
            <td><?php range_point_kbm(
              $data['1_1'],
              $data['1_2'],
              $data['1_3'],
              $data['1_4'],
              $data['1_5']) ?></td>
          </tr>
        </tbody>
      </table>       
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Nilai Spiritual</h3>
      <div class="box-body">
      <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
        <tbody>
          <tr>
            <th>Total Point</th>
            <th><?php hitung_point_spiritual(
              $data['2_1'],
              $data['2_2'],
              $data['2_3'],
              $data['2_4'],
              $data['2_5']) ?></th>
          </tr>
          <tr>
            <td>Nilai </td>
            <td><?php range_point_spiritual(
              $data['2_1'],
              $data['2_2'],
              $data['2_3'],
              $data['2_4'],
              $data['2_5']) ?></td>
          </tr>
        </tbody>
      </table>       
      </div>
    </div>
    <div id="menu3" class="tab-pane fade">
     <h3>Nilai Sosial</h3>
      <div class="box-body">
      <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
        <tbody>
          <tr>
            <th>Total Point</th>
            <th><?php hitung_point_sosial(
              $data['3_1'],
              $data['3_2'],
              $data['3_3'],
              $data['3_4'],
              $data['3_5']) ?></th>
          </tr>
          <tr>
            <td>Nilai </td>
            <td><?php range_point_sosial(
              $data['3_1'],
              $data['3_2'],
              $data['3_3'],
              $data['3_4'],
              $data['3_5']) ?></td>
          </tr>
        </tbody>
      </table>       
      </div>
    </div>
  </div>


</div>
</div>
</div>
</div>


<?php
function hitung_point_kbm(
  $nilai1_1,
  $nilai1_2,
  $nilai1_3,
  $nilai1_4,
  $nilai1_5
 ){
  $total_nilai = 
  $nilai1_1 + 
  $nilai1_2 + 
  $nilai1_3 + 
  $nilai1_4 + 
  $nilai1_5 
   ; 

  echo $total_nilai ; 
}

function hitung_point_spiritual(
  
  $nilai2_1,
  $nilai2_2,
  $nilai2_3,
  $nilai2_4,
  $nilai2_5
  ){
  $total_nilai = 
   
  $nilai2_1 + 
  $nilai2_2 + 
  $nilai2_3 + 
  $nilai2_4 + 
  $nilai2_5 
  ; 

  echo $total_nilai ; 
}

function hitung_point_sosial(
  
  $nilai3_1,
  $nilai3_2,
  $nilai3_3,
  $nilai3_4,
  $nilai3_5){
  $total_nilai = 
 
  $nilai3_1 + 
  $nilai3_2 + 
  $nilai3_3 + 
  $nilai3_4 + 
  $nilai3_5 ; 

  echo $total_nilai ; 
}

function range_point_kbm(
  $nilai1_1,
  $nilai1_2,
  $nilai1_3,
  $nilai1_4,
  $nilai1_5){
  $total_nilai_kbm = 
  $nilai1_1 + 
  $nilai1_2 + 
  $nilai1_3 + 
  $nilai1_4 + 
  $nilai1_5 ; 

  if ($total_nilai_kbm >= 0 AND $total_nilai_kbm <= 3) {
    echo 'Baik';

  }elseif ($total_nilai_kbm >= 4 AND $total_nilai_kbm <= 6) {
    echo 'Sedang';

  }elseif ($total_nilai_kbm >= 7 AND $total_nilai_kbm <= 10) {
    echo 'Buruk';
  }

  // echo $total_nilai."/10" ; 
}

function range_point_spiritual(

  $nilai2_1,
  $nilai2_2,
  $nilai2_3,
  $nilai2_4,
  $nilai2_5){
  $total_nilai = 
  $nilai2_1 + 
  $nilai2_2 + 
  $nilai2_3 + 
  $nilai2_4 + 
  $nilai2_5 ; 

if ($total_nilai >= 0 AND $total_nilai <= 3) {
    echo 'Baik';

  }elseif ($total_nilai >= 4 AND $total_nilai <= 6) {
    echo 'Sedang';

  }elseif ($total_nilai >= 7 AND $total_nilai <= 10) {
    echo 'Buruk';
  }

  // echo $total_nilai."/10" ; 
}

function range_point_sosial(
  $nilai3_1,
  $nilai3_2,
  $nilai3_3,
  $nilai3_4,
  $nilai3_5){
  $total_nilai = 
  $nilai3_1 + 
  $nilai3_2 + 
  $nilai3_3 + 
  $nilai3_4 + 
  $nilai3_5 ; 

if ($total_nilai >= 0 AND $total_nilai <= 3) {
    echo 'Baik';

  }elseif ($total_nilai >= 4 AND $total_nilai <= 6) {
    echo 'Sedang';

  }elseif ($total_nilai >= 7 AND $total_nilai<= 10) {
    echo 'Buruk';
  }

  // echo $total_nilai."/10" ; 
}
?>


</section>