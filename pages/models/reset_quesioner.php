<?php
include "koneksi.php";

$kelas = $_GET['kelas'];
$status = "Belum Diproses";

if(isset($_GET['reset'])){
        
        
        $query1 = "DELETE FROM tb_quesioner WHERE kelas_sw= '$kelas' ";
        $sql1 = mysqli_query($connect,$query1);

        $query2 = "DELETE FROM tb_ranking WHERE kelas_sw= '$kelas' ";
        $sql2 = mysqli_query($connect,$query2);

        $query3 = "UPDATE dt_sw SET status='$status' WHERE kelas_sw = '$kelas' "; 
        $sql3 = mysqli_query($connect,$query3);
        
        header ("location: ../view/home.php?page=quesioner");

    }elseif (isset($_GET['reset2'])) {

    	$query1 = "DELETE FROM tb_quesioner WHERE kelas_sw= '$kelas' ";
        $sql1 = mysqli_query($connect,$query1);

        $query3 = "UPDATE dt_sw SET status='$status' WHERE kelas_sw = '$kelas' "; 
        $sql3 = mysqli_query($connect,$query3);
        
        header ("location: ../view/home.php?page=quesioner");
    }
?>