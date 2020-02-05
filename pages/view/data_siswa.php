<section class="content-header">
  <h1>
    Data Siswa SMPN 148
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
          <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Siswa</button></a>

          <a href="#"><button class="btn btn-primary" type="button" data-target="#ModalAdd2" data-toggle="modal"><i class="fa fa-search"></i> Sortir Siswa Berdasarkan Kelas</button></a>
          <br></br>
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

              if(isset($_POST['sortir'])){
                  $sortir = $_POST['kelas_sortir'];
                  $queryk = mysqli_query($connect, "SELECT * FROM dt_sw where kelas_sw = '$sortir' ");
                }else{
                 $queryk = mysqli_query($connect, "SELECT * FROM dt_sw");
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
                        <a href="" onclick="edit(<?php echo "'".$data['id_sw']."','".$data['nis']."','".$data['nama_sw']."','".$data['alamat_sw']."','".$data['tlp_sw']."','".$data['tempat_sw']."','".$data['tgl_sw']."','".$data['gender_sw']."','".$data['kelas_sw']."','".$data['level']."'";?>)" title="Edit Data" data-toggle="modal" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>

                        <a href='#' onClick='confirm_delete("../models/proses_siswa.php?delete=1&id=<?php echo $data['id_sw']; ?>")' title="Hapus Data" data-toggle="" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a>
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
        
<!-- modal popup tambah -->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Siswa</h4>
            </div>
            <div class="modal-body">
                <form action="../models/proses_siswa.php" name="modal_popup" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Nomor Induk Siswa</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input name="nis" type="number" class="form-control" placeholder="Input Nomor Induk Siswa" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Siswa</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input name="nama_sw" type="text" class="form-control" placeholder="Input Nama Siswa" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <textarea name="alamat_sw" class="form-control" placeholder="Input Tempat Tinggal Siswa"></textarea>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tlp</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input name="tlp_sw" type="number" class="form-control" placeholder="Input Nomor Tlp Siswa"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <input name="tempat_sw" type="text" class="form-control" placeholder="Input Tempat Kelahiran"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="tgl_sw" type="date" class="form-control" placeholder="Input Tanggal Lahir Siswa"/>
                            </div>
                    </div>

                     <div class="form-group">
                        <label>Jenis Kelamin</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-intersex"></i>
                                </div>
                                 <select class="form-control" name="gender_sw">
                                  <option value="">--Pilih Jenis Kelamin--</option>
                                  <option value= "laki-laki" >Laki-Laki</option>
                                  <option value= "Perempuan" >Perempuan</option>
                                </select>
                            </div>
                    </div>

                     <div class="form-group">
                        <label>Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-university"></i>
                                </div>
                                <select class="form-control" name="kelas_sw" onchange="changeValue(this.value)" required>
                                <option value="">-Pilih Kelas-</option>
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

                     <div class="form-group">
                        <label>Level</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-filter"></i>
                                </div>
                                <select class="form-control" name="level" placeholder="">
                                  <option>--Pilih Jenis Biodata--</option>
                                 
                                  <option value= 2 >Biodata Siswa</option>
                                </select> 
                            </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="tambah_siswa">
                            Add
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

<!-- modal edit -->

<div id="edit_" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data Siswa </h4>
      </div>
      <div class="modal-body">
       
    <form action="../models/proses_siswa.php" name="modal_popup" enctype="multipart/form-data" method="post">
      <input type="text" style="display: none;" name="id" id="idsw" value="">
                    <div class="form-group">
                        <label>Nomor Induk Siswa</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input name="nis" id="nissw" type="number" class="form-control" placeholder="Input Nomor Induk Siswa" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Siswa</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input name="nama_sw" id="namasw" type="text" class="form-control" placeholder="Input Nama Siswa" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <textarea name="alamat_sw" class="form-control" id="alamatsw"></textarea>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tlp</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input name="tlp_sw" id="tlpsw" type="number" class="form-control" placeholder="Input Nomor Tlp Siswa"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <input name="tempat_sw" id="tempatsw" type="text" class="form-control" placeholder="Input Tempat Kelahiran"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="tgl_sw" id="tglsw" type="date" class="form-control" placeholder="Input Tanggal Lahir Siswa"/>
                            </div>
                    </div>

                     <div class="form-group">
                        <label>Jenis Kelamin</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-intersex"></i>
                                </div>
                                 <select class="form-control" name="gender_sw" id="gendersw" >
                                  <option value="">--Pilih Jenis Kelamin--</option>
                                  <option value= "laki-laki" >Laki-Laki</option>
                                  <option value= "Perempuan" >Perempuan</option>
                                </select>
                            </div>
                    </div>

                     <div class="form-group">
                        <label>Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-university"></i>
                                </div>
                                <select class="form-control" name="kelas_sw" id="kelassw" onchange="changeValue(this.value)" required>
                                <option value="">-Pilih Kelas-</option>
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

                     <div class="form-group">
                        <label>Level</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-filter"></i>
                                </div>
                                <select class="form-control" name="level" id="levelsw" placeholder="">
                                  <option>--Pilih Jenis Biodata--</option>
                                 
                                  <option value= 2 >Biodata Siswa</option>
                                </select> 
                            </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="edit_siswa">
                            Add
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

<!-- Modal sortir -->
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

<script type="text/javascript">

     function edit(id,nis,nama,alamat,tlp,tempat,tgl,gender,kelas,level) {
      $('#edit_').modal('show');
      $("#idsw").val(id);
      $("#nissw").val(nis);
      $("#namasw").val(nama);
      $("#alamatsw").val(alamat);
      $("#tlpsw").val(tlp);
      $("#tempatsw").val(tempat);
      $("#tglsw").val(tgl);
      $("#gendersw").val(gender);
      $("#kelassw").val(kelas);
      $("#levelsw").val(level);
    }   

</script>
