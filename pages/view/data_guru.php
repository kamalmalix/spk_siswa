<section class="content-header">
  <h1>
    Data Wali Kelas SMPN 148
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
          <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Wali Kelas</button></a>
          <br></br>
          <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Walas</th>
                <th>Nip</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $queryk = mysqli_query($connect, "SELECT * FROM dt_guru");
                if($queryk == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($connect));
                }
                $no = 1;
                while ($data = mysqli_fetch_array($queryk)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_gr']; ?></td>
                      <td><?php echo $data['nip']; ?></td>
                      <td><?php echo $data['gender_gr']; ?></td>
                      <td><?php echo $data['kelas_gr']; ?></td>
                      <td><center>
                        <a href="" onclick="edit(<?php echo "'".$data['id_gr']."','".$data['nip']."','".$data['nama_gr']."','".$data['alamat_gr']."','".$data['tlp_gr']."','".$data['tempat_gr']."','".$data['tgl_gr']."','".$data['gender_gr']."','".$data['kelas_gr']."','".$data['level']."'";?>)" title="Edit Data" data-toggle="modal" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>

                        <a href='#' onClick='confirm_delete("../models/proses_guru.php?delete=1&id=<?php echo $data['id_gr']; ?>")' title="Hapus Data" data-toggle="" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a>
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
                <h4 class="modal-title">Tambah Wali Kelas</h4>
            </div>
            <div class="modal-body">
                <form action="../models/proses_guru.php" name="modal_popup" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Nomor Induk Pengajar</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input name="nip" type="number" class="form-control" placeholder="Input Nomor Induk Pengajar" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Wali Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input name="nama_gr" type="text" class="form-control" placeholder="Input Nama Wali Kelas" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <textarea type="text" name="alamat_gr" class="form-control" placeholder="Input Tempat Tinggal Wali Kelas"></textarea>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tlp</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input name="tlp_gr" type="number" class="form-control" placeholder="Input Nomor Tlp Wali Kelas"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <input name="tempat_gr" type="text" class="form-control" placeholder="Input Tempat Kelahiran"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="tgl_gr" type="date" class="form-control" placeholder="Input Tanggal Lahir Wali Kelas"/>
                            </div>
                    </div>

                     <div class="form-group">
                        <label>Jenis Kelamin</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-intersex"></i>
                                </div>
                                 <select class="form-control" name="gender_gr">
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
                                <select class="form-control" name="kelas_gr" onchange="changeValue(this.value)" required>
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
                                  <option value= 1 >Biodata Wali Kelas</option>
                               
                                </select> 
                            </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="tambah_guru">
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
        <h4 class="modal-title">Edit Data Wali Kelas </h4>
      </div>
      <div class="modal-body">
       
    <form action="../models/proses_guru.php" name="modal_popup" enctype="multipart/form-data" method="post">
      <input type="text" style="display: none;" name="id" id="idgr" value="">
                    <div class="form-group">
                        <label>Nomor Induk Pengajar</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input name="nip" id="nipgr" type="number" class="form-control" placeholder="Input Nomor Induk Pengajar" required />
                            </div>
                            <div id="name_error"></div>
                    </div>

                    <div class="form-group">
                        <label>Nama Wali Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input name="nama_gr" id="namagr" type="text" class="form-control" placeholder="Input Nama Wali Kelas" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <textarea name="alamat_gr" class="form-control" id="alamatgr"></textarea>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tlp</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input name="tlp_gr" id="tlpgr" type="number" class="form-control" placeholder="Input Nomor Tlp Wali Kelas"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bookmark-o"></i>
                                </div>
                                <input name="tempat_gr" id="tempatgr" type="text" class="form-control" placeholder="Input Tempat Kelahiran"/>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="tgl_gr" id="tglgr" type="date" class="form-control" placeholder="Input Tanggal Lahir Wali Kelas"/>
                            </div>
                    </div>

                     <div class="form-group">
                        <label>Jenis Kelamin</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-intersex"></i>
                                </div>
                                 <select class="form-control" name="gender_gr" id="gendergr"  placeholder="">
                                  <option>--Pilih Jenis Kelamin--</option>
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
                                <select class="form-control" name="kelas_gr" id="kelasgr" onchange="changeValue(this.value)" required>
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
                                <select class="form-control" name="level" id="levelgr" placeholder="">
                                  <option value="">--Pilih Jenis Biodata--</option>
                                  <option value= 1 >Biodata Wali Kelas</option>
                                 
                                </select> 
                            </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="edit_guru">
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

<script type="text/javascript">

     function edit(id,nis,nama,alamat,tlp,tempat,tgl,gender,kelas,level) {
      $('#edit_').modal('show');
      $("#idgr").val(id);
      $("#nipgr").val(nis);
      $("#namagr").val(nama);
      $("#alamatgr").val(alamat);
      $("#tlpgr").val(tlp);
      $("#tempatgr").val(tempat);
      $("#tglgr").val(tgl);
      $("#gendergr").val(gender);
      $("#kelasgr").val(kelas);
      $("#levelgr").val(level);
    }   
</script>


