<?php
include "koneksi.php";

$idsw = $_POST['id_sw'];
$nis = $_POST['nis'];
$namasw = $_POST['nama_sw'];
$kelassw = $_POST['kelas_sw'];

$nilai1_1 = $_POST['nilai1_1'];
$nilai1_2 = $_POST['nilai1_2'];
$nilai1_3 = $_POST['nilai1_3'];
$nilai1_4 = $_POST['nilai1_4'];
$nilai1_5 = $_POST['nilai1_5'];

$kbm = $nilai1_1 + $nilai1_2 + $nilai1_3 + $nilai1_4 + $nilai1_5 ;

$nilai2_1 = $_POST['nilai2_1'];
$nilai2_2 = $_POST['nilai2_2'];
$nilai2_3 = $_POST['nilai2_3'];
$nilai2_4 = $_POST['nilai2_4'];
$nilai2_5 = $_POST['nilai2_5'];

$spiritual = $nilai2_1 + $nilai2_2 + $nilai2_3 + $nilai2_4 + $nilai2_5 ;

$nilai3_1 = $_POST['nilai3_1'];
$nilai3_2 = $_POST['nilai3_2'];
$nilai3_3 = $_POST['nilai3_3'];
$nilai3_4 = $_POST['nilai3_4'];
$nilai3_5 = $_POST['nilai3_5'];

$sosial = $nilai3_1 + $nilai3_2 + $nilai3_3 + $nilai3_4 + $nilai3_5 ;

$date = date("Y-m-d");
$note = $_POST['note'];

$status3 = "Verifikasi";
$status2 = "Belum Diproses";
$status = "Diproses";

if (isset($_POST['tambah_quesioner'])){
	$query = "INSERT INTO tb_quesioner VALUES('',
    '$idsw',
    '$nis',
    '$namasw',
    '$kelassw',
    '$nilai1_1',
    '$nilai1_2',
    '$nilai1_3',
    '$nilai1_4',
    '$nilai1_5',
    '$nilai2_1',
    '$nilai2_2',
    '$nilai2_3',
    '$nilai2_4',
    '$nilai2_5',
    '$nilai3_1',
    '$nilai3_2',
    '$nilai3_3',
    '$nilai3_4',
    '$nilai3_5',
    '$kbm',
    '$spiritual',
    '$sosial',
    '$date',
    '$note',
    '$status2')";
    $sql = mysqli_query($connect,$query);

    
    $query2 = "UPDATE dt_sw SET status = '$status'  WHERE id_sw = '$idsw'";
            
    $sql2 = mysqli_query($connect,$query2);

    header ("location:../view/home.php?page=quesioner"); 
}

else if(isset($_GET['delete'])){
        $id = $_GET['id'];
        
        $query = "DELETE FROM tb_quesioner WHERE id_sw='$id'";
        $sql = mysqli_query($connect,$query);

        
        $query2 = "UPDATE dt_sw SET status = '$status2'  WHERE id_sw = '$id'";
        $sql2 = mysqli_query($connect,$query2);
        
        header ("location: ../view/home.php?page=quesioner");
    }

else if(isset($_GET['verifikasi'])){
        $id = $_GET['id'];
        $nis = $_GET['nis'];
        $nama = $_GET['nama'];
        $kelas = $_GET['kelas'];
        $prefrensi = $_GET['pref'];
        $note = $_GET['note'];
        
        
        // $query = "DELETE FROM tb_quesioner WHERE id_sw='$id'";
        // $sql = mysqli_query($connect,$query);
        $query3 = "UPDATE dt_sw SET status = '$status3'  WHERE id_sw = '$id'";
        $sql3 = mysqli_query($connect,$query3);

        $query2 = "UPDATE tb_quesioner SET status = '$status3'  WHERE id_sw = '$id'";
        $sql2 = mysqli_query($connect,$query2);

        $query = "INSERT INTO tb_ranking VALUES('',
        '$id',
        '$nis',
        '$nama',
        '$kelas',
        '$prefrensi',
        '$note',
        '$date')";
        $sql = mysqli_query($connect,$query);

        
        header ("location: ../view/home.php?page=hasil_quesioner");
    }
?>