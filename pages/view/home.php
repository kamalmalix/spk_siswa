<?php

session_start();

include "../models/koneksi.php";
?>

 
<?php include'header.php'; ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<?php 
if (isset($_GET['page'])) {
  switch ($_GET['page']) {
    case 'user':
      include 'user.php';
      break;
    case 'kelas':
      include 'kelas.php';
      break;
    case 'profil_admin':
      include 'profil_admin.php';
      break;
    case 'profil_wk':
      include 'profil_wk.php';
      break;
    case 'profil_sw':
      include 'profil_sw.php';
      break;
    case 'data_siswa':
      include 'data_siswa.php';
      break;
    case 'data_guru':
      include 'data_guru.php';
      break;
    case 'data_siswa2':
      include 'data_siswa2.php';
      break;
    case 'quesioner':
      include 'quesioner.php';
      break;
    case 'profile':
      include 'profile.php';
      break;
    case 'hasil_quesioner':
      include 'hasil_quesioner.php';
      break;
    case 'detail_hasil_quesioner':
      include 'detail_hasil_quesioner.php';
      break;
    case 'hasil_prilaku_siswa':
      include 'hasil_prilaku_siswa.php';
      break;
    case 'range_quesioner':
      include 'range_quesioner.php';
      break;
    case 'hasil_prilaku_siswa2':
      include 'hasil_prilaku_siswa2.php';
      break;
    case 'kriteria':
      include 'kriteria.php';
      break;
    case 'bobot_kriteria':
      include 'bobot_kriteria.php';
      break;
    case 'perilaku':
      include 'perilaku.php';
      break;
    case 'grafik':
      include 'grafik.php';
      break;
    case 'grafikk':
      include 'grafikk.php';
      break;
  }
} else {
?> 
<section class="content-header">
<h1>
  Home
</h1>
</section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">

      </div><!-- /.box-header -->
      <div class="box-body">
        
  <br><br>
     <div class="col-md-3 text-center">
      <img src="../../images/dki.png" width="150px">
     </div>
     <div class="col-md-6 text"><CENTER><H2>PEMERINTAHAN PROPINSI DAERAH KHUSUS IBUKOTA JAKARTA<br><b>DINAS PENDIDIKAN</b></H2><br><span><H1>SMP NEGERI 148 JAKARTA</H1></span><br><h4>Jl. BB I CIPINANG MUARA, JATINEGARA, JAKARTA TIMUR TELP. 8199585<br></h4>   </CENTER>
      <br><br><br><br><br><br>
     </div>
     <div class="col-md-3 text-center">
      <img src="../../images/148.png" width="150px">
     </div>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
              
<?php
  }
?>
</div>
        

<?php include 'footer.php'; ?>