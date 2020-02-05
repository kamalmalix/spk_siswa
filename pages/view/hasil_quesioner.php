<?php 
include "fungsi_perhitungan.php";
?>
<section class="content-header">
  <h1>
    Hasil Quesioner Data Siswa SMPN 148
  </h1>
</section>
<?php

$kelas = $user["kelas"];
$queryj = mysqli_query($connect, "SELECT * FROM dt_sw where kelas_sw = '$kelas' ");
global $jumlah_dt_sw ;
$jumlah_dt_sw = mysqli_num_rows($queryj);

?>
<!-- Main content -->


<section class="content">
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <a href="javascript:;" class="btn btn-primary pull-right" id="btn_verify_all"><i class="fa fa-check"></i> Verifikasi Semua </a>
        </div>
      </div>
    </div>
  </div>

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
                <th>Kelas</th>
                <th>Prilaku Saat KBM</th>
                <th>Prilaku Spiritual</th>
                <th>Prilaku Sosial</th>
                <th>Nilai Prefrensi</th>
                <th>Tanggal Penilaian</th>
                <th style="display: none;"> id</th>
                <th style="display: none;">Note</th>
                <th>Verifikasi Data</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
               $kelas = $user["kelas"];
                $queryk = mysqli_query($connect, "SELECT * FROM tb_quesioner where kelas_sw = '$kelas' ");
                global $jumlah_tb_quesioner ;
                $jumlah_tb_quesioner = mysqli_num_rows($queryk);
                if($queryk == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($connect));
                }
                $no = 1;
                while ($data = mysqli_fetch_array($queryk)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_sw']; ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['kelas_sw']; ?></td>
                      <td><?php kbm($data['kbm'],$user["kelas"]);?></td>
                      <td><?php spiritual($data['spiritual'],$user["kelas"]);; ?></td>
                      <td><?php sosial($data['sosial'],$user["kelas"]);; ?></td>
                      <td><?php prefrensi($data['kbm'],$data['spiritual'],$data['sosial'],$user["kelas"]); ?></td>
                            <td>
                              <?php 
                              $tanggal = $data['tgl_quesioner'];
                              echo date("d F Y",strtotime($tanggal));
                              ?>
                            </td>

                      <td style="display: none;">
                        <?php echo $data['id_sw'];?>
                      </td>

                      <td style="display: none;">
                        <?php echo $data['note'];?>
                      </td>
                    
                      <td>
                      
                        <?php

                        if ($data['status'] == "Belum Diproses" And $jumlah_dt_sw != $jumlah_tb_quesioner ) { ?>
                           <a href="home.php?page=hasil_quesioner" onclick="return confirm('isi quesioner semua siswa terlebih dahulu!');"  class="btn btn-primary btn-circle" title="isi quesioner semua siswa terlebih dahulu!"><span class="fa fa-warning" aria-hidden="true"> &nbsp; Verifikasi</span></a>
                        <?php 
                         } 
                         elseif ($data['status'] == "Belum Diproses" And $jumlah_dt_sw == $jumlah_tb_quesioner ) { ?>
                          <a href="../models/proses_quesioner.php?verifikasi=1&id=<?php echo $data['id_sw']; ?>&nama=<?php echo $data['nama_sw']; ?>&nis=<?php echo $data['nis']; ?>&kelas=<?php echo $data['kelas_sw']; ?>&pref=<?php echo $masuk_prefrensi; ?>&note=<?php echo $data['note']; ?>" onclick="return confirm('Verifikasi data?');"  class="btn btn-danger btn-circle" title="Verifikasi Data"><span class="fa fa-check-square-o" aria-hidden="true"> &nbsp; Verifikasi</span></a>
                         <?php  
                         }elseif ($data['status'] == "Verifikasi") { ?>
                           <a href="#" title="Data Diproses" class="btn btn-success  btn-circle"><i class="fa fa-check"> &nbsp; Terverifikasi</i> </a>
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

<!-- modal edit -->

<div id="edit_" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Hasil Quesioner Siswa </h4>
      </div>
      <div class="modal-body">
       
<div class="box box-primary">
              <form action="#" name="modal_popup" enctype="multipart/form-data" method="post">

                  <div class="box-body">
                      <div class="form-group ">
                        </div> 
                        <input type="text" style="display: none;" name="id_sw" id="idsw" value="">
                        <div class="form-group ">
                              <label>Nis :</label>
                             <input name="nis" id="nissw" type="text" class="form-control" readonly />
                        </div> 
                        <div class="form-group ">
                              <label>Nama Siswa :</label>
                             <input name="nama_sw" id="namasw" type="text" class="form-control" readonly />
                        </div>
                        <div class="form-group ">
                              <label>Kelas :</label>
                             <input name="kelas_sw" id="kelassw" type="text" class="form-control" readonly />
                        </div>
                            
                        <div class="form-group ">
                          <label><h4>A. Prilaku / Sikap Pada Saat KBM </h4></label>
                        </div>
                            <div class="form-group ">
                              <label>1. Apakah Siswa Disiplin dalam mengikuti KBM seperti masuk kelas tepat waktu, tertib dalam mengikuti pelajaran maupun mengumpulkan tugas tepat waktu ?</label>
                              <input id="ini_nilai1_1" type="text" class="form-control" readonly />
                            </div>

                            <div class="form-group ">
                              <label>2. Apakah Siswa Mengalami Penurunan Nilai, Penurunan dalam Memahami Pelajaran, maupun berkurangnya konsentrasi/fokus dalam KBM ?</label>
                                 <input id="ini_nilai1_2" type="text" class="form-control" readonly />
                            </div>
                            <div class="form-group ">
                              <label>3. Apakah Siswa Selalu Membuat Keributan Saat KBM ?</label>
                                <input id="ini_nilai1_3" type="text" class="form-control" readonly />
                            </div>
                            <div class="form-group ">
                              <label>4. Apakah Siswa Selalu Bertanggung Jawab Atas Tugas / Kegiatan yang Diberikan Guru ?</label>
                                 <input id="ini_nilai1_4" type="text" class="form-control" readonly />
                            </div>
                            <div class="form-group ">
                              <label>5. Apakah Siswa dapat berbaur dengan teman, tidak mudah putus asa, ataupun berani dalam presentasi, bertanya, berpendapat maupun menjawab pertanyaan ?</label>
                                 <input id="ini_nilai1_5" type="text" class="form-control" readonly />
                            </div>

                        <div class="form-group ">
                          <label><h4>B. Prilaku Spiritual </h4></label>
                        </div>
                          <div class="form-group ">
                            <label>1. Apakah Siswa Berdoa Sebelum Dan Sesudah Melakukan Sesuatu ? </label>
                               <input id="ini_nilai2_1" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>2. Apakah Siswa Mengungkapkan Atau Mengucapkan Rasa Syukur Atas Karunia Tuhan yang diterima ? </label>
                               <input id="ini_nilai2_2" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>3. Apakah Siswa Mengucapkan Salam Sebelum dan Sesudah Menyampaikan Pendapat Atau Presentasi  ? </label>
                               <input id="ini_nilai2_3" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>4. Apakah Siswa Mengungkapkan rasa kekaguman, baik secara lisan maupun tulisan, terhadap Tuhan saat melihat atau merasakan kebesaran Tuhan ? </label>
                              <input id="ini_nilai2_4" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>5. Apakah Siswa Merasakan keberadaan dan kebesaran Tuhan saat mempelajari ilmu pengetahuan, dengan menyebut nama-Nya ? </label>
                               <input id="ini_nilai2_5" type="text" class="form-control" readonly />
                          </div>

                        <div class="form-group ">
                          <label><h4>C. Prilaku Sosial </h4></label>
                        </div>
                          <div class="form-group ">
                            <label>1. Apakah Siswa Menjaga Sopan Santun dari ucapan maupun perlakuan Kepada Orang Lain ?</label>
                               <input id="ini_nilai3_1" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>2. Apakah Siswa Selalu Peduli Tehadap Kebersihan Lingkungan ?</label>
                              <input id="ini_nilai3_2" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>3. Apakah Siswa Selalu Aktif Dalam Kegiatan Diluar KBM ?</label>
                              <input id="ini_nilai3_3" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>4. Apakah Siswa Sering Membuat Keributan yang merugikan diri sendiri, orang lain maupun sekolah ?</label>
                               <input id="ini_nilai3_4" type="text" class="form-control" readonly />
                          </div>
                          <div class="form-group ">
                            <label>5. Apakah Siswa Mampu Bertoleransi Maupun Bekerja Sama Dengan Siapapun ?</label>
                               <input id="ini_nilai3_5" type="text" class="form-control" readonly />
                          </div>

                          <div class="box-footer">
                            <div class="pull-right">
                            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                           Kembali
                        </button>
                            </div>
                          </div>     
                    </form>
                  </div>
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

     function edit(
      id,
      nis,
      nama,
      kelas,
      nilai1_1,
      nilai1_2,
      nilai1_3,
      nilai1_4,
      nilai1_5,
      nilai2_1,
      nilai2_2,
      nilai2_3,
      nilai2_4,
      nilai2_5,
      nilai3_1,
      nilai3_2,
      nilai3_3,
      nilai3_4,
      nilai3_5){

      $('#edit_').modal('show');
      $("#idsw").val(id);
      $("#nissw").val(nis);
      $("#namasw").val(nama);
      $("#kelassw").val(kelas);

      $("#ini_nilai1_1").val(nilai1_1);
      $("#ini_nilai1_2").val(nilai1_2);
      $("#ini_nilai1_3").val(nilai1_3);
      $("#ini_nilai1_4").val(nilai1_4);
      $("#ini_nilai1_5").val(nilai1_5);
      $("#ini_nilai2_1").val(nilai2_1);
      $("#ini_nilai2_2").val(nilai2_2);
      $("#ini_nilai2_3").val(nilai2_3);
      $("#ini_nilai2_4").val(nilai2_4);
      $("#ini_nilai2_5").val(nilai2_5);
      $("#ini_nilai3_1").val(nilai3_1);
      $("#ini_nilai3_2").val(nilai3_2);
      $("#ini_nilai3_3").val(nilai3_3);
      $("#ini_nilai3_4").val(nilai3_4);
      $("#ini_nilai3_5").val(nilai3_5);

    } 

    $(document).ready(function(){

      $('#btn_verify_all').on('click',function(){
        var data = $('#tmp_modal').DataTable().data();

        console.log(data);

        var nis = [];
        for(var i=0;i<data.length;i++){
          nis.push({
            id:data[i][9],
            nis:data[i][2],
            nama:data[i][1],
            kelas:data[i][3],
            preferensi:data[i][7],
            note:data[i][10],
            date:data[i][8],
          });
        }

        console.log(nis);

        var jsonData =  JSON.stringify(nis);

        $.ajax({
            type: "post",
            url: "../models/proses_verify_all.php",
            data: {
              data_nis : nis
            },
            dataType: "json",
            success: function(result){
                window.location.replace("home.php?page=hasil_quesioner");
            }
        });

      })

    }); 

</script>
