<?php
include "koneksi.php";

$nis = $_POST['nis'];
$namasw = $_POST['nama_sw'];
$alamatsw = $_POST['alamat_sw'];
$tlpsw = $_POST['tlp_sw'];
$tempatsw = $_POST['tempat_sw'];
$tglsw = $_POST['tgl_sw'];
$gendersw = $_POST['gender_sw'];
$kelassw = $_POST['kelas_sw'];
$level = $_POST['level'];
$passwordsw = $_POST['nis'];
$status = "Belum Diproses";

if (isset($_POST['tambah_siswa'])){
	if ($query = mysqli_query($connect, "INSERT INTO dt_sw VALUES('','$nis','$namasw','$alamatsw','$tlpsw','$tempatsw','$tglsw','$gendersw','$kelassw','$level','$passwordsw','$status')")){
	$last_id = mysqli_insert_id($connect);
    // $sql = mysqli_query($connect,$query);
	mysqli_query($connect, "INSERT INTO tb_user VALUES('','','$last_id','$namasw','$nis','$passwordsw','$level','$kelassw')");
    // $query2 = "INSERT INTO tb_user VALUES('$last_id','$namasw','$nis','$passwordsw','$level','$kelassw')";
    // $sql2 = mysqli_query($connect,$query2);

	}
    header ("location:../view/home.php?page=data_siswa"); 
}
else if(isset($_POST['edit_siswa'])){
        //name di input
        
        $id = $_POST['id'];
        $query = "UPDATE dt_sw SET nis='$nis',nama_sw = '$namasw',alamat_sw = '$alamatsw',tlp_sw = '$tlpsw',tempat_sw = '$tempatsw',tgl_sw = '$tglsw',gender_sw = '$gendersw',kelas_sw = '$kelassw',level = '$level',password_sw = '$passwordsw' WHERE id_sw='$id'";
            
        $sql = mysqli_query($connect,$query);

        $query2 = "UPDATE tb_user SET nama_user = '$namasw' , username = '$nis',password = md5('$nis'),level = '$level',kelas = '$kelassw' WHERE id_siswa='$id'";
            
        $sql2 = mysqli_query($connect,$query2);

        $query3 = "UPDATE tb_quesioner SET nis = '$nis', nama_sw = '$namasw'  WHERE id_sw='$id'";
            
        $sql3 = mysqli_query($connect,$query3);

        $query4 = "UPDATE tb_ranking SET nis = '$nis', nama_sw = '$namasw' WHERE id_sw='$id'";
            
        $sql4 = mysqli_query($connect,$query4);
   
        header ("location: ../view/home.php?page=data_siswa");


}
else if(isset($_GET['delete'])){
        $id = $_GET['id'];
        
        $query = "DELETE FROM dt_sw WHERE id_sw='$id'";
        $sql = mysqli_query($connect,$query);

        $query2 = "DELETE FROM tb_user WHERE id_siswa='$id'";
        $sql2 = mysqli_query($connect,$query2);
        
        header ("location: ../view/home.php?page=data_siswa");
    }

?>