<?php
include "koneksi.php";

// admin
$password = $_POST['pass'];

// guru
$nip = $_POST['nip'];
$namagr = $_POST['nama_gr'];
$alamatgr = $_POST['alamat_gr'];
$tlpgr = $_POST['tlp_gr'];
$tempatgr = $_POST['tempat_gr'];
$tglgr = $_POST['tgl_gr'];
$gendergr = $_POST['gender_gr'];
$password2 = $_POST['password'];

if(isset($_POST['edit'])){
        //name di input
        
        $lv = $_POST['lv'];
        $query = "UPDATE tb_user SET password ='$password' WHERE level='$lv'";
            
        $sql = mysqli_query($connect,$query);
   
        header ("location: ../view/home.php?page=user");

}elseif (isset($_POST['edit_profile'])) {
	$id = $_POST['id'];

        $query = "UPDATE dt_guru SET 
        nip='$nip',
        nama_gr = '$namagr',
        alamat_gr = '$alamatgr',
        tlp_gr = '$tlpgr',
        tempat_gr = '$tempatgr',
        tgl_gr = '$tglgr',
        gender_gr = '$gendergr',
        password_gr = '$password2'
         WHERE id_gr='$id'";  
        $sql = mysqli_query($connect,$query);
            
        $query2 = "UPDATE tb_user SET 
        nama_user = '$namagr',
        username = '$nip',
        password ='$password2'
        WHERE id_guru = '$id'";
        $sql2 = mysqli_query($connect,$query2);
        header ("location: ../view/home.php");
	
}

?>