<?php
include "../models/koneksi.php";


// normalisasi KBM
  Function kbm($nilai_kbm,$session){
    include "../models/koneksi.php";
    
    $query ="SELECT max(kbm) as maksimal FROM tb_quesioner where kelas_sw = '$session' ";
    $sql= mysqli_query($connect,$query);

    while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){ 

      $nilai_maksimal = $data['maksimal'];
      
      $norm_max_kbm =  $nilai_kbm / $nilai_maksimal  ;

      
      echo round($norm_max_kbm, 2 );

    }
  }

// normalisasi spiritual
  Function spiritual($nilai_spiritual,$session){
    include "../models/koneksi.php";
   
    $query ="SELECT max(spiritual) as maksimal FROM tb_quesioner where kelas_sw = '$session' ";
    $sql= mysqli_query($connect,$query);

    while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){ 

      $nilai_maksimal = $data['maksimal'];
      
      $norm_max_spiritual =  $nilai_spiritual / $nilai_maksimal  ;
      
      echo round($norm_max_spiritual, 2 );
      
    }
  }

// normalisasi sosial
  Function sosial($nilai_sosial,$session){
    include "../models/koneksi.php";
  
    $query ="SELECT max(sosial) as maksimal FROM tb_quesioner where kelas_sw = '$session' ";
    $sql= mysqli_query($connect,$query);

    while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){ 

      $nilai_maksimal = $data['maksimal'];
      
      $norm_max_sosial =  $nilai_sosial / $nilai_maksimal  ;
      
      echo round($norm_max_sosial, 2 );
      

    }
  }

// Prefrensi
  Function prefrensi($data_kbm,$data_spiritual,$data_sosial,$session){
    include "../models/koneksi.php";
    $query ="SELECT max(kbm) as maxkbm, max(spiritual) as maxspiritual, max(sosial) as maxsosial FROM tb_quesioner where kelas_sw = '$session' ";
    $sql= mysqli_query($connect,$query);

    while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){ 

      $nilai_kbm = $data['maxkbm'];
      $nilai_spiritual = $data['maxspiritual'];
      $nilai_sosial = $data['maxsosial'];

      $norm_max_kbm = $data_kbm / $nilai_kbm ;
      $norm_max_spiritual = $data_spiritual / $nilai_spiritual ;
      $norm_max_sosial = $data_sosial / $nilai_sosial ;


      $bobot_kbm = 0.282839;
      $bobot_spiritual = 0.073772;
      $bobot_sosial = 0.643389;

      global $masuk_prefrensi;

      $nilai_prefrensi = ($norm_max_kbm  * $bobot_kbm) + ($norm_max_spiritual * $bobot_spiritual) + ($norm_max_sosial * $bobot_sosial );
      $masuk_prefrensi = number_format($nilai_prefrensi, '6');
      
      // echo round($nilai_prefrensi , 2);

      echo $masuk_prefrensi;
      

    } 
  }

    ?>