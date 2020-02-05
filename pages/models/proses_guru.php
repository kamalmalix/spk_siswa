<?php
include "koneksi.php";

$nip = $_POST['nip'];
$namagr = $_POST['nama_gr'];
$alamatgr = $_POST['alamat_gr'];
$tlpgr = $_POST['tlp_gr'];
$tempatgr = $_POST['tempat_gr'];
$tglgr = $_POST['tgl_gr'];
$gendergr = $_POST['gender_gr'];
$kelasgr = $_POST['kelas_gr'];
$level = $_POST['level'];
$passwordgr = $_POST['nip'];

if (isset($_POST['tambah_guru'])){

    if ($query = mysqli_query($connect, "INSERT INTO dt_guru VALUES('','$nip','$namagr','$alamatgr','$tlpgr','$tempatgr','$tglgr','$gendergr','$kelasgr','$level','$passwordgr')")){
    $last_id = mysqli_insert_id($connect);
    // $sql = mysqli_query($connect,$query);
    mysqli_query($connect, "INSERT INTO tb_user VALUES('','$last_id','','$namagr','$nip','$passwordgr','$level','$kelasgr')");
    // $query2 = "INSERT INTO tb_user VALUES('$last_id','$namasw','$nis','$passwordsw','$level','$kelassw')";
    // $sql2 = mysqli_query($connect,$query2);

    }
    header ("location:../view/home.php?page=data_guru"); 
}


	// $query = "INSERT INTO dt_guru VALUES('','$nip','$namagr','$alamatgr','$tlpgr','$tempatgr','$tglgr','$gendergr','$kelasgr','$level','$passwordgr')";
	//  $sql = mysqli_query($connect,$query);
   
	//  $query2 ="INSERT INTO tb_user VALUES('$nip','$namagr','$nip','$passwordgr','$level','$kelasgr')";
 //    $sql2 = mysqli_query($connect,$query2);
 //    header ("location:../view/home.php?page=data_guru"); 
	// }
   

else if(isset($_POST['edit_guru'])){
        //name di input
        
        $id = $_POST['id'];
        $query = "UPDATE dt_guru SET nip='$nip',nama_gr = '$namagr',alamat_gr = '$alamatgr',tlp_gr = '$tlpgr',tempat_gr = '$tempatgr',tgl_gr = '$tglgr',gender_gr = '$gendergr',kelas_gr = '$kelasgr',level = '$level',password_gr = '$passwordgr' WHERE id_gr='$id'";
            
        $sql = mysqli_query($connect,$query);

        $query2 = "UPDATE tb_user SET nama_user = '$namagr' , username = '$nip',password = '$nip',level = '$level',kelas = '$kelasgr' WHERE id_guru='$id'";
            
        $sql2 = mysqli_query($connect,$query2);
   
        header ("location: ../view/home.php?page=data_guru");
}
else if(isset($_GET['delete'])){
        $id = $_GET['id'];
        
        $query = "DELETE FROM dt_guru WHERE id_gr ='$id' ";
        $sql = mysqli_query($connect,$query);

        $query2 = "DELETE FROM tb_user WHERE id_guru='$id'";
        $sql2 = mysqli_query($connect,$query2);
        
        header ("location: ../view/home.php?page=data_guru");
    }

?>