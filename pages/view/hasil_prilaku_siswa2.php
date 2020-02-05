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

      <a href="#"><button class="btn btn-primary" type="button" data-target="#ModalAdd2" data-toggle="modal"><i class="fa fa-search"></i> Sortir Siswa Berdasarkan Kelas</button></a>

      <br>
      <br>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php


              if(isset($_POST['sortir'])){
                $sortir = $_POST['kelas_sortir'];
                $kelas = $user["kelas"];
                  $queryk = mysqli_query($connect, "SELECT * FROM tb_ranking where kelas_sw = '$sortir' ORDER BY tanggal_verifikasi DESC");
                    if($queryk == false){
                      die ("Terjadi Kesalahan : ". mysqli_error($connect));
                    }

              }else{
                $queryk = mysqli_query($connect, "SELECT * FROM tb_ranking  ORDER BY kelas_sw DESC");
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
                      <td><?php echo '<p>'.$data['note'].'<p>';?></td>
                      <td>
                        <a href="" onclick="edit(<?php echo "'".$data['id_sw']."','".$data['note']."'";?>)" title="Edit Data" data-toggle="modal" class="btn btn-success btn-sm"><span class="fa fa-edit"> </span> Ubah Catatan Walikelas</a>
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
</div>
</div>
</div>


<div id="ModalAdd2" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Sortir Berdasarkan Kelas</h4>
            </div>
            <div class="modal-body">
                
            <form role="form" method="POST" action = "#">
              <div class="form-group">
                        <label>Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-folder-open-o"></i>
                                </div>
                                <select class="form-control" name="kelas_sortir" onchange="changeValue(this.value)" >
                                <option value=0>-Pilih Kelas-</option>
                                <?php
                                include "../models/koneksi.php";
                              
                                $querys = "SELECT * from tb_kelas";
                                $result = mysqli_query($connect,$querys);          
                                while ($row = mysqli_fetch_array($result)) {    
                                echo '<option value="' . $row['nama_kls'] . '">' . $row['nama_kls'] . '</option>';     
                                }      
                                ?>    
                                </select>
                            </div>
                    </div>
        
              <button type="submit" class="btn btn-danger" name="sortir"  value="FILTER">Lihat Siswa</button> 

               <button type="submit" class="btn btn-danger" name="refresh"  value="FILTER">Lihat Semua</button> 
              
            </form>
            </div>
        </div>
    </div>
</div>

<div id="edit_" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Catatan Walikelas </h4>
      </div>
      <div class="modal-body">

    <form action="../models/proses_ranking.php" name="modal_popup" enctype="multipart/form-data" method="post">
      <input type="text" style="display: none;" name="id" id="idsw" value="">
                    <div class="form-group">
                        <label>Ubah Catatan Walikelas :  </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <textarea class="form-control" name="note" id="notesw" rows="4" cols="60"></textarea>
                               
                            </div>
                    </div>

                    
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="edit_note">
                            Edit
                        </button>
                        <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                            Cancel
                        </button>
                    </div>
                </form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">

     function edit(id,note) {
      $('#edit_').modal('show');
      $("#idsw").val(id);
      $("#notesw").val(note);
    }   

</script>

</section>
