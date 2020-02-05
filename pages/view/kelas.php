<section class="content-header">
  <h1>
    Kategori Kelas
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
          <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Kelas</button></a>
          <br></br>
          <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
            <thead>
              <tr>
                <th>No.</th>
                <th style="display: none;">idu</th>
                <th>Nama Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $queryk = mysqli_query($connect, "SELECT * FROM tb_kelas");
                if($queryk == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($conn));
                }
                $no = 1;
                while ($k = mysqli_fetch_array($queryk)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td style="display: none;"><?php echo $k['id_kls'];  ?></td>
                      <td><?php echo $k['nama_kls']; ?></td>
                      <td>
                        <a href="" onclick="edit(<?php echo "'".$k['id_kls']."','".$k['nama_kls']."'";?>)" title="edit" data-toggle="modal" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>

                        <a href='#' onClick='confirm_delete("../models/proses_kelas.php?delete=1&id=<?php echo $k['id_kls']; ?>")' title="hapus" data-toggle="" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a>

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
                <h4 class="modal-title">Tambah Kelas</h4>
            </div>
            <div class="modal-body">
                <form action="../models/proses_kelas.php" name="modal_popup" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Nama Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-university"></i>
                                </div>
                                <input name="nama_kls" type="text" class="form-control" placeholder="Input Kelas Baru"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="tambah">
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
        <h4 class="modal-title">Edit Kelas </h4>
      </div>
      <div class="modal-body">
       
    <form action="../models/proses_kelas.php" method="post" enctype="multipart/form-data" class="form">
    <input type="text" style="display: none;" name="id" id="idu" value="">
      <div class="form-group has-feedback">
        <input type="text" name="nama_kls" id="nama_" class="form-control" value="" placeholder="Edit nama kelas..">
        <span class="glyphicon glyphicon-file form-control-feedback"></span>
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

     function edit(id,nama) {
      $('#edit_').modal('show');
      $("#idu").val(id);
      $("#nama_").val(nama);
    }   

</script>
