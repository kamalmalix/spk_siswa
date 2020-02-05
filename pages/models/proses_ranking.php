<?php
include "koneksi.php";

$notesw = $_POST['note'];

if (isset($_POST['edit_note'])) {

	$id = $_POST['id'];
	$query2 = "UPDATE tb_ranking SET note = '$notesw' WHERE id_sw='$id'";
            
        $sql2 = mysqli_query($connect,$query2);
   
        header ("location: ../view/home.php?page=hasil_prilaku_siswa2");
}

?>