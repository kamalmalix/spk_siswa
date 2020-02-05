<?php
include "koneksi.php";

$nama_kls = $_POST['nama_kls'];

if (isset($_POST['tambah'])){
	$query = "INSERT INTO tb_kelas VALUES('','$nama_kls')";
    $sql = mysqli_query($connect,$query);

    header ("location:../view/home.php?page=kelas"); 
}
else if(isset($_POST['edit'])){
        //name di input
        
        $id = $_POST['id'];
        $query = "UPDATE tb_kelas SET nama_kls='$nama_kls' WHERE id_kls='$id'";
            
        $sql = mysqli_query($connect,$query);
   
        header ("location: ../view/home.php?page=kelas");
}
else if(isset($_GET['delete'])){
        $id = $_GET['id'];
        
        $query = "DELETE FROM tb_kelas WHERE id_kls='$id'";
        $sql = mysqli_query($connect,$query);
        
        header ("location: ../view/home.php?page=kelas");
    }
?>