<section class="content-header">
  <h1>
    Data User
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">

        </div>
          <div class="box-body">
          <!-- <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah User</button></a> -->
        
          <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Kelas</th>
                <th>Level</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $queryuser = mysqli_query($connect, "SELECT * FROM tb_user");
                if($queryuser == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($conn));
                }
                $no = 1;
                while ($user = mysqli_fetch_array($queryuser)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $user['nama_user']; ?></td>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                      <td><?php echo $user['kelas']; ?></td>
                       <td>
                        <?php 
                        if ($user['level'] == 0) {
                          echo 'Admin';
                        }
                      elseif ($user['level'] == 1) {
                          echo 'Guru';
                        }
                      elseif ($user['level'] == 2) {
                          echo 'Siswa';
                        }
                        ?>
                      </td>
                      <td>  
                      <?php
                      if ($user['level'] == 0) {?>
      
                        <a href="" onclick="edit(<?php echo "'".$user['id_user']."','".$user['username']."','".$user['level']."'";?>)" title="edit" data-toggle="modal" class="btn btn-danger btn-sm"><span class="fa fa-edit"> Edit Data Admin </span></a>
                       
                      <?php
                      }
                      ?>

                      <?php
                      if ($user['level'] == 1) {?>
                        <a href='#' onClick='confirm_delete("home.php?page=data_guru")' title="hapus" data-toggle="" class="btn btn-info btn-sm""><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> &nbsp; Lihat Data Guru</a>
                      <?php
                      }
                      ?>

                       <?php
                      if ($user['level'] == 2) {?>
                        <a href='#' onClick='confirm_delete("home.php?page=data_siswa")' title="hapus" data-toggle="" class="btn btn-success btn-sm""><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> &nbsp; Lihat Data Siswa</a>
                      <?php
                      }
                      ?>
                        
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


<!-- Modal Edit -->
<div id="edit_" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit User </h4>
      </div>
      <div class="modal-body">
       
    <form action="../models/proses_user.php" method="post" enctype="multipart/form-data" class="form">
    <input type="text" style="display: none;" name="id" id="idu" value="">
    <input type="text" style="display: none;" name="lv" id="lvu_" value="">
      <div class="form-group has-feedback">
        <label>Username Admin</label>
        <input type="text" name="username" id="username_" class="form-control" value="" placeholder="Username" readonly>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <label>Password Admin</label>
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     
    </div>
    <div class="modal-footer">    
      <button type="submit" class="btn btn-primary" name="edit">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Lihat Data  ?</h4>
            </div>    
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Lihat</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">  


function edit(id,user,lv) {
  $('#edit_').modal('show');
  $("#idu").val(id);
  $("#username_").val(user);
  $("#level_").val(lv);
  $("#lvu_").val(lv);
}



</script>