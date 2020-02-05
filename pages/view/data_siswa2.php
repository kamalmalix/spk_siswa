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
          
          <table id="tmp_modal" class="table table-bordered table-striped table-scalable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Nis</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Status</th>
          
              </tr>
            </thead>
            <tbody>
              <?php
              $kelas = $user["kelas"];
                $queryk = mysqli_query($connect, "SELECT * FROM dt_sw where kelas_sw = '$kelas' ");
                if($queryk == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($connect));
                }
                $no = 1;
                while ($data = mysqli_fetch_array($queryk)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_sw']; ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['gender_sw']; ?></td>
                      <td><?php echo $data['kelas_sw']; ?></td>
                      <td><?php echo $data['status']; ?></td>
                      
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